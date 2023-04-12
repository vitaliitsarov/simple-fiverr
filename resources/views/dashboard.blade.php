<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Send money') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-3">
                Your unique account number: {{ Auth::user()->iban }}
            </div>
        </div>
    </div>

    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('dashboard.form') }}" method="POST">
                        @csrf
                        <div class="mb-6">
                            <label for="iban" class="block mb-2 text-sm font-medium text-gray-900 ">Bank account number</label>
                            <input type="text" id="iban" placeholder="ABC-***" name="iban" value="{{ old('iban') }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"  required>
                        </div>
                        <div class="mb-6">
                            <label for="amount" class="block mb-2 text-sm font-medium text-gray-900">Amount</label>
                            <input type="text" id="amount" name="amount" value="{{ old('amount', 0) }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required>
                        </div>
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Send money</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
