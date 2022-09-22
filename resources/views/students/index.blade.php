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
                    <h2>Alunos</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('students.create') }}">Cadastrar Aluno</a>
                </div>
            </div>
        </div>
        <div class="row">
            {{-- <form class="form-inline" method="GET">
                <div class="form-group mb-2">
                    <label for="filter" class="col-sm-2 col-form-label">Filtro:</label>
                    <input type="text" class="form-control" id="filter" name="filter"
                        placeholder="Nome do aluno..." value="{{ $filter }}">

                    <input type="submit" value="Pesquisar" class="btn btn-primary">
                </div>
            </form> --}}
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>RM</th>
                        <th>@sortablelink('name', 'Nome')</th>
                        <th>Turma</th>
                        <th>Grupo</th>
                        <th width="280px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <td>{{ $student->rm }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->schoolClass->module . ' ' . $student->schoolClass->habilitation . ' ' . $student->schoolClass->period }}
                            </td>
                            <td>{{ $student->group }}</td>
                            <td>
                                <form action="{{ route('students.destroy', $student) }}" method="POST">
                                    <a class="btn btn-primary" href="{{ route('students.edit', $student) }}">Edit</a>
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
                {!! $students->appends(Request::except('page'))->render() !!}
            </div>
        </div>
</body>

</html>
