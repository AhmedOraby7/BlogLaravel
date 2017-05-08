@extends('main')

@section('title' , '| Edit Post')

@section('stylesheets')
    {!! Html::style('css/select2.min.css') !!}
    {{--<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>--}}
    {{--<script>--}}
        {{--tinymce.init({--}}
            {{--selector:'textarea',--}}
            {{--plugins: 'link'--}}
            {{--//  menubar: false--}}
{{--//            menu: {--}}
{{--//                view: {title:'Edit' , items:'cut , copy , paste'}--}}
{{--//            }--}}
        {{--});--}}
    {{--</script>--}}
@endsection


@section('content')
    <div class="row">
        {!! Form::model($post , ['route'=> ['posts.update' , $post->id] , 'method' => 'PUT' , 'files'=>'true']) !!}
        {{--to get the title and the body on the  label--}}
        <div class="col-md-8">
            {{ Form::label('title' , 'Title') }}
            {{ Form::text('title' , null , ['class' => "form-control input-lg"]) }}
            {{ Form::label('slug' , 'Slug') }}
            {{ Form::text('slug' , null , ['class' => "form-control input-lg"]) }}
            {{ Form::label('category_id' , 'Category:')}}
            {{ Form::select('category_id' , $categories , null , ['class' => "form-control"])}}
            {{ Form::label('tags' , 'Tags:' )}}
            {{ Form::select("tags[]" , $tags , null ,['class'=>"select2-multi form-control", 'multiple' => "multiple"])}}
            {{ Form::label('featured_image' , 'Update Image:') }}
            {{ Form::file('featured_image') }}
            {{ Form::label('body' , 'Body') }}
            {{ Form::textarea('body' , null , ['class' => "form-control"]) }}

            {{--<h1>{{$post->title}}</h1>--}}
            {{--<p class="lead">{{ $post->body  }}t</p>--}}
        </div>

        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>Created At</dt>
                    <dt>{{ date( 'M j, Y h:i' , strtotime($post->created_at))  }}</dt>
                </dl>

                <dl class="dl-horizontal">
                    <dt>Updated At</dt>
                    <dt>{{ date( 'M j, Y h:i' , strtotime($post->updated_at))  }}</dt>
                </dl>
                <hr>

                <div class="row">
                    <div class="col-sm-6">
                        {{ Html::linkRoute('posts.show' , 'Cancel' , array($post->id) , array('class'=>'btn btn-danger btn-block')) }}
                    </div>
                    <div class="col-sm-6">
                        {!!  Form::submit('Save Changes' , ['class'=>"btn btn-success btn-block"]) !!}
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    @endsection



@section('scripts')
    {!! Html::script('js/select2.min.js') !!}
    <script type="text/javascript">
        $('.select2-multi').select2();
        $('.select2-multi').select2().val({!!($post->tags()->getRelatedIds()) !!}).trigger('change');
        // Get the Defaut of the Tags as they Created Before
    </script>
@endsection