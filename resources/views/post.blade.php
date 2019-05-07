@extends('layouts.blog-post')

@section('content')

    <!-- Title -->
    <h1>{{$post->title}}</h1>
    <!-- Author -->
    <p class="lead">
        by <a href="#">{{$post->user->name}}</a>
    </p>
    <hr>
    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>
    <hr>
    <!-- Preview Image -->
    <img class="img-responsive" src="{{$post->photo ? $post->photo->file : null}}" alt="">
    <hr>
    <p>{!!$post->body!!}</p>
    <hr>
    @if (!Auth::guest())
        <a  href="{{$post->torrent_link}}" title="Get this torrent"><img src="{{ asset('images/mg.png')}}" style="height: 20px; width: 20px"> Get this torrent</a>
        @endif
    <hr>
    @if(Session::has('comment_message'))

        {{session('comment_message')}}
    @endif
    <!-- Blog Comments -->
{{--    @if(Auth::check())--}}
{{--        <!-- Comments Form -->--}}
{{--        <div class="well">--}}
{{--            <h4>Leave a Comment:</h4>--}}
{{--            {!! Form::open(['method'=>'POST', 'action'=> 'PostCommentsController@store']) !!}--}}
{{--            <input type="hidden" name="post_id" value="{{$post->id}}">--}}
{{--            <div class="form-group">--}}
{{--                {!! Form::label('body', 'Body:') !!}--}}
{{--                {!! Form::textarea('body', null, ['class'=>'form-control','rows'=>3])!!}--}}
{{--            </div>--}}
{{--            <div class="form-group">--}}
{{--                {!! Form::submit('Submit comment', ['class'=>'btn btn-primary']) !!}--}}
{{--            </div>--}}
{{--            {!! Form::close() !!}--}}

{{--        </div>--}}
{{--    @endif--}}
    @if(Auth::check())
        <!-- Comments Form -->
        <div class="well">
            @if(Session::has('message'))
                {{session('message')}}
            @endif

            <h4>Leave a Comment:</h4>
            {!! Form::open(['method'=>'POST', 'action'=>'PostCommentsController@store', 'files'=>true]) !!}

            <input type="hidden" name="post_id" value="{{$post->id}}">

            <div class="form-group">
                {!! Form::textarea('body', null, ['class'=>'form-control', 'placeholder'=>'Name', 'rows'=>3]) !!}
            </div>


            {!! Form::submit('Comment', ['class'=>'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    @endif

    <hr>
    <!-- Posted Comments -->
    <!-- Comment -->
    <hr>
    @if(count($comments) > 0)
        @foreach($comments as $comment)

            <!-- Comment -->
            <div class="media">
                <a class="pull-left" href="#">
                    <img height="64" class="media-object" src="{{$comment->photo}}" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">{{$comment->author}}
                        <small>{{$comment->created_at->diffForHumans()}}</small>
                    </h4>
                    <p>{{$comment->body}}</p>
                @if(count($comment->replies) > 0)
                    @foreach($comment->replies as $reply)
                        @if($reply->is_active == 1)
                            <!-- Nested Comment -->
                                <div id="nested-comment" class=" media">
                                    <a class="pull-left" href="#">
                                        <img height="64" class="media-object" src="{{$reply->photo}}" alt="">
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading">{{$reply->author}}
                                        <small>{{$reply->created_at->diffForHumans()}}</small>
                                        </h4>
                                        <p>{{$reply->body}}</p>
                                    </div>
                                    <div class="comment-reply-container">


                                        <button class="toggle-reply btn btn-primary pull-right">Reply</button>

                                        <div class="comment-reply col-sm-6">
                                            {!! Form::open(['method'=>'POST', 'action'=> 'CommentRepliesController@createReply']) !!}
                                            <div class="form-group">

                                                <input type="hidden" name="comment_id" value="{{$comment->id}}">

                                                {!! Form::label('body', 'Body:') !!}
                                                {!! Form::textarea('body', null, ['class'=>'form-control','rows'=>1])!!}
                                            </div>

                                            <div class="form-group">
                                                {!! Form::submit('submit', ['class'=>'btn btn-primary']) !!}
                                            </div>
                                            {!! Form::close() !!}

                                            Get this torrent   </div>
                                        <!-- End Nested Comment -->
                                    </div>
                                </div>
                            @else


{{--                                <h1 class="text-center">No Replies</h1>--}}



                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
        @endforeach
    @endif

@stop
@section('category')

    <div class="well">
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-6">
                <ul class="list-unstyled">
                    @foreach($cats as $cat)
                        <li><a href="{{ url('/Front', $cat->id) }}">{{$cat->name}}</a>
                            @endforeach
                        </li>
                </ul>
            </div>
            <!-- /.col-lg-6 -->

            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div>



@endsection

@section('scripts')
    <script>

        $(".comment-reply-container .toggle-reply").click(function(){
            $(this).next().slideToggle("slow");
        });




    </script>
@stop
