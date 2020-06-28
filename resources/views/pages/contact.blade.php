@extends('layouts.app')

@section('content')
    <div class="containerr bg-info mt-5 p-5 text-center">
        <h1 class="mb-3">Feel free to contact me...</h1>
        @if(!Auth::guest())
            <a href="{{ route('study.create') }}" class="btn btn-warning">Send Message to Gowtham</a>
        @else
            <div class="my-5">
                <a href="{{ route('home') }}" class="btn btn-danger">Send Message to Gowtham</a>
                <h6 class="my-3">Login to send messages</h6>
            </div>
        @endif
    </div>
@endsection()
