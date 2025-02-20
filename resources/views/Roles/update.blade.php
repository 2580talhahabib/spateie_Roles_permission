<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Roles Update') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                {{-- <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div> --}}
                <form action="{{route('Role.update',$role->id)}}" method="POST">
                    @csrf
                <div class="mt-3">
                    <label for="" class="text-lg font-medium text-gray-600">Name</label>
                    <br>
                    <input type="text" name="name" value="{{ $role->name }}" class="border-gray-300 shadow-sm w-full rounded-lg p-2" >
                </div>
                @error('name')
                <div class="text-red-600">
                         {{ $message }}
                </div>
                @enderror
                <div class="mt-3">
                    @foreach ($permission as $permissions)
                    {{-- <label for="permissions-{{ $permissions->id }}"> <input type="checkbox" {{ {$haspermission->contains($permissions->name) ? 'checked' : ''} }} id="permissions-{{ $permissions->id }}" value="{{ $permissions->name }}" class="m-1 rounded" name="permission[]">{{ $permissions->name }} </label><br> --}}
                    <label for="permissions-{{ $permissions->id }}">
                        <input type="checkbox"
                            {{ $haspermission->contains($permissions->name) ? 'checked' : '' }}
                            id="permissions-{{ $permissions->id }}"
                            value="{{ $permissions->name }}"
                            class="m-1 rounded"
                            name="permission[]">
                        {{ $permissions->name }}
                    </label><br>
                    @endforeach

                  </div>
                <div class="text-right">
                    <button type="submit" class=" border-gray-700 bg-gray-700  hover:text-gray-500 hover:bg-gray-600 text-center m-5  text-white font-bold py-2 px-4 rounded" >
                      Update
                    </button>
                </div>

            </form>
            </div>
        </div>
    </div>
</x-app-layout>
