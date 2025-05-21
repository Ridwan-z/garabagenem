@extends('index')

@section('title', 'GARBAGENEM | Trash')

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
        Trash Data
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex justify-between items-center mt-2">
            <a href="javascript:;" id="openAddModal" data-toggle="modal" data-target="#addModal"
                class="button text-white bg-theme-1 shadow-md mr-2">Add Trash</a>
            <form action="{{ route('trash') }}" method="GET" class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
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


        @foreach ($trash as $item)
            <div class="intro-y col-span-12 md:col-span-6">
                <div class="box">
                    <div class="flex flex-col lg:flex-row items-center p-5">

                        <div class="lg:ml-2 lg:mr-auto text-center lg:text-left mt-3 lg:mt-0">
                            <div
                                class="inline-block py-1 px-2 rounded-full text-xs bg-theme-9 text-white cursor-pointer font-medium">
                                {{ $item->trash_id }}
                            </div>
                            <div class="flex items-center gap-2 mt-2">
                                <span class="font-semibold text-base">Pemilik :</span>
                                <div class="font-bold text-base">{{ $item->user->nama }}</div>
                            </div>
                        </div>

                        <div class="flex mt-4 lg:mt-0">
                            <a href="javascript:;" data-toggle="modal" data-target="#editModal{{ $item->id }}"
                                class="button button--sm text-white bg-yellow-500 mr-2"><i class="w-4 h-4"
                                    data-feather="edit"></i></a>
                            <a href="javascript:;" data-toggle="modal"
                                data-target="#delete-modal-preview{{ $item->id }}"
                                class="button button--sm text-white bg-red-500"><i class="w-4 h-4"
                                    data-feather="trash"></i></a>
                            <div class="modal" id="delete-modal-preview{{ $item->id }}">
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
                                            <form action="{{ route('trashDestroy', $item->id) }}" method="POST">
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
                        <div class="modal" id="editModal{{ $item->id }}">
                            <div class="modal__content">
                                <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
                                    <h2 class="font-medium text-base mr-auto">Edit Trash Data</h2>

                                </div>
                                <form id="editTrashForm{{ $item->id }}">
                                    @csrf
                                    <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                                        <div class="col-span-12">
                                            <label>Trash ID</label>
                                            <input type="text" name="trash_id" class="input border mt-2 w-full"
                                                placeholder="Enter Trash ID" value="{{ $item->trash_id }}">
                                            <small id="edit-error-trash_id-{{ $item->id }}"
                                                class="text-red-500"></small>


                                            <label class="mt-4 block">Pemilik</label>
                                            <select name="user_id" class="select2 block w-full border mt-2">
                                                <option disabled>-- Pilih Nama --</option>
                                                @foreach ($user as $u)
                                                    <option value="{{ $u->id }}"
                                                        {{ $item->user_id == $u->id ? 'selected' : '' }}>
                                                        {{ $u->nama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <small id="edit-error-user_id-{{ $item->id }}"
                                                class="text-red-500"></small>
                                        </div>
                                    </div>

                                    <div class="px-5 py-3 text-right border-t border-gray-200">
                                        <button type="button" class="button w-20 bg-theme-1 text-white submitEditTrash"
                                            data-id="{{ $item->id }}">
                                            Send
                                        </button>

                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        @php
            $currentPage = $trash->currentPage();
            $lastPage = $trash->lastPage();
        @endphp

        @if ($trash->hasPages())
            <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-no-wrap items-center mt-5">
                <ul class="pagination">
                    {{-- First Page --}}
                    <li>
                        <a class="pagination__link {{ $currentPage == 1 ? 'disabled' : '' }}"
                            href="{{ $currentPage == 1 ? '#' : $trash->url(1) . ($search ? '&search=' . $search : '') }}">
                            <i class="w-4 h-4" data-feather="chevrons-left"></i>
                        </a>
                    </li>

                    {{-- Previous Page --}}
                    <li>
                        <a class="pagination__link {{ $trash->onFirstPage() ? 'disabled' : '' }}"
                            href="{{ $trash->onFirstPage() ? '#' : $trash->previousPageUrl() . ($search ? '&search=' . $search : '') }}">
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
                                href="{{ $trash->url($i) . ($search ? '&search=' . $search : '') }}">
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
                        <a class="pagination__link {{ !$trash->hasMorePages() ? 'disabled' : '' }}"
                            href="{{ !$trash->hasMorePages() ? '#' : $trash->nextPageUrl() . ($search ? '&search=' . $search : '') }}">
                            <i class="w-4 h-4" data-feather="chevron-right"></i>
                        </a>
                    </li>

                    {{-- Last Page --}}
                    <li>
                        <a class="pagination__link {{ $currentPage == $lastPage ? 'disabled' : '' }}"
                            href="{{ $currentPage == $lastPage ? '#' : $trash->url($lastPage) . ($search ? '&search=' . $search : '') }}">
                            <i class="w-4 h-4" data-feather="chevrons-right"></i>
                        </a>
                    </li>
                </ul>
            </div>
        @endif

    </div>
    <div class="modal" id="addModal">
        <div class="modal__content">
            <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
                <h2 class="font-medium text-base mr-auto">Add Trash Data</h2>

            </div>
            <form id="addTrashForm">
                @csrf
                <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                    <div class="col-span-12">
                        <label>Trash ID</label>
                        <input type="text" name="trash_id" id="trash_id"
                            class="input border mt-2 w-full @error('trash_id') border-red-500 @enderror"
                            placeholder="Enter Trash ID">
                        <div id="error-trash_id" class="text-red-500 text-sm mt-1"></div>
                        <label class="mt-4 block">Pemilik</label>
                        <select name="user_id" id="user_id"
                            class="select2 block w-full border mt-2 @error('user_id') border-red-500 @enderror">
                            <option selected disabled>-- Pilih Nama --</option>
                            @foreach ($user as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                        <div id="error-user_id" class="text-red-500 text-sm mt-1"></div>
                    </div>
                </div>
                <div class="px-5 py-3 text-right border-t border-gray-200"> <button type="button"
                        class="button w-20 border text-gray-700 mr-1" data-dismiss="modal">Cancel</button> <button
                        type="button" id="submitAddTrash" class="button w-20 bg-theme-1 text-white">Send</button> </div>
            </form>

        </div>
    </div>
    <div id="custom-success-alert" style="position: fixed; top: 20px; right: 20px; z-index: 9999;"
        class="opacity-0 transition-opacity duration-500 hidden">
        <div class="flex items-center px-5 py-4 bg-green-100 text-green-700 shadow-lg rounded-md">
            <i data-feather="check" class="w-6 h-6 mr-2"></i>
            <span id="custom-success-message"></span>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const submitBtn = document.getElementById('submitAddTrash');
            const form = document.getElementById('addTrashForm');

            submitBtn.addEventListener('click', function() {
                // Clear error messages
                document.getElementById('error-trash_id').innerText = '';
                document.getElementById('error-user_id').innerText = '';

                const formData = new FormData(form);

                fetch("{{ route('trashStore') }}", {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        },
                        body: formData,
                    })
                    .then(async (response) => {
                        if (!response.ok) {
                            const data = await response.json();
                            if (data.errors) {
                                if (data.errors.trash_id) {
                                    document.getElementById('error-trash_id').innerText = data
                                        .errors.trash_id[0];
                                }
                                if (data.errors.user_id) {
                                    document.getElementById('error-user_id').innerText = data.errors
                                        .user_id[0];
                                }
                            }
                            throw new Error('Validation failed');
                        }
                        return response.json();
                    })
                    .then((data) => {
                        $('#addModal').removeClass('overflow-y-auto').addClass('hidden');
                        form.reset();
                        // Tampilkan alert sukses manual
                        document.getElementById('custom-success-message').innerText =
                            'Data berhasil ditambahkan';
                        const alertBox = document.getElementById('custom-success-alert');
                        alertBox.classList.remove('hidden');
                        setTimeout(() => {
                            alertBox.classList.remove('opacity-0');
                            alertBox.classList.add('opacity-100');
                        }, 100);
                        setTimeout(() => {
                            alertBox.classList.remove('opacity-100');
                            alertBox.classList.add('opacity-0');
                            setTimeout(() => {
                                alertBox.classList.add('hidden');
                                location.reload();

                            }, 500);
                        }, 2500);

                        // Tutup modal & reset form
                        $('#addModal').removeClass('overflow-y-auto').addClass('hidden');
                        form.reset();

                    })
                    .catch((error) => {
                        console.error(error);
                    });
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const editButtons = document.querySelectorAll('.submitEditTrash');

            editButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.dataset.id;
                    const form = document.getElementById('editTrashForm' + id);
                    const formData = new FormData(form);

                    // Clear previous errors
                    document.getElementById('edit-error-trash_id-' + id).innerText = '';
                    document.getElementById('edit-error-user_id-' + id).innerText = '';

                    fetch(`/trash/update/${id}`, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            },
                            body: formData
                        })
                        .then(async (response) => {
                            if (!response.ok) {
                                const data = await response.json();
                                if (data.errors) {
                                    if (data.errors.trash_id) {
                                        document.getElementById('edit-error-trash_id-' + id)
                                            .innerText = data.errors.trash_id[0];
                                    }
                                    if (data.errors.user_id) {
                                        document.getElementById('edit-error-user_id-' + id)
                                            .innerText = data.errors.user_id[0];
                                    }
                                }
                                throw new Error('Validation failed');
                            }
                            return response.json();
                        })
                        .then((data) => {
                            // Tutup modal edit
                            document.getElementById('editModal' + id).classList.add('hidden');
                            form.reset();

                            // Tampilkan alert sukses manual
                            document.getElementById('custom-success-message').innerText =
                                'Data berhasil diubah';
                            const alertBox = document.getElementById('custom-success-alert');
                            alertBox.classList.remove('hidden');
                            setTimeout(() => {
                                alertBox.classList.remove('opacity-0');
                                alertBox.classList.add('opacity-100');
                            }, 100);
                            setTimeout(() => {
                                alertBox.classList.remove('opacity-100');
                                alertBox.classList.add('opacity-0');
                                setTimeout(() => {
                                    alertBox.classList.add('hidden');
                                    location.reload();
                                }, 500);
                            }, 2500);
                        })
                        .catch((error) => {
                            console.error(error);
                        });
                });
            });
        });
    </script>


@endsection
