<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Registrar Atraso</title>
</head>
<body class="font-bold font-sans">
    <div class="flex flex-col w-screen h-screen">
        <nav class="flex bg-violet-500 px-4 py-2 shadow-lg">
            <div class="mr-auto my-auto text-2xl">
                <p class="inline-block text-white">ENTRA</p>
                <p class="inline-block text-emerald-400">SAI</p>
            </div>
            <a href="logout">
                @csrf
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 23 23  " stroke-width="2" stroke="currentColor" class="w-8 h-8 ml-auto text-white">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                </svg>
            </a>
        </nav>
        <div class="w-full h-full relative">
            <div class="absolute w-full h-full md:px-32 py-8 sm:12 md:py-16">
                <div class="flex flex-col items-start w-full h-full py-8 bg-white shadow-2xl font-semibold">
                    <form action="{{route('delays.store')}}" method="post" class="w-5/6 h-full flex flex-col mx-auto my-auto">
                        @csrf
                        <div class="h-1/5">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-1/2 h-1/2 mx-auto text-slate-400">
                                <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM12.75 6a.75.75 0 00-1.5 0v6c0 .414.336.75.75.75h4.5a.75.75 0 000-1.5h-3.75V6z" clip-rule="evenodd" />
                            </svg>
                            <h1 class="w-fit mx-auto text-xl md:text-2xl">Registrar Atraso</h1>
                        </div>
                        <div class="flex flex-col my-auto gap-y-12 md:gap-y-20 font-normal text-md md:text-lg">
                            <div class="md:w-full flex flex-col md:flex-row gap-8">
                                <div class="md:w-1/2 flex flex-col gap-y-10">
                                    <div class="relative flex flex-col">
                                        <label for="student_rm" class="font-semibold">RM: </label>
                                        <input type="number" name="student_rm" id="student_rm" class="px-2 md:px-4 py-1 md:py-2 border-2 border-slate-400 rounded-sm" />
                                        <span class="absolute top-full">
                                            @error('student_rm')
                                                {{$message}}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="relative flex flex-col">
                                        <label for="arrival_time" class="font-semibold">Tempo de chegada: </label>
                                        <input type="datetime-local" name="arrival_time" id="arrival_time" class="px-2 md:px-4 py-1 md:py-2 border-2 border-slate-400 rounded-sm">
                                        <span class="absolute top-full">
                                            @error('arrival_time')
                                                {{$message}}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="md:w-1/2 relative flex flex-col">
                                    <label for="reason" class="font-semibold">Motivo do atraso: </label>
                                    <textarea name="reason" id="reason" class="h-full px-2 md:px-4 py-1 md:py-2 border-2 border-slate-400 rounded-sm"></textarea>
                                    <span class="absolute top-full">
                                        @error('reason')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="flex flex-col md:flex-row gap-x-8 gap-y-2 font-semibold">
                                <input type="submit" value="Enviar" class="grow py-1 md:py-2 bg-slate-400 rounded-sm text-white">
                                <a href="/home" class="grow py-1 md:py-2 border-2 border-slate-400 rounded-sm text-center">Voltar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="w-1/2 md:w-1/3 h-full mx-auto bg-violet-400 shadow-2xl"></div>
        </div>
    </div>
</body>
</html>
