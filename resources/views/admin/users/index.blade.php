<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Gestion des utilisateurs
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">

                    <h3 class="text-lg font-semibold text-gray-800 mb-6">
                        Entreprises et Techniciens
                    </h3>

                    <div class="overflow-x-auto">

                        <table class="min-w-full divide-y divide-gray-200">

                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                        Nom
                                    </th>

                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                        Email
                                    </th>

                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                        Téléphone
                                    </th>

                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                        Rôle
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="bg-white divide-y divide-gray-200">

                                @forelse ($users as $user)

                                    <tr class="hover:bg-gray-50">

                                        <td class="px-6 py-4 text-sm font-medium text-gray-900">
                                            {{ $user->name }}
                                        </td>

                                        <td class="px-6 py-4 text-sm text-gray-600">
                                            {{ $user->email }}
                                        </td>

                                        <td class="px-6 py-4 text-sm text-gray-600">
                                            {{ $user->telephone ?? 'Non renseigné' }}
                                        </td>

                                        <td class="px-6 py-4">

                                            @if ($user->role === 'Entreprise')

                                                <span class="px-3 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-700">
                                                    Entreprise
                                                </span>

                                            @else

                                                <span class="px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-700">
                                                    Technicien
                                                </span>

                                            @endif

                                        </td>

                                    </tr>

                                @empty

                                    <tr>
                                        <td colspan="4" class="px-6 py-8 text-center text-gray-500">
                                            Aucun utilisateur trouvé.
                                        </td>
                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>
            </div>

        </div>
    </div>

</x-app-layout>