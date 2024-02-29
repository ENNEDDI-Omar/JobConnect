@extends('layouts.Dash')
@section('content')
    <section class="relative pt-16 bg-blueGray-50">
        <div class="container mx-auto">
            <div class="flex flex-wrap items-center">
                <div class="w-10/12 md:w-6/12 lg:w-4/12 px-12 md:px-4 mr-auto ml-auto -mt-78">
                    <div
                        class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded-lg bg-pink-500">
                        <img alt="Offer-Picture" src="{{ $offer->getFirstMediaUrl('offers') }}"
                            class="w-full align-middle rounded-t-lg">
                        <blockquote class="relative p-8 mb-4">
                            <svg preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 583 95"
                                class="absolute left-0 w-full block h-95-px -top-94-px">
                                <polygon points="-30,95 583,95 583,65" class="text-pink-500 fill-current"></polygon>
                            </svg>
                            <h4 class="text-xl font-bold text-white">
                                {{ $offer->title }}
                            </h4>
                            <p class="text-md font-light mt-2 text-white">
                                {{ $offer->description }}
                            </p>
                        </blockquote>
                    </div>
                    <a href="{{ route('recruiter.dashboard.index') }}"
                        class="bg-gray-400 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Retour</a>
                </div>

                <div class="w-full md:w-6/12 px-4">
                    <div class="flex flex-wrap">
                        <div class="w-full md:w-6/12 px-4">
                            <div class="relative flex flex-col mt-4">
                                <div class="px-4 py-5 flex-auto">
                                    <div
                                        class="text-blueGray-500 p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-yellow-400">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <h6 class="text-xl mb-1 font-semibold">LOCATION:</h6>
                                    <p class="mb-4 text-blueGray-500">
                                        {{ $offer->location }}
                                    </p>
                                </div>
                            </div>
                            <div class="relative flex flex-col min-w-0">
                                <div class="px-4 py-5 flex-auto">
                                    <div
                                        class="text-blueGray-500 p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-red-600">
                                        <i class="fas fa-briefcase"></i>
                                    </div>
                                    <h6 class="text-xl mb-1 font-semibold">
                                        EXPERIENCES:
                                    </h6>
                                    <p class="mb-4 text-blueGray-500">
                                        {{ $offer->experience }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="w-full md:w-6/12 px-4">
                            <div class="relative flex flex-col min-w-0 mt-4">
                                <div class="px-4 py-5 flex-auto">
                                    <div
                                        class="text-blueGray-500 p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-pink-400">
                                        <i class="fas fa-file-contract"></i>
                                    </div>
                                    <h6 class="text-xl mb-1 font-semibold">CONTRACT:</h6>
                                    <p class="mb-4 text-blueGray-500">
                                        {{ $offer->contract_type }}
                                    </p>
                                </div>
                            </div>
                            <div class="relative flex flex-col min-w-0">
                                <div class="px-4 py-5 flex-auto">
                                    <div
                                        class="text-blueGray-500 p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-green-400">
                                        <i class="fas fa-money-bill-wave"></i>
                                    </div>
                                    <h6 class="text-xl mb-1 font-semibold">SALARY:</h6>
                                    <p class="mb-4 text-blueGray-500">
                                        {{ $offer->salary }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-8">
                        <h2 class="text-2xl font-bold mb-4">Candidatures:</h2>
            
                        @if ($offerApplications->count() > 0)
                            <ul>
                                @foreach ($offerApplications as $application)
                                    <li class="mb-4">
                                        <h3 class="text-lg font-semibold">{{ $application->user_id->name }}</h3>
                                        <p>{{ $application->cover_letter }}</p>
                                        
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-red-600">Aucune candidature pour le moment!</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
      
    </section>
@endsection
