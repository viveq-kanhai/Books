@extends('public-layout',[
    'pageTitle' => 'Home'
])

@section('content')

<div class="flex flex-col w-full">
    <div class="bg-lighter">
        <x-navbar/>
        <div class="mt-14 py-2 flex justify-end text-white bg-lightblue">
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
                    <div class="bg-white ml-4 md:ml-8 rounded-t shadow-xl pb-5" id="product">
                        <div class="h-full p-2" id="details">
                            <div class="  rounded">
                                <span class="text-darkblue text-lg font-calistoga">{{$book->title}}</span>
                            </div>
                            <div class=" ">
                                <span class="font-normal text-darkblue text-sm font-calistoga">Author: {{$book->author}}</span>
                            </div>
                            <span class="font-normal text-darkblue text-sm">Subject: {{$book->subject->subject}}</span>
                        </div>
                    </div>
                    {{-- <div class="bg-darkblue shadow-xl hover:bg-blue ml-4 md:ml-8 mb-6 rounded-b flex justify-center cursor-pointer">
                        <div>
                            <p class="cursor-pointer font-bold text-white font-calistoga">SRD {{$book->price}}</p>
                        </div>
                    </div> --}}
                </div>
            @endforeach
            @if (count($books) == 0)
                <h1>No books found </h1>
            @endif
        </div>
    </div>
</div>

@endsection
