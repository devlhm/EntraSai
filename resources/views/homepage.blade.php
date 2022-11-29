<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Entra/Sai - Homepage</title>
    <!--
        Primary Color: Emerald
        Secundary Color: Violet
    -->
</head>
<body class="font-bold font-sans">
      <div class="flex flex-col w-screen h-screen">
            <nav class="flex w-full bg-violet-500 px-4 py-2">
                  <a href="/home" class="mr-auto my-auto text-2xl">
                        <p class="inline-block text-white">ENTRA</p>
                        <p class="inline-block text-emerald-400">SAI</p>
                  </a>
                  <a href="/logout">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 23 23  " stroke-width="2" stroke="currentColor" class="w-12 h-12 ml-auto text-white">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                        </svg> 
                  </a>    
            </nav>
            <div class="w-full h-1/2 lg:h-full lg:flex">
                  <div class="flex w-full h-full">
                        <div class="w-11/12 h-fit m-auto text-md font-semibold">
                              <h2 class="text-center">Olá, {{Auth::user()->full_name}}!</h2>
                              <h1 class="mb-4 text-center text-2xl font-bold">Escolha uma das opções disponíveis no menu <span class="lg:hidden">abaixo</span><span class="hidden lg:inline">ao lado</span></h1>
                              <p class="text-slate-500">
                              As ações são exibidas de acordo com o seu nível de acesso. Para ter acesso a mais ações, converse com o administrador.<br>
                              Caso tenha dúvidas sobre o sistema, você pode checar a nossa documentação de usuário clicando no botão abaixo:
                              </p>  
                        </div>
                  </div>
                  <div class="w-full h-full">
                        <div class="relative w-10/12 h-full md:h-10/12 mx-auto">
                              <div class="absolute w-full h-full py-4 flex flex-col gap-y-10 md:gap-y-4 font-semibold text-xl md:text-2xl">
                                    <div class="w-full h-1/2 flex flex-col gap-y-2 md:gap-y-5">
                                          <a href="/entries" class="w-full h-1/3 md:h-1/4 p-1 flex bg-white drop-shadow-lg  gap-x-2 rounded-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-full text-violet-500">
                                                      <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm4.28 10.28a.75.75 0 000-1.06l-3-3a.75.75 0 10-1.06 1.06l1.72 1.72H8.25a.75.75 0 000 1.5h5.69l-1.72 1.72a.75.75 0 101.06 1.06l3-3z" clip-rule="evenodd" />
                                                </svg>
                                                <p class="w-full m-auto">Autorizar entrada de aluno</p>
                                          </a>
                                          <a href="/departures" class="w-full h-1/3 md:h-1/4 p-1 flex bg-white drop-shadow-lg  gap-x-2 rounded-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-full text-emerald-500">
                                                      <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-4.28 9.22a.75.75 0 000 1.06l3 3a.75.75 0 101.06-1.06l-1.72-1.72h5.69a.75.75 0 000-1.5h-5.69l1.72-1.72a.75.75 0 00-1.06-1.06l-3 3z" clip-rule="evenodd" />
                                                </svg>
                                                <p class="w-full m-auto">Autorizar saída de aluno</p>
                                          </a>
                                          <a href="/delays" class="w-full h-1/3 md:h-1/4 p-1 flex bg-white drop-shadow-lg gap-x-2 rounded-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-full text-slate-400">
                                                      <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM12.75 6a.75.75 0 00-1.5 0v6c0 .414.336.75.75.75h4.5a.75.75 0 000-1.5h-3.75V6z" clip-rule="evenodd" />
                                                </svg>
                                                <p class="w-full m-auto">Registrar atraso</p>
                                          </a>
                                    </div>
                                    @if(Auth::user()->role_id)
                                          <div class="w-full h-1/2 flex flex-col gap-y-2 md:gap-y-5">
                                                <a href="/students" class="w-full h-1/3 md:h-1/4 p-1 flex bg-white drop-shadow-lg  gap-x-2 rounded-sm">
                                                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-full text-slate-400">
                                                            <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                                            <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd" />
                                                      </svg>
                                                      <p class="w-full m-auto">Consultar Alunos</p>
                                                </a>
                                                <a href="/excel" class="w-full h-1/3 md:h-1/4 p-1 flex bg-white drop-shadow-lg  gap-x-2 rounded-sm">
                                                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-full text-emerald-500">
                                                            <path fill-rule="evenodd" d="M1.5 5.625c0-1.036.84-1.875 1.875-1.875h17.25c1.035 0 1.875.84 1.875 1.875v12.75c0 1.035-.84 1.875-1.875 1.875H3.375A1.875 1.875 0 011.5 18.375V5.625zM21 9.375A.375.375 0 0020.625 9h-7.5a.375.375 0 00-.375.375v1.5c0 .207.168.375.375.375h7.5a.375.375 0 00.375-.375v-1.5zm0 3.75a.375.375 0 00-.375-.375h-7.5a.375.375 0 00-.375.375v1.5c0 .207.168.375.375.375h7.5a.375.375 0 00.375-.375v-1.5zm0 3.75a.375.375 0 00-.375-.375h-7.5a.375.375 0 00-.375.375v1.5c0 .207.168.375.375.375h7.5a.375.375 0 00.375-.375v-1.5zM10.875 18.75a.375.375 0 00.375-.375v-1.5a.375.375 0 00-.375-.375h-7.5a.375.375 0 00-.375.375v1.5c0 .207.168.375.375.375h7.5zM3.375 15h7.5a.375.375 0 00.375-.375v-1.5a.375.375 0 00-.375-.375h-7.5a.375.375 0 00-.375.375v1.5c0 .207.168.375.375.375zm0-3.75h7.5a.375.375 0 00.375-.375v-1.5A.375.375 0 0010.875 9h-7.5A.375.375 0 003 9.375v1.5c0 .207.168.375.375.375z" clip-rule="evenodd" />
                                                      </svg>                                                          
                                                      <p class="w-full m-auto">Alterar registros</p>
                                                </a>
                                                <a href="/register" class="w-full h-1/3 md:h-1/4 p-1 flex bg-white drop-shadow-lg gap-x-2 rounded-sm">
                                                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-full text-violet-500">
                                                            <path fill-rule="evenodd" d="M15.75 1.5a6.75 6.75 0 00-6.651 7.906c.067.39-.032.717-.221.906l-6.5 6.499a3 3 0 00-.878 2.121v2.818c0 .414.336.75.75.75H6a.75.75 0 00.75-.75v-1.5h1.5A.75.75 0 009 19.5V18h1.5a.75.75 0 00.53-.22l2.658-2.658c.19-.189.517-.288.906-.22A6.75 6.75 0 1015.75 1.5zm0 3a.75.75 0 000 1.5A2.25 2.25 0 0118 8.25a.75.75 0 001.5 0 3.75 3.75 0 00-3.75-3.75z" clip-rule="evenodd" />
                                                      </svg>                                                    
                                                      <p class="w-full m-auto">Gerar Cadastro</p>
                                                </a>
                                          </div>
                                    @endif
                              </div>
                              <div class="w-10/12 h-full mx-auto bg-violet-400 shadow-lg shadow-slate-500 rounded-t-lg lg:rounded-none"></div>
                        </div>
                  </div>
            </div>
      </div>
</body>
</html>