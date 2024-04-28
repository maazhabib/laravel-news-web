@extends('Admin.layouts.app')

@section('content')

    <div id="admin-content">
        <div class="container">
            <div class="card text-center">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Posts</h5>
                    <a class="btn btn-primary float-right" href="{{ route('post.create') }}"><i class='fa fa-plus'></i> Add</a>
                </div>

                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Create Date</th>
                            <th>Author</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td><small>{{ $post->title ?? '-'}}</small></td>
                                    <td><small>{{ $post->categories->categories_name ?? '-'}}   </small></td>
                                    <td><small><span class="badge badge-info">{{ $post->created_at->format('d, M, Y') ?? '-'}}</span></small></td>
                                    <td><small><span class="badge badge-secondary">{{ $post->author_name ?? '-'}}</span></small></td>
                                    <td>
                                        <a class='edit' href='{{ route('post.edit' , $post->id) }}'><i class='fa fa-edit'></i></a>
                                        <a class='delete' href='{{ route('post.delete' , $post->id) }}'><i class='fa fa-trash-o'></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div  class="card-footer bg-white d-flex justify-content-end">
                    @include('layouts.pagination', ['posts' => $posts])
                </div>
            </div>
        </div>
    </div>

@endsection
