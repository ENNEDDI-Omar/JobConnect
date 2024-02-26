@extends('layouts.dash')

@section('content')
<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
    <form method="POST" action="{{ route('admin.company.store') }}">
        @csrf

        <label class="block">
            <span class="text-gray-700">Name</span>
            <input name="name" class="block w-full mt-1 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Company Name" />
        </label>

        <label class="block mt-4">
            <span class="text-gray-700">Industry</span>
            <input name="industry" class="block w-full mt-1 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Industry" />
        </label>

        <label class="block mt-4">
            <span class="text-gray-700">Capital</span>
            <input name="capital" class="block w-full mt-1 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Capital" />
        </label>

        <label class="block mt-4">
            <span class="text-gray-700">Description</span>
            <textarea name="description" class="block w-full mt-1 dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" rows="3" placeholder="Company Description"></textarea>
        </label>

        <label class="block mt-4">
            <span class="text-gray-700">Location</span>
            <input name="location" class="block w-full mt-1 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Location" />
        </label>

        <label class="block mt-4">
            <span class="text-gray-700">Recruiter</span>
            <select name="recruiter_id" class="block w-full mt-1 dark:text-gray-300 border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                <option value="">Select Recruiter</option>
                @foreach ($recruiters as $recruiter)
                    <option value="{{ $recruiter->id }}">{{ $recruiter->name }}</option>
                @endforeach
            </select>
        </label>

        <label class="block mt-4">
            <span class="text-gray-700">Representative</span>
            <select name="representative_id" class="block w-full mt-1 dark:text-gray-300 border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                <option value="">Select Representative</option>
                @foreach ($representatives as $representative)
                    <option value="{{ $representative->id }}">{{ $representative->name }}</option>
                @endforeach
            </select>
        </label>

        <button type="submit" class="mt-4 px-4 py-2 bg-purple-600 text-white rounded-lg focus:outline-none focus:shadow-outline-purple">Create Company</button>
    </form>
</div>
@endsection
