@extends('layouts.blog-home')

@section('sps')


    @if(count($posts)>0)
        @foreach($posts as $post)
            <h2>
                <a href="{{ url('/post', $post->id) }}">{{$post->title}}</a>
            </h2>
            <p class="lead">
                by {{$post->user->name}}
            </p>
            <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>
            <hr>
            <img class="img-responsive" src="{{$post->photo ? $post->photo->file : null}}" alt="">
            <hr>
            <p>{!! str_limit($post->body, $limit = 100) !!}</p>
            <a class="btn btn-primary" href="{{ url('/post', $post->id) }}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
        @endforeach
    @else
        &nbsp;<h3 style="justify-content: center; margin-left: 90px">OPPS! Seems no posts available...... <a href="{{url('/Front')}}">See All Posts</a></h3>
        <img style="justify-content: center; margin-left: 190px" class="img-responsive" src="{{asset('images/errs.jpg')}}" alt="">
    @endif

    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">

            {{$posts->render()}}

        </div>
    </div>

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
