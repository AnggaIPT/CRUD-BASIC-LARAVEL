@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach ($posts as $post)
                    <div class="card mb-4">
                        <div class="card-header"><a href="{{ route('post.show', $post)}}">{{ $post->title }}</a>  | {{$post->created_at->diffForHumans()}}</div>

                        <div class="card-body">
                           <p>{{ str_limit($post->content, 100, ' ...') }}</p>
                        </div>
                        <div class="card-footer">
                            <div class="btn-group mr-2" role="group">
                                    <a href="{{ route('post.edit', $post ) }}" class="btn btn-sm btn-primary">Edit</a>
                            </div>
                            <div class="btn-group mr-2" role="group">
                                <form action="{{ route('post.destroy', $post) }}" method="post">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
                    {!! $posts->render() !!}
            </div>
        </div>
    </div>
@endsection