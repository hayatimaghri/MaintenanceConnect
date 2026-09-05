<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MaintenanceConnect - Maintenance industrielle au Maroc</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#075985',
                        secondary: '#0f4c81',
                        darkblue: '#082f49',
                        lightblue: '#e0f2fe',
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-white text-slate-800">

    <!-- ================= NAVBAR ================= -->
    <header class="border-b border-slate-200 bg-white">
        <div class="max-w-7xl mx-auto px-6 lg:px-10">

            <nav class="h-20 flex items-center justify-between">

                <!-- Logo -->
                <a href="/" class="flex items-center gap-2">
                    <div class="w-9 h-9 bg-sky-700 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-white"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M14.7 6.3a1 1 0 000 1.4l1.6 1.6a1 1 0 001.4 0l3.3-3.3a6 6 0 01-7.6 7.6L7.5 19.5a2.1 2.1 0 01-3-3l5.9-5.9a6 6 0 017.6-7.6l-3.3 3.3z"/>
                        </svg>
                    </div>

                    <span class="font-bold text-sky-900 text-lg">
                        Maintenance<span class="text-sky-600">Connect</span>
                    </span>
                </a>

                <!-- Menu -->
                <div class="hidden md:flex items-center gap-8 text-sm font-medium">

                    <a href="#accueil"
                       class="text-slate-700 hover:text-sky-700 transition">
                        Accueil
                    </a>

                    <a href="#missions"
                       class="text-slate-700 hover:text-sky-700 transition">
                        Missions
                    </a>

                    <a href="#techniciens"
                       class="text-slate-700 hover:text-sky-700 transition">
                        Techniciens
                    </a>

                    <a href="#apropos"
                       class="text-slate-700 hover:text-sky-700 transition">
                        À propos
                    </a>

                    <a href="#fonctionnement"
                       class="text-slate-700 hover:text-sky-700 transition">
                        Comment ça marche ?
                    </a>
                </div>

                <!-- Buttons -->
                <div class="flex items-center gap-3">

                    <a href="/login"
                       class="hidden sm:inline-flex px-5 py-2.5 rounded-lg
                              border border-slate-300 text-sm font-semibold
                              text-slate-700 hover:bg-slate-50 transition">
                        Se connecter
                    </a>

                    <a href="/register"
                       class="inline-flex px-5 py-2.5 rounded-lg
                              bg-yellow-400 text-slate-900 text-sm
                              font-bold hover:bg-yellow-300 transition shadow-sm">
                        S'inscrire
                    </a>

                </div>
            </nav>
        </div>
    </header>


    <!-- ================= HERO ================= -->
    <section id="accueil" class="bg-slate-50">

        <div class="max-w-7xl mx-auto px-6 lg:px-10">

            <div class="grid lg:grid-cols-2 gap-12 items-center py-14 lg:py-20">

                <!-- Text -->
                <div>

                    <div class="inline-flex items-center gap-2
                                bg-sky-100 text-sky-800
                                px-4 py-2 rounded-full
                                text-sm font-semibold mb-6">

                        <span class="w-2 h-2 rounded-full bg-green-500"></span>

                        Plateforme de maintenance industrielle
                    </div>

                    <h1 class="text-4xl md:text-5xl lg:text-6xl
                               font-extrabold text-slate-900
                               leading-tight">

                        Trouvez le technicien
                        <span class="text-sky-700">
                            industriel idéal
                        </span>
                        pour vos équipements industriels
                    </h1>

                    <p class="mt-6 text-lg text-slate-600
                              leading-relaxed max-w-xl">

                        MaintenanceConnect met en relation les entreprises
                        industrielles marocaines avec des techniciens qualifiés
                        et disponibles pour répondre rapidement à leurs besoins
                        de maintenance.
                    </p>

                    <!-- Buttons -->
                    <div class="flex flex-wrap gap-4 mt-8">

                        <a href="/missions/create"
                           class="inline-flex items-center gap-2
                                  px-7 py-3.5
                                  bg-sky-700 text-white
                                  rounded-lg font-semibold
                                  hover:bg-sky-800 transition shadow-lg">

                            Publier une mission

                            <svg class="w-5 h-5"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                            </svg>

                        </a>

                        <a href="/missions"
                           class="inline-flex items-center
                                  px-7 py-3.5
                                  bg-white
                                  border border-slate-300
                                  text-slate-700
                                  rounded-lg font-semibold
                                  hover:border-sky-600
                                  hover:text-sky-700
                                  transition">

                            Trouver une mission
                        </a>

                    </div>

                </div>


                <!-- Image -->
                <div class="relative">

                    <div class="rounded-3xl overflow-hidden shadow-2xl">

                        <img
                            src="{{ asset('images/hero.jpg') }}"
                            alt="Technicien de maintenance industrielle"
                            class="w-full h-[430px] object-cover"
                        >

                    </div>

                    <!-- Floating card -->
                    <div class="absolute -bottom-7 left-6
                                bg-white rounded-2xl shadow-xl
                                p-5 w-64">

                        <div class="flex items-center gap-3">

                            <div class="w-11 h-11 rounded-full
                                        bg-sky-100 flex items-center
                                        justify-center">

                                <svg class="w-6 h-6 text-sky-700"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">
                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>

                            </div>

                            <div>
                                <p class="text-sm text-slate-500">
                                    Techniciens de maintenance
                                </p>

                                <p class="text-2xl font-bold text-slate-900">
                                    Au Maroc
                                </p>
                            </div>

                        </div>

                        <div class="flex mt-3">
                            <span class="text-yellow-400">★</span>
                            <span class="text-yellow-400">★</span>
                            <span class="text-yellow-400">★</span>
                            <span class="text-yellow-400">★</span>
                            <span class="text-slate-300">★</span>
                        </div>

                    </div>

                </div>

            </div>


            <!-- Statistics -->
            <div class="border-t border-slate-200
                        py-8">

                <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">

                    <div>
                        <p class="text-2xl font-bold text-slate-900">
                            +1200
                        </p>
                        <p class="text-sm text-slate-500">
                            Missions publiées
                        </p>
                    </div>

                    <div>
                        <p class="text-2xl font-bold text-slate-900">
                            +850
                        </p>
                        <p class="text-sm text-slate-500">
                            Techniciens de maintenance au Maroc
                        </p>
                    </div>

                    <div>
                        <p class="text-2xl font-bold text-slate-900">
                            98%
                        </p>
                        <p class="text-sm text-slate-500">
                            Satisfaction client
                        </p>
                    </div>

                    <div>
                        <p class="text-2xl font-bold text-slate-900">
                            24h
                        </p>
                        <p class="text-sm text-slate-500">
                            Temps de réponse moyen
                        </p>
                    </div>

                </div>

            </div>

        </div>

    </section>


    <!-- ================= COMMENT ÇA MARCHE ================= -->
    <section id="fonctionnement" class="py-20 bg-white">

        <div class="max-w-7xl mx-auto px-6 lg:px-10">

            <div class="text-center mb-14">

                <p class="text-sky-700 font-semibold mb-2">
                    Simple et rapide
                </p>

                <h2 class="text-3xl md:text-4xl
                           font-bold text-slate-900">
                    Comment ça marche ?
                </h2>

                <p class="mt-4 text-slate-500">
                    En 3 étapes simples, trouvez le technicien qu'il vous faut.
                </p>

            </div>


            <div class="grid md:grid-cols-3 gap-10">

                <!-- Step 1 -->
                <div class="text-center">

                    <div class="mx-auto w-16 h-16
                                rounded-2xl bg-sky-100
                                flex items-center justify-center
                                mb-5">

                        <span class="text-2xl font-bold text-sky-700">
                            01
                        </span>

                    </div>

                    <h3 class="text-lg font-bold text-slate-900">
                        Publiez votre mission
                    </h3>

                    <p class="mt-3 text-slate-500 leading-relaxed">
                        Décrivez votre besoin de maintenance et recevez
                        rapidement des offres de techniciens qualifiés au Maroc.
                    </p>

                </div>


                <!-- Step 2 -->
                <div class="text-center">

                    <div class="mx-auto w-16 h-16
                                rounded-2xl bg-sky-100
                                flex items-center justify-center
                                mb-5">

                        <span class="text-2xl font-bold text-sky-700">
                            02
                        </span>

                    </div>

                    <h3 class="text-lg font-bold text-slate-900">
                        Comparez les offres
                    </h3>

                    <p class="mt-3 text-slate-500 leading-relaxed">
                        Consultez les profils, compétences, prix et délais
                        proposés par les différents techniciens.
                    </p>

                </div>


                <!-- Step 3 -->
                <div class="text-center">

                    <div class="mx-auto w-16 h-16
                                rounded-2xl bg-sky-100
                                flex items-center justify-center
                                mb-5">

                        <span class="text-2xl font-bold text-sky-700">
                            03
                        </span>

                    </div>

                    <h3 class="text-lg font-bold text-slate-900">
                        Choisissez votre technicien
                    </h3>

                    <p class="mt-3 text-slate-500 leading-relaxed">
                        Sélectionnez le professionnel adapté à votre besoin
                        et suivez votre intervention.
                    </p>

                </div>

            </div>

        </div>

    </section>


    <!-- ================= POURQUOI MAINTENANCECONNECT ================= -->
    <section id="apropos" class="py-20 bg-slate-50">

        <div class="max-w-7xl mx-auto px-6 lg:px-10">

            <div class="grid lg:grid-cols-3 gap-6">

                <!-- Image -->
                <div class="lg:col-span-1
                            rounded-3xl overflow-hidden
                            min-h-[350px]">

                    <img
                        src="{{ asset('images/maintenance.jpg') }}"
                        alt="Maintenance industrielle"
                        class="w-full h-full object-cover"
                    >

                </div>


                <!-- Text -->
                <div class="bg-white rounded-3xl p-8
                            border border-slate-100">

                    <span class="text-sky-700 font-semibold text-sm">
                        POURQUOI NOUS CHOISIR ?
                    </span>

                    <h2 class="mt-3 text-3xl font-bold
                               text-slate-900">
                        Pourquoi choisir
                        MaintenanceConnect ?
                    </h2>

                    <div class="mt-7 space-y-5">

                        <div class="flex gap-3">
                            <span class="text-green-500 font-bold">✓</span>
                            <p class="text-slate-600">
                                Techniciens qualifiés et vérifiés
                            </p>
                        </div>

                        <div class="flex gap-3">
                            <span class="text-green-500 font-bold">✓</span>
                            <p class="text-slate-600">
                                Réponse rapide à vos besoins
                            </p>
                        </div>

                        <div class="flex gap-3">
                            <span class="text-green-500 font-bold">✓</span>
                            <p class="text-slate-600">
                                Paiement sécurisé
                            </p>
                        </div>

                        <div class="flex gap-3">
                            <span class="text-green-500 font-bold">✓</span>
                            <p class="text-slate-600">
                                Support client dédié
                            </p>
                        </div>

                    </div>

                </div>


                <!-- Testimonial -->
                <div class="bg-sky-800 rounded-3xl p-8
                            text-white flex flex-col justify-between">

                    <div>

                        <div class="text-yellow-400 text-3xl">
                            "
                        </div>

                        <p class="mt-4 text-lg leading-relaxed">
                            Grâce à MaintenanceConnect, nous avons trouvé
                            un technicien compétent en moins de 24h.
                            Le service est rapide et efficace !
                        </p>

                    </div>

                    <div class="mt-8">

                        <p class="font-bold">
                            Karim B.
                        </p>

                        <p class="text-sky-200 text-sm">
                            Responsable Maintenance
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </section>


    <!-- ================= CTA ================= -->
    <section class="py-20">

        <div class="max-w-6xl mx-auto px-6">

            <div class="bg-sky-800 rounded-3xl
                        px-8 py-14 md:px-16
                        text-center text-white">

                <h2 class="text-3xl md:text-4xl
                           font-bold">
                    Besoin d'un technicien ?
                </h2>

                <p class="mt-4 text-sky-100
                          max-w-2xl mx-auto">
                    Publiez votre mission dès maintenant et trouvez
                    rapidement le professionnel adapté à votre besoin.
                </p>

                <div class="mt-8 flex flex-wrap
                            justify-center gap-4">

                    <a href="/missions/create"
                       class="px-7 py-3.5
                              bg-yellow-400
                              text-slate-900
                              rounded-lg
                              font-bold
                              hover:bg-yellow-300
                              transition">

                        Publier une mission
                    </a>

                    <a href="/register"
                       class="px-7 py-3.5
                              border border-white/40
                              text-white
                              rounded-lg
                              font-semibold
                              hover:bg-white/10
                              transition">

                        Créer un compte
                    </a>

                </div>

            </div>

        </div>

    </section>


    <!-- ================= FOOTER ================= -->
    <footer class="bg-slate-950 text-white">

        <div class="max-w-7xl mx-auto
                    px-6 lg:px-10
                    pt-16 pb-8">

            <div class="grid md:grid-cols-2
                        lg:grid-cols-4 gap-10">

                <!-- Brand -->
                <div>

                    <div class="flex items-center gap-2">

                        <div class="w-10 h-10
                                    bg-sky-700
                                    rounded-lg
                                    flex items-center
                                    justify-center">

                            <svg class="w-6 h-6 text-white"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M14.7 6.3a1 1 0 000 1.4l1.6 1.6a1 1 0 001.4 0l3.3-3.3a6 6 0 01-7.6 7.6L7.5 19.5a2.1 2.1 0 01-3-3l5.9-5.9a6 6 0 017.6-7.6l-3.3 3.3z"/>

                            </svg>

                        </div>

                        <span class="text-xl font-bold">
                            Maintenance<span class="text-sky-400">
                                Connect
                            </span>
                        </span>

                    </div>

                    <p class="mt-5 text-slate-400
                              leading-relaxed text-sm">

                            La plateforme qui connecte les entreprises
                            industrielles marocaines aux meilleurs techniciens
                        de maintenance.
                    </p>

                </div>


                <!-- Navigation -->
                <div>

                    <h3 class="font-bold text-lg">
                        Navigation
                    </h3>

                    <ul class="mt-5 space-y-3 text-sm">

                        <li>
                            <a href="#accueil"
                               class="text-slate-400 hover:text-white">
                                Accueil
                            </a>
                        </li>

                        <li>
                            <a href="#missions"
                               class="text-slate-400 hover:text-white">
                                Missions
                            </a>
                        </li>

                        <li>
                            <a href="#techniciens"
                               class="text-slate-400 hover:text-white">
                                Techniciens
                            </a>
                        </li>

                        <li>
                            <a href="#apropos"
                               class="text-slate-400 hover:text-white">
                                À propos
                            </a>
                        </li>

                    </ul>

                </div>


                <!-- Services -->
                <div>

                    <h3 class="font-bold text-lg">
                        Services
                    </h3>

                    <ul class="mt-5 space-y-3 text-sm">

                        <li class="text-slate-400">
                            Publication de missions
                        </li>

                        <li class="text-slate-400">
                            Recherche de techniciens
                        </li>

                        <li class="text-slate-400">
                            Gestion des interventions
                        </li>

                        <li class="text-slate-400">
                            Évaluation des prestations
                        </li>

                    </ul>

                </div>


                <!-- Contact -->
                <div>

                    <h3 class="font-bold text-lg">
                        Contact
                    </h3>

                    <ul class="mt-5 space-y-4 text-sm">

                        <li class="flex gap-3 text-slate-400">

                            <span>📍</span>

                            <span>
                                Maroc
                            </span>

                        </li>

                        <li class="flex gap-3 text-slate-400">

                            <span>✉</span>

                            <span>
                                contact@maintenanceconnect.ma
                            </span>

                        </li>

                        <li class="flex gap-3 text-slate-400">

                            <span>☎</span>

                            <span>
                                +212 5 XX XX XX XX
                            </span>

                        </li>

                    </ul>

                </div>

            </div>


            <!-- Bottom -->
            <div class="border-t border-slate-800
                        mt-12 pt-7
                        flex flex-col md:flex-row
                        justify-between
                        items-center gap-4">

                <p class="text-sm text-slate-500">
                    © {{ date('Y') }} MaintenanceConnect.
                    Tous droits réservés.
                </p>

                <div class="flex gap-6 text-sm">

                    <a href="#"
                       class="text-slate-500 hover:text-white">
                        Politique de confidentialité
                    </a>

                    <a href="#"
                       class="text-slate-500 hover:text-white">
                        Conditions d'utilisation
                    </a>

                </div>

            </div>

        </div>

    </footer>

</body>
</html>