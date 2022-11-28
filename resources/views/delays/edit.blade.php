<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Company Form - Laravel 9 CRUD Tutorial</title>
    @vite('resources/css/app.css')
</head>
<body class="font-bold font-sans">
    <div class="flex flex-col w-screen h-screen">
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
            <div class="absolute w-full h-full lg:px-32 py-16">
                <div class="flex flex-col items-start w-full h-full py-8 bg-white shadow-2xl font-semibold">
                    <form action="{{ route('delays.update', $delay->id) }}" method="POST" enctype="multipart/form-data" class="w-5/6 h-full flex flex-col mx-auto my-auto">
                        @csrf
                        @method('PUT')
                        <div class="h-1/5">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-1/2 h-1/2 mx-auto text-slate-400">
                                <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM12.75 6a.75.75 0 00-1.5 0v6c0 .414.336.75.75.75h4.5a.75.75 0 000-1.5h-3.75V6z" clip-rule="evenodd" />
                            </svg>
                            <h1 class="w-fit mx-auto text-xl lg:text-2xl">Editar Atraso</h1>
                        </div>
                        <div class="flex flex-col my-auto gap-y-12 lg:gap-y-20 font-normal text-lg lg:text-lg">
                            <div class="lg:w-full flex flex-col lg:flex-row gap-8">
                                <div class="lg:w-1/2 flex flex-col gap-y-10">
                                    <div class="relative flex flex-col">
                                        <label for="student_rm" class="font-semibold">RM: </label>
                                        <input type="number" name="student_rm" id="student_rm" value="{{ $delay->student_rm }}"  class="px-2 lg:px-4 py-1 lg:py-2 border-2 border-slate-400 rounded-sm" />
                                        <span class="absolute top-full">
                                            @error('student_rm')
                                                {{$message}}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="relative flex flex-col">
                                        <label for="arrival_time" class="font-semibold">Tempo de chegada: </label>
                                        <input type="datetime-local" name="arrival_time" id="arrival_time" value="{{ $delay->arrival_time }}" class="px-2 lg:px-4 py-1 lg:py-2 border-2 border-slate-400 rounded-sm">
                                        <span class="absolute top-full">
                                            @error('arrival_time')
                                                {{$message}}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="lg:w-1/2 relative flex flex-col">
                                    <label for="reason" class="font-semibold">Motivo do atraso: </label>
                                    <textarea name="reason" id="reason" class="h-full px-2 lg:px-4 py-1 lg:py-2 border-2 border-slate-400 rounded-sm">{{ $delay->reason }}</textarea>
                                    <span class="absolute top-full">
                                        @error('reason')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="flex flex-col lg:flex-row gap-x-8 gap-y-2 font-semibold">
                                <button type="submit" class="grow py-1 lg:py-2 bg-slate-400 rounded-sm text-white">Enviar</button>
                                <a href="/delays" class="grow py-1 lg:py-2 border-2 border-slate-400 rounded-sm text-center">Voltar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="w-1/2 lg:w-1/3 h-full mx-auto bg-violet-400 shadow-2xl"></div>
        </div>
    </div>
</body>
</html>
