<div class="top-bar">
    <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="" class="">Application</a> <i
            data-feather="chevron-right" class="breadcrumb__icon"></i>
        <a href="" class="breadcrumb--active">Dashboard</a>
    </div>
    <div class="intro-x relative mr-3 sm:mr-6">
        <div class="search hidden sm:block">
            <input type="text" class="search__input input placeholder-theme-13" placeholder="Search...">
            <i data-feather="search" class="search__icon"></i>
        </div>
        <a class="notification sm:hidden" href=""> <i data-feather="search" class="notification__icon"></i> </a>
        <div class="search-result">

        </div>
    </div>
    <div class="intro-x dropdown w-8 h-8 relative">
        <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in">
            <img alt="Midone Tailwind HTML Admin Template"
                src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->nama) }}&background=random">
        </div>
        <div class="dropdown-box mt-10 absolute w-56 top-0 right-0 z-20">
            <div class="dropdown-box__content box bg-theme-38 text-white">
                <div class="p-4 border-b border-theme-40">
                    <div class="font-medium">{{ auth()->user()->nama }}</div>
                </div>
                <div class="p-2 border-t border-theme-40">
                    <a href="{{ route('logout') }}"
                        class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md">
                        <i data-feather="toggle-right" class="w-4 h-4 mr-2"></i> Logout </a>
                </div>
            </div>
        </div>
    </div>
</div>
