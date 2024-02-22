@extends('layouts.Index')
@section('main')
<main>
    <div class="max-w-2xl px-6 py-16 mx-auto space-y-12 ">
        @foreach ($offers as $offer)
        <article class="space-y-8 bg-white  ">
            <div class="space-y-6">
                <div class="flex justify-between">
                    <a href="{{ route('user.offers.show', $offer->id) }}" class="text-4xl font-bold md:tracking md:text-3xl">{{ $offer->title }}</a>
                    <span class="px-3 py-1 rounded-sm hover:underline text-violet-600">#{{ $offer->category->name }}</span>
                </div>
                
                
                <div
                    class="flex flex-col items-start justify-between w-full md:flex-row md:items-center text-gray-400">
                    <div class="flex items-center md:space-x-2">
                        <img src="https://source.unsplash.com/75x75/?portrait" alt=""
                            class="w-4 h-4 border rounded-full bg-gray-500 border-gray-700">
                        <p class="text-sm">{{$offer->user->name}}  • {{$offer->created_at}} </p>
                    </div>
                </div>
            </div>
            <div class="dark:text-gray-100">
                <p>{{$offer->description}} </p>
            </div>
            <div style="margin-bottom: 50px" class="bg-white">
                <div class="flex flex-wrap py-6 gap-2 border-t border-dashed border-gray-400">
                    @foreach ($offer->skills as $skill)
                        <span 
                        class="px-3 py-1 rounded-sm hover:underline bg-violet-400 text-gray-900">{{$skill->name}} </span>
                    @endforeach
                </div>
                <div class="space-y-2">
                    <h4 class="text-lg font-semibold">Other infos</h4>
                    <ul class="ml-4 space-y-1 list-disc">
                        <li>
                            <span class="hover:underline">Experience:{{$offer->experience}} </span>
                        </li>
                        <li>
                            <span class="hover:underline">Salary:{{$offer->salary}} </span>
                        </li>
                        <li>
                            <span class="hover:underline">Contract type:{{$offer->contract_type}} </span>
                        </li>
                        <li>
                            <span class="hover:underline">Location:{{$offer->location}} </span>
                        </li>
                    </ul>
                </div>
            </div>
        </article>
        
        @endforeach
        
        
    </div>
</main>
@endsection


@section('recruiters')
@foreach ($recruiters as $recruiter)
<div class="max-w-md p-8 sm:flex sm:space-x-6 bg-white dark:text-gray-100">
    <div class="flex-shrink-0 w-full mb-6 h-44 sm:h-32 sm:w-32 sm:mb-0">
        <img src="https://source.unsplash.com/100x100/?portrait?1" alt=""
            class="object-cover object-center w-full h-full rounded dark:bg-gray-500">
    </div>
    <div class="flex flex-col space-y-4">
        <div>
            <h2 class="text-2xl font-semibold">{{$recruiter->name}}</h2>
            <span class="text-sm dark:text-gray-400">General manager</span>
        </div>
        <div class="space-y-1">
            <span class="flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                    aria-label="Email address" class="w-4 h-4">
                    <path fill="currentColor"
                        d="M274.6,25.623a32.006,32.006,0,0,0-37.2,0L16,183.766V496H496V183.766ZM464,402.693,339.97,322.96,464,226.492ZM256,51.662,454.429,193.4,311.434,304.615,256,268.979l-55.434,35.636L57.571,193.4ZM48,226.492,172.03,322.96,48,402.693ZM464,464H48V440.735L256,307.021,464,440.735Z">
                    </path>
                </svg>
                <span class="dark:text-gray-400">{{$recruiter->email}}</span>
            </span>
            <span class="flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                    aria-label="Phonenumber" class="w-4 h-4">
                    <path fill="currentColor"
                        d="M449.366,89.648l-.685-.428L362.088,46.559,268.625,171.176l43,57.337a88.529,88.529,0,0,1-83.115,83.114l-57.336-43L46.558,362.088l42.306,85.869.356.725.429.684a25.085,25.085,0,0,0,21.393,11.857h22.344A327.836,327.836,0,0,0,461.222,133.386V111.041A25.084,25.084,0,0,0,449.366,89.648Zm-20.144,43.738c0,163.125-132.712,295.837-295.836,295.837h-18.08L87,371.76l84.18-63.135,46.867,35.149h5.333a120.535,120.535,0,0,0,120.4-120.4v-5.333l-35.149-46.866L371.759,87l57.463,28.311Z">
                    </path>
                </svg>
                <span class="dark:text-gray-400">{{$recruiter->phone}}</span>
            </span>
        </div>
    </div>
</div>
@endforeach
@endsection