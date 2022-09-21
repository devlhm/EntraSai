<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Laravel 9 CRUD Tutorial Example</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Laravel 9 CRUD Example Tutorial</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('delays.create') }}"> Create Company</a>
                </div>
            </div>
        </div>
        <div class="row">
            <form class="form-inline" method="GET">
                <div class="form-group mb-2">
                    <label for="filter" class="col-sm-2 col-form-label">Filtro:</label>
                    <input type="text" class="form-control" id="filter" name="filter"
                        placeholder="Nome do aluno..." value="{{ $filter }}">

                    <input type="submit" value="Pesquisar" class="btn btn-primary">
                </div>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>RM do Aluno</th>
                            <th>@sortablelink('student.name', 'Nome do Aluno')</th>
                            <th>Turma</th>
                            <th>@sortablelink('arrival_time', 'Horário de Chegada')</th>
                            <th>Motivo do atraso</th>
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
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
                                        <a class="btn btn-primary"
                                            href="{{ route('delays.edit', $delay->id) }}">Edit</a>
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
