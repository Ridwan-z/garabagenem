<nav class="side-nav">
    <a href="" class="intro-x flex items-center pl-5 pt-4">
        <span class="hidden xl:block text-white text-lg ml-3"> GARBAG<span class="text-md font-bold">ENEM</span> </span>
    </a>
    <div class="side-nav__devider my-6"></div>
    <ul>
        <li>
            <a href="{{ route('dashboard') }}" class="side-menu side-menu--{{ $menuDashboard ?? '' }}">
                <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                <div class="side-menu__title"> Dashboard </div>
            </a>
        </li>
        <li>
            <a href="{{ route('trash') }}" class="side-menu side-menu--{{ $menuTrash ?? '' }}">
                <div class="side-menu__icon"> <i data-feather="trash"></i> </div>
                <div class="side-menu__title"> Data Trash </div>
            </a>
        </li>

        <li>
            <a href="{{ route('user') }}" class="side-menu side-menu--{{ $menuUser ?? '' }}">
                <div class="side-menu__icon"> <i data-feather="user"></i> </div>
                <div class="side-menu__title"> Data Users</div>
            </a>
        </li>

    </ul>
</nav>
