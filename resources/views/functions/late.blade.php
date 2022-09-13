<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Entra/Sai - Atraso</title>
</head>
<body class="font-bold font-sans">
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
</body>
</html>