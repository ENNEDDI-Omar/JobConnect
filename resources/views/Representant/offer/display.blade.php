@extends('layouts.Dash')

@section('content')

<div class="flex justify-end mb-4">
    <a href="{{ route('representant.offers.create') }}"
        class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Créer un Offer</a>
</div>
<section class="flex flex-row flex-wrap mx-auto">


    @foreach ($offers as $offer)
        <div class="transition-all duration-150 flex w-full px-4 py-6 md:w-1/2 lg:w-1/3">

            <div
                class="flex flex-col items-stretch min-h-full pb-4 mb-6 transition-all duration-150 bg-white rounded-lg shadow-lg hover:shadow-2xl">
                <a href="{{ route('representant.offers.show', $offer) }}" class="w-full">
                    <div class="md:flex-shrink-0">
                        <img src="{{ $offer->getFirstMediaUrl('offers') }}" alt="Picture"
                            class="object-fill w-full rounded-lg rounded-b-none md:h-56" />
                    </div>
                    <div class="flex items-center justify-between px-4 py-2 overflow-hidden">
                        <span class="text-xs font-medium text-blue-600 uppercase">
                            {{ $offer->category->name }}
                        </span>
                        
                    </div>
                    <hr class="border-gray-300" />
                    <div class="flex flex-wrap items-center flex-1 px-4 py-1 text-center mx-auto">
                        <a href="#" class="hover:underline">
                            <h2 class="text-2xl font-bold tracking-normal text-gray-800">
                                {{ $offer->title }}
                            </h2>
                        </a>
                    </div>
                    <hr class="border-gray-300" />
                    <p
                        class="flex flex-row flex-wrap w-full px-4 py-2 overflow-hidden text-sm text-justify text-gray-700">
                        {{ $offer->description }}
                    </p>
                </a>
                <hr class="border-gray-300" />
                <section class="px-4 py-2 mt-2">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center flex-1">
                            <img class="object-cover h-10 rounded-full"
                                src="{{ $offer->user->getFirstMediaUrl('profils') }}" alt="Avatar" />
                            <div class="flex flex-col mx-2">
                                <a href="" class="font-semibold text-gray-700 hover:underline">
                                    {{ $offer->user->name }}
                                </a>
                                <span class="mx-1 text-xs text-gray-600">{{ $offer->created_at }}</span>
                            </div>
                        </div>
                        <p class="mt-1 text-xs text-gray-600">{{ $offer->contract_type }}</p>
                    </div>
                    <div class="flex items-center justify-between px-4 py-2 overflow-hidden">
                        
                        <a href="{{ route('representant.offers.edit', $offer) }}"
                            class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Modifier</a>

                       
                        <form action="{{ route('representant.offers.destroy', $offer) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Supprimer</button>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    @endforeach

</section>
    
@endsection