<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <title>LearnLaravel</title>
</head>
<body class="bg-gray-800 text-purple-400">

    @yield('header')

    <div class="flex justify-center">
        <div class="w-8/12 bg-gray-700 p-6 rounded-lg">

            @yield('content')      
   
        </div>
    </div>

    
    @yield('footer')

</body>
</html>