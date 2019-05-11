@extends('layouts.blog-profile')
@section('contents')

@foreach($user as $u)

    <div class="form-group">


        {!! Form::model($user, ['method'=>'PATCH', 'action'=> ['HomeshowController@update', $ids],'files'=>true]) !!}
        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', $u->name, ['class'=>'form-control'])!!}
        </div>
        <div class="form-group">
            {!! Form::label('email', 'Email:') !!}
            {!! Form::email('email', $u->email, ['class'=>'form-control', 'disabled' => 'disabled'])!!}
        </div>
        <div class="form-group">
            {!! Form::label('photo_id', 'Photo:') !!}
            {!! Form::file('photo_id', null, ['class'=>'form-control'])!!}
        </div>
        <div class="form-group">
            {!! Form::label('password', 'Password:') !!}
            {!! Form::password('password', ['class'=>'form-control'])!!}
        </div>
        <div class="form-group">
            {!! Form::submit('Update Yourself', ['class'=>'btn btn-primary col-sm-6']) !!}
        </div>
        {!! Form::close() !!}






    </div>

    @endforeach




@stop