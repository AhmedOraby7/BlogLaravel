@extends('main')

@section('title' , '| Register')

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            {!! Form::open() !!}
                {{ Form::label('name' , 'Name:') }}
                {{ Form::text('name' , null , ['class' => "form-control"]) }}

                {{ Form::label('email' , 'Email:') }}
                {{ Form::text('email' , null , ['class' => "form-control"]) }}

                {{ Form::label('password' , 'Password:') }}
                {{ Form::text('password' , null , ['class' => "form-control"]) }}

                {{ Form::label('password_confirmation' , 'Password_Confirmation:') }}
                {{ Form::text('password_confirmation' , null , ['class' => "form-control"]) }}
            <br><br>
                {{ Form::submit('Register' , ['class' => "btn btn-primary btn-block"]) }}
            {!! Form::close() !!}

        </div>
    </div>

    @endsection