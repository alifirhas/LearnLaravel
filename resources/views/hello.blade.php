@extends('layouts.app')

@section('header')
    @include('layouts.header')
@endsection

@section('content')

    welcome to Home
    
    <p></p>
    
    <?php 
        $makan = "ini variable dalam satu dokumen";
        $con = true;
    ?>

    <p></p>

    this is using data from routes
    <br>the name is {{$name}}
    <br>panggil {{$makan}}
    <br>ini fungsi dalam php {{date("Y/m/d")}}

    {{-- 
        
        bisa panggil variable yang dikirim dari routes/web.php atau satu file pakai {{$namaVariable}}
        fungsi dari php juga bisa dipanggil pakai {{ }}
        dan sekalian ini cara beri komentar di blade

    --}}

@endsection

@section('footer')
    @include('layouts.footer')
@endsection