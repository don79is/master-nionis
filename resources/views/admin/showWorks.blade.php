@extends('admin.core')
@section('content')
    <div class="container">
        <div class="row">
            <h1>{{$title}}</h1>
            <p>{{$description}}</p>
            <h2>{{$url}}</h2>
        </div>
        <a class="btn btn-primary" href="{{$back}}">{{ trans('app.back') }}</a>
        <a class="btn btn-success" href="{{$edit}}">{{ trans('app.edit') }}</a>
    </div>




@endsection