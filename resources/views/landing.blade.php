<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>jestli — Share your moments</title>
  @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-end p-6 mr-20 ">
  <img src="{{ asset('image/kucing.png') }}" class="absolute left-0 bottom-0 h-auto w-2/3" alt="Decorative Image">


  <div class=" bg-white rounded-2xl shadow-lg overflow-hidden flex w-dvh">
    

    <div class="p-10 flex flex-col justify-center gap-6">
      <div class="space-y-2">
        <h1>Email</h1>
        <input type="text" value="Pre-filled text here" class="rounded-md w-72">
        <h1>Password</h1>
        <input type="text" value="Pre-filled text here" class="rounded-md w-72">
      </div>
      


      @if (Route::has('login'))
        <div class="space-x-3">
          @auth
            <a href="{{ route('dashboard') }}" class="mt-10 bg-cyan-500 text-white rounded-md w-72 py-2 text-center inline-block">Go to Feed</a>
          @else
            <a href="{{ route('login') }}" class="px-5 py-2 bg-blue-600 text-white rounded">Sign In</a>
            <a href="{{ route('register') }}" class="px-5 py-2 bg-gray-200 text-gray-800 rounded">Sign Up</a>
          @endauth
        </div>
      @endif

      <p class="mt-6 text-sm text-gray-500">By using jestli you agree to our terms.</p>
    </div>
  </div>
</body>
</html>
