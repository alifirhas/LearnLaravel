@extends('layouts.app')

@section('header')
    @include('layouts.header')
@endsection

@section('content')

    Welcome to Home
    
    {{-- 
        
        bisa panggil variable yang dikirim dari routes/web.php atau satu file pakai {{$namaVariable}}
        fungsi dari php juga bisa dipanggil pakai {{ }}
        dan sekalian ini cara beri komentar di blade

    --}}

@endsection

@section('footer')
    @include('layouts.footer')
@endsection