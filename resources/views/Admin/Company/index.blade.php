@extends('layouts.Dash')

@section('content')
<main class="h-full pb-16 overflow-y-auto">
    <div class="container grid px-6 mx-auto">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-lg font-semibold text-gray-700">Companies</h2>
            <a href="{{ route('admin.company.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Add Company</a>
        </div>
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Name</th>
                            <th class="px-4 py-3">Industry</th>
                            <th class="px-4 py-3">Capital</th>
                            <th class="px-4 py-3">Representative</th>
                            <th class="px-4 py-3">Recruiter</th>
                            <th class="px-4 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach ($companies as $company)
                        <tr class="text-gray-700 dark:text-gray-400" data-company-id="{{ $company->id }}">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                        <img class="object-cover w-full h-full rounded-full" src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ" alt="" loading="lazy" />
                                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                    </div>
                                    <div>
                                        <p class="font-semibold">{{ $company->name }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3">{{ $company->industry }}</td>
                            <td class="px-4 py-3 text-sm">$ {{ $company->capital }}</td>
                            <td class="px-4 py-3 text-xs">
                                @if ($company->representative)
                                {{ $company->representative->name }}
                                @else
                                <button class="assignButton bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded focus:outline-none focus:shadow-outline">Assign</button>
                                @endif
                            </td>

                            <td class="px-4 py-3 text-xs">
                                @if ($company->recruiter)
                                {{ $company->recruiter->name }}
                                @else
                                <button class="assignButton bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded focus:outline-none focus:shadow-outline">Assign</button>
                                @endif
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-4 text-sm">
                                    <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                        </svg>
                                    </button>
                                    <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Delete">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection


@section('modal')
<div id="userSelectionModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
    <!-- Modal content -->
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <!-- Background overlay -->
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <!-- Modal Panel -->
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="text-center sm:text-left">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">Select a User to Assign</h3>
                        
                        <div id="userList">
                            <select id="userSelect" class="block w-full mt-2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                <option value="">Select a user</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button id="assignUserButton" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:ml-3 sm:w-auto sm:text-sm">
                    Assign User
                </button>
                <button type="button" id="closeModal" class="w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:ml-3 sm:w-auto sm:text-sm">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
            var modal = document.getElementById('userSelectionModal');
            var closeModal = document.getElementById('closeModal');
            var assignUserButton = document.getElementById('assignUserButton');
            var userSelect = document.getElementById('userSelect');
            var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content')

            document.querySelectorAll('.assignButton').forEach(item => {
                item.addEventListener('click', function() {
                    modal.dataset.companyId = item.closest('tr').dataset.companyId;
                    modal.classList.remove('hidden');
                });
            });

            closeModal.addEventListener('click', function() {
                modal.classList.add('hidden');
            });

            assignUserButton.addEventListener('click', function() {
                var companyId = modal.dataset.companyId;
                var userId = userSelect.value;

                // Make sure both company ID and user ID are valid
                if (!companyId || !userId) {
                    console.error('Company ID or User ID is missing');
                    return;
                }

                // Prepare the data to send in the AJAX request
                var data = {
                    companyId: companyId,
                    userId: userId
                };

                // Send the AJAX request
                fetch('/companiesUpdate/' + companyId, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken,
                        },
                        body: JSON.stringify(data)
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        // Assuming the response contains JSON data indicating success/failure
                        return response.json();
                    })
                    .then(data => {
                        // Handle the response from the server
                        console.log('Assignment successful:', data);
                        // You might want to update the UI to reflect the assignment
                    })
                    .catch(error => {
                        console.error('There was a problem with the fetch operation:', error);
                        // Handle errors or display error messages to the user
                    });

                // Close the modal
                modal.classList.add('hidden');
            });
        });


</script>
@endsection