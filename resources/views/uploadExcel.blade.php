<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Excel</title>
</head>

<body>
    <form method=POST action="{{ route('file.upload.studentSpreadsheet') }}" enctype="multipart/form-data">
        @csrf
        <input type="file" accept=".xlsx" name="file" required /><br />
        <input type="submit" />
    </form>

    @if(session()->has('success'))
        {{session('success')}}
    @endif
</body>

</html>