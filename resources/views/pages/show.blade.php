@extends('layouts.app')

@section('content')
    <div class="containerr bg-info mt-5 p-5 text-center">
        <h1>Welcome </h1>
        @if(!Auth::guest())
            @if(count($posts) > 0)
                @foreach ($posts as $post)
                    <div class="container bg-dark mt-5 p-2 text-center text-white">
                        @if($post->user_id == auth()->user()->id)
                            <h2>{{ $post->msg }} created at {{$post->created_at}}</h2><br>
                        @endif
                    </div>
                @endforeach
            @else
                <div class="container bg-dark mt-5 p-2 text-center text-white">
                    <h2>No Messages found !!!</h2>
                </div>
            @endif
        @else
            <h2>You are not logged in yet...</h2>
        @endif
    </div>
@endsection()

