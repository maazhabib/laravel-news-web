@extends('Admin.layout.header')

@section('content')

<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="admin-heading">All Users</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" href="{{ route('user.create') }}">Add User</a>
            </div>
            <div class="col-md-12">
                <table class="content-table">
                    <thead>
                        <th>S.No.</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                            @foreach ( $Users as $User)
                        <tr>
                            <td>{{$User->id}}</td>
                            <td>{{$User->name}}</td>
                            <td>{{$User->email}}</td>
                            <td>{{$User->role}}</td>
                            <td class='edit'><a href='{{ route('user.edit' , $User->id) }}'><i class='fa fa-edit'></i></a></td>
                            <td class='delete'><a href='{{ route('user.destroy' , $User->id) }}'><i class='fa fa-trash-o'></i></a></td>
                        </tr>
                            @endforeach
                    </tbody>
                </table>

                {{-- Pagination  --}}
                    {{ $Users->links() }}

            </div>
        </div>
    </div>
</div>

@endsection




