<div class="flex justify-between px-4 py-2 shadow-xl bg-white fixed h-14 w-full top-0 left-0">
            <div class="text-xl text-darkblue font-semibold pb-0 flex items-center cursor-pointer">
                Logo
            </div>
            <ul class="flex items-center pb-0 static text-darkblue">
                <li class="text-md md:text-xl ml-2 md:ml-8 cursor-pointer font-normal md:font-semibold @if (Route::is('home')) text-blue @endif"><a href = {{route('home')}}>Home</a></li>
                <li class="text-md md:text-xl ml-2 md:ml-8 cursor-pointer font-normal md:font-semibold @if (Route::is('allBooks')) text-blue @endif"><a href = {{route('allBooks')}}>All Books</a></li>
                <li class="text-md md:text-xl ml-2 md:ml-8 cursor-pointer font-normal md:font-semibold @if (Route::is('library')) text-blue @endif"><a href = {{route('library')}}>My Library</a></li>
                <!-- <li> <button class="text-xl ml-8 bg-accent py-2 px-6 rounded-full">Sign out</button> </li> -->
                <a class="text-xl ml-8 bg-accent py-2 px-6 rounded-full" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <ion-icon name="settings-sharp" class="text-md md:text-xl ml-2 md:ml-8 pt-1 cursor-pointer"></ion-icon>
            </ul>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="" style="display:none;">
                    @csrf
                </form>
        </div>
