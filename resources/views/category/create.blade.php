@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('category.store') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="">Category Name</label>
                <input type="text" class="form-control" name="name" placeholder="Category Name">
            </div>
            <div class="form-group">
                <input type="submit" value="Submit" class="btn btn-primary">
            </div>

        </form>
    </div>
@endsection