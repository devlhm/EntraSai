<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Laravel 9 CRUD Tutorial Example</title>
    @vite('resources/css/app.css')
</head>

<body class="flex flex-col w-screen h-screen font-bold font-sans">
    <nav class="flex w-full bg-violet-500 px-4 py-2">
        <div class="mr-auto my-auto text-2xl">
            <p class="inline-block text-white">ENTRA</p>
            <p class="inline-block text-emerald-400">SAI</p>
        </div>
        <button>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 23 23  " stroke-width="2" stroke="currentColor" class="w-8 h-8 ml-auto text-white">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
            </svg> 
        </button>    
    </nav>
    <div class="flex flex-col gap-y-5 w-11/12 mx-auto bg-violet-500 text-white">
        <div class="flex flex-col px-4 py-2 bg-violet-400">
            <h2 class="text-2xl">Atrasos</h2>
            <a class="font-semibold text-xl" href="{{ route('delays.create') }}">Registrar Atraso</a>
        </div>
        <div class="px-4 py-2 bg-violet-400">
            <form class="flex flex-col gap-y-2 mt-5 w-fit" method="GET">
                <div>
                    <label for="filter" class="text-lg font-semibold">Filtro:</label>
                    <input type="text" class="px-1" id="filter" name="filter"
                        placeholder="Nome do aluno..." value="{{ $filter }}">
                </div>
                <input type="submit" value="Pesquisar" class="bg-emerald-400">
            </form>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <table class="w-full table-fixed mt-5">
                <thead>
                    <tr class="bg-violet-500">
                        <th>RM do Aluno</th>
                        <th class="border-x-4 border-violet-400">@sortablelink('student.name', 'Nome do Aluno')</th>
                        <th class="border-x-4 border-violet-400">Turma</th>
                        <th class="border-x-4 border-violet-400">@sortablelink('arrival_time', 'Horário de Chegada')</th>
                        <th class="border-x-4 border-violet-400">Motivo do atraso</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach ($delays as $delay)
                        <tr>
                            <td>{{ $delay->student_rm }}</td>
                            <td>{{ $delay->student->name }}</td>
                            <td>{{ $delay->student->schoolClass->module . ' ' . $delay->student->schoolClass->habilitation . ' ' . $delay->student->schoolClass->period }}
                            </td>
                            <td>{{ $delay->arrival_time }}</td>
                            <td>{{ $delay->reason }}</td>
                            <td>
                                <form action="{{ route('delays.destroy', $delay->id) }}" method="POST">
                                    <a class="btn btn-primary" href="{{ route('delays.edit', $delay->id) }}">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        onclick="return confirm('Você tem certeza?')"class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {!! $delays->appends(Request::except('page'))->render() !!}
            </div>
        </div>
</body>

</html>
