<x-app-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Wel Done Activity') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden p-10 shadow-sm sm:rounded-lg">

                @if($errors->any())
                @foreach($errors->all() as $error)
                <div class="py-3 w-full rounded-3xl bg-red-500 text-white">
                    {{$error}}
                </div>
                @endforeach
                @endif
                <p class="text-indigo-950 text-xl font-bold text-center py-2">Cheklis</p>

                @foreach ($todos as $todo)
                <div class="item-card flex flex-col md:flex-row gap-y-10 justify-between md:items-center py-2">
                    <div class="hidden md:flex flex-col">
                        <p class="text-indigo-950 text-xl font-bold">{{ $todo->title }}</p>
                    </div>
                    <div class="hidden md:flex flex-col">
                        <h3 class="text-indigo-950 text-l">Start Date</h3>
                        <h3 class="text-indigo-950 text-l">{{ $todo->start_date }}</h3>
                    </div>
                    <div class="hidden md:flex flex-col">
                        <h3 class="text-indigo-950 text-l">Due Date</h3>
                        <h3 class="text-indigo-950 text-l">{{ $todo->due_date }}</h3>
                    </div>
                    <div class="hidden md:flex flex-row items-center gap-x-3">
                        <form method="POST" action="{{ route('staff.todos.complete', $todo->id) }}">
                            @csrf
                            <button type="submit" class="font-bold py-2 px-4 bg-indigo-700 text-white rounded-full">
                                <i class="fa-solid fa-check"></i>
                            </button>
                        </form>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden p-10 shadow-sm sm:rounded-lg">

                @if($errors->any())
                @foreach($errors->all() as $error)
                <div class="py-3 w-full rounded-3xl bg-red-500 text-white">
                    {{$error}}
                </div>
                @endforeach
                @endif

                <p class="text-indigo-950 text-xl font-bold text-center py-2">Which has been done</p>

                @foreach ($completedTodos as $todo)
                <div class="item-card flex flex-col md:flex-row gap-y-10 justify-between md:items-center py-2">

                    <div class="hidden md:flex flex-col">
                        <p class="text-indigo-950 text-xl font-bold">{{ $todo->title }}</p>
                    </div>
                    <div class="hidden md:flex flex-col">
                        <h3 class="text-indigo-950 text-l">Start Date</h3>
                        <h3 class="text-indigo-950 text-l">{{ $todo->start_date }}</h3>
                    </div>
                    <div class="hidden md:flex flex-col">
                        <h3 class="text-indigo-950 text-l">Due Date</h3>
                        <h3 class="text-indigo-950 text-l">{{ $todo->due_date }}</h3>
                    </div>
                    <div class="hidden md:flex flex-row items-center">
                        <form method="POST" action="{{ route('staff.todos.complete', $todo->id) }}">
                            @csrf
                            <button type="submit" class="font-bold py-2 px-4 bg-indigo-700 text-white rounded-full">
                                <i class="fa fa-refresh" aria-hidden="true"></i>
                            </button>
                        </form>

                        <form action="{{route('staff.plan.destroy', $todo->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="font-bold py-2 px-4 bg-red-700 text-white rounded-full">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                        </form>
                    </div>

                </div>
                @endforeach

            </div>
        </div>
    </div>
</x-app-layout>