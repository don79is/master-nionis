<nav class="navbar navbar-default navbar-fixed-top">
    <div style="background-color: black; width: 100%" class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a style="color: white" class="navbar-brand" href="/">nionis.lt</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a class="scrollable" href="#about">{{trans('app.about')}}</a></li>
                <li><a class="scrollable" href="#portfolio">{{trans('app.portfolio')}}</a></li>
                <li><a class="scrollable"  href="#contact">{{trans('app.contact')}}</a></li>
                @foreach (App\Models\Helper::getActiveLanguages() as $key => $value)
                    <li><a href="{{($key)}}">{{($key)}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>