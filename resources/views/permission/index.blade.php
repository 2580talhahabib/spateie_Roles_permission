<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Permission') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                {{-- <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div> --}}
                <table class="table-auto w-full">
                    <thead class="border-gray-50">
                      <tr class="border-b">
                        <th class="px-6 py-3 text-left">#</th>
                        <th class="px-6 py-3 text-left">Name</th>
                        <th class="px-6 py-3 text-left">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="border-b">
                        <td class="px-6 py-3 text-left">1</td>
                        <td class="px-6 py-3 text-left">Malcolm Lockyer</td>
                        <td class="px-6 py-3 text-left">1961</td>
                      </tr>

                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</x-app-layout>
