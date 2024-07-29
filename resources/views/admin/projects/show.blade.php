<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Project Details') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">

                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="px-5 py-3 w-full rounded-3xl bg-red-500 text-white">
                            {{$error}}
                        </div>
                    @endforeach
                @endif

                <div class="item-card flex flex-row gap-y-10 justify-between md:items-center">
                    <div class="flex flex-row items-center gap-x-3">
                        <img src="{{Storage::url($project->thumbnail)}}" alt="" class="rounded-2xl object-cover w-[120px] h-[90px]">
                        <div class="flex flex-col">
                            <h3 class="text-white text-xl font-bold">{{$project->name}}</h3>
                            <p class="text-gray-400 text-sm">{{$project->category->name}}</p>
                        </div>
                    </div>
                    <div class="flex flex-row items-center gap-x-3">
                        <a href="#" class="font-bold py-4 px-6 bg-orange-600 hover:bg-orange-700 text-white rounded-full">
                            Preview
                        </a>
                        <a href="{{route('admin.projects.tools', $project)}}" class="font-bold py-4 px-6 bg-indigo-600 hover:bg-indigo-700 text-white rounded-full">
                            Add Tools
                        </a>
                    </div>
                </div>

                <hr class="my-5 border-gray-600">

                <h3 class="text-white text-xl font-bold">Applicants</h3>

                <div class="flex flex-row justify-between items-center">
                    <div class="flex flex-row items-center gap-x-3">
                        <img src="{{Storage::url($project->owner->avatar)}}" alt="" class="rounded-full object-cover w-[70px] h-[70px]">
                        <div class="flex flex-col">
                            <h3 class="text-white text-xl font-bold">{{$project->owner->name}}</h3>
                            <p class="text-gray-400 text-sm">{{$project->owner->occupation}}</p>
                        </div>
                    </div>

                    <span class="w-fit text-sm font-bold py-2 px-3 rounded-full bg-green-600 text-white">
                        HIRED
                    </span>

                    <span class="w-fit text-sm font-bold py-2 px-3 rounded-full bg-orange-600 text-white">
                        WAITING FOR APPROVAL
                    </span>

                    <span class="w-fit text-sm font-bold py-2 px-3 rounded-full bg-red-600 text-white">
                        REJECTED
                    </span>

                    <div class="flex flex-row items-center gap-x-3">
                        <a href="#" class="font-bold py-4 px-6 bg-indigo-600 hover:bg-indigo-700 text-white rounded-full">
                            Details
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
