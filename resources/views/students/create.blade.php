<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastrar Aluno</title>
</head>

<body>
    <form action="{{ route('students.store') }}" method="post">
        @if (session()->has('success'))
            <h1>{{ session('success') }}</h1>
        @endif

        @csrf
        <label for="rm">RM: </label>
        <input type="number" name="rm" id="rm" />
        @error('rm')
            {{ $message }}
        @enderror
        <br />


        <label for="name">Nome: </label>
        <input type="text" name="name" id="name">
        @error('name')
            {{ $message }}
        @enderror
        <br />

        <label for="group">Grupo: </label>
        <select name="group" id="group">
            <option value="GRUPO A">GRUPO A</option>
            <option value="GRUPO B">GRUPO B</option>
        </select>
        @error('group')
            {{ $message }}
        @enderror
        <br />

        <label for="school_class">Turma: </label>
        <select name="school_class_id" id="school_class_id">
            @foreach ($schoolClasses as $schoolClass)
                <option value="{{ $schoolClass->id }}">
                    {{ $schoolClass->module . ' ' . $schoolClass->habilitation . ' ' . $schoolClass->period }}
                </option>
            @endforeach)
        </select>
        @error('school_class_id')
            {{ $message }}
        @enderror
        <br />

        <input type="submit" value="Enviar">
    </form>
</body>

</html>
