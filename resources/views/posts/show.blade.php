@extends('main')

@section('title' ,'| View Post')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <img src="{{ asset('images/' .$post->image) }}" >
            <h1>{{$post->title}}</h1>
            <p class="lead">{!!  $post->body  !!}</p>
            <hr>

            <div class="tags">
                @foreach($post->tags as $tag)
                    <span class="label label-default">{{ $tag->name }}</span>
                @endforeach
            </div>
            <div id="backend-comments">
                <h3>Comments <small>{{ $post->Comments()->count() }} total</small></h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Comment</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($post->comments as $comment)
                        <tr>
                            <td>{{ $comment->name }}</td>
                            <td>{{ $comment->email }}</td>
                            <td> {{ $comment->comment }}</td>
                            <td>
                                <a href="{{ route('comments.edit' , $comment->id) }}" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
                                <a href="{{ route('comments.delete' , $comment->id) }}" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


        <div class="col-md-4">
            <div class="well">

                <dl class="dl-horizontal">
                    <label>URL:</label>
                    <p><a href="{{ url('blog/'.$post->slug) }}"> {{ url('blog/'.$post->slug) }}</a></p>
                </dl>

                <dl class="dl-horizontal">
                    <label>Category:</label>
                    <p>{{ $post->category->name }}</p>
                </dl>

                <dl class="dl-horizontal">
                    <label>Created At:</label>
                    <p>{{ date( 'M j, Y h:i' , strtotime($post->created_at))  }}</p>
                </dl>

                <dl class="dl-horizontal">
                    <label>Updated At</label>
                    <p>{{ date( 'M j, Y h:i' , strtotime($post->updated_at))  }}</p>
                </dl>
                <hr>

                <div class="row">
                    <div class="col-sm-6">
                        {{ Html::linkRoute('posts.edit' , 'Edit' , array($post->id) , array('class'=>'btn btn-primary btn-block')) }}
                    </div>
                    <div class="col-sm-6">
                        {!! Form::open(['route' => ['posts.destroy' , $post->id] , 'method' => 'DELETE']) !!}
                        {!! Form::submit('Delete' , ['class'=>'btn btn-danger btn-block']) !!}
                        {!! Form::close() !!}
                        <div class="row">
                            <div class="col-md-12">
                                {{ Html::linkRoute('posts.index' , '<< See All Posts' , [] , ['class' => "btn btn-default btn-block btn-h1-spacing"]) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @endsection


