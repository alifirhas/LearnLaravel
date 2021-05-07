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
                    <textarea name="body" id="body" cols="" rows="4" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror" placeholder="Post something!" autofocus></textarea>

                    @error('body')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}    
                        </div>    
                    @enderror
                </div>

                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">Post</button>

            </form>
            @endauth
            
            <div class="my-4">
                @if ($posts->count())
                    
                    @foreach ($posts as $post)
                        <div class="mb-4">
                            <a href="{{ route('users.posts', $post->user) }}" class="font-bold">{{ $post->user->username }}</a> <span class="text-sm">{{ $post->created_at->diffForHumans() }}</span>
                            <p class="mb-2">{{ $post->body }}</p>

                            <div class="flex items-center">
                                @auth

                                @if (!$post->likedBy(auth()->user()))
                                <form action="{{ route('posts.likes', $post->id) }}" method="post" class="mr-1">
                                    @csrf
                                    <button type="submit" class="text-blue-500">Like</button>
                                </form>
                                @else
                                <form action="{{ route('posts.likes', $post->id) }}" method="post" class="mr-1">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-blue-500">Unlike</button>
                                </form>
                                @endif
                                @endauth

                                {{-- cara nyembunyikan tombol delete --}}

                                {{-- 1. gak pakai function --}}
                                {{-- @if ($post->user_id == auth()->user()->id)
                                <form action="{{ route('posts.destroy', $post) }}" method="post" class="mr-1">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-blue-500">Delete</button>
                                </form>
                                @endif --}}

                                {{-- 2. pakai function --}}
                                {{-- @if ($post->ownBy(auth()->user()))
                                <form action="{{ route('posts.destroy', $post) }}" method="post" class="mr-1">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-blue-500">Delete</button>
                                </form>
                                @endif --}}
                                
                                {{-- 3. pakai policy --}}
                                @can('delete', $post)
                                <form action="{{ route('posts.destroy', $post) }}" method="post" class="mr-1">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-blue-500">Delete</button>
                                </form>
                                @endcan
                                
                                
                                <span>{{ $post->likes->count() }} {{ Str::plural("like", $post->likes->count()) }}</span>
                                

                            </div>

                            
                        </div>


                    @endforeach
                    
                    {{ $posts->links() }}

                @else
                    <p>Masih belum ada post</p>
                @endif
            </div>
            
        </div>
    </div>

@endsection

@section('footer')
    @include('layouts.footer')
@endsection
