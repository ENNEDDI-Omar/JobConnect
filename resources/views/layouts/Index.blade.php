<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body{
            background-color: #cda2f732
        }
        .header {
            background-color: white;
        }
        .sidebar {
            background-color: white;
        }

        main {
            margin-top: 50px
        }

        aside:first-of-type {
            margin-right: 0;
            margin-top: 50px;
            padding: 0
        }
        article{
            padding: 5px 100px;
        
        }
    </style>
</head>

<body>
    <header class="bg-white p-4 header bg-white  ">
        <div class="bg-white container flex justify-between h-16 mx-auto">
            <a rel="noopener noreferrer" href="#" aria-label="Back to homepage" class="bg-white flex items-center p-2">
                JOBCONNECT
            </a>
            <ul class="bg-white items-stretch hidden space-x-3 lg:flex">
                <li class="bg-white flex">
                    <a rel="noopener noreferrer" href="#"
                        class="bg-white flex items-center px-4 -mb-1 border-b-2 border-transparent text-violet-400 border-violet-400">HOME</a>
                </li>
                <li class="bg-white flex">
                    <a rel="noopener noreferrer" href="community"
                        class="bg-white flex items-center px-4 -mb-1 border-b-2 border-transparent">Community</a>
                </li>
                <li class="bg-white flex">
                    <a rel="noopener noreferrer" href="#"
                        class="bg-white flex items-center px-4 -mb-1 border-b-2 border-transparent"></a>
                </li>
                <li class="bg-white flex">
                    <a rel="noopener noreferrer" href="#"
                        class="bg-white flex items-center px-4 -mb-1 border-b-2 border-transparent">My Profile</a>
                </li>
            </ul>
            <div class="bg-white items-center flex-shrink-0 hidden lg:flex">
                <div class="bg-white hidden sm:flex sm:items-center sm:ms-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="bg-white inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                <div class="bg-white">{{Auth::user()->name}}</div>

                                <div class="bg-white ms-1">
                                    <svg class="bg-white fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>
            <button class="bg-white p-4 lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    class="bg-white w-6 h-6 text-gray-100">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                    </path>
                </svg>
            </button>
        </div>
    </header>
    
    <div class="flex flex-row">
        <aside class="bg-white sidebar w-full space-y-8 sm:w-60 dark:bg-gray-900 dark:text-gray-100 " style="width:350px;background-color: #cda2f701">
            <nav class="space-y-8 text-sm" style="width: 300px;">
                <div class="bg-white space-y-2 flex flex-col justify-center max-w-xs shadow-md rounded-xl sm:px-12 ">
                    <img src="https://demos.creative-tim.com/notus-js/assets/img/team-2-800x800.jpg" alt=""
                        class="bg-white w-32 h-32 mx-auto rounded-full dark:bg-gray-500 aspect-square">
                    <div class="bg-white space-y-4 text-center divide-y dark:divide-gray-700">
                        <div class="bg-white my-2 space-y-1">
                            <h2 class="bg-white text-xl font-semibold sm:text-2xl">{{$user->name}}</h2>
                            <p class="bg-white px-5 text-xs sm:text-base dark:text-gray-400">Full-stack developer</p>
                        </div>
                    </div>
                    <div class="bg-white space-y-2  flex" style="margin-left: -5px">
                        <lord-icon src="https://cdn.lordicon.com/prjooket.json" trigger="hover"
                            style="width:25px;height:20px"> </lord-icon>
                        <h2 class="text-sm font-semibold tracki uppercase dark:text-gray-400"
                            style="margin-top: -0.5px"> MY Items</h2>
                    </div>
                    <div class="space-y-2  flex" style="margin-left: -5px">
                        <lord-icon src="https://cdn.lordicon.com/ppyvfomi.json" trigger="hover"
                            style="width:25px;height:20px"> </lord-icon>
                        <h2 class="text-sm font-semibold tracki uppercase dark:text-gray-400"
                            style="margin-top: -0.5px">My Jobs</h2>
                    </div>
                    <div class="space-y-2">
                        <h2 class="text-sm font-semibold tracki uppercase dark:text-gray-400">Recents</h2>
                        <div class="flex flex-col space-y-1">
                            @foreach ($recentOffers as $recentOffer)
                            <a rel="noopener noreferrer" href="#">{{$recentOffer->title}}</a>
                            @endforeach
                        </div>
                    </div>
                    <div class="space-y-2">
                        <h2 class="text-sm font-semibold tracki uppercase dark:text-gray-400">Companies</h2>
                        <div class="flex flex-col space-y-1">
                            @foreach ($companies as $company)
                            <a rel="noopener noreferrer" href="#">{{$company->name}}</a>
                            @endforeach
                        </div>
                    </div>

                </div>

            </nav>
        </aside>
        @yield('main')
        <aside class="w-full p-6 sm:w-60 " style="width:450px">
            <nav class="space-y-8 text-sm">
                @yield('recruiters')        
            </nav>
        </aside>
    </div>
    <script src="https://cdn.lordicon.com/lordicon.js"></script>
   
</body>

</html>
