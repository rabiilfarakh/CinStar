<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Film</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#111111]">
    <div class="flex ">
        <div class="w-[20%]">
            @include('layouts.sideBarAdmin')
        </div>

        <section class="md:w-[80%]">
            <div class="my-10 ">

                <h1 class="text-gray-200 flex justify-center font-mono items-center  ml-20 text-2xl">SALLE A</h1>
                <div class="flex justify-around">
                    <img class="w-[40%] h-[45vh] rounded shadow-lg"
                        src="https://mediakwest.com/wp-content/uploads/2019/07/1_Beaugrenelle.ONYX-c-Fr%C3%A9d%C3%A9ric-Berthet.HD_.006.jpg">
                    <div class="grid md:grid-cols-2 grid-cols-1 mt-4 z-50 gap-x-8">
                        <div class="bg-black rounded shadow-2xl h-[100px] w-[150px] md:w-[250px] ">
                            <h3 class=" text-3xl font-extrabold pl-4 mt-2 text-red-800">5</h3>
                                <p class="text-lg mt-2 pl-4 font-bold text-red-900">Total Films</p>

                        </div>
                        <div class="bg-black rounded shadow-2xl h-[100px] w-[150px] md:w-[250px] ">
                            <h3 class=" text-3xl font-extrabold pl-4 mt-2 text-red-800">5</h3>
                                <p class="text-lg mt-2 pl-4 font-bold text-red-900">Reservatins of Day</p>
                        </div>
                        <div class="bg-black rounded shadow-2xl h-[100px] w-[150px] md:w-[250px] ">
                            <h3 class=" text-3xl font-extrabold pl-4 mt-2 text-red-800">5</h3>
                                <p class="text-lg mt-2 pl-4 font-bold text-red-900">Reservation of Week</p>
                        </div>
                        <div class="bg-black rounded shadow-2xl h-[100px] w-[150px] md:w-[250px] ">
                            <h3 class=" text-3xl font-extrabold pl-4 mt-2 text-red-800">5</h3>
                                <p class="text-lg mt-2 pl-4 font-bold text-red-900">Reservations of Mounth</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="my-10">
                
                    <h1 class="text-gray-200 flex justify-center font-mono ml-20 items-center text-2xl">SALLE B</h1>
                <div class="flex justify-around">
                    <img class="w-[40%] h-[45vh] rounded shadow-lg"
                        src="https://www.coze.fr/wp-content/uploads/2021/04/cinema-004.jpg">
                        <div class="grid md:grid-cols-2 grid-cols-1 mt-4 z-50 gap-x-8">
                            <div class="bg-black rounded shadow-2xl h-[100px] w-[150px] md:w-[250px] ">
                                <h3 class=" text-3xl font-extrabold pl-4 mt-2 text-red-800">5</h3>
                                    <p class="text-lg mt-2 pl-4 font-bold text-red-900">Total Films</p>
    
                            </div>
                            <div class="bg-black rounded shadow-2xl h-[100px] w-[150px] md:w-[250px] ">
                                <h3 class=" text-3xl font-extrabold pl-4 mt-2 text-red-800">5</h3>
                                    <p class="text-lg mt-2 pl-4 font-bold text-red-900">Reservatins of Day</p>
                            </div>
                            <div class="bg-black rounded shadow-2xl h-[100px] w-[150px] md:w-[250px] ">
                                <h3 class=" text-3xl font-extrabold pl-4 mt-2 text-red-800">5</h3>
                                    <p class="text-lg mt-2 pl-4 font-bold text-red-900">Reservation of Week</p>
                            </div>
                            <div class="bg-black rounded shadow-2xl h-[100px] w-[150px] md:w-[250px] ">
                                <h3 class=" text-3xl font-extrabold pl-4 mt-2 text-red-800">5</h3>
                                    <p class="text-lg mt-2 pl-4 font-bold text-red-900">Reservations of Mounth</p>
                            </div>
                        </div>
                </div>
                <div class="my-10">
                    <h1 class="text-gray-200 flex justify-center font-mono ml-20 items-center text-2xl">SALLE C</h1>
                    <div class="flex justify-around">
                        <img class="w-[40%] h-[45vh] rounded shadow-lg"
                            src="https://leclaireur.fnac.com/wp-content/uploads/2022/04/movietheater-1256x826.jpg">
                            <div class="grid md:grid-cols-2 grid-cols-1 mt-4 z-50 gap-x-8">
                                <div class="bg-black rounded shadow-2xl h-[100px] w-[150px] md:w-[250px] ">
                                    <h3 class=" text-3xl font-extrabold pl-4 mt-2 text-red-800">5</h3>
                                        <p class="text-lg mt-2 pl-4 font-bold text-red-900">Total Films</p>
        
                                </div>
                                <div class="bg-black rounded shadow-2xl h-[100px] w-[150px] md:w-[250px] ">
                                    <h3 class=" text-3xl font-extrabold pl-4 mt-2 text-red-800">5</h3>
                                        <p class="text-lg mt-2 pl-4 font-bold text-red-900">Reservatins of Day</p>
                                </div>
                                <div class="bg-black rounded shadow-2xl h-[100px] w-[150px] md:w-[250px] ">
                                    <h3 class=" text-3xl font-extrabold pl-4 mt-2 text-red-800">5</h3>
                                        <p class="text-lg mt-2 pl-4 font-bold text-red-900">Reservation of Week</p>
                                </div>
                                <div class="bg-black rounded shadow-2xl h-[100px] w-[150px] md:w-[250px] ">
                                    <h3 class=" text-3xl font-extrabold pl-4 mt-2 text-red-800">5</h3>
                                        <p class="text-lg mt-2 pl-4 font-bold text-red-900">Reservations of Mounth</p>
                                </div>
                            </div>
                    </div>
                    <div class="my-10">
                        <h1 class="text-gray-200 flex justify-center font-mono ml-20 items-center text-2xl">SALLE D</h1>
                        <div class="flex justify-around">
                            <img class="w-[40%] h-[45vh] rounded shadow-lg"
                                src="https://fr.hespress.com/wp-content/uploads/2018/10/cinema-e1538647780224-900x516.jpg">
                                <div class="grid md:grid-cols-2 grid-cols-1 mt-4 z-50 gap-x-8">
                                    <div class="bg-black rounded shadow-2xl h-[100px] w-[150px] md:w-[250px] ">
                                        <h3 class=" text-3xl font-extrabold pl-4 mt-2 text-red-800">5</h3>
                                            <p class="text-lg mt-2 pl-4 font-bold text-red-900">Total Films</p>
            
                                    </div>
                                    <div class="bg-black rounded shadow-2xl h-[100px] w-[150px] md:w-[250px] ">
                                        <h3 class=" text-3xl font-extrabold pl-4 mt-2 text-red-800">5</h3>
                                            <p class="text-lg mt-2 pl-4 font-bold text-red-900">Reservatins of Day</p>
                                    </div>
                                    <div class="bg-black rounded shadow-2xl h-[100px] w-[150px] md:w-[250px] ">
                                        <h3 class=" text-3xl font-extrabold pl-4 mt-2 text-red-800">5</h3>
                                            <p class="text-lg mt-2 pl-4 font-bold text-red-900">Reservation of Week</p>
                                    </div>
                                    <div class="bg-black rounded shadow-2xl h-[100px] w-[150px] md:w-[250px] ">
                                        <h3 class=" text-3xl font-extrabold pl-4 mt-2 text-red-800">5</h3>
                                            <p class="text-lg mt-2 pl-4 font-bold text-red-900">Reservations of Mounth</p>
                                    </div>
                                </div>
                        </div>
                    </div>
        </section>
    </div>
