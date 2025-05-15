@extends('index')

@section('title', 'GARBAGENEM | Create Users')

@section('content')
    <div class="intro-y box mt-5">
        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 justify-between">
            <h2 class="font-medium text-base">
                Edit User Data
            </h2>
            <a href="{{ route('user') }}" class="inline-flex items-center gap-2 px-4 py-2 rounded bg-gray-400 text-gray-800">
                <i class="w-4 h-4" data-feather="arrow-left"></i>
                Back
            </a>

        </div>
        <form action="{{ route('userUpdate', $user->id) }}" method="POST">
            @csrf
            <div class="grid grid-cols-2 gap-4 p-5">
                <div>
                    <div class="relative">
                        <div
                            class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border  @error('nama') border-red-500 @enderror text-gray-600">
                            <i class="w-3 h-3  @error('nama') text-red-500 @enderror" data-feather="user"></i>
                        </div>
                        <input type="text" name="nama"
                            class="input pl-12 w-full border @error('nama') border-red-500 @enderror"
                            placeholder="Username..." value="{{ $user->nama }}">
                    </div>
                    @error('nama')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
                <div>
                    <div class="relative">
                        <div
                            class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border  @error('email') border-red-500 @enderror text-gray-600">
                            <i class="w-3 h-3 @error('email') text-red-500 @enderror" data-feather="at-sign"></i>
                        </div>
                        <input type="email" name="email"
                            class="input pl-12 w-full border @error('email') border-red-500 @enderror"
                            placeholder="Email..." value="{{ $user->email }}">
                    </div>
                    @error('email')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4 px-5">
                <div>
                    <div class="relative">
                        <div
                            class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border  @error('password') border-red-500 @enderror text-gray-600">
                            <i class="w-3 h-3 @error('password') text-red-500 @enderror" data-feather="key"></i>
                        </div>
                        <input type="password" name="password"
                            class="input pl-12 w-full border @error('password') border-red-500 @enderror"
                            placeholder="Password...">
                    </div>
                    @error('password')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
                <div>
                    <div class="relative">
                        <div
                            class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border  @error('password') border-red-500 @enderror text-gray-600">
                            <i class="w-3 h-3 @error('password') text-red-500 @enderror" data-feather="key"></i>
                        </div>
                        <input type="password" name="password_confirmation"
                            class="input pl-12 w-full border @error('password') border-red-500 @enderror"
                            placeholder="Password Confirmation...">
                    </div>
                </div>
            </div>

            <div class="flex justify-end p-5">
                <button type="submit" class="button text-white bg-green-500 shadow-md flex items-center gap-2">
                    <i class="w-4 h-4" data-feather="save"></i>
                    Save
                </button>
            </div>
        </form>
    </div>
@endsection
