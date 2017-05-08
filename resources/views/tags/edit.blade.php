@extends('main')

@section('title' , '| Edit Tag')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            {!! Form::model($tag , ['route'=>['tags.update' , $tag->id] , 'method'=>"PUT"]) !!}

            {{Form::label('name' , 'Title:')}}
            {{Form::text('name' , null , ['class'=>"form-control"])}}
            {{Form::submit('Save Changes' , ['class'=>"btn btn-success btn-block btn-h1-spacing"])}}

            {!! Form::close() !!}
        </div>
    </div>

    @endsection