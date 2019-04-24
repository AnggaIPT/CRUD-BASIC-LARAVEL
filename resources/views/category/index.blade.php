@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @foreach ($categories as $category)
            <div class="col-md-3">
               
                    <div class="card mb-4">
                        <div class="card-body">
                           <p>{{ $category->name }}</p>
                        </div>
                        <div class="card-footer">
                            <div class="btn-group mr-2" role="group">
                                    <a href="{{ route('category.edit', $category ) }}" class="btn btn-sm btn-primary">Edit</a>
                            </div>
                            <div class="btn-group mr-2" role="group">
                                <form action="{{ route('category.destroy', $category) }}" method="post">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection