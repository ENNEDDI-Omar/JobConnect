@extends('layouts.Index')
@section('main')

    <main>
        <div class="max-w-2xl px-6 py-16 mx-auto space-y-12 ">
            <form id="searchForm">
                <input type="text" id="queryInput" placeholder="Search offers...">
                <button type="submit">Search</button>
            </form>
        <div id="searchResults">
            @foreach ($offers as $offer)
                <article class="space-y-8 bg-white  ">
                    <div class="space-y-6">
                        <div class="flex justify-between">
                            <a href="{{ route('user.offers.show', $offer->id) }}"
                                class="text-4xl font-bold md:tracking md:text-3xl">{{ $offer->title }}</a>
                            <span
                                class="px-3 py-1 rounded-sm hover:underline text-violet-600">#{{ $offer->category->name }}</span>
                        </div>


                        <div
                            class="flex flex-col items-start justify-between w-full md:flex-row md:items-center text-gray-400">
                            <div class="flex items-center md:space-x-2">
                                <img src="https://source.unsplash.com/75x75/?portrait" alt=""
                                    class="w-4 h-4 border rounded-full bg-gray-500 border-gray-700">
                                <p class="text-sm">{{ $offer->user->name }} • {{ $offer->created_at }} </p>
                            </div>
                        </div>
                    </div>
                    <div class="dark:text-gray-100">
                        <p>{{ $offer->description }} </p>
                    </div>
                    <div style="margin-bottom: 50px" class="bg-white">
                        <div class="flex flex-wrap py-6 gap-2 border-t border-dashed border-gray-400">
                            @foreach ($offer->skills as $skill)
                                <span
                                    class="px-3 py-1 rounded-sm hover:underline bg-violet-400 text-gray-900">{{ $skill->name }}
                                </span>
                            @endforeach
                        </div>
                        <div class="space-y-2">
                            <h4 class="text-lg font-semibold">Other infos</h4>
                            <ul class="ml-4 space-y-1 list-disc">
                                <li>
                                    <span class="hover:underline">Experience:{{ $offer->experience }} </span>
                                </li>
                                <li>
                                    <span class="hover:underline">Salary:{{ $offer->salary }} </span>
                                </li>
                                <li>
                                    <span class="hover:underline">Contract type:{{ $offer->contract_type }} </span>
                                </li>
                                <li>
                                    <span class="hover:underline">Location:{{ $offer->location }} </span>
                                </li>
                            </ul>
                        </div>
                        @if (!$offer->applications->contains('user_id', auth()->user()->id))
                            {{-- <form action="{{ route('user.applications.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name='offer_id' value="{{$offer->id}}">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Apply</button>
                    </form> --}}

                            <button class="applyButton bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                data-target-modal="uploadModal" data-offer-id="{{ $offer->id }}">
                                Apply
                            </button>
                        @else
                            <p class="bg-white text-green-500 px-4 py-2 rounded ">You've Already Applied</p>
                        @endif
                    </div>
                </article>
            @endforeach
</div>

        </div>
    </main>

@endsection


