<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-300 leading-tight">
            {{ __('New Project') }}
        </h2>
    </x-slot>

    <div class="max-w-4xl mt-10 mx-auto sm:px-6 lg:px-8">
        <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">
            <span class="text-gray-200 font-bold bg-red-500 rounded-2xl w-fit p-5">
                Pastikan Wallet Balance cukup sesuai budget project Anda
            </span>
            <div class="flex flex-row justify-between items-center">
                <div class="flex flex-row gap-x-5 items-center">
                    <svg width="50" height="50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.4" d="M19 10.2798V17.4298C18.97 20.2798 18.19 20.9998 15.22 20.9998H5.78003C2.76003 20.9998 2 20.2498 2 17.2698V10.2798C2 7.5798 2.63 6.7098 5 6.5698C5.24 6.5598 5.50003 6.5498 5.78003 6.5498H15.22C18.24 6.5498 19 7.2998 19 10.2798Z" fill="#B0B3B8"/>
                        <path d="M22 6.73V13.72C22 16.42 21.37 17.29 19 17.43V10.28C19 7.3 18.24 6.55 15.22 6.55H5.78003C5.50003 6.55 5.24 6.56 5 6.57C5.03 3.72 5.81003 3 8.78003 3H18.22C21.24 3 22 3.75 22 6.73Z" fill="#B0B3B8"/>
                        <path d="M6.96027 18.5601H5.24023C4.83023 18.5601 4.49023 18.2201 4.49023 17.8101C4.49023 17.4001 4.83023 17.0601 5.24023 17.0601H6.96027C7.37027 17.0601 7.71027 17.4001 7.71027 17.8101C7.71027 18.2201 7.38027 18.5601 6.96027 18.5601Z" fill="#B0B3B8"/>
                        <path d="M12.5494 18.5601H9.10938C8.69938 18.5601 8.35938 18.2201 8.35938 17.8101C8.35938 17.4001 8.69938 17.0601 9.10938 17.0601H12.5494C12.9594 17.0601 13.2994 17.4001 13.2994 17.8101C13.2994 18.2201 12.9694 18.5601 12.5494 18.5601Z" fill="#B0B3B8"/>
                        <path d="M19 11.8599H2V13.3599H19V11.8599Z" fill="#B0B3B8"/>
                    </svg>
                    <div>
                        <p class="text-gray-400 text-sm">Wallet Balance</p>
                        <h3 class="text-gray-200 text-xl font-bold">Rp {{number_format(Auth::user()->wallet->balance, 0, ',', '.')}}</h3>
                    </div>
                </div>
                <a href="{{route('dashboard.wallet.topup')}}" class="font-bold py-4 px-6 bg-indigo-600 hover:bg-indigo-700 text-white rounded-full">
                    Topup Wallet
                </a>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden p-10 shadow-sm sm:rounded-lg">

                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="py-3 w-full rounded-3xl bg-red-600 text-gray-200">
                            {{$error}}
                        </div>
                    @endforeach
                @endif

                <form method="POST" action="{{route("admin.projects.store")}}" enctype="multipart/form-data">
                    @csrf

                    <div>
                        <x-input-label for="name" :value="__('Name')" class="text-gray-400" />
                        <x-text-input id="name" class="block mt-1 w-full bg-gray-700 text-gray-200 border-gray-600 focus:border-indigo-500 focus:ring-indigo-500" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-400" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="thumbnail" :value="__('Thumbnail')" class="text-gray-400" />
                        <x-text-input id="thumbnail" class="block mt-1 w-full bg-gray-700 text-gray-200 border-gray-600 focus:border-indigo-500 focus:ring-indigo-500" type="file" name="thumbnail" required autofocus autocomplete="thumbnail" />
                        <x-input-error :messages="$errors->get('thumbnail')" class="mt-2 text-red-400" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="budget" :value="__('Budget')" class="text-gray-400" />
                        <x-text-input id="budget" class="block mt-1 w-full bg-gray-700 text-gray-200 border-gray-600 focus:border-indigo-500 focus:ring-indigo-500" type="number" name="budget" :value="old('budget')" required autofocus autocomplete="budget" />
                        <x-input-error :messages="$errors->get('budget')" class="mt-2 text-red-400" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="category" :value="__('Category')" class="text-gray-400" />
                        <select name="category_id" id="category_id" class="py-3 rounded-lg pl-3 w-full bg-gray-700 text-gray-200 border-gray-600 focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="">Choose category</option>
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('category')" class="mt-2 text-red-400" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="about" :value="__('About')" class="text-gray-400" />
                        <textarea name="about" id="about" cols="30" rows="5" class="border-gray-600 bg-gray-700 text-gray-200 rounded-xl w-full focus:border-indigo-500 focus:ring-indigo-500"></textarea>
                        <x-input-error :messages="$errors->get('about')" class="mt-2 text-red-400" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="skill_level" :value="__('Skill Level')" class="text-gray-400" />
                        <select name="skill_level" id="skill_level" class="py-3 rounded-lg pl-3 w-full bg-gray-700 text-gray-200 border-gray-600 focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="">Choose skill level</option>
                            <option value="Beginner">Beginner</option>
                            <option value="Intermediate">Intermediate</option>
                            <option value="Expert">Expert</option>
                        </select>
                        <x-input-error :messages="$errors->get('skill_level')" class="mt-2 text-red-400" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="font-bold py-4 px-6 bg-indigo-600 hover:bg-indigo-700 text-white rounded-full">
                            Add New Project
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
