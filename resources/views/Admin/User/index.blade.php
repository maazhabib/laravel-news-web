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
                                <td class='edit'><a href='{{ route('user.show' , $User->id) }}'><i class='fa fa-edit'></i></a></td>
                                <td class='delete'><a href='{{ route('delete.user' , $User->id) }}'><i class='fa fa-trash-o'></i></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                    {{-- {{ $Users->links() }} --}}

                    {{-- pagination reminder  --}}
                    {{-- phalay ham na for loop chalaya haa phr i ko 1 ka brabar rakh dia ha ous ka bad ham na
                        $i ko user sa less than ha to lastpage ka brabar phr $i++ kr dia li ma user->current page
                        brabar kr dia ha $i ka phr is ko dikhana ka lia ka active ha ya is lia ham na ternary operator laga ka
                        active llaga dia ous ka bd users ka paginatin show kia or url sa page get kia or $i kr dia current page ka lia --}}

                <ul class='pagination admin-pagination'>
                    @for ($i = 1; $i <= $Users->lastPage(); $i++)
                        <li class="{{ ($Users->currentPage() == $i) ? 'active' : '' }}">
                            <a href="{{ $Users->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection




