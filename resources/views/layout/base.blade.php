<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pheelfresh - @yield('title')</title>

    <link rel='stylesheet' href='/css/all.css'>
    <script src="https://kit.fontawesome.com/e9233f01a1.js" crossorigin="anonymous"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script> --}}
   
</head>
<body data-page-id = @yield('data-page-id')> <!--this is done to be able to run javascript on each page/where you want it -->
   <div>
    
    @yield('body')
   
  </div>
    
   
   
   <script src='/js/all.js'></script> 
   @yield('stripe-checkout') 
   
</body>
</html>