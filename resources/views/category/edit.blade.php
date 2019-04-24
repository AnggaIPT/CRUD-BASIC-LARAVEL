@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Category</div>
                    <div class="card-body">
                        <form action="{{ route('category.update', $category->id) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('PATCH')}}
                            <div class="form-group">
                                <label for="">Category Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Category Name" value="{{ $category->name }}">
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Submit" class="btn btn-primary">
                            </div>
                
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection