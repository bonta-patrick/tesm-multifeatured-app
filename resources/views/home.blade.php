<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>TESM - Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body>
    <div class="flex flex-col md:flex-row min-h-screen items-center justify-center bg-black">
        <div class="flex flex-row">
            <div class="flex flex-row bg-slate-900 rounded rounded-xl shadow-xl py-8 px-6 md:py-20 md:px-10 mx-4 md:mx-0 my-4 md:my-0">
                <div class="flex flex-col">
                    <h1 class="text-4xl font-bold text-white">Register for TESM</h1>
                    <p class="text-slate-500 max-w-sm mt-4">Register to TESM. Already have an account? 
                        <a href="/login" class="text-blue-400">login here.</a>
                    </p>
                    <form class="flex flex-col" action="/register-user" method="POST">
                        @csrf
                       <input name="username" type="text" class="border border-slate-400 mt-12 py-6 px-4 rounded rounded-md" placeholder="Create a unique username">
                       <input name="email" type="email" class="border border-slate-400 mt-12 py-6 px-4 rounded rounded-md" placeholder="Enter your email">
                       <input name="password" type="password" class="border border-slate-400 mt-6 py-6 px-4 rounded rounded-md" placeholder="Create a password">
                       <div class="flex flex-row items-center justify-between mt-10">
                          <a href="#" class="text-blue-400">Try TESM PIN</a>
                          <button type="submit" class="border border-green-400 text-white py-6 px-4 bg-green-400 rounded rounded-md">Register</button>
                       </div>
                    </form>
                </div>
            </div>
            <div class="flex flex-row hidden md:flex items-center justify-center bg-blue-400 p-20 rounded rounded-md">
                <h1 class="text-5xl font-mono font-bold text-white">TESM</h1>
            </div>
        </div>
    </div>
</body>
</html>