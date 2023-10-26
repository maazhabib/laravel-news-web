@extends('Admin.layouts.header')

@section('content')

<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="admin-heading">All Posts</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" href="{{ route('post.create') }}">add post</a>
            </div>
            <div class="col-md-12">
                <table class="content-table">
                    <thead>
                        <th>S.No.</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Date</th>
                        {{-- <th>Author</th> --}}
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        @foreach ($post as $pos)
                            <tr>
                                <td class='id'>{{ $pos->id }}</td>
                                <td>{{ $pos->title }}</td>
                                <td>{{ $pos->categories->categories_name }}</td>
                                <td>{{ $pos->created_at->format('d, M, Y') }}</td>
                                {{-- <td>{{ $pos->author_id }}</td> --}}
                                <td class='edit'><a href='{{ route('post.edit' , $pos->id) }}'><i class='fa fa-edit'></i></a></td>
                                <td class='delete'><a href='{{ route('post.delete' , $pos->id) }}'><i class='fa fa-trash-o'></i></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <ul class='pagination admin-pagination'>
                    @for ($i = 1; $i <= $post->lastPage(); $i++)
                        <li class="{{ ($post->currentPage() == $i) ? 'active' : '' }}">
                            <a href="{{ $post->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection
