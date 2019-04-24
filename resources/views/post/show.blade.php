@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $post->title}} | <small>{{$post->category->name}}</small></div>
                    <div class="card-body">
                        {{$post->content}}
                    </div>
                        
                </div>

                <div class="card mt-3">
                    <div class="card-header">Tambahkan Komentar</div>

                    @foreach ($post->comments()->get() as $comment)
                        <div class="card-body" style="margin-bottom: -30px;">
                            <h4>{{ $comment->user->name }} - {{ $comment->created_at->diffForHumans() }}</h4>
                            <p>{{ $comment->message }}</p>
                        </div>
                    @endforeach
                    <div class="card-body">
                        <form action="{{ route('post.comment.store', $post) }}" method="POST" class="form-horisontal">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <textarea name="message" id="" cols="30" rows="5" class="form-control" placeholder="Berikan komentar"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit"value="Komentar" class="btn btn-primary">
                            </div>
                        </form>
                    </div>      
                </div>

            </div>

        </div>
    </div>
@endsection