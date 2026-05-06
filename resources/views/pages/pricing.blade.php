<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bloommonie Pricing</title>
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">   
    <link rel="stylesheet" href="styles.css">
   <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
   <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
   <link rel="stylesheet" href="{{ asset('css/app.css') }}">
<link rel="stylesheet" href="{{ asset('css/pricing.css') }}">
<link rel="stylesheet" href="{{ asset('css/footer.css') }}">
</head>
<body>
    
    @include('layouts.navbar') 
    @include("layouts.price")
    @include("layouts.footer")
</body>

</html>



{{-- @extends('layouts.pricing') --}}

{{-- @extends('layouts.pricingaction') --}}



