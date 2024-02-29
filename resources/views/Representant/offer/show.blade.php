@extends('layouts.Dash')

@section('content')
<section class="relative pt-16 bg-blueGray-50">
    <div class="container mx-auto">
        <div class="flex flex-wrap items-center">
            <div class="w-10/12 md:w-6/12 lg:w-4/12 px-12 md:px-4 mr-auto ml-auto -mt-78">
                <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded-lg bg-pink-500">
                    <img alt="Offer-Picture" src="{{ $offer->getFirstMediaUrl('offers') }}" class="w-full align-middle rounded-t-lg">
                    <blockquote class="relative p-8 mb-4">
                        <svg preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 583 95" class="absolute left-0 w-full block h-95-px -top-94-px">
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
                <a href="{{ route('recruiter.dashboard.index') }}" class="bg-gray-400 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Retour</a>
            </div>

            <div class="w-full md:w-6/12 px-4">
                <div class="flex flex-wrap">
                    <div class="w-full md:w-6/12 px-4">
                        <div class="relative flex flex-col mt-4">
                            <div class="px-4 py-5 flex-auto">
                                <div class="text-blueGray-500 p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-yellow-400">
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
                                <div class="text-blueGray-500 p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-red-600">
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
                                <div class="text-blueGray-500 p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-pink-400">
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
                                <div class="text-blueGray-500 p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-green-400">
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

                    @if ($applications->count() > 0)
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <div class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-white dark:bg-gray-900">
                            <div>
                                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th></th>
                                            <th scope="col" class="px-6 py-3">
                                                Condidat name
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Status
                                            </th> 
                                            <th scope="col" class="px-6 py-3">
                                                Date
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($applications as $application)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                            <td class="w-4 p-4">
                                                <div class="flex items-center">{{ $application->id }} </div>
                                            </td>
                                            <td class="px-6 py-4">
                                                <button data-modal-target="progress-modal" data-modal-toggle="progress-modal" class="block user-info hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-application-id="{{ $application->id }}">
                                                    {{ $application->user->name }}
                                                </button>
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="flex items-center">
                                                    <form method="POST" action="{{ route('representant.applications.updateStatus', $application->id) }}">
                                                        @csrf
                                                        @method('PUT')
                                                        <select name="status" onchange="this.form.submit()">
                                                            <option value="pending" {{ $application->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                            <option value="approved" {{ $application->status == 'approved' ? 'selected' : '' }}>Approved</option>
                                                            <option value="rejected" {{ $application->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                                        </select>
                                                    </form>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="flex items-center">
                                                     {{ $application->applied_at }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4">
                                                <form method="POST" action="{{ route('representant.applications.destroy', $application->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                                <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit user</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @else
                    <p class="text-red-600">Aucune candidature pour le moment!</p>
                    @endif
                </div>
            </div>

            <div id="progress-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <div class="modal-container flex items-center justify-center min-h-screen">
                        <div class="modal-content bg-white shadow-lg rounded-lg max-w-md w-full mx-4">
                            <div class="modal-header bg-gray-200 py-4 px-6 flex justify-between items-center">
                                <h5 class="modal-title text-lg font-bold">User Information</h5>
                                <button type="button" class="modal-close text-gray-600 hover:text-gray-800">&times;</button>
                            </div>
                            <div class="modal-body px-6 py-4">
                                <div id="userDetails"></div>
                                <div id="resumeAndCoverLetter"></div>
                            </div>
                            <div class="modal-footer bg-gray-200 py-4 px-6 flex justify-end">
                                <button type="button" class="btn btn-secondary">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<script>
    document.querySelectorAll('.user-info').forEach(item => {
        item.addEventListener('click', event => {
            const applicationId = item.getAttribute('data-application-id');
            fetch(`/representant/applications/${applicationId}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('userDetails').innerHTML = `
                        <p><strong>Name:</strong> ${data.name}</p>
                        <p><strong>Email:</strong> ${data.email}</p>
                        <p><strong>Phone:</strong> ${data.phone}</p>
                        <p><strong>Description:</strong> ${data.description}</p>
                    `;
                    document.getElementById('resumeAndCoverLetter').innerHTML = `
                        <p><strong>Resume:</strong> ${data.resume}</p>
                        <p><strong>Cover Letter:</strong> ${data.cover_letter}</p>
                    `;
                    document.getElementById('progress-modal').classList.remove('hidden');
                    document.body.classList.add('modal-open');
                    console.log(data.{{getFirstMediaUrl('resumes')}});
                })
                .catch(error => {
                    console.error('Error fetching user details:', error);
                });
        });
    });

    document.querySelectorAll('.modal-close').forEach(item => {
        item.addEventListener('click', event => {
            document.getElementById('progress-modal').classList.add('hidden');
            document.body.classList.remove('modal-open');
        });
    });

</script>

@endsection
