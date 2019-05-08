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

                    @if(count($comment->replies) >= 0)
                        @foreach($comment->replies as $reply)


                            <div class="media">
                                <a class="pull-left" href="#">
                                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">Nested Start Bootstrap
                                        <small>August 25, 2014 at 9:30 PM</small>
                                    </h4>
                                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                                </div>
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
                            </div>
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
