<nav id="sidebar">
    <div class="sidebar-header">
        <h3 style="margin-top: 10px;">AGRABAH</h3>
        <strong>BS</strong>
    </div>
    <ul class="list-unstyled components">
        <li class="active">
            <a href="#">
                <iar class="fas fa-chart-line"></iar>
               <span class="p-l-10">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fas fa-money-check"></i>
                <span class="p-l-10">Loan Requests</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fas fa-list-ul"></i>
                <span class="p-l-10">Loan Types</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fas fa-users"></i>
                <span class="p-l-10">Clients</span>
            </a>
        </li>
        <li>
            <a href="#reportSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fas fa-copy"></i>
                <span class="p-l-10">Reports</span>
            </a>
            <ul class="collapse list-unstyled" id="reportSubmenu">
                <li>
                    <a href="#">Report 1</a>
                </li>
                <li>
                    <a href="#">Report 2</a>
                </li>
                <li>
                    <a href="#">Report 3</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#cpanelSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fas fa-cog"></i>
                <span class="p-l-10">Settings</span>
            </a>
            <ul class="collapse list-unstyled" id="cpanelSubmenu">
                <li>
                    <a href="{{route('loan_provider.profile')}}">Bank Profile</a>
                </li>
                <li>
                    <a href="#">Users</a>
                </li>
            </ul>
        </li>
    </ul>
</nav>