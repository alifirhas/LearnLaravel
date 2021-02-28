@extends('layouts.app')

@section('header')
    @include('layouts.header')
@endsection

@section('content')

    <div class="flex justify-center">
        <div class="w-6/12 bg-gray-700 p-6 rounded-lg">
            <p class="text-lg text-center mb-4">Welcome To Posts</p>
            @auth
            <form action="{{ route('posts') }}" method="post">
                @csrf

                <div class="mb-4">
                    <label for="body" class="sr-only">Body</label>
                    <textarea name="body" id="body" cols="" rows="4" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror" placeholder="Post something!"></textarea>

                    @error('body')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}    
                        </div>    
                    @enderror
                </div>

                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">Post</button>

            </form>
            @endauth
            

            
        </div>
    </div>

@endsection

@section('footer')
    @include('layouts.footer')
@endsection
