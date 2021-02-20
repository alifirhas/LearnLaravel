@extends('layouts.app')

@section('header')
    @include('layouts.header')
@endsection

@section('content')

    <div class="flex justify-center">
        <div class="w-8/12 bg-gray-700 p-6 rounded-lg">

            Welcome to Home  

        </div>
    </div>
    {{-- 
        
        bisa panggil variable yang dikirim dari routes/web.php atau satu file pakai {{$namaVariable}}
        fungsi dari php juga bisa dipanggil pakai {{ }}
        dan sekalian ini cara beri komentar di blade

    --}}

@endsection

@section('footer')
    @include('layouts.footer')
@endsection