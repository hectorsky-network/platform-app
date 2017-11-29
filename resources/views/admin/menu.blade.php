<div class="col-md-3">
    <div class="panel panel-default">
        <div class="panel-heading">Menu</div>

        <div class="panel-body">
            <ul class="nav flex-column">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('admin') }}"><i class="fa fa-cogs" aria-hidden="true"></i> System</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin-users') }}"><i class="fa fa-users" aria-hidden="true"></i> Użytkownicy</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin-modpacks') }}"><i class="fa fa-th-list" aria-hidden="true"></i> Paczki modyfikacji</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="{{ route('admin-articles') }}"><i class="fa fa-file" aria-hidden="true"></i> Artykuły</a>
                </li>
            </ul>
        </div>
    </div>
</div>