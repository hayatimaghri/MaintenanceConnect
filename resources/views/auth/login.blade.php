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
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.08);
            outline: none;
        }
    </style>
</head>

<body class="h-screen overflow-hidden bg-slate-50">

    <div class="h-screen flex flex-col">


        <!-- ================= NAVBAR ================= -->

        <header class="bg-white border-b border-slate-200">

            <div class="max-w-6xl mx-auto px-6">

                <div class="h-16 flex items-center justify-between">

                    <!-- LOGO -->

                    <a href="/" class="flex items-center gap-3">
                        <x-application-logo />
                    </a>


                    <!-- REGISTER -->

                    @if (Route::has('register'))

                        <a
                            href="{{ route('register') }}"
                            class="text-sm font-medium text-blue-700 hover:text-blue-800 transition"
                        >
                            Créer un compte
                        </a>

                    @endif

                </div>

            </div>

        </header>



        <!-- ================= MAIN ================= -->

        <main class="flex-1 flex items-center justify-center px-5">

            <div class="w-full max-w-md">

                <!-- CARD -->

                <div class="bg-white border border-slate-200 rounded-xl shadow-sm p-8">


                    <!-- TITLE -->

                    <div class="text-center mb-7">

                        <div class="mx-auto mb-4 w-11 h-11 rounded-lg bg-blue-50 flex items-center justify-center">

                            <i class="fa-solid fa-lock text-blue-700"></i>

                        </div>

                        <h2 class="text-2xl font-bold text-slate-900">
                            Se connecter
                        </h2>

                        <p class="text-sm text-slate-500 mt-2">
                            Accédez à votre espace professionnel.
                        </p>

                    </div>



                    <!-- SESSION STATUS -->

                    @if (session('status'))

                        <div class="mb-5 px-4 py-3 rounded-lg bg-green-50 border border-green-200 text-sm text-green-700">

                            {{ session('status') }}

                        </div>

                    @endif



                    <!-- ERRORS -->

                    @if ($errors->any())

                        <div class="mb-5 px-4 py-3 rounded-lg bg-red-50 border border-red-200">

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

                    <form
                        x-data="{ submitting: false }"
                        @submit="submitting = true"
                        method="POST"
                        action="{{ route('login') }}"
                        class="space-y-5"
                    >

                        @csrf



                        <!-- EMAIL -->

                        <div>

                            <label
                                for="email"
                                class="block text-sm font-medium text-slate-700 mb-2"
                            >
                                Adresse email
                            </label>

                            <div class="relative">

                                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">

                                    <i class="fa-regular fa-envelope text-slate-400 text-sm"></i>

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
                                    class="input-focus w-full pl-10 pr-4 py-3
                                           border border-slate-300
                                           rounded-lg
                                           text-sm text-slate-800
                                           bg-white
                                           transition"
                                >

                            </div>

                        </div>



                        <!-- PASSWORD -->

                        <div>

                            <div class="flex items-center justify-between mb-2">

                                <label
                                    for="password"
                                    class="text-sm font-medium text-slate-700"
                                >
                                    Mot de passe
                                </label>


                                @if (Route::has('password.request'))

                                    <a
                                        href="{{ route('password.request') }}"
                                        class="text-xs font-medium text-blue-700 hover:underline"
                                    >
                                        Mot de passe oublié ?
                                    </a>

                                @endif

                            </div>


                            <div class="relative">

                                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">

                                    <i class="fa-solid fa-lock text-slate-400 text-sm"></i>

                                </div>


                                <input
                                    id="password"
                                    type="password"
                                    name="password"
                                    required
                                    autocomplete="current-password"
                                    placeholder="Votre mot de passe"
                                    class="input-focus w-full pl-10 pr-11 py-3
                                           border border-slate-300
                                           rounded-lg
                                           text-sm text-slate-800
                                           bg-white
                                           transition"
                                >


                                <!-- SHOW PASSWORD -->

                                <button
                                    type="button"
                                    onclick="togglePassword()"
                                    class="absolute inset-y-0 right-0 px-3.5 text-slate-400 hover:text-slate-700 transition"
                                >

                                    <i
                                        id="passwordIcon"
                                        class="fa-regular fa-eye text-sm"
                                    ></i>

                                </button>

                            </div>

                        </div>



                        <!-- REMEMBER -->

                        <div class="flex items-center">

                            <input
                                id="remember"
                                type="checkbox"
                                name="remember"
                                class="w-4 h-4 rounded border-slate-300 text-blue-700 focus:ring-blue-600"
                            >

                            <label
                                for="remember"
                                class="ml-2 text-sm text-slate-600"
                            >
                                Se souvenir de moi
                            </label>

                        </div>



                        <!-- BUTTON -->

                        <button
                            type="submit"
                            :disabled="submitting"
                            class="w-full py-3 px-5
                                   bg-blue-700
                                   hover:bg-blue-800
                                   text-white
                                   text-sm
                                   font-semibold
                                   rounded-lg
                                   transition
                                   duration-200"
                        >

                            <span x-show="!submitting">

                                <i class="fa-solid fa-right-to-bracket mr-2"></i>

                                Se connecter

                            </span>

                            <span x-cloak x-show="submitting">
                                Connexion...
                            </span>

                        </button>

                    </form>



                    <!-- REGISTER -->

                    @if (Route::has('register'))

                        <div class="mt-6 pt-6 border-t border-slate-200 text-center">

                            <p class="text-sm text-slate-500">

                                Vous n'avez pas encore de compte ?

                                <a
                                    href="{{ route('register') }}"
                                    class="font-semibold text-blue-700 hover:text-blue-800"
                                >
                                    Créer un compte
                                </a>

                            </p>

                        </div>

                    @endif



                    <!-- SECURITY -->

                    <div class="mt-5 flex items-center justify-center gap-2 text-xs text-slate-400">

                        <i class="fa-solid fa-shield-halved"></i>

                        Connexion sécurisée

                    </div>

                </div>

            </div>

        </main>



        <!-- ================= FOOTER ================= -->

        <footer class="bg-white border-t border-slate-200">

            <div class="max-w-6xl mx-auto px-6">

                <div class="h-12 flex items-center justify-center">

                    <p class="text-xs text-slate-400">
                        © {{ date('Y') }} MaintenanceConnect. Tous droits réservés.
                    </p>

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