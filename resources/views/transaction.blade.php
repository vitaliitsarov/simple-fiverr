<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Transaction') }}
        </h2>
    </x-slot>

    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    
                    <table class="w-full text-sm text-left text-gray-500 ">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    ID
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    From
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    To
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Date
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Amount
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Message
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($transactions->count() != 0)
                                @foreach($transactions as $transaction)
                                <tr class="bg-white border-b ">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $transaction->id }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $transaction->from_user->email }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $transaction->to_user->email }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $transaction->created_at }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ number_format($transaction->amount, 2) }} zł
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $transaction->message }}
                                    </td>
                                </tr>
                                @endforeach
                            @else 
                                <tr class="bg-white border-b ">
                                    <th colspan="6" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-center">Empty</th>
                                </tr>
                            @endif
                        </tbody>
                    </table>

                <div class="p-3">
                    {{ $transactions->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
