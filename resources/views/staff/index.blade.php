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

                <div class="item-card flex flex-col md:flex-row gap-y-10 justify-between md:items-center">
                    <div class="hidden md:flex flex-col">
                        <p class="text-indigo-950 text-xl font-bold">Activity</p>
                        <h3 class="text-indigo-950 text-l">Date</h3>
                    </div>
                    <div class="hidden md:flex flex-row items-center gap-x-3">
                        <a href="#" class="font-bold py-2 px-4 bg-indigo-700 text-white rounded-full">
                            <i class="fa-solid fa-check"></i>
                        </a>
                    </div>
                </div>

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

                <div class="item-card flex flex-col md:flex-row gap-y-10 justify-between md:items-center">

                    <div class="hidden md:flex flex-col">
                        <p class="text-indigo-950 text-xl font-bold">Activity</p>
                        <h3 class="text-indigo-950 text-l">Date</h3>
                    </div>
                    <div class="hidden md:flex flex-row items-center">
                        <a href="#" class="font-bold py-2 px-4 bg-indigo-700 text-white rounded-full">
                            <i class="fa fa-refresh" aria-hidden="true"></i>
                        </a>
                        <a href="#" class="font-bold py-2 px-4 bg-indigo-700 text-white rounded-full">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>
                    </div>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>