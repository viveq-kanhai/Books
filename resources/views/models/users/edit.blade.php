@extends('public-layout',[
    'pageTitle' => 'users.edit'
])

@section('content')

<div class="bg-neutral-800 w-full h-screen">
        <x-navbar/>
        <div class="w-full flex">
            <div class="bg-red-500 min-h-screen w-[50%] flex justify-center">
                <div class='mt-28 flex items-center justify-center h-72 w-72 rounded-xl bg-white'>
                    <form>
                        <div class='flex flex-col mb-1'>
                            <h2 class='mb-4 text-center text-black uppercase text-xl font-[Poppins] font-semibold'>Update user</h2>
                            <input class='text-black bg-transparent focus:outline-none w-60 h-9 border-2 border-solid border-black
                            rounded-2xl p-1 text-base font-[Poppins]' 
                            placeholder='                   First name'/>
                            <input class='text-black bg-transparent focus:outline-none w-60 h-9 border-2 border-solid border-black
                            rounded-2xl p-1 mt-2 text-base font-[Poppins]' 
                            placeholder='                   Last name'/>
                            <input class='text-black bg-transparent focus:outline-none w-60 h-9 border-2 border-solid border-black
                            rounded-2xl p-1 mt-2 text-base font-[Poppins]' 
                            placeholder='                   Email'/>
                        </div>

                        <div class='flex justify-center mt-2 mr-8 w-full'>
                            <button class='bg-cyan-500 text-white font-[Poppins] py-2 px-6 w-full rounded-3xl
                            hover:bg-green-400 duration-500' type='button'>
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="bg-blue-500 min-h-screen w-[50%] flex justify-center">
                <div class='mt-28 flex h-72 w-72 rounded-xl bg-white'>
                    <div class="flex flex-nowrap justify-center h-10 w-full pt-2">
                        <form>
                            <input
                            class="block rounded-xl border-2 border-black h-8 w-32 md:w-auto"
                            name="search"
                            type="text"
                            placeholder="Search"
                            />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
