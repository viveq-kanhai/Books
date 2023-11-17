@extends('public-layout',[
    'pageTitle' => 'Home'
])

@section('content')

<div class="flex flex-col h-screen w-full ">
    <div class="bg-neutral-800 h-screen overflow-hidden">
        <x-navbar/>
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
        <div class="h-screen mt-4 md:mt-8 flex flex-wrap pr-4 md:pr-8">
            @foreach($books as $book)
                <div class="flex-1">
                    <div class="bg-white min-w-[8rem] h-40 ml-4 md:ml-8 mb-1 rounded shadow-lg cursor-pointer" id="product">
                        <div class="" id="imgbox">

                        </div>
                        <div class="" id="details">
                                <span class="font-normal text-sm">{{$book->title}}</span>
                                <br>
                                <span class="font-normal text-sm">{{$book->author}}</span>
                        </div>
                    </div>
                    <div class="bg-cyan-500 min-w-[8rem] ml-4 md:ml-8 mb-6 rounded flex justify-center ">
                        <div>
                            <p class="cursor-pointer">SRD {{$book->price}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
