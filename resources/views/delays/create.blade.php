<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrar Atraso</title>
</head>
<body>
    <form action="{{route('delays.store')}}" method="post">
        @csrf
        <label for="student_rm">RM: </label>
        <input type="number" name="student_rm" id="student_rm" />
        @error('student_rm')
            {{$message}}
        @enderror
        <br />


        <label for="arrival_time">Tempo de chegada: </label>
        <input type="datetime-local" name="arrival_time" id="arrival_time">
        @error('arrival_time')
            {{$message}}
        @enderror
        <br />

        <label for="reason">Motivo do atraso: </label>
        <input type="text" name="reason" id="reason" />
        @error('reason')
            {{$message}}
        @enderror
        <br />

        <input type="submit" value="Enviar">
    </form>
</body>
</html>