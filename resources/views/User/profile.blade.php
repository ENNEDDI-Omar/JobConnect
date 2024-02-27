<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Job connect</title>
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
    {{--<script src="https://cdn.tailwindcss.com"></script> --}}
    @vite('resources/css/app.css')
    <script src="https://cdn.lordicon.com/lordicon.js"></script>
</head>

<body>
    <main class="profile-page">
        <section class="relative block h-500-px">
            <div class="absolute top-0 w-full h-full bg-center bg-cover"
                style="background-image: url('https://images.unsplash.com/photo-1499336315816-097655dcfbda?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=2710&amp;q=80');">
                <span id="blackOverlay" class="w-full h-full absolute opacity-50 bg-black"></span>
            </div>
            <div class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden h-70-px"
                style="transform: translateZ(0px)">
                <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg"
                    preserveAspectRatio="none" version="1.1" viewBox="0 0 2560 100" x="0" y="0">
                    <polygon class="text-blueGray-200 fill-current" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </section>
        <section class="relative py-16 bg-blueGray-200">
            <div class="container mx-auto px-4">
                <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg -mt-64">
                    <div class="px-6">
                        <div class="flex flex-wrap justify-center">
                            <div class="w-full lg:w-3/12 px-4 lg:order-2 flex justify-center">
                                <div class="relative">
                                    <img alt="..." src="https://demos.creative-tim.com/notus-js/assets/img/team-2-800x800.jpg" class="shadow-xl rounded-full h-auto align-middle border-none absolute -m-16 -ml-20 lg:-ml-16 max-w-150-px">
                                </div>
                            </div>

                            <div class="w-full lg:w-4/12 px-4 lg:order-1">
                                <div class="flex justify-center py-4 lg:pt-4 pt-8">
                                    <div class="mr-4 p-3 text-center">
                                        <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">22</span>
                                        <span class="text-sm text-blueGray-400">Applications</span>
                                    </div>
                                    <div class="mr-4 p-3 text-center">
                                        <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">10</span>
                                        <span class="text-sm text-blueGray-400">Saved</span>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-12">
                            <h3 class="text-4xl font-semibold leading-normal mb-2 text-blueGray-700 mb-2">{{ $user->name }}</h3>
                            <div class="text-sm leading-normal mt-0 mb-2 text-blueGray-400 font-bold uppercase">
                                <i class="fas fa-map-marker-alt mr-2 text-lg text-blueGray-400"></i>{{ $user->email }}
                            </div>
                            <div class="mb-2 text-blueGray-600 mt-10">
                                <i class="fas fa-briefcase mr-2 text-lg text-blueGray-400"></i> {{ $user->phone }}
                            </div>
                            <div class="mb-2 text-blueGray-600">
                                <i class="fas fa-university mr-2 text-lg text-blueGray-400"></i>University of Computer Science
                            </div>
                        </div>
                        <div class="mt-10 py-10 border-t border-blueGray-200 text-center">
                            <div class="flex flex-wrap justify-center">
                                <div class="w-full lg:w-9/12 px-4">
                                    <p class="mb-4 text-lg leading-relaxed text-blueGray-700">  {{ $user->description }}</p>
                                    <a href="#pablo" class="font-normal text-pink-500">Show more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <section class="dark:bg-gray-800 dark:text-gray-100">
                        <div class="container max-w-5xl px-4 py-12 mx-auto">
                            <div class="grid gap-4 mx-4 sm:grid-cols-12">
                                <div class="col-span-12 sm:col-span-3">
                                    <div
                                        class="text-center sm:text-left mb-14 before:block before:w-24 before:h-3 before:mb-5 before:rounded-md before:mx-auto sm:before:mx-0 before:bg-violet-400">
                                        <h3 class="text-3xl font-semibold">Educations</h3>
                                        <span class="text-sm font-bold tracki uppercase text-gray-400">Vestibulum diam nunc</span>
                                    </div>
                                </div>
                                <div class="relative col-span-12 px-4 space-y-6 sm:col-span-9">
                                    <div class="col-span-12 space-y-12 relative px-4 sm:col-span-8 sm:space-y-8 sm:before:absolute sm:before:top-2 sm:before:bottom-0 sm:before:w-0.5 sm:before:-left-3 before:bg-violet-700">
                                        <div class="flex items-center justify-end">
                                            <button onclick="openModal('addExperienceModal')" class="btn"> <lord-icon src="https://cdn.lordicon.com/jgnvfzqg.json" trigger="loop" class="w-10 h-10"></lord-icon></button>
                                        </div>
                                        @foreach ($user->educations as $education)
                                            <div class="flex flex-col sm:relative sm:before:absolute sm:before:top-2 sm:before:w-4 sm:before:h-4 sm:before:rounded-full sm:before:left-[-35px] sm:before:z-[1] before:bg-violet-400">
                                                <div class="flex items-center justify-between mt-3">
                                                    <h3 class="text-xl font-semibold tracki">{{ $education->degree }}</h3>
                                                    <div class="flex items-center space-x-2">
                                                        <form action="{{ route('user.educations.destroy', $education->id) }}"method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit">
                                                                <lord-icon src="https://cdn.lordicon.com/skkahier.json" trigger="" style="width:25px;height:25px"></lord-icon>
                                                            </button>
                                                        </form>
                                                        <button onclick="openUpdateModal('{{ route('user.educations.edit', $education->id) }}')" class="btn">
                                                            <lord-icon src="https://cdn.lordicon.com/ylvuooxd.json"  colors="primary:#FFF,secondary:#000000,tertiary:#8B5CF6,quaternary:#8B5CF6"  trigger=""  style="width:25px;height:25px"></lord-icon>
                                                        </button>
                                                    </div>
                                                </div>
                                                <h3 class="text-xl font-semibold tracki">{{ $education->institution }} </h3>
                                                <time  class="text-xs tracki uppercase text-gray-400">{{ $education->start_date }}  -  {{ $education->end_date ? $education->end_date : 'Present' }}</time>
                                                <p class="mt-3">{{ $education->description }}</p>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container max-w-5xl px-4 py-12 mx-auto">
                            <div class="grid gap-4 mx-4 sm:grid-cols-12">
                                <div class="col-span-12 sm:col-span-3">
                                    <div class="text-center sm:text-left mb-14 before:block before:w-24 before:h-3 before:mb-5 before:rounded-md before:mx-auto sm:before:mx-0 before:bg-violet-400">
                                        <h3 class="text-3xl font-semibold">Experiences</h3>
                                        <span class="text-sm font-bold tracki uppercase text-gray-400">Vestibulum diam nunc</span>
                                    </div>
                                </div>
                                <div class="relative col-span-12 px-4 space-y-6 sm:col-span-9">
                                    <div class="col-span-12 space-y-12 relative px-4 sm:col-span-8 sm:space-y-8 sm:before:absolute sm:before:top-2 sm:before:bottom-0 sm:before:w-0.5 sm:before:-left-3 before:bg-violet-700">
                                        <div class="flex items-center justify-end">
                                            <button onclick="openModal('addExperienceModal')" class="btn"> <lord-icon src="https://cdn.lordicon.com/jgnvfzqg.json" trigger="loop" class="w-10 h-10"></lord-icon> </button>
                                        </div>
                                        @foreach ($user->experiences as $experience)
                                            <div class="flex flex-col sm:relative sm:before:absolute sm:before:top-2 sm:before:w-4 sm:before:h-4 sm:before:rounded-full sm:before:left-[-35px] sm:before:z-[1] before:bg-violet-400">
                                                <div class="flex items-center justify-between mt-3">
                                                    <h3 class="text-xl font-semibold tracki">{{ $experience->title }} </h3>
                                                    <div class="flex items-center space-x-2">
                                                        <form action="{{ route('user.experiences.destroy', $experience->id) }}"method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit">
                                                                <lord-icon src="https://cdn.lordicon.com/skkahier.json"  trigger=""  style="width:25px;height:25px"></lord-icon>
                                                            </button>
                                                        </form>
                                                        <button onclick="openUpdateModal('{{ route('user.experiences.edit', $education->id) }}')" class="btn">
                                                            <lord-icon src="https://cdn.lordicon.com/ylvuooxd.json" colors="primary:#FFF,secondary:#000000,tertiary:#8B5CF6,quaternary:#8B5CF6" trigger="" style="width:25px;height:25px"></lord-icon>
                                                        </button>
                                                    </div>
                                                </div>
                                                <h3 class="text-xl font-semibold tracki">{{ $experience->company }}</h3>
                                                <time class="text-xs tracki uppercase text-gray-400">{{ $experience->start_date }} - {{ $experience->end_date ? $experience->end_date : 'Present' }}</time>
                                                <p class="mt-3">{{ $experience->description }}</p>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="container max-w-5xl px-4 py-12 mx-auto">
                            <div class="grid gap-4 mx-4 sm:grid-cols-12">
                                <div class="col-span-12 sm:col-span-3">
                                    <div class="text-center sm:text-left mb-14 before:block before:w-24 before:h-3 before:mb-5 before:rounded-md before:mx-auto sm:before:mx-0 before:bg-violet-400">
                                        <h3 class="text-3xl font-semibold">Skills</h3>
                                        <span class="text-sm font-bold tracki uppercase text-gray-400">Vestibulum diam nunc</span>
                                    </div>
                                </div>
                                <div class="relative col-span-12 px-4 space-y-6 sm:col-span-9">
                                    <div class="col-span-12 space-y-12 relative px-4 sm:col-span-8 sm:space-y-8 sm:before:absolute sm:before:top-2 sm:before:bottom-0 sm:before:w-0.5 sm:before:-left-3 before:bg-violet-700">
                                        <div class="flex items-center justify-end">
                                            <button onclick="openModal('addExperienceModal')" class="btn"> <lord-icon src="https://cdn.lordicon.com/jgnvfzqg.json" trigger="loop" class="w-10 h-10"></lord-icon> </button>
                                        </div>
                                        @foreach ($user->skills->chunk(4) as $chunk)
                                            <div class="flex flex-wrap mb-4">
                                                @foreach ($chunk as $skill)
                                                    <button type="button" class="px-8 py-3 mr-4 mb-4 font-semibold rounded bg-gray-100 text-gray-800">{{$skill->name}}</button>
                                                @endforeach
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </section>
    </main>



    {{-- modals --}}

    <div id="addExperienceModal" class="fixed inset-0 z-50 overflow-y-auto hidden">
        <div class="flex items-center justify-center min-h-screen">
            <div class="relative bg-white rounded-lg w-96">
                <form id="addExperienceForm" action="{{ route('user.experiences.store') }}" method="POST">
                    @csrf
                    <div class="p-8">
                        <div class="mb-4">
                            <label for="title" class="block mb-2 font-semibold">Title</label>
                            <input type="text" id="title" name="title"
                                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-violet-400"
                                required>
                            @error('title')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="type" class="block mb-2 font-semibold">Type</label>
                            <input type="text" id="type" name="type"
                                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-violet-400"
                                required>
                            @error('type')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="company" class="block mb-2 font-semibold">Company</label>
                            <input type="text" id="company" name="company"
                                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-violet-400">
                            @error('company')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="start_date" class="block mb-2 font-semibold">Start Date</label>
                            <input type="date" id="start_date" name="start_date"
                                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-violet-400"
                                required>
                            @error('start_date')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="end_date" class="block mb-2 font-semibold">End Date</label>
                            <input type="date" id="end_date" name="end_date"
                                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-violet-400">
                            @error('end_date')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="description" class="block mb-2 font-semibold">Description</label>
                            <textarea id="description" name="description"
                                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-violet-400" rows="4" required></textarea>
                            @error('description')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn bg-violet-400 hover:bg-violet-500 text-white">Add
                            Experience</button>
                    </div>
                </form>
                <button onclick="closeModal('addExperienceModal')" class="absolute top-0 right-0 m-4">&times;</button>
            </div>
        </div>
    </div>

    <div id="updateExperienceModal" class="fixed inset-0 z-50 overflow-y-auto hidden">
        <div class="flex items-center justify-center min-h-screen">
            <div class="relative bg-white rounded-lg w-96">
                <form id="updateExperienceForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="p-8">
                        <button type="submit" class="btn">Update Experience</button>
                    </div>
                </form>
                <button onclick="closeModal('updateExperienceModal')"
                    class="absolute top-0 right-0 m-4">&times;</button>
            </div>
        </div>
    </div>

    <script>
        function openModal(id) {
            document.getElementById(id).classList.remove('hidden');
        }

        function closeModal(id) {
            document.getElementById(id).classList.add('hidden');
        }
    </script>


</body>

</html>
