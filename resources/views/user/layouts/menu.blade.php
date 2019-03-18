<div class="col-md-3">
    <div class="panel panel-default">
        <div class="panel-heading">Menu użytkownika</div>

        <div class="panel-body">
            <ul class="nav nav-pills nav-stacked">
                <li class="nav-item {{{ (Request::is('settings') ? 'active' : '') }}}">
                    <a class="nav-link" href="{{ route('settings') }}"><i class="fa fa-user" aria-hidden="true"></i> Twój profil</a>
                </li>
                <hr>
                <li class="nav-item {{{ (Request::is('settings/modpacks') ? 'active' : '') }}}">
                    <a class="nav-link" href="{{ route('modpacks-u') }}"><i class="fa fa-compass" aria-hidden="true"></i> Twoje paczki modyfikacji</a>
                </li>
                <li class="nav-item {{{ (Request::is('settings/skin') ? 'active' : '') }}}">
                    <a class="nav-link disabled" href="{{ route('skin') }}"><i class="fa fa-paint-brush" aria-hidden="true"></i> Edycja skórki</a>
                </li>
            </ul>
        </div>
    </div>
</div>