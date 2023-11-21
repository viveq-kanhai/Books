@extends('admin-layout',[
    'pageTitle' => 'users.view'
])

@section('content')

<div class="flex flex-col w-full bg-yellow-500">
    <div class="bg-neutral-800 min-h-screen w-full flex">
        <x-sidebar/>
        <div class="w-full">
            <div class="mt-4 py-2 flex justify-between text-white">
                <div class="w-96 h-8 mt-1 ml-8">
                    <span class="text-white text-xl font-semibold">firstname lastname</span>
                </div>
                <div class="flex flex-nowrap mt-1 mr-4 md:mr-8 bg-red-500">
                    <form >
                        @csrf
                        <input method="GET" action="{{ url()->current() }}" autocomplete="off"
                        class="block rounded-l border-2 h-8 border-white text-black w-32 md:w-auto"
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
                <div class="w-[70%] h-[30rem] overflow-auto mr-4">
                    <div class="bg-white h-auto mx-4 md:mx-8 mb-1 rounded shadow-lg" id="product">
                        <div class="flex justify-between" id="details">
                            <div class="p-2">
                                <span class="text-xl font-bold">title</span>
                                <br>
                                <span class="text-sm">Author:</span>
                                <br>
                                <span class="text-sm">Subject:</span>
                            </div>
                            <div class="w-20 h-auto flex justify-center pt-7">
                                <div class="bg-cyan-500 w-10 h-10 rounded-full flex items-center justify-center">
                                    <form>
                                        <a href="#">
                                            <ion-icon class="text-xl cursor-pointer mt-1" name="trash"></ion-icon>
                                        </a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
