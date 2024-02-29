@extends('layouts.Dash')

@section('content')
    <div class="flex justify-center">
        <div class="w-full max-w-md">
            <form action="{{ route('representant.offers.store') }}" method="post" enctype="multipart/form-data"
                class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth::id() }}">

                <div class="mb-4">
                    <label for="picture" class="block text-gray-700 text-sm font-bold mb-2">Image de l'offre</label>
                    <input type="file" name="picture" id="picture"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        required>
                    @error('picture')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Titre de l'offre</label>
                    <input type="text" name="title" id="title"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('title') border-red-500 @enderror"
                        required>
                    @error('title')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description de
                        l'offre</label>
                    <textarea name="description" id="description" rows="4"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        required></textarea>
                    @error('description')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="category" class="block text-gray-700 text-sm font-bold mb-2">Catégorie de l'offre</label>
                    <select name="category_id" id="category"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>


                <div class="mb-4">
                    <label for="location" class="block text-gray-700 text-sm font-bold mb-2">Location</label>
                    <input type="text" name="location" id="location"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('location') border-red-500 @enderror"
                        required>
                    @error('location')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="salary" class="block text-gray-700 text-sm font-bold mb-2">Salaire</label>
                    <input type="text" name="salary" id="salary"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('salary') border-red-500 @enderror"
                        required>
                    @error('salary')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>


                <div class="mb-4">
                    <label for="contract_type" class="block text-gray-700 text-sm font-bold mb-2">Type de contrat</label>
                    <input type="text" name="contract_type" id="contract_type"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('contract_type') border-red-500 @enderror"
                        required>
                    @error('contract_type')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="experience" class="block text-gray-700 text-sm font-bold mb-2">Expérience requise</label>
                    <input type="text" name="experience" id="experience"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('experience') border-red-500 @enderror"
                        required>
                    @error('experience')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-center gap-3">
                    <button type="submit"
                        class="bg-green-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline hover:bg-green-600">
                        Créer l'offre
                    </button>
                    <a href="{{ route('representant.offers.index') }}"
                        class="bg-gray-400 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Annuler</a>
                </div>

            </form>
        </div>
    </div>
@endsection
