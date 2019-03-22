<div class="col-md-3">
    <div class="panel panel-default">
        <div class="panel-heading">Menu użytkownika</div>

        <div class="panel-body">
            <ul class="nav nav-pills nav-stacked">
                <li class="nav-item {{{ (Request::is('settings') ? 'active' : '') }}}">
                    <a class="nav-link" href="{{ route('user') }}"><i class="fa fa-user" aria-hidden="true"></i> Twój profil</a>
                </li>
                <li class="nav-item {{{ (Request::is('settings/security') ? 'active' : '') }}}">
                    <a class="nav-link" href="{{ route('user') }}"><i class="fa fa-lock" aria-hidden="true"></i> Bezpieczeństwo</a>
                </li>
                <li class="nav-item {{{ (Request::is('settings/tokens') ? 'active' : '') }}}">
                    <a class="nav-link" href="{{ route('user.tokens') }}"><i class="fa fa-laptop" aria-hidden="true"></i> Wiele urządzeń</a>
                </li>
                @if(Auth::user()->hasVerifiedEmail() === FALSE)
                <li class="nav-item {{{ (Request::is('email/verify') ? 'active' : '') }}}">
                    <a class="nav-link disabled" href="{{ route('verification.notice') }}"><i class="fa fa-envelope-o" aria-hidden="true"></i> Weryfikacja E-Mail</a>
                </li>
                @endif
                <hr>
                <li class="nav-item {{{ (Request::is('settings/modpacks') ? 'active' : '') }}}">
                    <a class="nav-link" href="{{ route('user.modpacks') }}"><i class="fa fa-compass" aria-hidden="true"></i> Twoje paczki modyfikacji</a>
                </li>
                <li class="nav-item {{{ (Request::is('settings/skin') ? 'active' : '') }}}">
                    <a class="nav-link disabled" href="{{ route('user.skin') }}"><i class="fa fa-paint-brush" aria-hidden="true"></i> Edycja skórki</a>
                </li>
                <li class="nav-item {{{ (Request::is('settings/minelp') ? 'active' : '') }}}">
                    <a class="nav-link" href="#"><i class="fa fa-plug" aria-hidden="true"></i> Skórki MineLP</a>
                </li>
                @if(Auth::user()->isAdmin == 1)
                    <hr>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin') }}" style="color:red;"><i class="fa fa-tachometer" aria-hidden="true"></i> Administrator</a>
                    </li>
                    @endif
            </ul>
        </div>
    </div>
</div>