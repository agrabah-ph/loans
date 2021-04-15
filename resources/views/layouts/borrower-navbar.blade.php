<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
        @yield('page-header')
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <a class="navbar-brand" href="#"> <img src="{{asset('images/logo.png')}}" width="65px;" alt=""></a>
            <ul class="nav navbar-nav ">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Loans <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Apply for a loan</a>
                </li>
            </ul>
            <ul class="nav navbar-nav ml-auto">


                <li class="nav-item dropdown notifications">
                    <a class="nav-link dropdown-toggle notification-dropdown" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-bell"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">NO NOTIFICATIONS</a>
                    </div>
                </li>
                <li class="nav-item ">
                    <div class="nav-profile-img" style="background-image: url('{{asset('images/logo.png')}}')" alt=""></div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        James Bond
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>