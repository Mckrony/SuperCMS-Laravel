@extends('layouts.blog-home')

@section('sps')

    @foreach($posts as $post)
        <h2>
            <a href="#">{{$post->title}}</a>
        </h2>
        <p class="lead">
            by <a href="index.php">{{$post->user->name}}</a>
        </p>
        <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>
        <hr>
        <img class="img-responsive" src="{{$post->photo ? $post->photo->file : null}}" alt="">
        <hr>
        <p>{{$post->body}}</p>
        <a class="btn btn-primary" href="{{ url('/post', $post->id) }}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
    @endforeach
@stop


@section('category')

    <div class="well">
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-6">
                <ul class="list-unstyled">
                    @foreach($cats as $cat)
                        <li><a href="{{ url('/home', $cat->id) }}">{{$cat->name}}</a>
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
