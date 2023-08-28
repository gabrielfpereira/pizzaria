<x-app-layout>
 
    <div class="p-6 text-gray-900 dark:text-gray-100">
        <h1 class="my-4">Cadastar Cliente</h1>

        
        <form action="{{ route('client.store') }}" method="POST">
            @csrf
            @method('POST')
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nome do Cliente</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="João Santos...">
                    @if ($errors->has('name'))
                        <span class="text-red-500">{{ $errors->first('name') }}</span>                        
                    @endif
                </div>
                
                <div>
                    <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Número de Celular</label>
                    <input type="tel" pattern="([0-9]{2})(\) ([0-9]{5})-([0-9]{4})" id="phone" name="phone" value="{{ old('phone') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="(00) 00000-000" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}">
                    @if ($errors->has('phone'))
                    <span class="text-red-500">{{ $errors->first('phone') }}</span>                        
                @endif
                </div>
               
            </div>
            <div class="mb-6">
                <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Endereço</label>
                <input type="address" id="address" name="address" value="{{ old('address') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Rua 07 de Setembro, 100 ...">
                @if ($errors->has('address'))
                <span class="text-red-500">{{ $errors->first('address') }}</span>                        
            @endif
            </div> 
           
         
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Cadastrar</button>
        </form>

    </div>
 
</x-app-layout>