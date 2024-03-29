<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{route('home')}}">
                <img src="{{asset('assets/frontend/')}}/img/logo.png">
            </a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <form class="navbar-form navbar-left" action="{{route('search')}}" method="POST">
                @csrf
                <div class="input-group">
                    <input type="text" id="navbar-search" name="searchWord" class="form-control" value="{{old('searchWord')}}" placeholder="Ara">
                    <span class="input-group-btn">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                </div>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{route('cart')}}  "><i class="fa fa-shopping-cart"></i> Sepet <span class="badge badge-theme">{{count(Cart::content())}}</span></a></li>

                @guest
                    <li><a href="{{route('loginForm')}}">Oturum Aç</a></li>
                    <li><a href="{{route('registerForm')}}">Kaydol</a></li>
                @endguest

                @auth()
                    <li><a href="{{route('admin.dashboard')}}">Yönetim Paneli</a></li>
                    <li class="dropdown">

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{auth()->user()->name}} <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('orders')}}">Siparişlerim</a></li>
                        <li role="separator" class="divider"></li>
                        <li>
                            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit()">Çıkış</a>
                            <form id="logout-form" action="{{route('user.logout')}}" method="POST" style="display: none;">
                            @csrf

                            </form>
                        </li>
                    </ul>
                </li>
                 @endauth
            </ul>
        </div>
    </div>
</nav>
