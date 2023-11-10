<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        @vite('resources/css/app.css')
    </head>
    <body>
        <div class="flex flex-col h-screen w-full bg-white">
            <div class="flex justify-between px-4 py-4 bg-gray-300 fixed w-full text-black">
                Navbar
            </div>
            <div class="bg-red-400 mt-14 py-2 px-12 flex justify-between ">
                <div>
                    filter
                </div>
                <div>
                    Searchbar
                </div>
            </div>
            <div class="bg-gray-100 h-screen py-8 flex">
                <div class="bg-gray-300 w-32 h-40 ml-8 mb-8 rounded-md shadow-lg cursor-pointer">
                    card
                </div>
            </div>
        </div>
    </body>
</html>
