@extends('public-layout',[
    'pageTitle' => 'books.index'
])

@section('content')

@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> {{ Session::get('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (Session::has('errors'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Error!</strong> {{ Session::get('errors') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="flex flex-col w-full bg-yellow-500">
    <div class="bg-neutral-800 h-screen w-full flex">
        <x-sidebar/>
        <div class="w-full">
            <div class="mt-4 py-2 flex justify-end text-white">
                <div class="flex flex-nowrap mt-2 mr-4 md:mr-8">
                    <form >
                        @csrf
                        <input method="GET" action="{{ url()->current() }}" autocomplete="off"
                        class="block rounded-l border-2 h-8 border-white w-32 md:w-auto"
                        name="q"
                        type="text"
                        placeholder="Search"
                        @if (request('q')) value="{{ request('q') }}" autofocus @endif
                        />
                    </form>
                    <span class="text-md cursor-pointer bg-cyan-500 rounded-r h-8 border-2">
                        <ion-icon name="search-sharp" class="px-2 text-xl cursor-pointer h-8 text-white"></ion-icon>
                    </span>
                </div>
            </div>
            <div class="mt-4 md:mt-8 flex">
                <div class="w-[70%]">
                    @foreach ($books as $book)
                    <div class="bg-white h-auto mx-4 md:mx-8 mb-1 rounded shadow-lg cursor-pointer" id="product">
                        <div class="flex justify-between" id="details">
                            <div class="p-2">
                                <span class="text-xl font-bold">{{$book->title}}</span>
                                <br>
                                <span class="text-sm">Author: {{$book->author}}</span>
                                <br>
                                <span class="text-sm">Price: SRD {{$book->price}}</span>
                                <br>
                                <span class="text-sm">Subject: {{$book->subject->subject}}</span>
                            </div>
                            <div class="w-20 h-auto flex justify-center pt-7">
                                <div class="bg-cyan-500 w-10 h-10 rounded-full flex justify-center">
                                    <ion-icon class="text-xl mt-3" name="pencil"></ion-icon>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                        <div class="border-top pt-3 pb-0 px-3">
                    {{ $books->appends($_GET)->links() }}
                </div>
                </div>
                <div class="w-[30%]">
                    <div class='flex items-center justify-center h-96 w-90 mr-4 md:mr-8 rounded bg-white'>
                        <form action="{{ route('books.store') }}" method="POST" autocomplete="off">
                            @csrf
                            <div class='flex flex-col mb-1'>
                                <h2 class='mb-8 text-center text-black uppercase text-xl font-[Poppins] font-semibold'>Add book</h2>
                                <input class='text-black bg-transparent focus:outline-none w-60 h-9 border-2 border-solid border-black
                                rounded-2xl p-1 text-base font-[Poppins]'
                                placeholder='                   Book title' name='title' required/>
                                <input class='text-black bg-transparent focus:outline-none w-60 h-9 border-2 border-solid border-black
                                rounded-2xl mt-2 p-1 text-base font-[Poppins]'
                                placeholder='                   Author' name='author' required/>
                                <select class='text-black bg-transparent focus:outline-none w-60 h-9 border-2 border-solid border-black
                                rounded-2xl mt-2 p-1 text-base font-[Poppins]' name='subject' required>
                                    @foreach ($subjects as $sub)
                                        <option value={{$sub->id}}>{{$sub->subject}}</option>
                                    @endforeach
                                </select>
                                <input class='text-black bg-transparent focus:outline-none w-60 h-9 border-2 border-solid border-black
                                rounded-2xl mt-2 p-1 text-base font-[Poppins]'
                                placeholder='                   Price' name='price' required/>
                                <input class='text-black bg-transparent focus:outline-none w-60 h-9 border-2 border-solid border-black
                                rounded-2xl mt-2 p-1 text-base font-[Poppins]'
                                placeholder='                   File path' name='filePath' required/>
                            </div>
                            <div class='flex justify-center mt-2 mr-8 w-full'>
                                <button class='bg-cyan-500 text-white font-[Poppins]  mt-4 py-2 px-6 w-full rounded-3xl
                                hover:bg-green-400 duration-500' type='submit'>
                                    Add
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
