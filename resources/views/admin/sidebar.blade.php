<div class="container-fluid">
    <div class="col-md-3">

        <div id="sidebar">
            <ul id="menu" class="nav navbar-nav side-bar">
                <li class="side-bar tmargin">
                    <a href="{{ route('app.works.index') }}"><span><i class="fa fa-folder-open-o"></i></span>
                        {{trans('app.projects')}}</a>
                </li>
                <li class="side-bar">
                    <a href="{{ route('app.languages.index') }}"><span><i class="fa fa-language" aria-hidden="true"></i>&nbsp;</span>
                        {{trans('app.languages')}}</a>
                </li>
                <li class="side-bar">
                    <a href="{{ route('app.resources.index') }}"><span><i class="fa fa-file"></i>"&nbsp;</span>{{trans('app.resources')}}</a>
                </li>
                <li class="side-bar">
                    <a href="#"><span class="glyphicon glyphicon-signal">&nbsp;</span>{{trans('app.statistics')}}</a>
                </li>

            </ul>
        </div>
    </div>

</div>
