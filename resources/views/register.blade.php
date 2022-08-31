<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{route('user.create')}}" method="POST">
        @csrf
        Username: <input type="text" name="username" />
        Password: <input type="password" name="password" />
        <button type="submit">Enviar</button>
    </form>
</body>

</html>