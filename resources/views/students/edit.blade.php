<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Company Form - Laravel 9 CRUD Tutorial</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Edit Student</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('students.index') }}" enctype="multipart/form-data">
                        Back</a>
                </div>
            </div>
        </div>
        @if (session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
        @endif
        <form action="{{ route('students.update', $student) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>RM:</strong>
                        <input type="number" name="student_rm" value="{{ $student->rm }}" class="form-control"
                            placeholder="RM">
                        @error('rm')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nome:</strong>
                        <input type="text" name="name" class="form-control" placeholder="Nome"
                            value="{{ $student->name }}">
                        @error('name')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Grupo:</strong>
                        <select type="text" name="group" class="form-control">
                            <option value="GRUPO A" @if ($student->group == 'GRUPO A') selected @endif>GRUPO A</option>
                            <option value="GRUPO B" @if ($student->group == 'GRUPO B') selected @endif>GRUPO B</option>
                        </select>
                        @error('group')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <select name="school_class_id" id="school_class_id">
                    @foreach ($schoolClasses as $schoolClass)
                        <option value="{{ $schoolClass->id }}" @if ($student->school_class_id == $schoolClass->id) selected @endif>
                            {{ $schoolClass->module . ' ' . $schoolClass->habilitation . ' ' . $schoolClass->period }}
                        </option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>
