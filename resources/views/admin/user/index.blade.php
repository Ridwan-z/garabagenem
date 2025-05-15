@extends('index')

@section('title', 'GARBAGENEM | Users')

@section('content')
    @session('success')
        <div id="login-alert" style="position: fixed; top: 20px; right: 20px; z-index: 9999;"
            class="opacity-0 transition-opacity duration-500">
            <div class="flex items-center px-5 py-4 bg-green-100 text-green-700 shadow-lg rounded-md">
                <i data-feather="check" class="w-6 h-6 mr-2"></i>
                <span>{{ session('success') }}</span>
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const alertBox = document.getElementById('login-alert');
                if (alertBox) {
                    setTimeout(() => {
                        alertBox.classList.remove('opacity-0');
                        alertBox.classList.add('opacity-100');
                    }, 100);

                    setTimeout(() => {
                        alertBox.classList.remove('opacity-100');
                        alertBox.classList.add('opacity-0');

                        setTimeout(() => {
                            alertBox.remove();
                        }, 500);
                    }, 2500);
                }
            });
        </script>
    @endsession

    <h2 class="intro-y text-lg font-medium mt-10">
        Users Data
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex justify-between items-center mt-2">
            <a href="{{ route('userCreate') }}" class="button text-white bg-theme-1 shadow-md mr-2">Add New User</a>
            <form action="{{ route('user') }}" method="GET" class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                    <div class="w-56 relative text-gray-700">
                        <input type="text" name="search" value="{{ request('search') }}"
                            class="input w-56 box pr-10 placeholder-theme-13" placeholder="Search...">
                        <button type="submit" class="absolute inset-y-0 right-0 flex items-center pr-3">
                            <i class="w-4 h-4" data-feather="search"></i>
                        </button>
                    </div>
                </div>
            </form>

        </div>

        @foreach ($users as $user)
            <div class="intro-y col-span-12 md:col-span-6">
                <div class="box">
                    <div class="flex flex-col lg:flex-row items-center p-5">
                        <div class="w-24 h-24 lg:w-12 lg:h-12 image-fit lg:mr-1">
                            <img alt="User Profile" class="rounded-full"
                                src="https://ui-avatars.com/api/?name={{ urlencode($user->nama) }}&background=random">
                        </div>
                        <div class="lg:ml-2 lg:mr-auto text-center lg:text-left mt-3 lg:mt-0">
                            <a href="#" class="font-medium">{{ $user->nama }}</a>
                            <div class="text-gray-600 text-xs">{{ $user->email }}</div>
                        </div>
                        <div class="flex mt-4 lg:mt-0">
                            <a href="{{ route('userEdit', $user->id) }}"
                                class="button button--sm text-white bg-yellow-500 mr-2"><i class="w-4 h-4"
                                    data-feather="edit"></i></a>
                            <a href="javascript:;" data-toggle="modal"
                                data-target="#delete-modal-preview{{ $user->id }}"
                                class="button button--sm text-white bg-red-500"><i class="w-4 h-4"
                                    data-feather="trash"></i></a>
                            <div class="modal" id="delete-modal-preview{{ $user->id }}">
                                <div class="modal__content">
                                    <div class="p-5 text-center"> <i data-feather="x-circle"
                                            class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
                                        <div class="text-3xl mt-5">Are you sure?</div>
                                        <div class="text-gray-600 mt-2">Do you really want to delete these records? This
                                            process cannot be
                                            undone.</div>
                                    </div>
                                    <div class="px-5 pb-8 text-center">
                                        <div class="flex justify-center gap-2">
                                            <button type="button" data-dismiss="modal"
                                                class="button w-24 border text-gray-700">Cancel</button>
                                            <form action="{{ route('userDestroy', $user->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit"
                                                    class="button w-24 bg-theme-6 text-white">Delete</button>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach



        @php
            $currentPage = $users->currentPage();
            $lastPage = $users->lastPage();
        @endphp

        @if ($users->hasPages())
            <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-no-wrap items-center mt-5">
                <ul class="pagination">
                    {{-- First Page --}}
                    <li>
                        <a class="pagination__link {{ $currentPage == 1 ? 'disabled' : '' }}"
                            href="{{ $currentPage == 1 ? '#' : $users->url(1) . ($search ? '&search=' . $search : '') }}">
                            <i class="w-4 h-4" data-feather="chevrons-left"></i>
                        </a>
                    </li>

                    {{-- Previous Page --}}
                    <li>
                        <a class="pagination__link {{ $users->onFirstPage() ? 'disabled' : '' }}"
                            href="{{ $users->onFirstPage() ? '#' : $users->previousPageUrl() . ($search ? '&search=' . $search : '') }}">
                            <i class="w-4 h-4" data-feather="chevron-left"></i>
                        </a>
                    </li>

                    {{-- Ellipsis if needed before --}}
                    @if ($currentPage > 3)
                        <li><a class="pagination__link" href="#">...</a></li>
                    @endif

                    {{-- Page Numbers --}}
                    @for ($i = max(1, $currentPage - 2); $i <= min($lastPage, $currentPage + 2); $i++)
                        <li>
                            <a class="pagination__link {{ $i == $currentPage ? 'pagination__link--active' : '' }}"
                                href="{{ $users->url($i) . ($search ? '&search=' . $search : '') }}">
                                {{ $i }}
                            </a>
                        </li>
                    @endfor

                    {{-- Ellipsis if needed after --}}
                    @if ($currentPage < $lastPage - 2)
                        <li><a class="pagination__link" href="#">...</a></li>
                    @endif

                    {{-- Next Page --}}
                    <li>
                        <a class="pagination__link {{ !$users->hasMorePages() ? 'disabled' : '' }}"
                            href="{{ !$users->hasMorePages() ? '#' : $users->nextPageUrl() . ($search ? '&search=' . $search : '') }}">
                            <i class="w-4 h-4" data-feather="chevron-right"></i>
                        </a>
                    </li>

                    {{-- Last Page --}}
                    <li>
                        <a class="pagination__link {{ $currentPage == $lastPage ? 'disabled' : '' }}"
                            href="{{ $currentPage == $lastPage ? '#' : $users->url($lastPage) . ($search ? '&search=' . $search : '') }}">
                            <i class="w-4 h-4" data-feather="chevrons-right"></i>
                        </a>
                    </li>
                </ul>
            </div>
        @endif

    </div>
@endsection
