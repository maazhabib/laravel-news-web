@extends('Admin.layouts.app')

@section('content')
    <div id="admin-content">
        <div class="container">

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0"><b>Create Post</b></h5>
                    <a class="btn btn-danger float-right" href="{{ route('post.index') }}"><i
                            class='fa fa-arrow-left'></i> Back</a>
                </div>

                <form method="post" action="{{ route('post.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Title <span class="label-field-required">*</span></label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                                   id="title" placeholder="Title">
                            @error('title')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="category">Category <span class="label-field-required">*</span></label>
                            <select class="form-control @error('category') is-invalid @enderror" name="category"
                                    id="category">
                                <option disabled selected>Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->categories_name }}</option>
                                @endforeach
                            </select>
                            @error('category')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Description <span class="label-field-required">*</span></label>
                            <textarea name="description" rows="11"
                                      class="form-control @error('description') is-invalid @enderror "></textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer bg-white d-flex justify-content-end">
                        <button type="submit" class="btn btn-success float-right"><i class='fa fa-save'></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
