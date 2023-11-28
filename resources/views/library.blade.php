@extends('public-layout',[
    'pageTitle' => 'Home'
])

@section('content')

<div class="flex flex-col w-full ">
    <div class="bg-lighter">
        <x-navbar/>
        <div class="mt-14 py-2 flex justify-between text-white bg-lightblue">
            <div class="ml-4 md:ml-8" id="dropdown">
                <button class="bg-darkblue hover:bg-accent text-white w-32 h-8 my-2 rounded shadow-md">Filter</button>
                <div class="w-32 mt-1" id="content">
                    <a class="block bg-white shadow-xl py-1 border-b-2 text-center text-black rounded-t" href="#">option 2</a>
                    <a class="block bg-white shadow-xl py-1 border-b-2 text-center text-black" href="#">option 3</a>
                    <a class="block bg-white shadow-xl py-1 border-b-2 text-center text-black rounded-b" href="#">option 1</a>
                </div>
            </div>
            <div class="flex flex-nowrap my-2 mr-4 md:mr-8 shadow-md">
                <form>
                    @csrf
                    <input
                    class="block rounded-l border-2 h-8 border-white text-darkblue w-32 md:w-auto"
                    name="q"
                    type="text"
                    placeholder="Search"
                    />
                </form>
                <span class="text-md cursor-pointer bg-blue hover:bg-accent rounded-r h-8 border-black border-t-2 border-r-2 border-b-2">
                    <ion-icon name="search-sharp" class="px-2 text-xl cursor-pointer h-8 text-white"></ion-icon>
                </span>
            </div>
        </div>
        <div class="pt-4 md:pt-8 grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 pr-4 md:pr-8">
            @foreach($books as $book)
                <div class="flex-1">
                    <div class="bg-white h-28 ml-4 md:ml-8 rounded-t shadow-xl" id="product">
                        <div class="p-2" id="details">
                            <span class="text-darkblue font-semibold">{{$book->title}}</span>
                            <br>
                            <span class="font-normal text-darkblue text-sm">Author: {{$book->author}}</span>
                        </div>
                    </div>
                    <div class="bg-darkblue shadow-xl hover:bg-blue ml-4 md:ml-8 mb-6 rounded-b flex justify-center cursor-pointer">
                        <div>
                            <p class="cursor-pointer font-bold text-white">SRD {{$book->price}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
