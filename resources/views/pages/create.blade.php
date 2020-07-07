@extends('layouts.app')

@section('content')
    <div class="containerr bg-info mt-5 p-5 text-center">
        <h1>Text me...</h1>
        @if(!Auth::guest())
            <!--a href="{{ route('study.create') }}" class="btn btn-warning">Send Message to Gowtham</a-->
            {!! Form::open(['action' => 'Dbcontroller@store', 'method' => 'POST']) !!}
            <div class="form-group">
                {!! Form::text('sender_name', '', ['class' => 'form-control', 'placeholder' => 'Your Sweet Name']); !!}
            </div>
            <div class="form-group">
                {{-- {{ Form::label('msg', 'Message') }} --}}
                {!! Form::textarea('msg', '', ['class' => 'form-control', 'placeholder' => 'Message']); !!}
            </div>
                {!! Form::submit('Send Message', ['class' => 'btn btn-primary']); !!}
            {!! Form::close() !!}
        @else
            <div class="my-5">
                <a href="{{ route('home') }}" class="btn btn-danger">Send Message to Gowtham</a>
                <h6 class="my-3">Login to send messages</h6>
            </div>
        @endif
    </div>
@endsection()
