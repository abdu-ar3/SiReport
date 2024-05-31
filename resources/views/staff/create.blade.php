<x-app-layout>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('To Do List Activity') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden p-10 shadow-sm sm:rounded-lg">

                @if($errors->any())
                @foreach($errors->all() as $error)
                <div class="py-3 w-full rounded-3xl bg-red-500 text-white">
                    {{$error}}
                </div>
                @endforeach
                @endif

                <form method="POST" action="#" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <x-input-label for="todo_list" :value="__('To Do List')" />
                        <x-text-input id="todo_list" class="block mt-1 w-full" type="text" name="todo_list"
                            :value="old('todo_list')" required autofocus autocomplete="todo_list" />
                        <x-input-error :messages="$errors->get('todo_list')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <label for="start_date" class="block text-sm font-medium text-gray-700">Date Activity</label>
                        <div class="mt-1">
                            <input type="date" name="start_date" id="start_date" required
                                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>

                    <div class="flex items-center justify-end mt-4">

                        <button type="submit" class="font-bold py-2 px-4 bg-indigo-700 text-white rounded-full">
                            Submit
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

</x-app-layout>