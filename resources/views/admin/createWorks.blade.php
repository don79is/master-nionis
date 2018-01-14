@extends('admin.core')
@section('content')
    <div class="container">
        <div style="margin-left: 5px" class="row">
            {!! Form::open(['url' =>  $route, 'method' => 'post'])!!}
            @if(isset($record['id']))
                <h2>{{$titleForm}}</h2>
                {{Form::label('language_code', 'Select language')}}
                {{Form::select('language_code', $lang,$record['language_code'], ['class' => 'form-control'])}}

                {{Form::label('title', 'Title')}}
                {{Form::text('title',$record['title'],['class' => 'form-control'])}}

                {{Form::label('description', 'Description')}}
                {{Form::textarea('description', $record['description'],['class' => 'form-control'])}}

                {{Form::label('url', 'Url')}}
                {{Form::text('url', $record['url'],['class' => 'form-control'])}}
            @else
                <h2>{{$titleForm}}</h2>
                {{Form::label('language_code', 'Select language')}}
                {{Form::select('language_code', $lang, null, ['class' => 'form-control'])}}

                {{Form::label('title', 'Title')}}
                {{Form::text('title', null,['class' => 'form-control'])}}

                {{Form::label('description', 'Description')}}
                {{Form::textarea('description', null,['class' => 'form-control'])}}

                {{Form::label('url', 'Url')}}
                {{Form::text('url', null,['class' => 'form-control'])}}
            @endif
            <br>
            <a class="btn btn-primary" href="{{$back}}">{{ trans('app.back') }}</a>
            {{Form::submit(trans('app.save'), array('class' => 'btn btn-success')) }}

            {!! Form::close() !!}
        </div>
    </div>

@endsection
@section('scripts')
    <script>
        $('#language_code').bind(
            'change', function () {
                window.location.href = "?language_code=" + $('#language_code').val();
            });
    </script>
@endsection