@section('recruiters')
    <style>
        @import url('https://fonts.googleapis.com/css?family=Montserrat');



        h3 {
            margin: 10px 0;
        }

        h6 {
            margin: 5px 0;
            text-transform: uppercase;
        }

        p {
            font-size: 14px;
            line-height: 21px;
        }

        .card-container {
            background-color: rgb(240, 238, 238);
            border-radius: 5px;
            box-shadow: 0px 10px 20px -10px rgba(0, 0, 0, 0.75);
            color: #6f7381;
            padding-top: 30px;
            position: relative;
            width: 350px;
            max-width: 100%;
            text-align: center;
        }

        .card-container .pro {
            color: #231E39;
            background-color: #feb90b96;
            border-radius: 3px;
            font-size: 14px;
            font-weight: bold;
            padding: 3px 7px;
            position: absolute;
            top: 30px;
            left: 30px;
        }

        .card-container .round {
            border: 1px solid #03BFCB;
            border-radius: 50%;
            padding: 7px;
        }

        button.primary {
            background-color: #03BFCB;
            border: 1px solid #03BFCB;
            border-radius: 3px;
            color: #231E39;
            font-family: Montserrat, sans-serif;
            font-weight: 500;
            padding: 10px 25px;
        }

        button.primary.ghost {
            background-color: transparent;
            color: #02899C;
        }

        .skills {
            background-color: #1F1A36;
            text-align: left;
            padding: 15px;
            margin-top: 30px;
        }

        .skills ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        .skills ul li {
            border: 1px solid #2D2747;
            border-radius: 2px;
            display: inline-block;
            font-size: 12px;
            margin: 0 7px 7px 0;
            padding: 7px;
        }
    </style>
    @foreach ($recruiters as $recruiter)
        <div class="card-container">
            <a href="{{ route('profil', ["id" => $recruiter->id]) }}">
                <span class="pro">PRO</span>
                <img style="margin : 0 auto; display:block" class="round"
                    src="{{ $recruiter->getFirstMediaUrl('profils') }}" alt="user-profil" />
                <h3>{{ $recruiter->name }}</h3>
                <h6>{{ $recruiter->role->name }}</h6>
                <p>{{ $recruiter->company }}<br />{{ $recruiter->email }}</p>
                <div class="buttons">
                    <button class="primary">
                        Message
                    </button>
                    <button class="primary ghost">
                        Following
                    </button>
                </div>
                {{-- <div class="skills">
                <h6>Skills</h6>
                <ul>
                    <li>UI / UX</li>
                    <li>Front End Development</li>
                    <li>HTML</li>
                    <li>CSS</li>
                    <li>JavaScript</li>
                    <li>React</li>
                    <li>Node</li>
                </ul>
            </div> --}}
            </a>
        </div>
    @endforeach


<div id="uploadModalBackdrop" class="fixed top-0 left-0 w-full h-full bg-gray-900 bg-opacity-50 z-50 hidden"></div>

<div id="uploadModal"
    class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white p-6 rounded-md shadow-md z-50 hidden">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-lg font-bold">Upload Resume and Cover Letter</h2>
        <button id="closeModalButton" class="text-gray-500 hover:text-gray-700 focus:outline-none">
            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </div>
    <form id="uploadForm" method="post" action="{{ route('user.applications.store') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" id="offerIdInput" name="offer_id" value="">
        <div class="mb-4">
            <label for="resume" class="block text-sm font-medium text-gray-700">Resume:</label>
            <input type="file" id="resume" name="resume" accept=".pdf,.doc,.docx" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        </div>
        <div class="mb-4">
            <label for="coverLetter" class="block text-sm font-medium text-gray-700">Cover Letter:</label>
            <input type="file" id="coverLetter" name="cover_letter" accept=".pdf,.doc,.docx" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        </div>
        <div class="text-right">
            <button type="submit"
                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Upload
            </button>
        </div>
    </form>
</div>



