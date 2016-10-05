<!-- Fixed navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">{{config('options.general.name')}}</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                @foreach($topMenu as $menu)
                    <li class="{{!empty($menu['active']) ? 'active' : ''}}{{!empty($menu['sub_menu']) ? 'dropdown' : ''}}">
                        <a href="{{$menu['url']}}"
                        @if (!empty($menu['sub_menu']))
                        class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"
                        @endif
                        >{{$menu['name']}}
                        @if (!empty($menu['sub_menu']))
                        &nbsp;<span class="caret"></span>
                        @endif
                        </a>

                        @if (!empty($menu['sub_menu']))
                            <ul class="dropdown-menu">
                                @foreach($menu['sub_menu'] as $sub_menu)
                                    <li><a href="{{$sub_menu['url']}}">{{$sub_menu['name']}}</a></li>
                                @endforeach
                            </ul>
                        @endif

                    </li>
                @endforeach
            </ul>
            <a class="btn btn-success navbar-btn navbar-right" data-click="generateBlog" href="../navbar/">Build blog</a>

        </div><!--/.nav-collapse -->
    </div>
</nav>