@extends('layouts.Index') 

@section('main')
    <div class="container">
        <h1>My Applications</h1>

        @if ($applications->isEmpty())
            <p>You have not submitted any applications yet.</p>
        @else
        
            
                    @foreach ($applications as $application)


                    <article class="max-w-2xl px-6 py-24 mx-auto space-y-16 dark:bg-gray-800 dark:text-gray-50">
                        <div class="w-full mx-auto space-y-4">
                            <h1 class="text-5xl font-bold leadi"> {{$application->offer->title}} </h1>
                            <div class="flex flex-wrap space-x-2 text-sm dark:text-gray-400">
                                @foreach ($application->offer->skills() as $skill)
                                    <a rel="noopener noreferrer" href="#" class="p-1 hover:underline">#MambaUI</a>
                                @endforeach
                                

                            </div>
                            <p class="text-sm dark:text-gray-400">by
                                <a href="#" target="_blank" rel="noopener noreferrer" class="hover:underline dark:text-blue-400">
                                    <span>{{$application->offer->user->name}}</span>
                                </a>on
                                <time datetime="2021-02-12 15:34:18-0200">{{$application->offer->created_at}}</time>
                            </p>
                        </div>
                        <div class="dark:text-gray-100">
                            <p>{{$application->offer->description}}</p>
                        </div>
                    </article>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
