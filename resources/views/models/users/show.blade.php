@extends('admin-layout',[
    'pageTitle' => 'users.view'
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
    <div class="bg-neutral-800 min-h-screen w-full flex">
        <x-sidebar/>
        <div class="w-full">
            <div class="mt-4 py-2 flex justify-between text-white">
                <div class="w-96 h-8 mt-1 ml-8">
                    <span class="text-white text-xl font-semibold">{{$user->firstName}} {{$user->lastName}}</span>
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
                    @foreach ($books as $book)

                    <div class="bg-white h-auto mx-4 md:mx-8 mb-1 rounded shadow-lg" id="product">
                        <div class="flex justify-between" id="details">
                            <div class="p-2">
                                <span class="text-xl font-bold">{{$book->title}}</span>
                                <br>
                                <span class="text-sm">Author: {{$book->author}}</span>
                                <br>
                                <span class="text-sm">Subject: {{$book->subject->subject}}</span>
                            </div>
                            <div class="w-20 h-auto flex justify-center pt-7">
                                <div class="bg-cyan-500 w-10 h-10 rounded-full flex items-center justify-center">
                                    <form method="post" action="{{ route('bookUsers.destroy', ['user' => $user, 'book' => $book]) }}"
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
                    {{ $books->appends($_GET)->links() }}
                </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    const deletionForm = function(formElement) {
        if (!confirm('Are you sure you want to delete this book from the user\'s library?')) {
            return false;
        }
        return formElement.submit();
    }
</script>

@endsection
