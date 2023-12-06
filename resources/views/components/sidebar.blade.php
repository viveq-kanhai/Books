
<div class="bg-teal w-16 hover:w-48 duration-500">
    <div class="bg-cyan-500 w-full h-16 border-b-2 border-black">
        logo
    </div>
    <div class="text-white font-calistoga overflow-hidden font-bold text-lg border-t-2 border-black w-full h-16 mt-9 flex">
        <a class="flex items-center justify-center ml-5" href="{{route('dashboard')}}">
            <ion-icon class="text-xl" name="home"></ion-icon>
            <span class="ml-6 overflow-hidden">Home</span>
        </a>
    </div>
    <div class="text-white font-calistoga overflow-hidden font-bold text-lg border-t-2 border-black w-full h-16 flex">
        <a class="flex items-center justify-center ml-5" href="{{route('users.index')}}">
            <ion-icon class="text-xl" name="people"></ion-icon>
            <span class=" ml-6 overflow-hidden">Users</span>
        </a>
    </div>
    <div class="text-white font-calistoga overflow-hidden font-bold text-lg border-t-2 border-b-2 border-black w-full h-16 flex">
        <a class="flex items-center justify-center ml-5" href="{{route('books.index')}}">
            <ion-icon class="text-xl" name="book"></ion-icon>
            <span class=" ml-6 overflow-hidden">Books</span>
        </a>
    </div>
    <div class="text-white font-calistoga overflow-hidden font-bold text-lg border-b-2 border-black w-full h-16 flex">
        <a class="flex items-center justify-center ml-5" href="{{route('subjects.index')}}">
            <ion-icon class="text-xl" name=""></ion-icon>
            <span class=" ml-6 overflow-hidden">Subjects</span>
        </a>
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
