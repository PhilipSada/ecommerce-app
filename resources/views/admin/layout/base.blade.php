<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Panel - @yield('title')</title>

    <link rel='stylesheet' href='/css/all.css'>
    <script src="https://kit.fontawesome.com/e9233f01a1.js" crossorigin="anonymous"></script>
</head>
<body data-page-id = @yield('data-page-id')> <!--this is done to be able to run javascript on each page/where you want it -->
 
    @include('includes.admin-sidebar')

  <div class="off-canvas-content" data-off-canvas-content>
    <!-- Your page content lives here -->
   
    <div class="title-bar">
        <div class="title-bar-left">
          <button class="menu-icon hide-for-large" type="button" data-open="offCanvas"></button>
          <span class="title-bar-title">{{getenv('APP_NAME')}}</span>  
        </div>
   </div>

    @yield('content')
  </div>

<script src='/js/all.js'></script>   
</body>
</html>