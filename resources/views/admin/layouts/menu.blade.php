<div class="col-md-3">
    <div class="panel panel-default">
        <div class="panel-heading">Menu administratora</div>

        <div class="panel-body">
            <ul class="nav nav-pills nav-stacked">
                <li class="nav-item {{{ (Request::is('admin') ? 'active' : '') }}}">
                    <a class="nav-link" href="{{ route('admin') }}"><i class="fa fa-info-circle" aria-hidden="true"></i> System</a>
                </li>
                <li class="nav-item {{{ (Request::is('admin/users*') ? 'active' : '') }}}">
                    <a class="nav-link" href="{{ route('admin.users') }}"><i class="fa fa-users" aria-hidden="true"></i> Użytkownicy</a>
                </li>
                <li class="nav-item {{{ (Request::is('admin/modpacks*') ? 'active' : '') }}}">
                    <a class="nav-link" href="{{ route('admin.modpacks') }}"><i class="fa fa-inbox" aria-hidden="true"></i> Paczki modyfikacji</a>
                </li>
                <li class="nav-item {{{ (Request::is('admin/settings') ? 'active' : '') }}}">
                    <a class="nav-link" href="{{ route('admin.settings') }}"><i class="fa fa-cogs" aria-hidden="true"></i> Ustawienia systemu</a>
                </li>
            </ul>
        </div>
    </div>
</div>