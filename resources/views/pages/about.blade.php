@extends('layouts.app')

@section('content')
    <div class="containerr bg-info mt-5 p-5 text-center">
        <h1 class="mb-3">Get my Resume...</h1>
        @if(!Auth::guest())
            {{-- <a href="{{ url('resume') }}" class="btn btn-warning">Download Resume</a> --}}
            {!! Form::open(['action' => ['Dbcontroller@update', auth()->user()->id], 'method' => 'POST']) !!}
                {!! Form::hidden('_method', 'PUT'); !!}
                {!! Form::submit('Download Resume', ['class' => 'btn btn-warning']); !!}
            {!! Form::close() !!}
        @else
            <div class="my-5">
                <a href="{{ route('home') }}" class="btn btn-danger">Download Resume</a>
                <h6 class="my-3">Login to download resume</h6>
            </div>
        @endif
    </div>
@endsection()
