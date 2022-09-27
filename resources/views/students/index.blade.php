<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Laravel 9 CRUD Tutorial Example</title>
    @vite('resources/css/app.css')
</head>

<body class="font-bold font-sans">
    <nav class="flex bg-violet-500 px-4 py-2 shadow-lg">
        <div class="mr-auto my-auto text-2xl">
              <p class="inline-block text-white">ENTRA</p>
              <p class="inline-block text-emerald-400">SAI</p>
        </div>
        <button>
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 23 23  " stroke-width="2" stroke="currentColor" class="w-8 h-8 ml-auto text-white">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
              </svg> 
        </button>    
    </nav>
    <div class="w-11/12 mt-2">
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
        <div class="flex flex-col w-screen h-screen">
            <nav class="flex bg-violet-500 px-4 py-2 shadow-lg">
                  <div class="mr-auto my-auto text-2xl">
                        <p class="inline-block text-white">ENTRA</p>
                        <p class="inline-block text-emerald-400">SAI</p>
                  </div>
                  <button>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 23 23  " stroke-width="2" stroke="currentColor" class="w-8 h-8 ml-auto text-white">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                        </svg> 
                  </button>    
            </nav>
            <div class="relative w-full h-full font-semibold">
                  <div class="absolute w-full h-full flex">
                        <div class="w-11/12 h-5/6 m-auto p-6 gap-4 flex flex-col drop-shadow-xl shadow-black bg-white">
                              <div class="w-full h-1/6 flex flex-col">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-auto h-2/4 m-auto text-slate-400">
                                          <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM12.75 6a.75.75 0 00-1.5 0v6c0 .414.336.75.75.75h4.5a.75.75 0 000-1.5h-3.75V6z" clip-rule="evenodd" />
                                    </svg>
                                    <p class="text-center text-xl">Registrar Atraso</p>
                              </div>
                              <form action="" class="h-full gap-2 flex flex-col">
                                    <div class="w-full h-full flex flex-col">
                                          <div>
                                                <label>Label 1</label>
                                                <input type="text" class="h-full border-2 border-slate-400 rounded-md hover:border-slate-500">
                                          </div>
                                          <div>
                                                <label>Label 1</label>
                                                <input type="text" class="h-full border-2 border-slate-400 rounded-md hover:border-slate-500">
                                          </div>

                                    </div>
                                    <div class="w-full h-full flex flex-col">
                                          <label>Label 1</label>
                                          <textarea class="h-full border-2 border-slate-400 rounded-md hover:border-slate-500"></textarea>
                                    </div>
                                    <div class="w-full h-full flex flex-col gap-3 row-span-2 md:col-span-2 text-xl">
                                          <button class="w-full h-1/3 mt-auto bg-slate-400 rounded-md text-white hover:bg-slate-500 focus:ring focus:ring-slate-300">Button 1</button>
                                          <button class="w-full h-1/3 mb-auto border-2 border-slate-400 rounded-md hover:border-slate-500 focus:ring focus:ring-slate-300">Button 2</button>
                                    </div>
                              </form>
                        </div>
                  </div>
                  <div class="static w-1/2 h-full mx-auto shadow-xl shadow-gray-300 bg-violet-400"></div>
            </div>
        </div>
        <div class="row">
            <form class="form-inline" method="GET">
                <div class="form-group mb-2">
                    <label for="filter" class="col-sm-2 col-form-label">Filtro:</label>
                    <input type="text" class="form-control" id="filter" name="filter"
                        placeholder="Nome do aluno..." value="{{ $filter }}">

                    <input type="submit" value="Pesquisar" class="btn btn-primary m-2">

                    <select name="schoolClassFilter" class="form-control"id="schoolClassFilter"
                        onchange="this.form.submit()">
                        @foreach ($schoolClasses as $schoolClass)
                            <option value="{{ $schoolClass->id }}" @if ($schoolClassFilter == $schoolClass->id) selected @endif>
                                {{ $schoolClass->module . ' ' . $schoolClass->habilitation . ' ' . $schoolClass->period }}
                            </option>
                        @endforeach
                    </select>
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
