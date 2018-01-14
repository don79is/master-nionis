<!DOCTYPE html>

<html lang="en">
<head>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ URL::asset('css/frontend.style.css') }}">
    <link href="https://fonts.googleapis.com/css?family=EB+Garamond" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body id="list">
<div class="container">
    <div class="row">
        <h1 class="text_show">{{$title}}</h1>
        <div class="col-md-6" >
            <div class="thumbnail">
                @foreach($path as $value)
                    @foreach($value['files'] as $key => $image)
                        <img src="{{$image['path']}}" class="img-rounded zoom" alt="Cinque Terre" width="100%">
                        <br>
                    @endforeach
                @endforeach
            </div>
        </div>
        <div class="col-md-6">
            <div class="thumbnail" id="descript">
                <h3 class="text_show">{{trans('app.description')}}</h3>
                <h2>&nbsp;{{$description}}</h2>
                <iframe width="535" height="315" src="{{$url}}" frameborder="0" allowfullscreen></iframe>
                <a class="btn btn-primary" href="{{$back}}">{{ trans('app.back') }}</a>
            </div>
        </div>
    </div>
</div>


</body>

<script src="https://togetherjs.com/togetherjs.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>


@yield('scripts')
</html>