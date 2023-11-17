@extends('public-layout',[
    'pageTitle' => 'users.index'
])

@section('content')

<div class="flex flex-col w-full bg-yellow-500">
    <div class="bg-neutral-800 h-screen w-full">
        <x-navbar/>
        <div class="mt-14 py-2 flex justify-end text-white">
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
        <div class="mt-4 md:mt-8 flex">
            <div class="w-[70%]">
                <div class="bg-white h-12 mx-4 md:mx-8 mb-1 rounded shadow-lg cursor-pointer" id="product">
                    <div class="flex justify-between" id="details">
                        <div class="text-xl font-semibold p-2">
                            firstname lastname
                        </div>
                        <div class="bg-cyan-500 w-12 h-12 rounded-r border-2">
                        <ion-icon class="text-xl pt-3 pl-3" name="pencil"></ion-icon>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-[30%]">
                <div class='flex items-center justify-center h-80 w-90 mr-4 md:mr-8 rounded bg-white'>
                    <form>
                        <div class='flex flex-col mb-1'>
                            <h2 class='mb-4 text-center text-black uppercase text-xl font-[Poppins] font-semibold'>Create user</h2>
                            <input class='text-black bg-transparent focus:outline-none w-60 h-9 border-2 border-solid border-black
                            rounded-2xl p-1 text-base font-[Poppins]' 
                            placeholder='                   First name'/>
                            <input class='text-black bg-transparent focus:outline-none w-60 h-9 border-2 border-solid border-black
                            rounded-2xl mt-2 p-1 text-base font-[Poppins]' 
                            placeholder='                   Last name'/>
                            <input class='text-black bg-transparent focus:outline-none w-60 h-9 border-2 border-solid border-black
                            rounded-2xl mt-2 p-1 text-base font-[Poppins]' 
                            type='password' placeholder='                   Password'/>
                            <input class='text-black bg-transparent focus:outline-none w-60 h-9 border-2 border-solid border-black
                            rounded-2xl mt-2 p-1 text-base font-[Poppins]' 
                            placeholder='                   User type'/>
                        </div>
                        <div class='flex justify-center mt-2 mr-8 w-full'>
                            <button class='bg-cyan-500 text-white font-[Poppins]  mt-4 py-2 px-6 w-full rounded-3xl
                            hover:bg-green-400 duration-500' type='button'>
                                Create
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection