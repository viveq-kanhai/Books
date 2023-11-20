@extends('public-layout',[
    'pageTitle' => 'Home'
])

@section('content')

    <div class="bg-neutral-800 w-full h-screen">
        <x-navbar/>
        <div class="w-full flex justify-center">
            <div class='mt-28 flex items-center justify-center h-72 w-72 rounded-xl bg-white'>
                <form>
                    <div class='flex flex-col mb-1'>
                        <h2 class='mb-4 text-center text-black uppercase text-xl font-[Poppins] font-semibold'>Sign in</h2>
                        <input class='text-black bg-transparent focus:outline-none w-60 h-9 border-2 border-solid border-black
                        rounded-2xl p-1 text-base font-[Poppins]' 
                        placeholder='                   Username'/>
                        <input class='text-black bg-transparent focus:outline-none w-60 h-9 border-2 border-solid border-black
                        rounded-2xl mt-2 p-1 text-base font-[Poppins]' 
                        type='password' placeholder='                   Password'/>
                    </div>
                    <span class="text-xs ml-4">Remember me</span>
                    <a href="#" class="text-xs ml-8">Forgot password?</a>
                    <div class='flex justify-center mt-2 mr-8 w-full'>
                        <button class='bg-cyan-500 text-white font-[Poppins] py-2 px-6 w-full rounded-3xl
                        hover:bg-green-400 duration-500' type='button'>
                            Log in
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    @endsection
