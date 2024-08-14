<?php

namespace App\Http\Controllers;

use App\Models\Contacts;
use Exception;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        return view('create');
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required|max:255|string|min:3',
            'email' => 'required|email|max:255|string|unique:contacts,email',
            'phone' => 'required',
            'address' => 'required|max:255|string|min:3',
        ]);
        Contacts::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
        ]);
        return redirect()->route('contact.show')->with('Success','User Add Successfully');
    }
    public function show(Request $request){
        $search = $request->input('search');
        $filter = $request->input('filter');

        // Initialize query builder
        $contacts = Contacts::query();

        // Apply search if it exists
        if ($search) {
            $contacts->where('name', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%");
        }

        // Apply filter if it exists
        if ($filter) {
            switch ($filter) {
                case 'name_asc':
                    $contacts->orderBy('name', 'asc');
                    break;
                case 'name_desc':
                    $contacts->orderBy('name', 'desc');
                    break;
                case 'date_asc':
                    $contacts->orderBy('created_at', 'asc');
                    break;
                case 'date_desc':
                    $contacts->orderBy('created_at', 'desc');
                    break;
                default:
                    // Optional: Define default sorting if needed
                    $contacts->orderBy('created_at', 'desc');
                    break;
            }
        }

        // Paginate results
        $contacts = $contacts->paginate(3);

        // Return view with data
        return view('index', compact('contacts', 'search', 'filter'));
    }
    //single user get
    public function get(){
        return view('edit');
    }
    public function edit(String $id)
    {
        try{
            $user = Contacts::find($id);
            if (!$user) {
                return 'not found';
            }
            return view('edit', compact('user'));
        }catch (Exception $exception){
            return $exception->getMessage();
        }
    }
    //update user
    public function update(Request $request, Contacts $user){
        $request->validate([
            'name' => 'required|max:255|string|min:3',
            'email' => 'required|email|max:255|string|unique:contacts,email,'.$user->id,
            'phone' => 'required',
            'address' => 'required|max:255|string|min:3',
        ]);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        $user->save();
        return redirect()->route('contact.show')->with('Success','User Updated Successfully');
    }
    //get user
    public function profile_get($id){
        $user = Contacts::find($id);
        if (!$user) {
            return 'not found';
        }
        return view('show', compact('user'));
    }
    public function delete_user($id){
        $delete_user = Contacts::find($id);
        $delete_user->delete();
        return redirect()->route('contact.show')->with('Success','User Deleted Successfully');
    }
}
