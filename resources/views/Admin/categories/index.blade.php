@extends('Admin.layouts.header')

@section('content')

<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="admin-heading">All Categories</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" href="{{ route('categories.create') }}">add category</a>
            </div>
            <div class="col-md-12">
                <table class="content-table">
                    <thead>
                        <th>S.No.</th>
                        <th>Category Name</th>
                        <th>No. of Posts</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        @foreach ($categories as  $cat)
                            <tr>
                                <td class='id'>{{ $cat->id }}</td>
                                <td>{{ $cat->categories_name }}</td>
                                <td>{{ $cat->no_post}}</td>
                                @if ($cat->no_post == 0)
                                    <td class='edit'><a href='{{ route('categories.show' , $cat->id) }}'><i class='fa fa-edit'></i></a></td>
                                    <td class='delete'><a href='{{ route('delete.categories' , $cat->id) }}'><i class='fa fa-trash-o'></i></a></td>
                                @else
                                    <td class='edit'><i class='fa fa-edit'></i></td>
                                    <td class='delete'><i class='fa fa-trash-o'></i></td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <ul class='pagination admin-pagination'>
                    @for ($i = 1; $i <= $categories->lastPage(); $i++)
                        <li class="{{ ($categories->currentPage() == $i) ? 'active' : '' }}">
                            <a href="{{ $categories->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
                </ul>
            </div>
        </div>
    </div>
</div>


@endsection
