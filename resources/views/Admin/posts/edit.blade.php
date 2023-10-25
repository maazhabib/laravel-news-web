@extends('Admin.layouts.header')

@section('content')

<div id="admin-content">
  <div class="container">
  <div class="row">
    <div class="col-md-12">
        <h1 class="admin-heading">Update Post</h1>
    </div>
    <div class="col-md-offset-3 col-md-6">
        <!-- Form for show edit-->
        <form action="{{ route('post.update' , $post->id) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="exampleInputTile">Title</label>
                <input type="text" name="title"  class="form-control" id="exampleInputUsername" value="{{ $post->title }}">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1"> Description</label>
                <textarea name="description" class="form-control"  required rows="5">{{ $post->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputCategory">Category</label>
                <select class="form-control" name="categories_id">
                    @foreach ($categories as $cat)

                        <option value="{{ $cat->id }}" selected>{{ $cat->categories_name }}</option>

                        {{-- @if (isset($psot))
                            @if ($cat->id == $post->categories_id)
                            selected
                            @endif
                        @endif --}}
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Post image</label>
                <input type="file" name="image"><br>
                <img  src="{{ asset('images/' . $post->image)}}" height="150px">
            </div>
            <input type="submit" class="btn btn-primary" value="Update" />
        </form>
        <!-- Form End -->
      </div>
    </div>
  </div>
</div>


@endsection
