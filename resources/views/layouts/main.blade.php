<!DOCTYPE html>
<html lang="en">

<head>
    <title>CinemaTech</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="w-full h-auto min-h-screen flex flex-col bg-gradient-to-r from-gray-950 via-indigo-950-opacity-90 to - bg-gray-950 ">


        @yield('contain')
    </div>


</body>



</html>
