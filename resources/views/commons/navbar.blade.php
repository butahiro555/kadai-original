<header class="mb-2">
    
    <nav class="navbar navbar-expand-md navbar-dark bg-dark"> 
        <a class="navbar-brand" href="/">Template&nbsp;Creator...&nbsp;<i class="fas fa-pen"></i></a>
        
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>
         
         
        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                @if (Auth::check())
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }}</a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <!-- link_to_routeの第1引数はviewファイルのname、第2引数は表示する文字列、第3引数は配列[]の中に渡したい変数を定義できる -->
                            <li class="text-center dropdown-item">{!! link_to_route('users.index', 'Profile') !!}</li>
                            <li class="dropdown-divider"></li>
                            <li class="text-center dropdown-item">{!! link_to_route('templates.show', 'Template list') !!}</li>
                            <li class="dropdown-divider"></li>
                            <li class="text-center dropdown-item">{!! link_to_route('logout.get', 'Logout') !!}</li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">{!! link_to_route('signup.get', 'Signup', [], ['class' => 'nav-link']) !!}</li>
                    <li class="nav-item">{!! link_to_route('login', 'Login', [], ['class' => 'nav-link']) !!}</li>
                @endif
            </ul>
        </div>
    </nav>
</header>