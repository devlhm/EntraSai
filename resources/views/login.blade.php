<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Entrada Saída</title>
</head>

<body class="font-bold font-sans">
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif


    <div class="flex flex-col lg:flex-row w-screen h-screen">
        <div id="left-side" class="relative w-full lg:w-1/2 h-1/2 lg:h-screen bg-violet-400 shadow-lg lg:shadow-2xl shadow-slate-300">
            <span class="absolute inset-x-12 my-4 px-3 py-1 lg:px-5 lg:py-3 bg-violet-500 hidden">
                <div class="flex gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 23 23" fill="none" stroke-width="2" stroke="currentColor" class="w-8 h-8 lg:w-12 lg:h-12 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                    </svg>
                    <div class="my-auto text-white lg:text-xl">
                        <p>Toast AAAAAAAAAAAAA!</p>
                    </div>
                    <button class="w-fit h-fit ml-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 23 23" stroke-width="2" stroke="currentColor" class="w-8 h-8 lg:w-12 lg:h-12 text-white">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 19.5l15-15m-15 0l15 15" />
                        </svg>
                    </button>
                </div>
            </span>
            <div class="w-4/6 h-5/6 mx-auto my-6 grid grid-rows-4 lg:grid-rows-3 content-center">
                <h1 class="w-fit h-fit m-auto text-5xl lg:text-7xl text-white">LOGIN</h1>
                <form class="h-fit my-auto lg:my-0 grid grid-rows-2 row-span-2 lg:row-span-1 gap-3 lg:gap-10 font-semibold" method="POST" action="{{route('auth')}}" name="loginForm">
                    @csrf
                    <div class="w-full flex flex-col mx-auto">
                        <label class="text-white text-xl lg:text-3xl" for="username">Registro: </label>
                        <input class="px-2 lg:px-2 py-1 lg:py-3 text-lg lg:text-2xl focus:outline-violet-500" type="text" name="id">
                    </div>
                    <div class="w-full flex flex-col mx-auto">
                        <label class="text-white text-xl lg:text-3xl" for="password">Senha: </label>
                        <input class="px-2 lg:px-2 py-1 lg:py-3 text-lg lg:text-2xl focus:outline-violet-500" type="password" name="password">
                    </div>
                    <button class="w-full py-2 lg:py-4 mx-auto my-auto bg-violet-500 text-white text-xl lg:text-3xl font-semibold" type="submit">LOGAR</button>
                </form>
            </div>
        </div>
        <div id="right-side" class="w-full lg:w-1/2 h-1/2 lg:h-screen">
            <div class="grid content-end grid-cols-7 w-full h-1/6 text-5xl lg:text-7xl">
                <p class="text-right col-span-3 text-violet-500">ENTRA</p>
                <p class="w-fit mx-auto text-center text-transparent bg-clip-text bg-gradient-to-r from-violet-500 to-emerald-400"> / </p>
                <p class="col-span-3 text-emerald-400">SAI</p>
            </div>
            <div class="w-full h-2/3 overflow-clip">
                <img src="../img/logo.png" alt="Tudo que Entre, Sai." class="h-full m-auto object-cover">
            </div>
            <div class="w-full h-1/6">
                <p class="text-center text-2xl lg:text-4xl text-slate-400 font-semibold">Tudo que Entra, Sai.</p>
            </div>
        </div>
    </div>
</body>

</html>