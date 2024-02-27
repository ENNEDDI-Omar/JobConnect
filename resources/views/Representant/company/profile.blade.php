<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@^2.2.19/dist/tailwind.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
<style>
    body{
        background-color: #cda2f732
    }
</style>
</head>
<body>
    <div class="space-y-12 ">
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
        <section>
            <div class="container flex flex-col items-center px-4 py-8 mx-auto text-center md:px-10 lg:px-32 xl:max-w-3xl">
                <h1 class="text-4xl font-bold leadi sm:text-5xl">{{$company->name}}</h1>
                <p class="px-8 mt-8 mb-12 text-lg">{{$company->description}}</p>
                <div class="flex flex-wrap justify-center">
                    <button class="px-8 py-3 m-2 text-lg font-semibold rounded dark:bg-blue-400 dark:text-gray-900">Get started</button>
                    <button class="px-8 py-3 m-2 text-lg border rounded dark:text-gray-50 dark:border-gray-700">Learn more</button>
                </div>
            </div>
        </section>
        <section class="p-6 dark:bg-gray-800 dark:text-gray-100">
            <div class="container grid justify-center grid-cols-2 mx-auto text-center lg:grid-cols-3">
                <div class="flex flex-col justify-start m-2 lg:m-6">
                    <p class="text-4xl font-bold leadi lg:text-6xl">50+</p>
                    <p class="text-sm sm:text-base">Clients</p>
                </div>
                <div class="flex flex-col justify-start m-2 lg:m-6">
                    <p class="text-4xl font-bold leadi lg:text-6xl">89K</p>
                    <p class="text-sm sm:text-base">Followers on social media</p>
                </div>
                <div class="flex flex-col justify-start m-2 lg:m-6">
                    <p class="text-4xl font-bold leadi lg:text-6xl">3</p>
                    <p class="text-sm sm:text-base">Published books</p>
                </div>
                <div class="flex flex-col justify-start m-2 lg:m-6">
                    <p class="text-4xl font-bold leadi lg:text-6xl">8</p>
                    <p class="text-sm sm:text-base">TED talks</p>
                </div>
                <div class="flex flex-col justify-start m-2 lg:m-6">
                    <p class="text-4xl font-bold leadi lg:text-6xl">22</p>
                    <p class="text-sm sm:text-base">Years of experience</p>
                </div>
                <div class="flex flex-col justify-start m-2 lg:m-6">
                    <p class="text-4xl font-bold leadi lg:text-6xl">10+</p>
                    <p class="text-sm sm:text-base">Workshops</p>
                </div>
            </div>
        </section>
        

        <section style="margin-left: 200px">
            <div class="container max-w-6xl p-6 space-y-6 sm:space-y-12">
                <a rel="noopener noreferrer" href="#" class="block max-w-sm gap-3 mx-auto sm:max-w-full group hover:no-underline focus:no-underline lg:grid lg:grid-cols-12 dark:bg-gray-900">
                    <img src="https://source.unsplash.com/random/480x360" alt="Website Design System" class="object-cover w-full h-64 rounded sm:h-96 lg:col-span-7 dark:bg-gray-500">
                    <div class="p-6 space-y-2 lg:col-span-5">
                        <h3 class="text-2xl font-semibold sm:text-4xl group-hover:underline group-focus:underline">Noster tincidunt reprimique ad pro</h3>
                        <span class="text-xs dark:text-gray-400">February 19, 2021</span>
                        <p>Ei delenit sensibus liberavisse pri. Quod suscipit no nam. Est in graece fuisset, eos affert putent doctus id.</p>
                    </div>
                </a>
                <div class=" grid justify-center grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($offers as $offer)
                        <a rel="noopener noreferrer" href="#" class="max-w-sm mx-auto group hover:no-underline focus:no-underline dark:bg-gray-900">
                            <img role="presentation" class="object-cover w-full rounded h-44 dark:bg-gray-500" src="https://source.unsplash.com/random/480x360?1">
                            <div class="p-6 space-y-2">
                                <h3 class="text-2xl font-semibold group-hover:underline group-focus:underline">In usu laoreet repudiare legendos</h3>
                                <span class="text-xs dark:text-gray-400">January 21, 2021</span>
                                <p>Mei ex aliquid eleifend forensibus, quo ad dicta apeirian neglegentur, ex has tantas percipit perfecto. At per tempor albucius perfecto, ei probatus consulatu patrioque mea, ei vocent delicata indoctum pri.</p>
                            </div>
                        </a>
                    @endforeach
                    
                    
                </div>
                <div class="flex justify-center">
                    <button class="px-6 py-3 text-sm rounded-md hover:underline dark:bg-gray-900 dark:text-gray-400">Load more offers...</button>
                </div>
            </div>
        </section>
        <section>
             <div class="container px-6 py-12 mx-auto">
                <div class="grid items-center gap-4 xl:grid-cols-5">
                    <div class="max-w-2xl mx-auto my-8 space-y-4 text-center xl:col-span-2 xl:text-left">
                        <h2 class="text-4xl font-bold">Testimonials</h2>
                        <p class="dark:text-gray-400">Pri ex magna scaevola moderatius. Nullam accommodare no vix, est ei diceret alienum, et sit cetero malorum. Et sea iudico consequat, est sanctus adipisci ex.</p>
                    </div>
                    <div class="p-6 xl:col-span-3">
                        <div class="grid gap-4 md:grid-cols-2">
                            @php $testimonialsChunked = $company->testimonials->chunk(2); @endphp
                            @foreach ($testimonialsChunked as $chunk)
                                <div class="grid content-center gap-4">
                                    @foreach ($chunk as $testimonial)
                                        <div class="p-6 rounded shadow-md dark:bg-gray-900">
                                            <p>{{ $testimonial->message }}</p>
                                            <div class="flex items-center mt-4 space-x-4">
                                                <!-- Assuming there's a relation to the user who authored the testimonial -->
                                                <img src="{{-- {{ $testimonial->Author->profile_image_url }} --}}" alt="" class="w-12 h-12 bg-center bg-cover rounded-full dark:bg-gray-500">
                                                <div>
                                                    <p class="text-lg font-semibold">{{ $testimonial->author}}</p>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                            
                        </div>
                    </div>
                </div>
            </div> 
        </section>
        
        
    </div>
</body>
</html>