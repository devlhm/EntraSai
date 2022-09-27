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
                    <h2>Saídas Antecipadas</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('departures.create') }}">Registrar Saída Antecipada</a>
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
            </form>

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
                        <th>@sortablelink('departure_time', 'Horário de Saída')</th>
                        <th>Motivo do atraso</th>
                        <th width="280px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($departures as $departure)
                        <tr>
                            <td>{{ $departure->student_rm }}</td>
                            <td>{{ $departure->student->name }}</td>
                            <td>{{ $departure->student->schoolClass->module . ' ' . $departure->student->schoolClass->habilitation . ' ' . $departure->student->schoolClass->period }}
                            </td>
                            <td>{{ $departure->departure_time }}</td>
                            <td>{{ $departure->reason }}</td>
                            <td>
                                <form action="{{ route('departures.destroy', $departure->id) }}" method="POST">
                                    <a class="btn btn-primary"
                                        href="{{ route('departures.edit', $departure->id) }}">Edit</a>
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
                {!! $departures->appends(Request::except('page'))->render() !!}
            </div>
        </div>
</body>

</html>
