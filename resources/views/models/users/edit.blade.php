@extends('admin-layout',[
    'pageTitle' => 'users.edit'
])

@section('content')

<div class="flex w-full min-h-screen bg-neutral-800">
    <x-sidebar/>
    <div class="w-full flex">
        <div class="w-[50%]">
            <div class='flex items-center justify-center h-64 w-96 ml-20 mt-8 rounded bg-white'>
                <form>
                @csrf
                    <div class='flex flex-col mb-1'>
                        <h2 class='mb-4 text-center text-black uppercase text-xl font-[Poppins] font-semibold'>Edit user</h2>
                        <input class='text-black bg-transparent focus:outline-none w-60 h-9 border-2 border-solid border-black
                        rounded-2xl p-1 text-base font-[Poppins]'
                        placeholder='                   First name' name='firstname' required/>
                        <input class='text-black bg-transparent focus:outline-none w-60 h-9 border-2 border-solid border-black
                        rounded-2xl mt-2 p-1 text-base font-[Poppins]'
                        placeholder='                   Last name' name='lastname' required/>
                        <input class='text-black bg-transparent focus:outline-none w-60 h-9 border-2 border-solid border-black
                        rounded-2xl mt-2 p-1 text-base font-[Poppins]'
                        placeholder='                   email' name='email' type='email' required/>
                    </div>
                    <div class='flex justify-center mt-2 mr-8 w-full'>
                        <button class='bg-cyan-500 text-white font-[Poppins]  mt-4 py-2 px-6 w-full rounded-3xl
                        hover:bg-green-400 duration-500' type='submit'>
                            Update
                        </button>
                    </div>
                </form>
            </div>
            <div class="w-96 ml-20 mt-8 h-56 rounded">
                <div class="flex flex-nowrap ml-20 mt-2 mb-4 mr-4 md:mr-8">
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
                <div class="bg-white h-auto w-96 mb-1 rounded shadow-lg" id="product">
                    <div class="flex justify-between" id="details">
                        <div class="p-2">
                            <span class="text-xl font-bold">Title</span>
                            <br>
                            <span class="text-sm">Author: </span>
                            <br>
                            <span class="text-sm">Price: SRD </span>
                            <br>
                            <span class="text-sm">Subject: </span>
                        </div>
                        <div class="w-20 h-auto flex justify-center pt-9">
                            <div class="bg-cyan-500 w-10 h-10 rounded-full flex items-center cursor-pointer justify-center">
                                <ion-icon class="text-xl" name="add-circle"></ion-icon>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-[50%] flex flex-col">
            <div class="mt-8 mb-2 h-[378px] rounded overflow-auto">
                <div class="bg-white h-auto mx-4 md:mx-8 mb-1 rounded shadow-lg" id="product">
                    <div class="flex justify-between" id="details">
                        <div class="p-2">
                            <span class="text-xl font-bold">Title</span>
                            <br>
                            <span class="text-sm">Author: </span>
                            <br>
                            <span class="text-sm">Price: SRD </span>
                            <br>
                            <span class="text-sm">Subject: </span>
                        </div>
                        <div class="w-20 h-auto flex justify-center pt-9">
                            <div class="bg-cyan-500 w-10 h-10 rounded-full cursor-pointer flex items-center justify-center">
                                <ion-icon class="text-xl" name="trash"></ion-icon>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="h-16">
                <div class="bg-white h-16 w-[88%] mx-4 md:mx-8 mb-1 rounded shadow-lg">
                    <div class="flex justify-between" id="details">
                        <div class="p-2 mt-3 flex">
                            <span class="font-bold">Total:</span>
                            <span class="px-2">SRD 123</span>
                        </div>
                        <div class="p-2 mt-2">
                            <button class='bg-cyan-500 text-white font-[Poppins] h-8 px-6 w-full rounded-3xl
                            hover:bg-green-400 duration-500' type='submit'>
                                Confirm
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
