@extends('admin-layout',[
    'pageTitle' => 'users.edit'
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
                <form action="{{ route('users.update', ['user' => $user]) }}" method="POST" autocomplete="off">
                @csrf
                @method('PUT')
                    <div class='flex flex-col mb-1'>
                        <h2 class='mb-4 text-center text-black uppercase text-xl font-[Poppins] font-semibold'>Edit user</h2>
                        <input class='text-black bg-transparent focus:outline-none w-60 h-9 border-2 border-solid border-black
                        rounded-2xl p-1 text-base font-[Poppins]'
                        placeholder='                   First name' name='firstname' required value="{{$user->firstName}}"/>
                        <input class='text-black bg-transparent focus:outline-none w-60 h-9 border-2 border-solid border-black
                        rounded-2xl mt-2 p-1 text-base font-[Poppins]'
                        placeholder='                   Last name' name='lastname' required value="{{$user->lastName}}"/>
                        <input class='text-black bg-transparent focus:outline-none w-60 h-9 border-2 border-solid border-black
                        rounded-2xl mt-2 p-1 text-base font-[Poppins]'
                        placeholder='                   email' name='email' type='email' required value="{{$user->email}}"/>
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
                @foreach ($books as $book)
                <div class="bg-white h-auto w-96 mb-1 rounded shadow-lg" id="product">
                    <div class="flex justify-between " id="details">

                        <div class="p-2">
                            <span class="text-xl font-bold">{{$book->title}}</span>
                            <br>
                            <span class="text-sm">Author: {{$book->author}} </span>
                            <br>
                            <span class="text-sm">Price: {{$book->price}} </span>
                            <br>
                            <span class="text-sm">Subject: {{$book->subject->subject}} </span>
                        </div>
                        <div class="w-20 h-auto flex justify-center pt-9">
                            <button class="bg-cyan-500 w-10 h-10 rounded-full flex items-center justify-center"
                                {{in_array($book->id, $userBookIds) ? 'disabled' : ''}} style="{{ in_array($book->id, $userBookIds) ? 'opacity: 0.3;' : '' }}"
                                x-on:click="addItem({{$book->id}})"
                                >
                                <ion-icon class="text-xl" name="add-circle"></ion-icon>
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
                 <div class="border-top pt-3 pb-0 px-3">
                    {{ $books->appends($_GET)->links() }}
                </div>
            </div>
        </div>
        <div class="w-[50%] flex flex-col">
            <div class="mt-8 mb-2 h-[80%] rounded overflow-auto">
                <template x-data x-for="book in cartItems">
                    <div class="bg-white h-auto mx-4 md:mx-8 mb-1 rounded shadow-lg" id="product">
                        <div class="flex justify-between" id="details">
                            <div class="p-2">
                                <span class="text-xl font-bold" x-text="book.title"></span>
                                <br>
                                <span class="text-sm">Author: <span x-text='book.author'></span> </span>
                                <br>
                                <span class="text-sm">Price: SRD <span x-text='book.price'></span></span>
                                <br>
                                <span class="text-sm">Subject: <span x-text='book.subject.subject'></span> </span>
                            </div>
                            <button class="w-20 h-auto flex justify-center pt-9"
                            x-on:click="removeItem(book.id)">
                                <div class="bg-cyan-500 w-10 h-10 rounded-full cursor-pointer flex items-center justify-center">
                                    <ion-icon class="text-xl" name="trash"></ion-icon>
                                </div>
                            </button>
                        </div>
                    </div>

                </template>
            </div>
            <div class="h-16">
                <form id='booksForm' action="{{ route('bookUsers.store', ['user' => $user]) }}" method="POST" autocomplete="off">
                    @csrf

                    <input type="hidden" name="cartItems" id="cartItemsInput" type="text" x-model="JSON.stringify(cartItems)">
                    <input type="hidden" name="totalPrice" id="totalPrice" type="text" x-model="totalPrice()">

                    <div class="bg-white h-16 w-[88%] mx-4 md:mx-8 mb-1 rounded shadow-lg">
                        <div class="flex justify-between" id="details">
                            <div class="p-2 mt-3 flex">
                                <span class="font-bold">Total:</span>
                                <span class="px-2">SRD <span x-text="totalPrice()"></span></span>
                            </div>
                            <div class="p-2 mt-2">
                                <button class='bg-cyan-500 text-white font-[Poppins] h-8 px-6 w-full rounded-3xl
                                hover:bg-green-400 duration-500' type='submit'>
                                    Confirm
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>


<script>

    document.addEventListener('alpine:init', () => {
        Alpine.data('all', ()=>({
                cartItems: [],
                allBooks: @json($allBooks),
                formCart: JSON.stringify(this.cartItems),
                addItem(id){
                    const book = this.allBooks.find(book => book.id === id);

                    if (book && !this.cartItems.includes(book)) {
                        this.cartItems.push(book);
                    };
                    console.log(this.cartItems);
                },
                removeItem(id){
                    const book = this.cartItems.find(book => book.id === id);

                    if (book && this.cartItems.includes(book)) {
                        this.cartItems = this.cartItems.filter(book => book.id !== id)
                    };
                    // console.log(this.cartItems);
                },
                totalPrice(){
                    total = 0;
                    this.cartItems.forEach(book => {
                        total += parseFloat(book.price);
                    });
                    return Math.floor(total * 100)/100;
                    // return total;
                },

        }));
    //       document.getElementById('booksForm').addEventListener('submit', function() {
    //     document.getElementById('cartItemsInput').value = JSON.stringify(this.cartItems);
    // });
    });



</script>

@endsection
