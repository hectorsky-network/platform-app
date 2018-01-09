<div class="col-md-3">
    <div class="panel panel-default">
        <div class="panel-heading">Menu</div>

        <div class="panel-body">
            <ul class="nav flex-column">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('settings') }}"><i class="fa fa-user" aria-hidden="true"></i> Twój profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('modpacks-u') }}"><i class="fa fa-th-list" aria-hidden="true"></i> Twoje paczki modyfikacji</a>
                </li>
                <hr>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-pencil-square-o" aria-hidden="true" disabled></i> Edycja profilu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="{{ route('skin') }}"><i class="fa fa-paint-brush" aria-hidden="true"></i> Edycja skórki</a>
                </li>
            </ul>
        </div>
    </div>
</div>