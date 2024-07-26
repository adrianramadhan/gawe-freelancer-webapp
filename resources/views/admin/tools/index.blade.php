<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-200 leading-tight">
                {{ __('Manage Tools') }}
            </h2>
            <a href="{{route('admin.tools.create')}}" class="font-bold py-4 px-6 bg-indigo-600 hover:bg-indigo-700 text-white rounded-full transition duration-300 ease-in-out">
                Add New
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg p-10 flex flex-col gap-y-5">

                @forelse ($tools as $tool)
                <div class="item-card flex flex-row justify-between items-center bg-gray-700 p-5 rounded-lg">
                    <div class="flex flex-row items-center gap-x-3">
                        <img src="{{Storage::url($tool->icon)}}" alt="" class="rounded-2xl object-cover w-[120px] h-[90px]">
                        <div class="flex flex-col">
                            <h3 class="text-gray-200 text-xl font-bold">{{$tool->name}}</h3>
                        </div>
                    </div>
                    <div class="hidden md:flex flex-col text-gray-300">
                        <p class="text-slate-400 text-sm">Date</p>
                        <h3 class="text-gray-200 text-xl font-bold">{{$tool->created_at->format('M d, Y')}}</h3>
                    </div>
                    <div class="hidden md:flex flex-row items-center gap-x-3">
                        <a href="{{route('admin.tools.edit', $tool)}}" class="font-bold py-4 px-6 bg-indigo-600 hover:bg-indigo-700 text-white rounded-full transition duration-300 ease-in-out">
                            Edit
                        </a>
                        <form action="{{route('admin.tools.destroy', $tool)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="font-bold py-4 px-6 bg-red-600 hover:bg-red-700 text-white rounded-full transition duration-300 ease-in-out">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
                @empty
                <p>Belum ada data Tools</p>
                @endforelse

                {{$tools->links()}}

            </div>
        </div>
    </div>
</x-app-layout>
