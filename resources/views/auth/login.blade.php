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

<div class="min-h-screen flex flex-col">

<!-- ================= NAVBAR ================= -->

<header class="bg-white border-b border-slate-200">

    <div class="max-w-7xl mx-auto px-6 lg:px-10">

        <div class="h-20 flex items-center justify-between">

            <!-- LOGO -->

            <a href="/" class="flex items-center gap-3">
                <x-application-logo />
            </a>

            <!-- REGISTER -->

            @if (Route::has('register'))

                <a
                    href="{{ route('register') }}"
                    class="px-5 py-2.5 rounded-lg border border-[#0f4c81]
                           text-sm font-semibold text-[#0f4c81]
                           hover:bg-[#0f4c81] hover:text-white transition"
                >
                    Créer un compte
                </a>

            @endif

        </div>

    </div>

</header>


<!-- ================= MAIN ================= -->

<main class="flex-1 py-10 px-5">

    <div class="max-w-md mx-auto">

        <!-- ================= CARD ================= -->

        <div class="bg-white rounded-2xl shadow-lg
                    border border-slate-200 p-8 sm:p-10">


            <!-- ================= ICON ================= -->

            <div class="flex justify-center mb-6">

                <div class="w-14 h-14 bg-[#0f4c81]
                            rounded-2xl
                            flex items-center justify-center">

                    <i class="fa-solid fa-lock text-white text-xl"></i>

                </div>

            </div>


            <!-- ================= TITLE ================= -->

            <div class="text-center mb-7">

                <p class="text-sm font-medium text-[#0f4c81] mb-2">
                    MaintenanceConnect
                </p>

                <h2 class="text-3xl font-bold text-slate-900">
                    Se connecter
                </h2>

                <p class="text-sm text-slate-500 mt-2">
                    Accédez à votre espace professionnel.
                </p>

            </div>


            <!-- ================= SESSION STATUS ================= -->

            @if (session('status'))

                <div class="mb-6 p-4 rounded-xl
                            bg-green-50 border border-green-200">

                    <div class="flex items-center gap-2">

                        <i class="fa-solid fa-circle-check text-green-600"></i>

                        <span class="text-sm text-green-700">
                            {{ session('status') }}
                        </span>

                    </div>

                </div>

            @endif


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


            <!-- ================= LOGIN FORM ================= -->

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
                        class="block text-sm font-semibold
                               text-slate-700 mb-2"
                    >
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
                            autofocus
                            autocomplete="username"
                            placeholder="exemple@email.com"
                            class="input-focus w-full
                                   pl-11 pr-4 py-3.5
                                   border border-slate-300
                                   rounded-xl
                                   text-sm
                                   text-slate-800
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
                            class="text-sm font-semibold
                                   text-slate-700"
                        >
                            Mot de passe
                        </label>

                        @if (Route::has('password.request'))

                            <a
                                href="{{ route('password.request') }}"
                                class="text-xs font-semibold
                                       text-[#0f4c81]
                                       hover:underline"
                            >
                                Mot de passe oublié ?
                            </a>

                        @endif

                    </div>


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
                            autocomplete="current-password"
                            placeholder="Votre mot de passe"
                            class="input-focus w-full
                                   pl-11 pr-12 py-3.5
                                   border border-slate-300
                                   rounded-xl
                                   text-sm
                                   text-slate-800
                                   bg-white
                                   transition"
                        >


                        <!-- SHOW PASSWORD -->

                        <button
                            type="button"
                            onclick="togglePassword()"
                            class="absolute inset-y-0 right-0
                                   px-4 text-slate-400
                                   hover:text-slate-700 transition"
                        >

                            <i
                                id="passwordIcon"
                                class="fa-regular fa-eye"
                            ></i>

                        </button>

                    </div>

                </div>


                <!-- REMEMBER -->

                <div class="flex items-center gap-2 pt-1">

                    <input
                        id="remember"
                        type="checkbox"
                        name="remember"
                        class="w-4 h-4 rounded
                               border-slate-300
                               text-[#0f4c81]
                               focus:ring-[#0f4c81]"
                    >

                    <label
                        for="remember"
                        class="text-sm text-slate-600"
                    >
                        Se souvenir de moi
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
                           hover:shadow-md"
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


            <!-- ================= REGISTER ================= -->

            @if (Route::has('register'))

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

                        Vous n'avez pas encore de compte ?

                        <a
                            href="{{ route('register') }}"
                            class="font-semibold text-[#0f4c81]
                                   hover:underline"
                        >
                            Créer un compte
                        </a>

                    </p>

                </div>

            @endif


            <!-- SECURITY -->

            <div class="mt-6 flex items-center justify-center
                        gap-2 text-xs text-slate-400">

                <i class="fa-solid fa-shield-halved"></i>

                Connexion sécurisée

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
```

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
