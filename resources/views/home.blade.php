<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        @vite('resources/css/app.css')
    </head>
    <body>
        <div class="flex flex-col h-screen w-full ">
            <div class="bg-neutral-800 h-screen overflow-hidden">
                <div class="flex justify-between px-4 py-2 bg-neutral-800 border-b-2 fixed h-14 w-full text-white top-0 left-0">
                    <div class="text-xl text-cyan-500 pb-0 flex items-center cursor-pointer">
                        Logo
                    </div>
                    <ul class="flex items-center pb-0 static text-white">
                        <li class="text-md md:text-xl ml-2 md:ml-8 cursor-pointer font-normal md:font-semibold">Library</li>
                        <li class="text-md md:text-xl ml-2 md:ml-8 cursor-pointer font-normal md:font-semibold">About</li>
                        <!-- <button class="text-xl ml-8 bg-accent text-white py-2 px-6 rounded-full">Sign out</button> -->
                        <ion-icon name="settings-sharp" class="text-md md:text-xl ml-2 md:ml-8 pt-1 cursor-pointer"></ion-icon>
                    </ul>
                </div>
                <div class="mt-14 py-2 flex justify-between text-white">
                    <div class="ml-4 md:ml-8" id="dropdown">
                        <button class="bg-white text-black w-32 h-8 mt-2 rounded">Filter</button>
                        <div class="w-32 mt-1" id="content">
                            <a class="block bg-neutral-400 shadow-xl py-1 border-b-2 text-center text-black rounded-t" href="#">option 2</a>
                            <a class="block bg-neutral-400 shadow-xl py-1 border-b-2 text-center text-black" href="#">option 3</a>
                            <a class="block bg-neutral-400 shadow-xl py-1 border-b-2 text-center text-black rounded-b" href="#">option 1</a>
                        </div>
                    </div>
                    <div class="flex flex-nowrap mt-2 mr-4 md:mr-8">
                        <form>
                            <input
                            class="block rounded-l border-2 h-8 border-white w-32 md:w-auto"
                            name="search"
                            type="text"
                            placeholder="Search"
                            />
                        </form>
                        <span class="text-md cursor-pointer bg-cyan-500 rounded-r h-8 border-2">
                            <ion-icon name="search-sharp" class="px-2 text-xl cursor-pointer h-8 text-white"></ion-icon>
                        </span>
                    </div>
                </div>
                <div class="h-screen mt-4 md:mt-8 flex">
                    <div class="">
                        <div class="bg-white w-32 h-40 ml-4 md:ml-8 mb-1 rounded shadow-lg cursor-pointer" id="product">
                            <div class="" id="imgbox">
                                
                            </div>
                            <div class="" id="details">
                                    <span class="font-normal text-sm">De praktijk van auditing & assurance</span>
                                    <br>
                                    <span class="font-normal text-sm">Author 1</span>
                            </div>
                        </div>
                        <div class="bg-cyan-500 w-32 ml-4 md:ml-8 mb-6 rounded flex justify-center">
                            <div>
                                price
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    </body>
</html>
