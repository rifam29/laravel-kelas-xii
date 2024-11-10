<div class="header">
    <div class="container">
        <div class="w3layouts_logo">
            <a href="{{ route('home') }}">
                <h1>One<span>Movies</span></h1>
            </a>
        </div>
        <div class="w3_search">
            <form action="#" method="post">
                <input type="text" name="Search" placeholder="Search" required="">
                <input type="submit" value="Go">
            </form>
        </div>
        <div class="w3l_sign_in_register">
            @if (Auth::check())
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
                @if (Auth::user()->role_id == 2)
                    <ul>
                        <li><a href="#" data-toggle="modal" data-target="#myModal">Login</a></li>
                    </ul><br>
                @endif
            @else
                <ul>
                    <li><a href="#" data-toggle="modal" data-target="#myModal">Login</a></li>
                </ul>
            @endif
            <div class="clearfix"> </div>
        </div>
    </div>
