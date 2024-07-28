<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-200 leading-tight">
                {{ __('My Wallet') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-900 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">
                <span class="text-white font-bold bg-red-500 rounded-2xl w-fit p-5">
                    Anda hanya bisa menarik balance ketika telah mencapai Rp 100.000 atau lebih
                </span>
                <div class="flex flex-row justify-between items-center">
                    <div class="flex flex-row gap-x-5 items-center">
                        <svg width="100" height="100" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.4" d="M19 10.2798V17.4298C18.97 20.2798 18.19 20.9998 15.22 20.9998H5.78003C2.76003 20.9998 2 20.2498 2 17.2698V10.2798C2 7.5798 2.63 6.7098 5 6.5698C5.24 6.5598 5.50003 6.5498 5.78003 6.5498H15.22C18.24 6.5498 19 7.2998 19 10.2798Z" fill="#CBD5E1"/>
                            <path d="M22 6.73V13.72C22 16.42 21.37 17.29 19 17.43V10.28C19 7.3 18.24 6.55 15.22 6.55H5.78003C5.50003 6.55 5.24 6.56 5 6.57C5.03 3.72 5.81003 3 8.78003 3H18.22C21.24 3 22 3.75 22 6.73Z" fill="#CBD5E1"/>
                            <path d="M6.96027 18.5601H5.24023C4.83023 18.5601 4.49023 18.2201 4.49023 17.8101C4.49023 17.4001 4.83023 17.0601 5.24023 17.0601H6.96027C7.37027 17.0601 7.71027 17.4001 7.71027 17.8101C7.71027 18.2201 7.38027 18.5601 6.96027 18.5601Z" fill="#CBD5E1"/>
                            <path d="M12.5494 18.5601H9.10938C8.69938 18.5601 8.35938 18.2201 8.35938 17.8101C8.35938 17.4001 8.69938 17.0601 9.10938 17.0601H12.5494C12.9594 17.0601 13.2994 17.4001 13.2994 17.8101C13.2994 18.2201 12.9694 18.5601 12.5494 18.5601Z" fill="#CBD5E1"/>
                            <path d="M19 11.8599H2V13.3599H19V11.8599Z" fill="#CBD5E1"/>
                        </svg>
                        <div>
                            <p class="text-slate-400 text-sm">Total Balance</p>
                            <h3 class="text-gray-200 text-xl font-bold">Rp 0</h3>
                        </div>
                    </div>
                </div>
                <hr class="my-5 border-gray-700">

                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="px-5 py-3 w-full rounded-3xl bg-red-500 text-white">
                            {{$error}}
                        </div>
                    @endforeach
                @endif

                <h3 class="text-gray-200 text-xl font-bold">Withdraw Money</h3>
                <form method="POST" action="#" enctype="multipart/form-data">
                    @csrf

                    <div>
                        <x-input-label for="bank_name" :value="__('bank_name')" class="text-gray-200"/>
                        <x-text-input id="bank_name" class="block mt-1 w-full bg-gray-700 text-gray-200" type="text" name="bank_name" :value="old('bank_name')" required autofocus autocomplete="bank_name" />
                        <x-input-error :messages="$errors->get('bank_name')" class="mt-2 text-red-500" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="bank_account_name" :value="__('bank_account_name')" class="text-gray-200"/>
                        <x-text-input id="bank_account_name" class="block mt-1 w-full bg-gray-700 text-gray-200" type="text" name="bank_account_name" :value="old('bank_account_name')" required autofocus autocomplete="bank_account_name" />
                        <x-input-error :messages="$errors->get('bank_account_name')" class="mt-2 text-red-500" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="bank_account_number" :value="__('bank_account_number')" class="text-gray-200"/>
                        <x-text-input id="bank_account_number" class="block mt-1 w-full bg-gray-700 text-gray-200" type="text" name="bank_account_number" :value="old('bank_account_number')" required autofocus autocomplete="bank_account_number" />
                        <x-input-error :messages="$errors->get('bank_account_number')" class="mt-2 text-red-500" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="font-bold py-4 px-6 bg-indigo-600 hover:bg-indigo-700 text-white rounded-full transition duration-300 ease-in-out">
                            Request Withdraw
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