<script>
    document.addEventListener('click', function (event) {
        const button = event.target.closest('.applyButton');
        if (button) {
            const modalId = button.dataset.targetModal;
            const modal = document.getElementById(modalId);
            const offerId = button.dataset.offerId;
            const offerIdInput = modal.querySelector('#offerIdInput');
            if (modal && offerIdInput) {
                offerIdInput.value = offerId;
                document.getElementById('uploadModalBackdrop').classList.remove('hidden');
                modal.classList.remove('hidden');
            }
        }
    });
    document.addEventListener('click', function (event) {
        const closeButton = event.target.closest('#closeModalButton');
        if (closeButton) {
            const modal = closeButton.closest('#uploadModal');
            closeModal(modal);
        }
    });

    function closeModal(modal) {
        modal.classList.add('hidden');
        document.getElementById('uploadModalBackdrop').classList.add('hidden');
    }



    function closeModal(modal) {
        modal.classList.add('hidden');
        document.getElementById('uploadModalBackdrop').classList.add('hidden');
    }

    document.getElementById('searchForm').addEventListener('input', function (event) {
        event.preventDefault();
        const query = document.getElementById('queryInput').value;
        fetch(`/offers/search?query=${query}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                console.log(data);
                displaySearchResults(data);
                console.log(data);
            })
            .catch(error => {
                console.error('There was a problem with your fetch operation:', error);
            });
    });

    function displaySearchResults(offers) {
    const resultsContainer = document.getElementById('searchResults');
    resultsContainer.innerHTML = ''; 

    offers.forEach(offer => {
        const article = document.createElement('article');
        article.classList.add('space-y-8', 'bg-white');

        const offerTitle = document.createElement('a');
        offerTitle.href = `/user/offers/${offer.id}`;
        offerTitle.classList.add('text-4xl', 'font-bold', 'md:tracking', 'md:text-3xl');
        offerTitle.textContent = offer.title;

        const titleDiv = document.createElement('div');
        titleDiv.classList.add('flex', 'justify-between');
        titleDiv.appendChild(offerTitle);

        if (offer.category && offer.category.name) { // Check if category is defined and has a name
            const categorySpan = document.createElement('span');
            categorySpan.classList.add('px-3', 'py-1', 'rounded-sm', 'hover:underline', 'text-violet-600');
            categorySpan.textContent = `#${offer.category.name}`;
            titleDiv.appendChild(categorySpan);
        }

        const userImg = document.createElement('img');
        userImg.src = 'https://source.unsplash.com/75x75/?portrait';
        userImg.alt = '';
        userImg.classList.add('w-4', 'h-4', 'border', 'rounded-full', 'bg-gray-500', 'border-gray-700');

        const userNameDate = document.createElement('p');
        userNameDate.classList.add('text-sm');
        userNameDate.textContent = `${offer.user.name} • ${offer.created_at}`;

        const userInfoDiv = document.createElement('div');
        userInfoDiv.classList.add('flex', 'items-center', 'md:space-x-2');
        userInfoDiv.appendChild(userImg);
        userInfoDiv.appendChild(userNameDate);

        const userInfoContainer = document.createElement('div');
        userInfoContainer.classList.add('flex', 'flex-col', 'items-start', 'justify-between', 'w-full', 'md:flex-row', 'md:items-center', 'text-gray-400');
        userInfoContainer.appendChild(userInfoDiv);

        const descriptionDiv = document.createElement('div');
        descriptionDiv.classList.add('dark:text-gray-100');
        descriptionDiv.textContent = offer.description;

        const skillsDiv = document.createElement('div');
        skillsDiv.classList.add('flex', 'flex-wrap', 'py-6', 'gap-2', 'border-t', 'border-dashed', 'border-gray-400');

        offer.skills.forEach(skill => {
            const skillSpan = document.createElement('span');
            skillSpan.classList.add('px-3', 'py-1', 'rounded-sm', 'hover:underline', 'bg-violet-400', 'text-gray-900');
            skillSpan.textContent = skill.name;
            skillsDiv.appendChild(skillSpan);
        });

        const otherInfosDiv = document.createElement('div');
        otherInfosDiv.classList.add('space-y-2');

        const otherInfosHeader = document.createElement('h4');
        otherInfosHeader.classList.add('text-lg', 'font-semibold');
        otherInfosHeader.textContent = 'Other Infos';

        const otherInfosList = document.createElement('ul');
        otherInfosList.classList.add('ml-4', 'space-y-1', 'list-disc');

        const otherInfoItems = [
            `Experience: ${offer.experience}`,
            `Salary: ${offer.salary}`,
            `Contract type: ${offer.contract_type}`,
            `Location: ${offer.location}`
        ];

        otherInfoItems.forEach(info => {
            const listItem = document.createElement('li');
            listItem.innerHTML = `<span class="hover:underline">${info}</span>`;
            otherInfosList.appendChild(listItem);
        });

        otherInfosDiv.appendChild(otherInfosHeader);
        otherInfosDiv.appendChild(otherInfosList);

        const applyButton = document.createElement('button');
        applyButton.classList.add('applyButton', 'bg-blue-500', 'hover:bg-blue-700', 'text-white', 'font-bold', 'py-2', 'px-4', 'rounded');
        applyButton.dataset.targetModal = 'uploadModal';
        applyButton.dataset.offerId = offer.id;
        applyButton.textContent = 'Apply';

        const applyButtonContainer = document.createElement('div');
        applyButtonContainer.style.marginBottom = '50px';
        applyButtonContainer.classList.add('bg-white');
        applyButtonContainer.appendChild(applyButton);

        article.appendChild(titleDiv);
        article.appendChild(userInfoContainer);
        article.appendChild(descriptionDiv);
        article.appendChild(skillsDiv);
        article.appendChild(otherInfosDiv);
        article.appendChild(applyButtonContainer);

        resultsContainer.appendChild(article);
    });
}


</script>


@endsection