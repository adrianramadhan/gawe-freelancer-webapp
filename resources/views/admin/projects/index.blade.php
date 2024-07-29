<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-white leading-tight">
                {{ __('Manage Projects') }}
            </h2>
            <a href="{{route('admin.projects.create')}}" class="font-bold py-4 px-6 bg-blue-600 text-white rounded-full">
                Add New
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">

                @forelse ($projects as $project)
                <div class="item-card flex flex-col md:flex-row gap-y-10 justify-between md:items-center">
                    <div class="flex flex-row items-center gap-x-3">
                        <img src="" alt="" class="rounded-2xl object-cover w-[120px] h-[90px]">
                        <div class="flex flex-col">
                            <h3 class="text-white text-xl font-bold">{{$project->name}}/h3>
                            <p class="text-gray-400 text-sm">{{$project->category->name}}</p>
                        </div>
                    </div>
                    <div class="hidden md:flex flex-col">
                        <p class="text-gray-400 text-sm">Budget</p>
                        <h3 class="text-white text-xl font-bold">{{ number_format($project->budget, 0, ',', '.') }}/h3>
                    </div>
                    <div class="hidden md:flex flex-col">
                        <p class="text-gray-400 text-sm">Applicants</p>
                        <h3 class="text-white text-xl font-bold">{{$project->applicants->count()}}</h3>
                    </div>
                    <div class="hidden md:flex flex-col">
                        <p class="text-gray-400 text-sm">Client</p>
                        <h3 class="text-white text-xl font-bold">{{$project->owner->name}}</h3>
                    </div>
                    <div class="hidden md:flex flex-row items-center gap-x-3">
                        <a href="{{route('admin.projects.show', $project)}}" class="font-bold py-4 px-6 bg-blue-600 text-white rounded-full">
                            Manage
                        </a>
                    </div>
                </div>
                @empty
                <p class="text-white">Belum ada data projek terbaru</p>
                @endforelse

            </div>
        </div>
    </div>
</x-app-layout>
