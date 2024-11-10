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
    <script>
        tailwind.config = {
          theme: {
            fontFamily: {
              mono: ['Black Ops One', 'monospace'],
            },
          },
        }
      </script>
</head>
<body>
    <div class="flex flex-col md:flex-row min-h-screen items-center justify-center bg-black">
        <div class="flex flex-row">
            <form action="/login-user" method="POST">
                @csrf
            <div class="flex flex-row bg-slate-900 rounded rounded-xl shadow-xl py-8 px-6 md:py-20 md:px-10 mx-4 md:mx-0 my-4 md:my-0">
                <div class="flex flex-col">
                    <h1 class="text-4xl font-bold text-white">Log In TESM</h1>
                    <p class="text-slate-500 max-w-sm mt-4">Log in to your TESM account by username and password. Or
                        <a href="#" class="text-blue-400">register here.</a>
                    </p>
                    <input name="username" type="text" class="border border-slate-400 mt-12 py-6 px-4 rounded rounded-md" placeholder="Enter your username">
                    <input name="password" type="text" class="border border-slate-400 mt-6 py-6 px-4 rounded rounded-md" placeholder="Enter your password">
                    <div class="flex flex-row items-center justify-between mt-10">
                        <a href="#" class="text-blue-400">Try TESM PIN</a>
                        <button type="submit" class="border border-green-400 text-white py-6 px-4 bg-green-400 rounded rounded-md">Log Me In</button>
                    </div>
                </div>
            </div>
            </form>
            <div class="flex flex-row hidden md:flex items-center justify-center bg-blue-400 p-20 rounded rounded-md">
                <h1 class="text-5xl font-mono font-bold text-white">TESM</h1>
            </div>
        </div>
    </div>
</body>
</html>