<x-app-layout>
 
    <div class="p-6 text-gray-900 dark:text-gray-100">
       <h2 class="my-4">Lista de Clientes</h2>
        
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            @if ($clients->count() > 0)
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Nome 
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Celular
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Endereço
                            </th>
                            <th scope="col" class="px-6 py-3">
                                ação
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clients as $client )
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $client->name }}
                                </th>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $client->phone }}
                                </th>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $client->address }}
                                </th>
                                
                                <td class="px-6 py-4">
                                    <a href="{{ route('client.edit', $client) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</a>
                                    <form action="{{ route('client.destroy', $client) }}" method="POST" onsubmit="submitForm()">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" onclick="submitForm(event.target.parentElement)" data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="font-medium text-red-600 dark:text-red-500 hover:underline">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            @else
                <x-icons.empty />
            @endif
        </div>

    </div>

    <x-exclude-notify />

    
</x-app-layout>