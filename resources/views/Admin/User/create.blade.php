@extends('Admin.layout.header')

@section('content')

<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">Add User</h1>
            </div>
            <div class="col-md-offset-3 col-md-6">
                <!-- Form Start -->
                <form action="{{ route('user.store') }}" method="POST" autocomplete="off">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Name" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label>User Role</label>
                        <select class="form-control" name="role" >
                            <option value="user">Normal User</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Save" required />
                </form>
                 <!-- Form End-->
             </div>
         </div>
     </div>
 </div>

@endsection
