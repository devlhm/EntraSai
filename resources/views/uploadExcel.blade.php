<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Excel</title>
</head>

<body class="flex flex-col w-screen h-screen font-bold font-sans">
    <nav class="flex w-full bg-violet-500 px-4 py-2">
        <a href="/home" class="mr-auto my-auto text-2xl">
            <p class="inline-block text-white">ENTRA</p>
            <p class="inline-block text-emerald-400">SAI</p>
        </a>
        <a href="/logout">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 23 23  " stroke-width="2"
                stroke="currentColor" class="w-12 h-12 ml-auto text-white">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
            </svg>
        </a>
    </nav>
    <div class="w-full h-full relative">
        <div class="absolute w-full h-full md:px-32 py-8 sm:12 md:py-16">
            <div class="flex flex-col items-start w-full h-full py-8 bg-white shadow-2xl font-semibold">
                <div class="w-5/6 h-full flex flex-col mx-auto my-auto">
                    <div class="h-1/5">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-1/2 h-1/2 mx-auto text-emerald-500">
                            <path fill-rule="evenodd"
                                d="M1.5 5.625c0-1.036.84-1.875 1.875-1.875h17.25c1.035 0 1.875.84 1.875 1.875v12.75c0 1.035-.84 1.875-1.875 1.875H3.375A1.875 1.875 0 011.5 18.375V5.625zM21 9.375A.375.375 0 0020.625 9h-7.5a.375.375 0 00-.375.375v1.5c0 .207.168.375.375.375h7.5a.375.375 0 00.375-.375v-1.5zm0 3.75a.375.375 0 00-.375-.375h-7.5a.375.375 0 00-.375.375v1.5c0 .207.168.375.375.375h7.5a.375.375 0 00.375-.375v-1.5zm0 3.75a.375.375 0 00-.375-.375h-7.5a.375.375 0 00-.375.375v1.5c0 .207.168.375.375.375h7.5a.375.375 0 00.375-.375v-1.5zM10.875 18.75a.375.375 0 00.375-.375v-1.5a.375.375 0 00-.375-.375h-7.5a.375.375 0 00-.375.375v1.5c0 .207.168.375.375.375h7.5zM3.375 15h7.5a.375.375 0 00.375-.375v-1.5a.375.375 0 00-.375-.375h-7.5a.375.375 0 00-.375.375v1.5c0 .207.168.375.375.375zm0-3.75h7.5a.375.375 0 00.375-.375v-1.5A.375.375 0 0010.875 9h-7.5A.375.375 0 003 9.375v1.5c0 .207.168.375.375.375z"
                                clip-rule="evenodd" />
                        </svg>
                        <h1 class="w-fit mx-auto text-xl md:text-2xl">Importar Turma de Arquivo Excel</h1>
                    </div>
                    <div class="flex flex-col my-auto gap-y-12 md:gap-y-20 font-normal text-md md:text-lg">
                        <ul class="mx-auto">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <form method="POST" action="{{ route('file.upload.studentSpreadsheet') }}"
                            enctype="multipart/form-data"
                            class="mx-auto">
                            @csrf
                            <input type="file" accept=".xlsx" name="file" required class="my-10" /><br />
                            <div class="flex flex-col md:flex-row gap-x-8 gap-y-2 font-semibold">
                                <input type="submit" value="Enviar"
                                    class="grow py-1 md:py-2 bg-slate-400 rounded-sm text-white">
                                <a href="/"
                                    class="grow py-1 md:py-2 border-2 border-slate-400 rounded-sm text-center">Voltar</a>
                            </div>
                        </form>

                        @if (session()->has('success'))
                            {{ session('success') }}
                        @endif
                    </div>
                    </form>
                </div>
            </div>
            <div class="w-1/2 md:w-1/3 h-full mx-auto bg-violet-400 shadow-2xl"></div>
        </div>
</body>

</html>
