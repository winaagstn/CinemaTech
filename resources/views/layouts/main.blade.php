<!DOCTYPE html>
<html lang="en">

<head>
    <title>CinemaTech</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="w-full h-auto min-h-screen flex flex-col bg-gray-950">
       @yield('contain')
    </div>


</body>



</html>
