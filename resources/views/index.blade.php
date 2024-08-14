@extends('layout.layout')
@section('title','Home Page')
@section('content')
    <div class="main_container_section mt-5">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 col-lg-12 m-auto">
                    <div class="full_main_box card bg-light">
                        <div class="container-fluid header_main_areas pt-1 pb-1 justify-content-between  d-flex">
                            <div class="filter_areas ">
                                <form class="d-flex " method="get"  action="{{ route('contact.show') }}" >
                                    <select name="filter" class="form-control me-2">
                                        <option value="name_asc">Sort by Name Ascending</option>
                                        <option value="name_desc">Sort by Name Descending</option>
                                        <option value="date_asc">Sort by Date Ascending</option>
                                        <option value="date_desc">Sort by Date Descending</option>
                                    </select>
                                    <button class="btn btn-primary" type="submit">Filter</button>
                                </form>
                            </div>
                            <h4 class="mb-0">Contact List</h4>

                            <div class="search_areas ">
                                <form class="d-flex " method="get" action="{{route('contact.show')}}">
                                    <input class="form-control me-2" type="text" name="search" value="{{ $search }}"  placeholder="Search">
                                    <button class="btn btn-primary"  type="submit">Search</button>
                                </form>
                            </div>
                        </div>
                        @if($contacts->isEmpty())
                            <p>No User Found...</p>
                        @else
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $counter = 1; @endphp
                            @foreach($contacts as $contact)
                                <tr>
                                    <td>{{$counter}}</td>
                                    <td>{{$contact->name}}</td>
                                    <td>{{$contact->email}}</td>
                                    <td>{{$contact->phone}}</td>
                                    <td>{{$contact->address}}</td>
                                    <td>{{$contact->created_at}}</td>
                                    <td>
                                        <form action="{{ route('contacts.delete', $contact->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete" class="btn btn-danger " onclick="return confirm('Are you sure you want to delete this user?')"><i class="fa-regular fa-trash-can"></i></button>
                                        </form>
{{--                                        <a href="{{url('/contacts/delete/'.$contact->id)}}"  onclick="return confirm('Are you sure Delete User ?');" class="btn btn-danger " data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete"></a>--}}
                                        <a href="{{url('/contacts/edit/'.$contact->id)}}" class="btn btn-success" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"><i class="fa-regular fa-pen-to-square"></i></a>
                                        <a href="{{url('/contacts/view/'.$contact->id)}}"  class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="View"><i class="fa-regular fa-eye"></i></a>
                                    </td>
                                </tr>
                                @php $counter++; @endphp
                            @endforeach
                            </tbody>

                        </table>
                        @endif
                    </div>
                   <div class="mt-2">
                       {{ $contacts->links('pagination::bootstrap-5') }}
                   </div>
                </div>
            </div>
        </div>
    </div>
@endsection
