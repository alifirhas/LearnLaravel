@extends('layouts.app')

@section('header')
    @include('layouts.header')
@endsection

@section('content')

    <div class="flex justify-center">
        <div class="w-4/12 bg-gray-700 p-6 rounded-lg">

            <p class="text-center">Register</p>

            <hr class="mb-3 my-3 color border-purple-400">

            <form action="{{ route('register') }}" method="POST" class="text-black">
                @csrf
                <div class="mb-4">
                    <lable class="sr-only" for="name">name</lable>
                    <input type="text" name="name" id="name" placeholder="Your name" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('name') border-red-500 @enderror" value="{{ old('name') }}">

                    @error('name')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <lable class="sr-only" for="username">Username</lable>
                    <input type="text" name="username" id="username" placeholder="Choose username" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('username') border-red-500 @enderror" value="{{ old('username') }}">

                    @error('username')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <lable class="sr-only" for="email">Email</lable>
                    <input type="email" name="email" id="email" placeholder="Your email address" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('email') border-red-500 @enderror" value="{{ old('email') }}">

                    @error('email')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <lable class="sr-only" for="password">Password</lable>
                    <input type="password" name="password" id="password" placeholder="Password" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password') border-red-500 @enderror">
                    
                    @error('password')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <lable class="sr-only" for="password_confirmation">Password again</lable>
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Type your password again " class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password_confirmation') border-red-500 @enderror">
                    
                    @error('password_confirmation')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div>
                    <button type="submit" class="bg-purple-400 text-white px-4 py-3 rounded font-medium w-full">Register</button>
                </div>
            </form>
        </div>
    </div>


@endsection

@section('footer')
    @include('layouts.footer')
@endsection
