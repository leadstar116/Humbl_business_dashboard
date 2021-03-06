<nav class="navbar top-navbar">
    <div class="container">
        <div class="navbar-left">
            <div class="navbar-btn">
                <a class="logo" href="{{ url('/') }}">
                    <img src="/img/humbl-black.png" class="navbar-logo" alt="">
                </a>
            </div>
        </div>

        <div class="navbar-right">
            <div id="navbar-menu">
                <ul class="nav navbar-nav">
                    <li>
                        <div class="user-account">
                            <div class="user_div">
                                <img src="/storage/avatars/{{ $user->ProfilePic }}" class="user-photo" alt="User Profile Picture">
                            </div>
                            <div class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown" aria-expanded="false"><strong>{{ ($user->BusinessName)?$user->BusinessName:'User' }}</strong></a>
                                <ul class="dropdown-menu dropdown-menu-right account vivify flipInY" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-59px, 42px, 0px);">
                                    <li><a href="/logout"><i class="icon-power"></i>Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="progress-container"><div class="progress-bar" id="myBar"></div></div>
</nav>