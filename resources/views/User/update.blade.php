<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users Update') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                {{-- <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div> --}}
                <form action="{{ route('users.update', $edit->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="m-5">
                        <label for="" class="text-lg font-medium text-gray-600">Name</label>
                        <br>
                        <input type="text" name="name" value="{{ $edit->name }}"
                            class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                    </div>
                    @error('name')
                        <div class="text-red-600">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="m-5">
                        <label for="" class="text-lg font-medium text-gray-600">Email</label>
                        <br>
                        <input type="text" name="email" value="{{ $edit->email }}"
                            class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                    </div>
                    @error('email')
                        <div class="text-red-600">
                            {{ $message }}
                        </div>
                    @enderror

                    <div class="m-4">
                        @foreach ($role as $roles)
                            <label for="permissions-{{ $roles->id }}"> <input type="checkbox"
                                {{ $hasrole->contains($roles->name) ? 'checked' : '' }}
                                    id="roles-{{ $roles->id }}" value="{{ $roles->name }}" class="m-1 rounded"
                                    name="roles[]">{{ $roles->name }} </label><br>
                        @endforeach

                    </div>
                    <div class="text-right">
                        <button type="submit"
                            class=" border-gray-700 bg-gray-700  hover:text-gray-500 hover:bg-gray-600 text-center m-5  text-white font-bold py-2 px-4 rounded">
                            Update
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
