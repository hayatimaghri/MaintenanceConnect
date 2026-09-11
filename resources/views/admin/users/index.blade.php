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

                    {{-- MESSAGE SUCCESS --}}
                    @if (session('success'))
                        <div class="mb-6 rounded-lg bg-green-50 border border-green-200 px-4 py-3 text-sm text-green-700">
                            {{ session('success') }}
                        </div>
                    @endif

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

                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                        Statut
                                    </th>

                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                        Action
                                    </th>

                                </tr>
                            </thead>

                            <tbody class="bg-white divide-y divide-gray-200">

                                @forelse ($users as $user)

                                    <tr class="hover:bg-gray-50">

                                        {{-- NOM --}}
                                        <td class="px-6 py-4 text-sm font-medium text-gray-900">
                                            {{ $user->name }}
                                        </td>

                                        {{-- EMAIL --}}
                                        <td class="px-6 py-4 text-sm text-gray-600">
                                            {{ $user->email }}
                                        </td>

                                        {{-- TELEPHONE --}}
                                        <td class="px-6 py-4 text-sm text-gray-600">
                                            {{ $user->telephone ?? 'Non renseigné' }}
                                        </td>

                                        {{-- ROLE --}}
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

                                        {{-- STATUT --}}
                                        <td class="px-6 py-4">

                                            @if ($user->is_active)

                                                <span class="px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-700">
                                                    Actif
                                                </span>

                                            @else

                                                <span class="px-3 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-700">
                                                    Suspendu
                                                </span>

                                            @endif

                                        </td>

                                        {{-- ACTION --}}
                                        <td class="px-6 py-4">

                                            @if ($user->is_active)

                                                <form
                                                    method="POST"
                                                    action="{{ route('admin.users.suspend', $user) }}"
                                                >
                                                    @csrf
                                                    @method('PATCH')

                                                    <button
                                                        type="submit"
                                                        class="px-3 py-2 text-xs font-semibold rounded-lg bg-red-600 text-white hover:bg-red-700 transition"
                                                    >
                                                        Suspendre
                                                    </button>
                                                </form>

                                            @else

                                                <form
                                                    method="POST"
                                                    action="{{ route('admin.users.activate', $user) }}"
                                                >
                                                    @csrf
                                                    @method('PATCH')

                                                   <button
    type="submit"
    class="px-3 py-2 text-xs font-semibold rounded-lg bg-blue-600 text-white hover:bg-blue-700 transition"
>
    Réactiver
</button>
                                                </form>

                                            @endif

                                        </td>

                                    </tr>

                                @empty

                                    <tr>
                                        <td
                                            colspan="6"
                                            class="px-6 py-8 text-center text-gray-500"
                                        >
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