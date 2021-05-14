<div class="col-12 col-lg-3 d-flex">
    <div class="account-nav flex-grow-1">
        <h4 class="account-nav__title">Навигация</h4>
        <ul>
            <li class="account-nav__item  account-nav__item--active ">
                <a href="{{route('profile.index')}}">Профиль</a>
            </li>
            {{-- <li class="account-nav__item ">
                <a href="{{route('profile.address')}}">Адреса</a>
            </li> --}}
            <li class="account-nav__item ">
                <a href="{{route('profile.history')}}">История покупок</a>
            </li>
            <li class="account-nav__item ">
                <a href="{{route('profile.password')}}">Пароль</a>
            </li>
            <li class="account-nav__item ">
                <a href="{{route('logout')}}" onclick="event.preventDefault();
                document.getElementById('profile-logout-form').submit();">Выйти</a>
                <form id="profile-logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>



        </ul>
    </div>
</div>
