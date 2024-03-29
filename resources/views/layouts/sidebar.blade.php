<nav id="sidebar">
    <div class="sidebar-header">
        <img src="{{asset('images/agrabah-white-logo.png')}}" width="100%" alt="">
        <strong>AG</strong>
    </div>
    <ul class="list-unstyled components">
        <li class="active">
            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fas fa-home"></i>
                Dashboard
            </a>
            <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                    <a href="#">Home 1</a>
                </li>
                <li>
                    <a href="#">Home 2</a>
                </li>
                <li>
                    <a href="#">Home 3</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#">
                <i class="fas fa-briefcase"></i>
                Loan Types
            </a>
            <a href="#loansSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fas fa-copy"></i>
                Loans
            </a>
            <ul class="collapse list-unstyled" id="loansSubmenu">
                <li>
                    <a href="#">Pending Loans</a>
                </li>
                <li>
                    <a href="#">Unsettled Loans</a>
                </li>
                <li>
                    <a href="#">Settled Loans</a>
                </li>
            </ul>
            <a href="#">
                <i class="fas fa-briefcase"></i>
                About
            </a>
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fas fa-copy"></i>
                Pages
            </a>
            <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="#">Page 1</a>
                </li>
                <li>
                    <a href="#">Page 2</a>
                </li>
                <li>
                    <a href="#">Page 3</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#">
                <i class="fas fa-image"></i>
                Portfolio
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fas fa-question"></i>
                FAQ
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fas fa-paper-plane"></i>
                Contact
            </a>
        </li>
    </ul>

</nav>