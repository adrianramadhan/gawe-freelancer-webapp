<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-200 leading-tight">
                {{ __('Manage Categories') }}
            </h2>
            <a href="{{route('admin.categories.create')}}" class="font-bold py-4 px-6 bg-indigo-600 hover:bg-indigo-700 text-white rounded-full">
                Add New
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">

                @forelse ($categories as $category)
                <div class="item-card flex flex-row justify-between items-center bg-gray-700 p-5 rounded-lg">
                    <div class="flex flex-row items-center gap-x-3">
                        <img src="{{Storage::url($category->icon)}}" alt="" class="rounded-2xl object-cover w-[90px] h-[90px]">
                        <div class="flex flex-col">
                            <h3 class="text-gray-200 text-xl font-bold">{{$category->name}}</h3>
                        </div>
                    </div>
                    <div  class="hidden md:flex flex-col text-gray-300">
                        <p class="text-slate-400 text-sm">Date</p>
                        <h3 class="text-gray-200 text-xl font-bold">{{$category->created_at->format('M d, Y')}}</h3>
                    </div>
                    <div class="hidden md:flex flex-row items-center gap-x-3">
                        <a href="#" class="font-bold py-4 px-6 bg-indigo-600 hover:bg-indigo-700 text-white rounded-full">
                            Edit
                        </a>
                        <form action="#" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="font-bold py-4 px-6 bg-red-500 hover:bg-red-600 text-white rounded-full">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
                @empty
                <p class="text-gray-300">Belum ada data kategori terbaru</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
