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
            <nav class="flex bg-violet-500 px-4 py-2">
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
            <div class="h-1/2 lg:w-1/2 lg:h-full">
                  <div class="flex w-full h-full">
                      <div class="w-11/12 h-fit m-auto text-lg font-semibold">
                        <h2 class="text-center">Olá, Usuário!</h2>
                        <h1 class="mb-4 text-center text-3xl font-bold">Escolha uma das opções disponíveis no menu <span class="lg:hidden">abaixo</span><span class="hidden lg:inline">ao lado</span></h1>
                        <p class="text-slate-500">
                            As ações são exibidas de acordo com o seu nível de acesso. Para ter acesso a mais ações, converse com o administrador.<br>
                            Caso tenha dúvidas sobre o sistema, você pode checar a nossa documentação de usuário clicando no botão abaixo:
                        </p>  
                    </div>
                  </div>
                  <div class="w-full h-full bg-black">
                        
                  </div>
            </div>
      </div>
</body>
</html>