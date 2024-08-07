<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('New Tool') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-900 min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden p-10 shadow-lg sm:rounded-lg">

                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="py-3 w-full rounded-3xl bg-red-600 text-white mb-2">
                            {{$error}}
                        </div>
                    @endforeach
                @endif

                <form method="POST" action="{{route('admin.tools.store')}}" enctype="multipart/form-data">
                    @csrf

                    <div>
                        <x-input-label for="name" :value="__('Name')" class="text-gray-300"/>
                        <x-text-input id="name" class="block mt-1 w-full bg-gray-700 text-gray-200 border-gray-600 focus:border-indigo-500 focus:ring-indigo-500" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-400" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="icon" :value="__('Icon')" class="text-gray-300"/>
                        <x-text-input id="icon" class="block mt-1 w-full bg-gray-700 text-gray-200 border-gray-600 focus:border-indigo-500 focus:ring-indigo-500" type="file" name="icon" required autofocus autocomplete="icon" />
                        <x-input-error :messages="$errors->get('icon')" class="mt-2 text-red-400" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="font-bold py-4 px-6 bg-indigo-600 hover:bg-indigo-700 text-white rounded-full transition duration-300 ease-in-out">
                            Add New Tool
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
