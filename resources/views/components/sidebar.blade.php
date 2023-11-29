
<div class="bg-white w-16 hover:w-48 duration-500">
    <div class="bg-cyan-500 w-full h-16 border-b-2 border-black">
        logo
    </div>
    <div class="bg-gray-300 border-t-2 border-black w-full h-16 mt-9 flex">
        <a class=" mt-5 ml-5" href="{{route('dashboard')}}">
            <ion-icon class="text-xl" name="home"></ion-icon>
        </a>
        <span class="mt-5 ml-6 overflow-hidden">Home</span>
    </div>
    <div class="bg-gray-300 border-t-2 border-black w-full h-16 flex">
        <a class=" mt-5 ml-5" href="{{route('users.index')}}">
            <ion-icon class="text-xl" name="people"></ion-icon>
        </a>
        <span class="mt-5 ml-6 overflow-hidden">Users</span>
    </div>
    <div class="bg-gray-300 border-t-2 border-b-2 border-black w-full h-16 flex">
        <a class=" mt-5 ml-5" href="{{route('books.index')}}">
            <ion-icon class="text-xl" name="book"></ion-icon>
        </a>
        <span class="mt-4 ml-6 overflow-hidden">Books</span>
    </div>
    <div class="bg-gray-300 border-t-2 border-b-2 border-black w-full h-16 flex">
        <a class=" mt-5 ml-5" href="{{route('subjects.index')}}">
            <ion-icon class="text-xl" name=""></ion-icon>
        </a>
        <span class="mt-4 ml-6 overflow-hidden">Subjects</span>
    </div>

    <div>
        <a class="text-xl ml-8 bg-accent py-5 px-6 rounded-full" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="" style="display:none;">
            @csrf
        </form>
    </div>
</div>
