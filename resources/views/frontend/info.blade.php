@extends('frontend.onepage')
@section('content')
    <div class="jumbotron" id="jumb">
        <div class="container" id="text">

            <p class="slide" style="font-size: 30px">{{trans('app.renginiu vedejas')}}</p>
            <div class="row" style="margin-left: 80px">
                <div class="col-md-6">
                    <h1 style="font-size: 150px">NIONIS</h1>
                </div>
                <div class="col-md-6">
                    <h1 class="slide1" style="font-size: 150px">.LT</h1>
                </div>
            </div>
        </div>
    </div>

        <div class="container" id="about">
            <h2 style=" color: #31b0d5;font-size: 25px">{{trans('app.about')}}</h2>
            <br>
            <div class="row">
                <div class="col-lg-6 col-md-4">
                    <div class="thumbnail" id="about1">
                        <h3>{{trans('app.I am Mindaugas - a developer from Lithuania.')}}</h3>
                        <p style="font-size: 14px ;text-align: center; color: black">{{trans('app.I like to create different websites, programs and more.Thoroughness
, consistency and perseverance are just a few features that allow you to succeed in various projects and more.')}}</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-4">
                    <div class="thumbnail" id="skills">
                        <h3>{{trans('app.skills')}}</h3>
                        <div class="row">
<ul>
    <li>Ruošiama...</li>
</ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <div class="container">
        <h1 id="portfolio">{{trans('app.portfolio')}}</h1>
        <div class="row">
            @foreach($works as $data)
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail" id="box">
                        @foreach($data as $key => $value)
                            @if($key == 'resources_conn' )
                                @if(isset($value[0]['files']))
                                    @foreach($value[0]['files'] as $key => $value)
                                        <a href="{{route('app.frontend.show', [app()->getLocale(), $data['id']])}}"><img
                                                    src="{{asset($value['path'])}}" class="img-rounded zoom"
                                                    alt="Cinque Terre" width="100%"></a>
                                    @endforeach
                                @else
                                    <img src="" class="img-rounded zoom" alt="Cinque Terre"
                                         width="78%">
                                @endif
                            @endif
                        @endforeach
                        <div class="caption">
                            @foreach($data as $key => $value)
                                @if($key == 'translation' )
                                    <h3>&nbsp;{{$value['title']}}</h3>
                                    <a href="{{route('app.frontend.show', [app()->getLocale(), $data['id']])}}"
                                       class="btn btn-primary pull-right"
                                       role="button">{{trans('app.more')}}</a>

                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <footer class="footer text-center">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 ">
                    <h1 id="port_title">{{trans('app.contact')}}</h1>
                    <div class="contact">
                        <h1>Gintaras Banionis</h1>
                        <h3>Šiauliai, LT</h3>
                        <h3>renginiuvedejasnionis@gmail.com</h3>
                        <h3>(8-682) 99090</h3>
                        <br>
                        <br>
                        <br>
                        <a href="https://www.facebook.com/Nionis.lt/" target="blank">
                            <i class="fa fa-facebook-official" style="font-size: 30px" aria-hidden="true"></i>
                        </a>
                        <a href="https://www.instagram.com/renginiu_vedejas_nionis/" target="blank"><i class="fa fa-instagram" style="font-size: 30px"
                                                                                                           aria-hidden="true"></i>
                        </a>
                        <a href="https://soundcloud.com/djnionis" target="blank"><i class="fa fa-soundcloud" style="font-size: 30px" aria-hidden="true"></i>
                        </a>
                        <a href="https://twitter.com/DJNionis" target="blank">
                            <i class="fa fa-twitter-square" style="font-size: 30px" aria-hidden="true"></i>
                        </a>
                        <a href="https://vk.com/id256541637" target="blank">
                            <i class="fa fa-vk" style="font-size: 30px" aria-hidden="true"></i>
                        </a>
                        <a href="https://vk.com/id256541637" target="blank">
                            <i class="fa fa-youtube-square" style="font-size: 30px" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 ">
                    <h1 id="port_title">{{trans('app.conect')}}:</h1>
                    <div>
                        <div class="form-area" id="form_size">

                            <form action="{{url('contact')}}" method="POST" id="contact">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="text" class="form-control" id="name" name="name"
                                           placeholder="{{trans('app.name')}}" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="email" name="email"
                                           placeholder="{{trans('app.email')}}" required>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" id="subject" name="subject"
                                           placeholder="{{trans('app.subject')}}" required>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" type="textarea" name="text" id="message"
                                              placeholder="{{trans('app.message')}}" maxlength="150"
                                              rows="5"></textarea>
                                    <span class="help-block"><p id="characterLeft" class="help-block "></p></span>
                                </div>
                                <div id="msg"></div>
                                <button style="border-radius: 0" type="submit" name="submit" id="submit_mail"
                                        class="btn btn-info pull-right">{{trans('app.send message')}}</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
<br>
            <p>{{trans('app.All Rights Reserved')}}&#169 2018</p>

        </div>
    </footer>
@endsection

@section('scripts')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function () {
            $('#submit_mail').click(function () {
                event.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: '/contact',
                    data: $('#contact').serialize(),
                    success: function (response) {
                        if (response) {
                            $('#msg').html('<div class="alert alert-success messages col-xs-6 col-md-4">{{trans('app.message sending')}}</div>');
                            $('input , textarea').val(function () {
                                return this.defaultValue;
                            });
                        } else {
                            $('#msg').html('<div class="alert alert-danger messages col-xs-6 col-md-4">{{trans('app.error message')}}</div>');
                        }
                    },
                    error: function () {
                        $('#msg').html('<div class="alert alert-danger messages col-xs-6 col-md-4">{{trans('app.error message')}}</div>');
                    }

                });
            });
        });
        var offsetHeight = 51;
        $('body').scrollspy({offset: offsetHeight});
        $('a[href*="#"]')
            .click(function (event) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    event.preventDefault();
                    $('html, body').animate({
                        scrollTop: target.offset().top
                    }, 2500, function () {
                    });
                }
            });


    </script>
@endsection