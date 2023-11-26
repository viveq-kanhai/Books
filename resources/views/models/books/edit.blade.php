@extends('admin-layout',[
    'pageTitle' => 'books.edit'
])

@section('content')


 @if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        <strong>Success!</strong> {{ Session::get('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="flex w-full min-h-screen bg-neutral-800" x-data="all">
    <x-sidebar/>
    <div class="w-full flex">
        <div class="w-[50%]">
            <div class='flex items-center justify-center h-64 w-96 ml-20 mt-8 rounded bg-white'>
                <form action="{{ route('books.update', ['book' => $book]) }}" method="POST" autocomplete="off">
                @csrf
                @method('PUT')
                    <div class='flex flex-col mb-1'>
                        <h2 class='mb-4 text-center text-black uppercase text-xl font-[Poppins] font-semibold'>Edit book</h2>
                        <input class='text-black bg-transparent focus:outline-none w-60 h-9 border-2 border-solid border-black
                        rounded-2xl p-1 text-base font-[Poppins]'
                        placeholder='                   Title' name='title' required value="{{$book->title}}"/>
                        <input class='text-black bg-transparent focus:outline-none w-60 h-9 border-2 border-solid border-black
                        rounded-2xl mt-2 p-1 text-base font-[Poppins]'
                        placeholder='                   Author' name='author' required value="{{$book->author}}"/>
                        <input class='text-black bg-transparent focus:outline-none w-60 h-9 border-2 border-solid border-black
                        rounded-2xl mt-2 p-1 text-base font-[Poppins]'
                        placeholder='                   email' name='price' type='text' required value="{{$book->price}}"/>
                        <input class='text-black bg-transparent focus:outline-none w-60 h-9 border-2 border-solid border-black
                        rounded-2xl mt-2 p-1 text-base font-[Poppins]'
                        placeholder='                   File path' name='filePath' required value={{$book->file_path}}/>
                        <select class='text-black bg-transparent focus:outline-none w-60 h-9 border-2 border-solid border-black
                        rounded-2xl mt-2 p-1 text-base font-[Poppins]' name='subject' required>
                            @foreach ($subjects as $sub)
                                <option value={{$sub->id}}>{{$sub->subject}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class='flex justify-center mt-2 mr-8 w-full'>
                        <button class='bg-cyan-500 text-white font-[Poppins]  mt-4 py-2 px-6 w-full rounded-3xl
                        hover:bg-green-400 duration-500' type='submit'>
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
