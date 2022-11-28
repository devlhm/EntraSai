<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Register</title>
</head>

<body class="flex flex-col w-screen h-screen font-bold font-sans">
    <nav class="flex w-full bg-violet-500 px-4 py-2">
        <a href="/home" class="mr-auto my-auto text-2xl">
            <p class="inline-block text-white">ENTRA</p>
            <p class="inline-block text-emerald-400">SAI</p>
        </a>
        <a href="/logout">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 23 23  " stroke-width="2" stroke="currentColor" class="w-12 h-12 ml-auto text-white">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
            </svg> 
        </a>    
    </nav>
    <div class="w-full h-full relative">
        <div class="absolute w-full h-full md:px-32 py-8 sm:12 md:py-16">
            <div class="flex flex-col items-start w-full h-full py-8 bg-white shadow-2xl font-semibold">
                <form action="{{route('user.create')}}" method="POST" class="w-5/6 h-full flex flex-col mx-auto my-auto">
                    @csrf
                    <div class="h-1/5">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-1/2 h-1/2 mx-auto text-violet-500">
                            <path fill-rule="evenodd" d="M15.75 1.5a6.75 6.75 0 00-6.651 7.906c.067.39-.032.717-.221.906l-6.5 6.499a3 3 0 00-.878 2.121v2.818c0 .414.336.75.75.75H6a.75.75 0 00.75-.75v-1.5h1.5A.75.75 0 009 19.5V18h1.5a.75.75 0 00.53-.22l2.658-2.658c.19-.189.517-.288.906-.22A6.75 6.75 0 1015.75 1.5zm0 3a.75.75 0 000 1.5A2.25 2.25 0 0118 8.25a.75.75 0 001.5 0 3.75 3.75 0 00-3.75-3.75z" clip-rule="evenodd" />
                        </svg>
                        <h1 class="w-fit mx-auto text-xl md:text-2xl">Registrar Usuário</h1>
                        @if ($errors->any())
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                    <div class="flex flex-col my-auto gap-y-12 md:gap-y-20 font-normal text-md md:text-lg">
                        <div class="md:w-full flex flex-col md:flex-row gap-8">
                            <div class="md:w-1/2 flex flex-col gap-y-10">
                                <div class="relative flex flex-col">
                                    <label for="student_rm" class="font-semibold">Id: </label>
                                    <input type="text" name="id" class="px-2 md:px-4 py-1 md:py-2 border-2 border-slate-400 rounded-sm" />
                                </div>
                                <div class="relative flex flex-col">
                                    <label for="student_rm" class="font-semibold">Nome: </label>
                                    <input type="text" name="username" class="px-2 md:px-4 py-1 md:py-2 border-2 border-slate-400 rounded-sm" />
                                </div>
                                <div class="relative flex flex-col">
                                    <label for="arrival_time" class="font-semibold">Senha: </label>
                                    <input type="password" name="password" class="px-2 md:px-4 py-1 md:py-2 border-2 border-slate-400 rounded-sm"/>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col md:flex-row gap-x-8 gap-y-2 font-semibold">
                            <input type="submit" value="Enviar" class="grow py-1 md:py-2 bg-slate-400 rounded-sm text-white">
                            <a href="/" class="grow py-1 md:py-2 border-2 border-slate-400 rounded-sm text-center">Voltar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="w-1/2 md:w-1/3 h-full mx-auto bg-violet-400 shadow-2xl"></div>
    </div>
</body>
</html>