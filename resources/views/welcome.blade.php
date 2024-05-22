<!DOCTYPE html>
<html lang="en">
<head>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="DaisySMS.com provides affordable, real US non-VoIP numbers for SMS verification on popular platforms like WhatsApp, eBay, Tinder, and more. Enjoy fast support, flexible pricing, and reliable service for all your SMS verification needs.">

    <title>Bypass SMS and Text Verification With Real USA Numbers - TWBVERIFY</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="{{url('')}}/public/assets2/style.css">


</head>
<body data-theme="light">

<div class="fixed z-20 w-full flex flex-col">

    <div class="navbar bg-base-100 border-b">
        <div class="navbar-start">
            <div class="dropdown">
                <label tabindex="0" class="btn btn-ghost lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /></svg>
                </label>

                @auth
                    <ul tabindex="0" class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
                        <li><a href="/home">Dashboard</a></li>
                        <li><a href="/log-out">Log Out </a></li>
                    </ul>


                @else

                    <ul tabindex="0" class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
                        <li><a href="/login">Login</a></li>
                        <li><a  href="/register">Register</a></li>
                    </ul>


                @endauth


            </div>
            <a href="/"><img src="{{url('')}}/public/assets2/logo.png" alt="logo" height="50" width="100">
            </a>
        </div>


        @auth
            <div class="navbar-end hidden sm:flex">
                <div>
                    <a class="btn btn-dark mr-2" href="/home">Dashboard</a>
                    <a class="btn btn-outline" href="/log-out">Log Out</a>
                </div>
            </div>




        @else

            <div class="navbar-end hidden sm:flex">
                <div>
                    <a class="btn btn-dark mr-2" href="/login">Login</a>
                    <a class="btn btn-outline" href="/register">Register</a>
                </div>
            </div>

        @endauth


    </div>
</div>

<div class="py-8"></div>

<div class="hero pt-40 pb-20 bg-green-400">
    <div class="hero-content text-center">
        <div class="max-w-full">
            <h1 class="text-5xl font-bold">SMS delivered right to your browser.</h1>
            <div class="py-6">
                Reclaim your privacy. Get 2FA codes without giving your personal information to any service.
            </div>
            @auth
                <a href="/home" class="btn btn-dark">Get Started</a>
            @else
                <a href="/register" class="btn btn-dark">Get Started</a>
            @endauth
        </div>
    </div>
</div>

<div class="container mx-auto px-4 pt-20" id="features">
    <h2 class="text-center text-3xl font-semibold mb-8">Features</h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="text-center">
            <h3 class="text-lg font-semibold mb-2">Works with every service</h3>

            <p class="text-gray-600">
                You get a real local wireless number with a randomly assigned area code.
                Access from browser or over API.
            </p>
        </div>
        <div class="text-center">
            <h3 class="text-lg font-semibold mb-2">Non-VoIP USA numbers 🇺🇸</h3>

            <p class="text-gray-600">
                Many services check whether you have a VoIP number. We have non-VoIP USA numbers
                that will work with any service.
            </p>
        </div>
        <div class="text-center">
            <h3 class="text-lg font-semibold mb-2">Lowest prices guarantee</h3>

            <p class="text-gray-600">
                We monitor the competition and we'll give you the best price.
                Even if you have a custom deal with a different service.
            </p>
        </div>
    </div>
</div>


<div class="bg-base-100 border-t mt-5 p-5">
    <footer class="d-flex justify-content-center ">
        <p>2024 Twbverify</p>
    </footer>
</div>




</body>
</html>
