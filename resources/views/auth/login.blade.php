@extends('layouts.app')

@section('header')
    @include('layouts.header')
@endsection

@section('content')

    <div class="flex justify-center">
        <div class="w-4/12 bg-gray-700 p-6 rounded-lg">

            <p class="text-center">Login</p>

            <hr class="mb-3 my-3 color border-purple-400">
            @if (session()->has('status'))
                <div class="bg-red-500 p-4 rounded-lg mb-4 text-white text-center">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{ route('login') }}" method="POST" class="text-black">
                @csrf
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
                <div>
                    <button type="submit" class="bg-purple-400 text-white px-4 py-3 rounded font-medium w-full">Login</button>
                </div>
            </form>
        </div>
    </div>


@endsection

@section('footer')
    @include('layouts.footer')
@endsection
