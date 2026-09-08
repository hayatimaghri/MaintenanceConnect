<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Connexion - MaintenanceConnect</title>

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

    <!-- PAGE -->
    <div class="min-h-screen flex flex-col">

        <!-- ================= NAVBAR ================= -->
        <header class="bg-white border-b border-slate-200">

            <div class="max-w-7xl mx-auto px-6 lg:px-10">

                <div class="h-20 flex items-center justify-between">

                    <!-- LOGO -->
                    <a href="/" class="flex items-center gap-3">

                        <div class="w-11 h-11 bg-[#0f4c81] rounded-xl flex items-center justify-center shadow-sm">
                            <i class="fa-solid fa-screwdriver-wrench text-white text-lg"></i>
                        </div>

                        <div>
                            <h1 class="text-xl font-bold text-slate-900">
                                Maintenance<span class="text-[#0f4c81]">Connect</span>
                            </h1>

                            <p class="text-[11px] text-slate-500">
                                Maintenance industrielle
                            </p>
                        </div>

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

                    <!-- ACTION -->
                    <div class="flex items-center gap-3">

                        <a href="#"
                           class="hidden sm:inline-block text-sm font-medium text-slate-700 hover:text-[#0f4c81]">
                            Créer un compte
                        </a>

                    </div>

                </div>

            </div>

        </header>


        <!-- ================= MAIN ================= -->
        <main class="flex-1 flex items-center justify-center px-5 py-12">

            <div class="w-full max-w-5xl">

                <div class="grid lg:grid-cols-2 bg-white rounded-3xl shadow-xl overflow-hidden">


                    <!-- ================= LEFT ================= -->
                    <div class="hidden lg:flex bg-[#0f4c81] text-white p-12 relative overflow-hidden">

                        <!-- Decorative circles -->
                        <div class="absolute -top-24 -right-24 w-72 h-72 rounded-full bg-white/5"></div>

                        <div class="absolute -bottom-32 -left-20 w-80 h-80 rounded-full bg-white/5"></div>


                        <div class="relative z-10 flex flex-col justify-between w-full">

                            <div>

                                <!-- ICON -->
                                <div class="w-16 h-16 bg-white/10 rounded-2xl flex items-center justify-center mb-8">

                                    <i class="fa-solid fa-industry text-3xl text-white"></i>

                                </div>


                                <h2 class="text-4xl font-bold leading-tight mb-5">

                                    La maintenance
                                    <br>

                                    <span class="text-blue-200">
                                        autrement.
                                    </span>

                                </h2>


                                <p class="text-blue-100 leading-relaxed max-w-md">

                                    Connectez les entreprises industrielles
                                    avec des techniciens qualifiés pour
                                    réaliser vos interventions rapidement
                                    et efficacement.

                                </p>

                            </div>


                            <!-- FEATURES -->
                            <div class="space-y-5 mt-12">

                                <div class="flex items-center gap-4">

                                    <div class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center">
                                        <i class="fa-solid fa-user-gear"></i>
                                    </div>

                                    <div>
                                        <p class="font-semibold">
                                            Techniciens qualifiés
                                        </p>

                                        <p class="text-sm text-blue-200">
                                            Trouvez les compétences adaptées
                                        </p>
                                    </div>

                                </div>


                                <div class="flex items-center gap-4">

                                    <div class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center">
                                        <i class="fa-solid fa-bolt"></i>
                                    </div>

                                    <div>
                                        <p class="font-semibold">
                                            Intervention rapide
                                        </p>

                                        <p class="text-sm text-blue-200">
                                            Réduisez les temps d'arrêt
                                        </p>
                                    </div>

                                </div>


                                <div class="flex items-center gap-4">

                                    <div class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center">
                                        <i class="fa-solid fa-shield-halved"></i>
                                    </div>

                                    <div>
                                        <p class="font-semibold">
                                            Plateforme sécurisée
                                        </p>

                                        <p class="text-sm text-blue-200">
                                            Vos données sont protégées
                                        </p>
                                    </div>

                                </div>

                            </div>


                            <div class="mt-10 text-sm text-blue-200">

                                <i class="fa-solid fa-circle-check mr-2"></i>

                                Une solution pensée pour l'industrie

                            </div>

                        </div>

                    </div>


                    <!-- ================= RIGHT / LOGIN ================= -->
                    <div class="p-8 sm:p-12 lg:p-14">

                        <div class="max-w-md mx-auto">

                            <!-- MOBILE LOGO -->
                            <div class="lg:hidden flex justify-center mb-8">

                                <div class="w-14 h-14 bg-[#0f4c81] rounded-2xl flex items-center justify-center">

                                    <i class="fa-solid fa-screwdriver-wrench text-white text-xl"></i>

                                </div>

                            </div>


                            <!-- TITLE -->
                            <div class="mb-8">

                                <p class="text-sm font-medium text-[#0f4c81] mb-2">
                                    Bienvenue sur MaintenanceConnect
                                </p>

                                <h2 class="text-3xl font-bold text-slate-900">
                                    Se connecter
                                </h2>

                                <p class="text-sm text-slate-500 mt-2">
                                    Accédez à votre espace professionnel.
                                </p>

                            </div>


                            <!-- SESSION STATUS -->
                            @if (session('status'))
                                <div class="mb-5 p-4 rounded-xl bg-green-50 border border-green-200 text-sm text-green-700">
                                    {{ session('status') }}
                                </div>
                            @endif


                            <!-- ERRORS -->
                            @if ($errors->any())
                                <div class="mb-5 p-4 rounded-xl bg-red-50 border border-red-200">

                                    <ul class="text-sm text-red-600 space-y-1">

                                        @foreach ($errors->all() as $error)

                                            <li>
                                                <i class="fa-solid fa-circle-exclamation mr-2"></i>
                                                {{ $error }}
                                            </li>

                                        @endforeach

                                    </ul>

                                </div>
                            @endif


                            <!-- LOGIN FORM -->
                            <form x-data="{ submitting: false }" @submit="submitting = true" method="POST" action="{{ route('login') }}" class="space-y-6">

                                @csrf


                                <!-- EMAIL -->
                                <div>

                                    <label for="email"
                                           class="block text-sm font-semibold text-slate-700 mb-2">

                                        Adresse email

                                    </label>


                                    <div class="relative">

                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">

                                            <i class="fa-regular fa-envelope text-slate-400"></i>

                                        </div>


                                        <input
                                            id="email"
                                            type="email"
                                            name="email"
                                            value="{{ old('email') }}"
                                            required
                                            autofocus
                                            autocomplete="username"

                                            placeholder="exemple@email.com"

                                            class="input-focus w-full pl-11 pr-4 py-3.5
                                                   border border-slate-300
                                                   rounded-xl
                                                   text-sm text-slate-800
                                                   bg-white
                                                   transition"
                                        >

                                    </div>

                                </div>


                                <!-- PASSWORD -->
                                <div>

                                    <div class="flex items-center justify-between mb-2">

                                        <label for="password"
                                               class="text-sm font-semibold text-slate-700">

                                            Mot de passe

                                        </label>


                                        @if (Route::has('password.request'))

                                            <a href="{{ route('password.request') }}"
                                               class="text-xs font-medium text-[#0f4c81] hover:underline">

                                                Mot de passe oublié ?

                                            </a>

                                        @endif

                                    </div>


                                    <div class="relative">

                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">

                                            <i class="fa-solid fa-lock text-slate-400"></i>

                                        </div>


                                        <input
                                            id="password"
                                            type="password"
                                            name="password"
                                            required
                                            autocomplete="current-password"

                                            placeholder="Votre mot de passe"

                                            class="input-focus w-full pl-11 pr-12 py-3.5
                                                   border border-slate-300
                                                   rounded-xl
                                                   text-sm text-slate-800
                                                   bg-white
                                                   transition"
                                        >


                                        <!-- SHOW PASSWORD -->
                                        <button
                                            type="button"
                                            onclick="togglePassword()"
                                            class="absolute inset-y-0 right-0 px-4 text-slate-400 hover:text-slate-700">

                                            <i id="passwordIcon"
                                               class="fa-regular fa-eye"></i>

                                        </button>

                                    </div>

                                </div>


                                <!-- REMEMBER -->
                                <div class="flex items-center">

                                    <input
                                        id="remember"
                                        type="checkbox"
                                        name="remember"

                                        class="w-4 h-4 rounded border-slate-300 text-[#0f4c81] focus:ring-[#0f4c81]"
                                    >

                                    <label for="remember"
                                           class="ml-2 text-sm text-slate-600">

                                        Se souvenir de moi

                                    </label>

                                </div>


                                <!-- BUTTON -->
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

                                    <span x-show="!submitting"><i class="fa-solid fa-right-to-bracket mr-2"></i>Se connecter</span>
                                    <span x-cloak x-show="submitting">Connexion...</span>

                                </button>

                            </form>


                            <!-- REGISTER -->
                            @if (Route::has('register'))

                                <div class="relative my-8">

                                    <div class="absolute inset-0 flex items-center">

                                        <div class="w-full border-t border-slate-200"></div>

                                    </div>

                                    <div class="relative flex justify-center">

                                        <span class="bg-white px-4 text-xs text-slate-400">
                                            OU
                                        </span>

                                    </div>

                                </div>


                                <div class="text-center">

                                    <p class="text-sm text-slate-500">

                                        Vous n'avez pas encore de compte ?

                                        <a href="{{ route('register') }}"
                                           class="font-semibold text-[#0f4c81] hover:underline">

                                            Créer un compte

                                        </a>

                                    </p>

                                </div>

                            @endif


                            <!-- SECURITY -->
                            <div class="mt-8 flex items-center justify-center gap-2 text-xs text-slate-400">

                                <i class="fa-solid fa-shield-halved"></i>

                                Connexion sécurisée

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </main>


        <!-- ================= FOOTER ================= -->
        <footer class="bg-white border-t border-slate-200">

            <div class="max-w-7xl mx-auto px-6 lg:px-10">

                <div class="py-6 flex flex-col md:flex-row items-center justify-between gap-4">

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

        function togglePassword() {

            const password = document.getElementById('password');
            const icon = document.getElementById('passwordIcon');

            if (password.type === 'password') {

                password.type = 'text';

                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');

            } else {

                password.type = 'password';

                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');

            }

        }

    </script>

</body>
</html>