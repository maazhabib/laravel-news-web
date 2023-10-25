@extends('Admin.layouts.header')

@section('content')

<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="adin-heading"> Update Category</h1>
            </div>
            <div class="col-md-offset-3 col-md-6">
                <form action="" method ="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <input type="hidden" name="cat_id"  class="form-control" value="1" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" name="categories_name" class="form-control" value="{{ $categories->categories_name }}"  placeholder="" required>
                    </div>
                    <input type="submit" name="sumbit"  class="btn btn-primary" value="Update" required />
                </form>
              </div>
            </div>
          </div>
        </div>

@endsection
