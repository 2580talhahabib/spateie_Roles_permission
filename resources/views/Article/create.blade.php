<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Article Create') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                {{-- <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div> --}}
                <form action="{{route('articles.store')}}" method="POST">
                    @csrf
                <div class="m-5">
                    <label for="" class="text-lg font-medium text-gray-600">Title</label>
                    <br>
                    <input type="text" name="title" class="border-gray-300 shadow-sm w-96 rounded-lg p-2" >
                </div>
                @error('title')
                <div class="text-red-600">
                         {{ $message }}
                </div>
                @enderror

                   {{-- content  --}}

                   <div class="m-5">
                    <label for="" class="text-lg font-medium text-gray-600">Content</label>
                    <br>
                    {{-- <input type="text" name="name" class="border-gray-300 shadow-sm w-96 rounded-lg p-2" > --}}
                    <textarea name="text" class="border-gray-300 shadow-sm w-96 rounded-lg p-2" cols="20" rows="4"></textarea>
                </div>
                @error('text')
                <div class="text-red-600">
                         {{ $message }}
                </div>
                @enderror

                <div class="m-5">
                    <label for="" class="text-lg font-medium text-gray-600">Auther</label>
                    <br>
                    <input type="text" name="auther" class="border-gray-300 shadow-sm w-96 rounded-lg p-2" >
                </div>
                @error('auther')
                <div class="text-red-600">
                         {{ $message }}
                </div>
                @enderror


                <div class="text-right">
                    <button type="submit" class=" border-gray-700 bg-gray-700  hover:text-gray-500 hover:bg-gray-600 text-center m-5  text-white font-bold py-2 px-4 rounded" >
                      Submit
                    </button>
                </div>

            </form>
            </div>
        </div>
    </div>
</x-app-layout>
