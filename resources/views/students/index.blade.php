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
        <button>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 23 23  " stroke-width="2" stroke="currentColor" class="w-12 h-12 ml-auto text-white">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
            </svg> 
        </button>    
    </nav>
    <div class="flex flex-col gap-y-5 w-11/12 mx-auto bg-violet-500 text-white">
        <div class="flex flex-col px-4 py-2 bg-violet-400">
            <h2 class="text-4xl">Alunos</h2>
        </div>
        <div class="px-4 py-2 bg-violet-400">
            <form class="flex flex-col gap-y-2 mt-5 w-full font-semibold" method="GET">
                <div class="flex flex-col gap-2 text-xl text-black">
                    <label for="filter" class="text-2xl text-white">Filtro:</label>
                    <input type="text" class="w-full px-1" id="filter" name="filter"
                        placeholder="Nome do aluno..." value="{{ $filter }}">
                    <select name="schoolClassFilter" class="w-full px-1" id="schoolClassFilter"
                        onchange="this.form.submit()">
                        @foreach ($schoolClasses as $schoolClass)
                            <option value="{{ $schoolClass->id }}" @if ($schoolClassFilter == $schoolClass->id) selected @endif>
                                {{ $schoolClass->module . ' ' . $schoolClass->habilitation . ' ' . $schoolClass->period }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <input type="submit" value="Pesquisar" class="w-full bg-emerald-400 text-xl">
                <div class="w-full bg-violet-500 font-semibold text-xl text-center">
                    <a href="{{ route('students.create') }}">Cadastrar Aluno</a>
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
                        <th class="hidden lg:block">RM</th>
                        <th>@sortablelink('name', 'Nome')</th>
                        <th>Turma</th>
                        <th>Grupo</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr class="divide-x-4 divide-y-2 divide-violet-400 font-semibold bg-white text-black text-center">
                            <td class="hidden lg:block overflow-x-scroll">{{ $student->rm }}</td>
                            <td class="overflow-x-scroll">{{ $student->name }}</td>
                            <td class="overflow-x-scroll">{{ $student->schoolClass->module . ' ' . $student->schoolClass->habilitation . ' ' . $student->schoolClass->period }}</td>
                            <td class="overflow-x-scroll">{{ $student->group }}</td>
                            <td class="p-0 overflow-x-scroll">
                                <form action="{{ route('students.destroy', $student) }}" method="POST" class="relative flex flex-col w-full text-white">
                                    <a class="static w-full h-full px-4 border-r-transparent bg-emerald-400 text-center" href="{{ route('students.edit', $student) }}">Edit</a>
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
            <div class="mt-8 d-flex justify-content-center">
                {!! $students->appends(Request::except('page'))->render() !!}
            </div>
        </div>
</body>
</html>