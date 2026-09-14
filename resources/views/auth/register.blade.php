
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Créer un compte - MaintenanceConnect</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        .input-focus:focus {
            border-color: #0f4c81;
            box-shadow: 0 0 0 3px rgba(15, 76, 129, 0.10);
            outline: none;
        }
    </style>
</head>

<body class="min-h-screen bg-slate-100">

<div class="min-h-screen flex flex-col">

    <!-- ================= NAVBAR ================= -->
    <header class="bg-white border-b border-slate-200">

        <div class="max-w-7xl mx-auto px-6 lg:px-10">

            <div class="h-20 flex items-center justify-between">

                <!-- LOGO -->
                <a href="/" class="flex items-center gap-3">
                    <x-application-logo />
                </a>


                <!-- NAVIGATION -->
                <nav class="hidden md:flex items-center gap-8">

                    <a href="/"
                       class="text-sm text-slate-600 hover:text-[#0f4c81] transition">
                        Accueil
                    </a>

                    <a href="#"
                       class="text-sm text-slate-600 hover:text-[#0f4c81] transition">
                        Missions
                    </a>

                    <a href="#"
                       class="text-sm text-slate-600 hover:text-[#0f4c81] transition">
                        Techniciens
                    </a>

                    <a href="#"
                       class="text-sm text-slate-600 hover:text-[#0f4c81] transition">
                        À propos
                    </a>

                </nav>


                <!-- LOGIN -->
                <a href="{{ route('login') }}"
                   class="px-5 py-2.5 rounded-lg border border-[#0f4c81]
                          text-sm font-semibold text-[#0f4c81]
                          hover:bg-[#0f4c81] hover:text-white transition">

                    Se connecter

                </a>

            </div>

        </div>

    </header>


    <!-- ================= MAIN ================= -->

    <main class="flex-1 py-10 px-5">

        <div class="max-w-lg mx-auto">

            <!-- ================= REGISTER CARD ================= -->

            <div class="bg-white rounded-2xl shadow-lg
                        border border-slate-200 p-8 sm:p-10">


                <!-- ICON -->

                <div class="flex justify-center mb-6">

                    <div class="w-14 h-14 bg-[#0f4c81]
                                rounded-2xl
                                flex items-center justify-center">

                        <i class="fa-solid fa-user-plus
                                  text-white text-xl"></i>

                    </div>

                </div>


                <!-- TITLE -->

                <div class="text-center mb-7">

                    <p class="text-sm font-medium text-[#0f4c81] mb-2">
                        MaintenanceConnect
                    </p>

                    <h2 class="text-3xl font-bold text-slate-900">
                        Créer un compte
                    </h2>

                    <p class="text-sm text-slate-500 mt-2">
                        Rejoignez notre plateforme de maintenance industrielle.
                    </p>

                </div>


                <!-- ================= ERRORS ================= -->

                @if ($errors->any())

                    <div class="mb-6 p-4 rounded-xl
                                bg-red-50 border border-red-200">

                        <div class="flex items-center gap-2 mb-2">

                            <i class="fa-solid fa-circle-exclamation
                                      text-red-500"></i>

                            <span class="text-sm font-semibold text-red-700">
                                Vérifiez les informations saisies
                            </span>

                        </div>

                        <ul class="text-sm text-red-600 space-y-1">

                            @foreach ($errors->all() as $error)

                                <li>
                                    • {{ $error }}
                                </li>

                            @endforeach

                        </ul>

                    </div>

                @endif


                <!-- ================= FORM ================= -->

                <form x-data="{ submitting: false }"
                      @submit="submitting = true"
                      method="POST"
                      action="{{ route('register') }}"
                      class="space-y-5">

                    @csrf


                    <!-- NAME -->

                    <div>

                        <label for="name"
                               class="block text-sm font-semibold
                                      text-slate-700 mb-2">

                            Nom complet

                        </label>

                        <div class="relative">

                            <div class="absolute inset-y-0 left-0
                                        pl-4 flex items-center
                                        pointer-events-none">

                                <i class="fa-regular fa-user
                                          text-slate-400"></i>

                            </div>

                            <input
                                id="name"
                                type="text"
                                name="name"
                                value="{{ old('name') }}"
                                required
                                autofocus
                                autocomplete="name"
                                placeholder="Votre nom complet"
                                class="input-focus w-full
                                       pl-11 pr-4 py-3.5
                                       border border-slate-300
                                       rounded-xl
                                       text-sm
                                       text-slate-800
                                       transition">

                        </div>

                    </div>


                    <!-- EMAIL -->

                    <div>

                        <label for="email"
                               class="block text-sm font-semibold
                                      text-slate-700 mb-2">

                            Adresse email

                        </label>

                        <div class="relative">

                            <div class="absolute inset-y-0 left-0
                                        pl-4 flex items-center
                                        pointer-events-none">

                                <i class="fa-regular fa-envelope
                                          text-slate-400"></i>

                            </div>

                            <input
                                id="email"
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                autocomplete="username"
                                placeholder="exemple@email.com"
                                class="input-focus w-full
                                       pl-11 pr-4 py-3.5
                                       border border-slate-300
                                       rounded-xl
                                       text-sm
                                       text-slate-800
                                       transition">

                        </div>

                    </div>


                    <!-- PASSWORD -->

                    <div>

                        <label for="password"
                               class="block text-sm font-semibold
                                      text-slate-700 mb-2">

                            Mot de passe

                        </label>

                        <div class="relative">

                            <div class="absolute inset-y-0 left-0
                                        pl-4 flex items-center
                                        pointer-events-none">

                                <i class="fa-solid fa-lock
                                          text-slate-400"></i>

                            </div>

                            <input
                                id="password"
                                type="password"
                                name="password"
                                required
                                autocomplete="new-password"
                                placeholder="Créer un mot de passe"
                                class="input-focus w-full
                                       pl-11 pr-12 py-3.5
                                       border border-slate-300
                                       rounded-xl
                                       text-sm
                                       text-slate-800
                                       transition">


                            <button
                                type="button"
                                onclick="togglePassword('password', 'passwordIcon')"
                                class="absolute inset-y-0 right-0
                                       px-4 text-slate-400
                                       hover:text-slate-700">

                                <i id="passwordIcon"
                                   class="fa-regular fa-eye"></i>

                            </button>

                        </div>

                    </div>


                    <!-- CONFIRM PASSWORD -->

                    <div>

                        <label for="password_confirmation"
                               class="block text-sm font-semibold
                                      text-slate-700 mb-2">

                            Confirmer le mot de passe

                        </label>

                        <div class="relative">

                            <div class="absolute inset-y-0 left-0
                                        pl-4 flex items-center
                                        pointer-events-none">

                                <i class="fa-solid fa-lock
                                          text-slate-400"></i>

                            </div>

                            <input
                                id="password_confirmation"
                                type="password"
                                name="password_confirmation"
                                required
                                autocomplete="new-password"
                                placeholder="Confirmer votre mot de passe"
                                class="input-focus w-full
                                       pl-11 pr-12 py-3.5
                                       border border-slate-300
                                       rounded-xl
                                       text-sm
                                       text-slate-800
                                       transition">


                            <button
                                type="button"
                                onclick="togglePassword(
                                    'password_confirmation',
                                    'confirmationIcon'
                                )"
                                class="absolute inset-y-0 right-0
                                       px-4 text-slate-400
                                       hover:text-slate-700">

                                <i id="confirmationIcon"
                                   class="fa-regular fa-eye"></i>

                            </button>

                        </div>

                    </div>


                    <!-- ================= ROLE ================= -->

                    <div>

                        <label class="block text-sm font-semibold
                                      text-slate-700 mb-3">

                            Je suis :

                        </label>


                        <div class="grid grid-cols-2 gap-3">


                            <!-- ENTREPRISE -->

                            <label class="cursor-pointer">

                                <input
                                    type="radio"
                                    name="role"
                                    value="Entreprise"
                                    class="hidden peer"
                                    {{ old('role') == 'Entreprise' ? 'checked' : '' }}
                                >

                                <div class="border border-slate-300
                                            rounded-xl
                                            px-4 py-4
                                            text-center
                                            peer-checked:border-[#0f4c81]
                                            peer-checked:bg-blue-50
                                            transition">

                                    <div class="text-2xl mb-1">
                                        🏢
                                    </div>

                                    <span class="text-sm font-semibold
                                                 text-slate-700">

                                        Entreprise

                                    </span>

                                </div>

                            </label>


                            <!-- TECHNICIEN -->

                            <label class="cursor-pointer">

                                <input
                                    type="radio"
                                    name="role"
                                    value="Technicien"
                                    class="hidden peer"
                                    {{ old('role') == 'Technicien' ? 'checked' : '' }}
                                >

                                <div class="border border-slate-300
                                            rounded-xl
                                            px-4 py-4
                                            text-center
                                            peer-checked:border-[#0f4c81]
                                            peer-checked:bg-blue-50
                                            transition">

                                    <div class="text-2xl mb-1">
                                        🔧
                                    </div>

                                    <span class="text-sm font-semibold
                                                 text-slate-700">

                                        Technicien

                                    </span>

                                </div>

                            </label>

                        </div>

                    </div>


                    <!-- ================= TERMS ================= -->

                    <div class="flex items-start gap-3 pt-1">

                        <input
                            id="terms"
                            type="checkbox"
                            required
                            class="mt-1 w-4 h-4 rounded
                                   border-slate-300
                                   text-[#0f4c81]
                                   focus:ring-[#0f4c81]"
                        >

                        <label for="terms"
                               class="text-xs text-slate-500
                                      leading-relaxed">

                            J'accepte les

                            <a href="#"
                               class="text-[#0f4c81]
                                      font-semibold hover:underline">

                                conditions d'utilisation

                            </a>

                            et la

                            <a href="#"
                               class="text-[#0f4c81]
                                      font-semibold hover:underline">

                                politique de confidentialité

                            </a>.

                        </label>

                    </div>


                    <!-- ================= BUTTON ================= -->

                    <button
                        type="submit"
                        :disabled="submitting"
                        class="w-full py-3.5 px-5
                               bg-[#0f4c81]
                               hover:bg-[#0b3b65]
                               text-white
                               font-semibold
                               rounded-xl
                               transition
                               duration-200
                               shadow-sm
                               hover:shadow-md">

                        <span x-show="!submitting">

                            <i class="fa-solid fa-user-plus mr-2"></i>

                            Créer mon compte

                        </span>

                        <span x-cloak x-show="submitting">
                            Création en cours...
                        </span>

                    </button>

                </form>


                <!-- ================= LOGIN ================= -->

                <div class="relative my-7">

                    <div class="absolute inset-0 flex items-center">

                        <div class="w-full border-t border-slate-200"></div>

                    </div>

                    <div class="relative flex justify-center">

                        <span class="bg-white px-4
                                     text-xs text-slate-400">

                            OU

                        </span>

                    </div>

                </div>


                <div class="text-center">

                    <p class="text-sm text-slate-500">

                        Vous avez déjà un compte ?

                        <a href="{{ route('login') }}"
                           class="font-semibold text-[#0f4c81]
                                  hover:underline">

                            Se connecter

                        </a>

                    </p>

                </div>


                <!-- SECURITY -->

                <div class="mt-6 flex items-center justify-center
                            gap-2 text-xs text-slate-400">

                    <i class="fa-solid fa-shield-halved"></i>

                    Inscription sécurisée

                </div>

            </div>

        </div>

    </main>


    <!-- ================= FOOTER ================= -->

    <footer class="bg-white border-t border-slate-200">

        <div class="max-w-7xl mx-auto px-6 lg:px-10">

            <div class="py-5 flex flex-col md:flex-row
                        items-center justify-between gap-4">

                <p class="text-xs text-slate-500">

                    © {{ date('Y') }} MaintenanceConnect.
                    Tous droits réservés.

                </p>

                <div class="flex items-center gap-6 text-xs text-slate-500">

                    <a href="#" class="hover:text-[#0f4c81]">
                        Confidentialité
                    </a>

                    <a href="#" class="hover:text-[#0f4c81]">
                        Conditions
                    </a>

                    <a href="#" class="hover:text-[#0f4c81]">
                        Contact
                    </a>

                </div>

            </div>

        </div>

    </footer>

</div>


<!-- ================= JAVASCRIPT ================= -->

<script>

    function togglePassword(inputId, iconId) {

        const input = document.getElementById(inputId);
        const icon = document.getElementById(iconId);

        if (input.type === "password") {

            input.type = "text";

            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");

        } else {

            input.type = "password";

            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");

        }

    }

</script>

</body>
</html>
