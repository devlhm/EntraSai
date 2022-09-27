<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrar Saída</title>
</head>

<body>
    <form action="{{ route('departures.store') }}" method="post">
        @csrf
        <label for="student_rm">RM do aluno: </label>
        <input type="number" name="student_rm" id="student_rm" />
        @error('student_rm')
            {{ $message }}
        @enderror
        <br />

        <label for="departure_time">Tempo da saída: </label>
        <input type="datetime-local" name="departure_time" id="departure_time">
        @error('departure_time')
            {{ $message }}
        @enderror
        <br />

        <label for="reason">Motivo da saída: </label>
        <input type="text" name="reason" id="reason" />
        @error('reason')
            {{ $message }}
        @enderror
        <br />

        <input type="submit" value="Enviar">
    </form>
</body>

</html>
