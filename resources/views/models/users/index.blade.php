@extends('admin-layout',[
    'pageTitle' => 'users.index'
])

@section('content')

@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show bg-green-500" role="alert">
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
    <div class="bg-lighter min-h-screen w-full flex">
        <x-sidebar/>
        <div class="w-full">
            <div class="pb-2 flex justify-end text-white bg-lighter">
                <div class="flex flex-nowrap mt-2 mr-4 md:mr-8 shadow-lg">
                    <form>
                        @csrf
                        <input
                        class="block rounded-l border-2 h-8 border-white w-32 md:w-auto text-black"
                        name="q"
                        type="text"
                        placeholder="Search"
                        />
                    </form>
                    <span class="text-md cursor-pointer bg-blue rounded-r h-8 border-2">
                        <ion-icon name="search-sharp" class="px-2 text-xl cursor-pointer h-8 text-white"></ion-icon>
                    </span>
                </div>
            </div>
            <div class="mt-4 md:mt-8 flex">
                <div class="w-[70%] h-[27rem] overflow-auto mr-4">
                    @foreach ($users as $user )
                    <div class="bg-white h-auto mx-4 md:mx-8 mb-1 rounded shadow-lg" id="product">
                        <div class="flex justify-between" id="details">
                            <div class="p-2">
                                <span class="text-xl font-bold">{{$user->firstName}} {{$user->lastName}}</span>
                                <br>
                                <span class="text-sm">{{$user->accountTypes->account_type}}</span>
                            </div>
                            <div class="h-auto flex justify-center pt-4 pe-3 space-x-5">
                                <div class="bg-cyan-500 w-10 h-10 rounded-full flex items-center justify-center cursor-pointer">
                                    <a href="{{route('users.edit', ['user' => $user])}}">
                                        <ion-icon class="text-xl mt-1" name="pencil"></ion-icon>
                                    </a>
                                </div>
                                <div class="bg-cyan-500 w-10 h-10 rounded-full flex items-center justify-center mr-2 cursor-pointer">
                                    <a href="{{route('users.show', ['user' => $user])}}">
                                        <ion-icon class="text-xl mt-1" name="eye"></ion-icon>
                                    </a>
                                </div>
                                <div class="bg-cyan-500 w-10 h-10 rounded-full flex items-center justify-center">
                                    <form method="post" action="{{ route('users.destroy', ['user' => $user]) }}"
                                        onsubmit="event.preventDefault(); deletionForm(this)" class="d-inline deletionForm">
                                        @csrf
                                        @method('DELETE')
                                        <button type='submit'>
                                            <ion-icon class="text-xl mt-1" name="trash"></ion-icon>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="border-top pt-3 pb-0 px-3">
                    {{ $users->appends($_GET)->links() }}
                    </div>
                </div>
                <div class="w-[30%]">
                    <div class='flex items-center justify-center h-[27rem] w-90 mr-4 md:mr-8 rounded bg-white shadow-xl'>
                        <form action="{{ route('users.store') }}" method="POST" autocomplete="off">
                            @csrf

                            <div class='flex flex-col mb-1'>
                                <h2 class='mb-4 text-center text-black uppercase text-xl font-[Poppins] font-semibold'>Create user</h2>
                                <input class='text-black bg-transparent focus:outline-none w-60 h-9 border-2 border-solid border-black
                                rounded-2xl p-1 text-base font-[Poppins]'
                                placeholder='                   First name' name='firstname' required/>
                                <input class='text-black bg-transparent focus:outline-none w-60 h-9 border-2 border-solid border-black
                                rounded-2xl mt-2 p-1 text-base font-[Poppins]'
                                placeholder='                   Last name' name='lastname' required/>
                                <input class='text-black bg-transparent focus:outline-none w-60 h-9 border-2 border-solid border-black
                                rounded-2xl mt-2 p-1 text-base font-[Poppins]'
                                placeholder='                   email' name='email' type='email' required/>
                                <input class='text-black bg-transparent focus:outline-none w-60 h-9 border-2 border-solid border-black
                                rounded-2xl mt-2 p-1 text-base font-[Poppins]'
                                type='password' placeholder='                   Password' name='password' required/>

                                <select class="form-select text-black bg-transparent focus:outline-none w-60 h-9 border-2 border-solid border-black
                                rounded-2xl mt-2 p-1 text-base font-[Poppins]" id="accountType" name="accountType" required>
                                    @foreach ($accountTypes as $at)
                                        <option value={{$at->id}}>{{$at->account_type}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class='flex justify-center mt-2 mr-8 w-full'>
                                <button class='bg-cyan-500 text-white font-[Poppins]  mt-4 py-2 px-6 w-full rounded-3xl
                                hover:bg-green-400 duration-500' type='submit'>
                                    Create
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
        const deletionForm = function(formElement) {
            if (!confirm('Are you sure you want to delete this User?')) {
                return false;
            }
            return formElement.submit();
        }
    </script>

@endsection
