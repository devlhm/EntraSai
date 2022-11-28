<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel 9 CRUD Tutorial Example</title>
    @vite('resources/css/app.css')
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
    <div class="flex flex-col gap-y-5 w-11/12 mx-auto bg-violet-500 text-white">
        <div class="flex flex-col px-4 py-2 bg-violet-400">
            <h2 class="text-4xl">Entradas</h2>
        </div>
        <div class="px-4 py-2 bg-violet-400">
            <form class="flex flex-col gap-y-2 mt-5 w-fit font-semibold" method="GET">
                <div>
                    <label for="filter" class="text-2xl">Filtro:</label>
                    <input type="text" class="px-1 text-xl text-black" id="filter" name="filter"
                        placeholder="RM do aluno..." value="{{ $filter }}">
                </div>
                <input type="submit" value="Pesquisar" class="bg-emerald-400 text-xl">
                <div class="w-full bg-violet-500 font-semibold text-xl text-center">
                    <a href="{{ route('entries.create') }}">Registrar Entrada</a>
                </div>
            </form>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <table class="w-full table-fixed mt-5 text-xl">
                <thead>
                    <tr class="bg-violet-500 divide-x-4 divide-violet-400">
                        <th class="hidden lg:block">RM do Aluno</th>
                        <th>@sortablelink('arrival_time', 'Chegada Estimada')</th>
                        <th>@sortablelink('arrival_time', 'Hora de Chegada')</th>
                        <th class="hidden lg:block">Justificativa</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($entries as $entry)
                        <tr class="divide-x-4 divide-violet-400 font-semibold bg-white text-black text-center">
                            <td class="hidden lg:block overflow-clip">{{ $entry->student_rm }}</td>
                            <td class="overflow-x-scroll">{{ $entry->estimated_entry_time }}</td>
                            <td class="overflow-x-scroll">{{ $entry->entry_time }}</td>
                            <td class="overflow-x-scroll">{{ $entry->reason }}</td>
                            <td class="p-0 overflow-x-scroll">
                                <form action="{{ route('delays.destroy', $delay->id) }}" method="POST" class="relative flex flex-col w-full text-white">
                                    <a class="static w-full h-full px-4 border-r-transparent bg-emerald-400 text-center" href="{{ route('entries.edit', $entry->id) }}">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        onclick="return confirm('Você tem certeza?')" class="w-full px-4 bg-violet-500 text-center">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {!! $entries->appends(Request::except('page'))->render() !!}
            </div>
        </div>
</body>
</html>
