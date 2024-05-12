<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.5.1/tailwind.min.css">
</head>
<body class="bg-gray-100 text-gray-800">
    

<nav class="flex py-5" style="background-color: #FFFDF1; color: #FEA094;">
    <div class="flex items-center">
        <img src="https://i.pinimg.com/564x/cf/49/ec/cf49ec209ea13cd8021c6d8bc9ea48e3.jpg" alt="Imagen pequeña" class="h-16 w-16 rounded-full mr-2 ml-8">
    </div>

    <ul class="w-1/2 px-16 ml-auto flex justify-end pt-2" >
      @if (auth()->check())  
        <li class="mx-6">
            <p class="text-xl"><b>{{ auth()->user()->name}}</b></p>
        </li>
        <li>
        <a href="{{ route('login.destroy') }}" class="font-bold  py-2 px-4 rounded-md bg-pink-400 hover:bg-pink-600 text-white">Cerrar sesión</a>
        </li>
        </li>
        @else
        <li class="mx-6">
        <a href="{{ route('login.index') }}" class="font-semibold hover:bg-pink-100 py-3 px-4 rounded-md">Log In</a>
        </li>
        <li>
        <a href="{{ route('register.index') }}" class="font-semibold border-2 border-pink-200 py-2 px-4 rounded-md hover:bg-pink-100 hover:text-pink-400">Registro</a>
        </li>
        </li>

        @endif
    </ul>
</nav>

@yield('content')

</body>
</html>
