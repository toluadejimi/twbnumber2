<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Login - TWBVERIFY</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="{{url('')}}/public/assets2/style.css">

    <style>
        #toggle-password .feather-eye-off, #toggle-password.active .feather-eye {
            display: block;
        }

        #toggle-password .feather-eye, #toggle-password.active .feather-eye-off {
            display: none;
        }
    </style>


</head>
<body data-theme="light">

<div class="fixed z-20 w-full flex flex-col">
    <div class="navbar bg-base-100 border-b">
        <div class="navbar-start">
            <div class="dropdown">
                <label tabindex="0" class="btn btn-ghost lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h8m-8 6h16"/>
                    </svg>
                </label>

                @auth
                    <ul tabindex="0"
                        class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
                        <li><a href="/dashboard">Dashboard</a></li>
                        <li><a href="/log-out">Log Out </a></li>
                    </ul>

                @else

                    <ul tabindex="0"
                        class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
                        <li><a href="/login">Login</a></li>
                        <li><a href="/register">Register</a></li>
                    </ul>

                @endauth


            </div>
            <a href="/"><img src="{{url('')}}/public/assets2/logo.png" alt="logo" height="50" width="100">
            </a>
        </div>


        @auth
            <div class="navbar-end hidden sm:flex">
                <div>
                    <a class="btn btn-dark mr-2" href="/dashboard">Dashboard</a>
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

<div class="hero py-28 bg-base-200">
    <div class="hero-content flex-col lg:flex-row-reverse">
        <div class="card flex-shrink-0 w-120 sm:shadow-2xl sm:bg-base-100">
            <div class="card-body">

                <div class="d-flex justify-center">
                    <a href="/">
                        <img src="{{url('')}}/public/assets2/logo.png" alt="logo">
                    </a>
                </div>

                <h6 class="card-title mb-2 d-flex justify-center">Login</h6>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                @endif


                <div class="font-sans text-gray-900 antialiased">
                    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">

                        <form action="login_now" method="post">
                            @csrf
                            <div class="form-control mb-2">
                                <label class="label">
                                    <span class="label-text">Email</span>
                                </label>
                                <input name="email" type="text" class="input input-bordered" autofocus/>
                            </div>

                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text">Password</span>
                                </label>

                                <div class="relative ">
                                    <input name="password" type="password" class="input input-bordered w-full"/>

                                    <div id="toggle-password"
                                         class="select-none absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round"
                                             class="feather feather-eye-off">
                                            <path
                                                d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path>
                                            <line x1="1" y1="1" x2="23" y2="23"></line>
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye">
                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                            <circle cx="12" cy="12" r="3"></circle>
                                        </svg>
                                    </div>
                                </div>

                                <a href="/forgot-password" class="label-text-alt link link-hover px-1 py-2">Forgot
                                    password?</a>


                            </div>
                            <div class="form-control mt-6 border-0">
                                <button class="btn btn-dark">Login</button>
                            </div>
                        </form>


                    </div>
                </div>


                <a class="d-flex justify-center text-sm" href="register">
                    No Account yet Sign Up?
                </a>


            </div>
        </div>
    </div>
</div>


<div class="bg-base-100 border-t mt-5 p-5">
    <footer class="d-flex justify-content-center ">
        <p>2024 Twbverify</p>
    </footer>
</div>


<script src="https://js.hcaptcha.com/1/api.js" async defer></script>
<script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
<script>
    document.getElementById("toggle-password").addEventListener("click", function () {
        const mustShowPassword = this.classList.toggle('active');
        this.parentElement.querySelector('input').type = mustShowPassword ? 'text' : 'password';
    });

    document.getElementById('switch_alt').addEventListener("click", function () {
        document.getElementById('captcha').classList.add('alt');
    });
</script>




</body>
</html>






