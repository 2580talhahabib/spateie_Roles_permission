<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Roles') }}
        </h2>
        <div class="text-right m-2">
            <a href="{{ route('Role.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ">
                Create
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <x-message></x-message>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                {{-- <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div> --}}
                <table class="table-auto w-full">
                    <thead class="border-gray-200 bg-gray-200">
                      <tr class="border-b">
                        <th class="px-6 py-3 text-left">#</th>
                        <th class="px-6 py-3 text-left">Name</th>
                        <th class="px-6 py-3 text-left">Created </th>
                        <th class="px-6 py-3 text-left">Permissions </th>
                        <th class="px-6 py-3 text-left">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($role as $roles)
                        <tr class="border-b">
                            <td class="px-6 py-3 text-left">{{ $roles->id }}</td>
                            <td class="px-6 py-3 text-left">{{ $roles->name }}</td>
                            <td class="px-6 py-3 text-left">{{ \Carbon\Carbon::parse($roles->created_at)->format('F j, Y') }}</td>
                            <td class="px-6 py-3 text-left">{{ $roles->permissions->pluck('name')->implode(',') }}</td>
                            <td class="px-6 py-3 text-left">
                                <form action="{{ route('Role.Destroy',$roles->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('Role.edit',$roles->id) }}" class="text-white bg-emerald-700 p-2 rounded hover:bg-emerald-500" >update</a>
                                    <button  class="text-white bg-red-700 py-1.5 px-1.5 rounded hover:bg-red-500 " >Delete</button>
                                </form>

                            </td>
                          </tr>

                        @endforeach

                    </tbody>
                  </table>
                  {{ $role->links() }}

            </div>
        </div>
    </div>
</x-app-layout>
