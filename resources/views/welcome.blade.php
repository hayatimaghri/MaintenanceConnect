<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MaintenanceConnect - Maintenance industrielle au Maroc</title>

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

    <style>
        html {
            scroll-behavior: smooth;
            scroll-padding-top: 88px;
        }
    </style>
</head>

<body class="bg-white text-slate-800 antialiased">

    <!-- =====================================================
         NAVBAR FIXE
    ====================================================== -->

    <header class="fixed top-0 left-0 right-0 z-50 border-b border-slate-200/80 bg-white/95 backdrop-blur-md">

        <div class="max-w-7xl mx-auto px-6 lg:px-10">

            <nav class="h-[76px] flex items-center justify-between">

                <!-- LOGO -->
                <a href="/" class="flex items-center shrink-0">
                    <x-application-logo />
                </a>

                <!-- MENU DESKTOP -->
                <div class="hidden md:flex items-center gap-8 text-sm font-semibold">

                    <a href="#accueil"
                       class="text-slate-700 hover:text-[#0f4c81] transition">
                        Accueil
                    </a>

                    <a href="#fonctionnement"
                       class="text-slate-700 hover:text-[#0f4c81] transition">
                        Comment ça marche ?
                    </a>

                    <a href="#apropos"
                       class="text-slate-700 hover:text-[#0f4c81] transition">
                        À propos
                    </a>

                    <a href="#contact"
                       class="text-slate-700 hover:text-[#0f4c81] transition">
                        Contact
                    </a>

                </div>

                <!-- ACTIONS -->
                <div class="flex items-center gap-3">

                    <a href="/login"
                       class="hidden sm:inline-flex items-center justify-center
                              rounded-lg border border-slate-300
                              px-5 py-2.5
                              text-sm font-semibold text-slate-700
                              hover:border-[#0f4c81]
                              hover:text-[#0f4c81]
                              transition">

                        Se connecter

                    </a>

                    <a href="/register"
                       class="inline-flex items-center justify-center
                              rounded-lg
                              bg-yellow-400
                              px-5 py-2.5
                              text-sm font-bold text-slate-900
                              shadow-sm
                              hover:bg-yellow-300
                              transition">

                        S'inscrire

                    </a>

                </div>

            </nav>

        </div>

    </header>


    <!-- =====================================================
         HERO
    ====================================================== -->

    <main id="accueil" class="pt-[76px]">

        <section class="relative min-h-[650px] overflow-hidden">

            <!-- IMAGE PLEINE LARGEUR -->

            <img
                src="{{ asset('images/hero.jpg') }}"
                alt="Technicien de maintenance industrielle"
                class="absolute inset-0 h-full w-full object-cover"
            >

            <!-- OVERLAY -->

            <div class="absolute inset-0 bg-[#082f49]/70"></div>

            <div class="absolute inset-0
                        bg-gradient-to-r
                        from-[#082f49]/95
                        via-[#082f49]/70
                        to-[#082f49]/20">
            </div>


            <!-- CONTENU HERO -->

            <div class="relative z-10 flex min-h-[650px] items-center">

                <div class="max-w-7xl mx-auto w-full px-6 lg:px-10">

                    <div class="max-w-3xl">


                        <!-- TITRE -->

                        <h1 class="mt-7
                                   text-4xl sm:text-5xl lg:text-6xl
                                   font-extrabold
                                   leading-[1.08]
                                   tracking-tight
                                   text-white">

                            La maintenance industrielle,

                            <span class="text-sky-300">
                                plus simple.
                            </span>

                        </h1>


                        <!-- DESCRIPTION -->

                        <p class="mt-6
                                  max-w-2xl
                                  text-base sm:text-lg
                                  leading-8
                                  text-slate-200">

                            MaintenanceConnect facilite la mise en relation
                            entre les entreprises industrielles marocaines
                            et des techniciens qualifiés pour leurs besoins
                            de maintenance.

                        </p>


                        <!-- BUTTONS -->

                        <div class="mt-8 flex flex-wrap gap-3">

                            <a href="/missions/create"
                               class="inline-flex items-center gap-2
                                      rounded-lg
                                      bg-yellow-400
                                      px-6 py-3.5
                                      text-sm font-bold
                                      text-slate-900
                                      shadow-lg
                                      hover:bg-yellow-300
                                      transition">

                                Publier une mission

                                <svg class="h-4 w-4"
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
                               class="inline-flex items-center justify-center
                                      rounded-lg
                                      border border-white/40
                                      bg-white/10
                                      px-6 py-3.5
                                      text-sm font-semibold
                                      text-white
                                      backdrop-blur-sm
                                      hover:bg-white/20
                                      transition">

                                Trouver une mission

                            </a>

                        </div>


                        <!-- MINI INFORMATIONS -->

                        <div class="mt-8 flex flex-wrap items-center
                                    gap-x-7 gap-y-3
                                    text-sm text-slate-200">

                            <div class="flex items-center gap-2">

                                <span class="flex h-6 w-6 items-center justify-center
                                             rounded-full
                                             bg-green-400/20
                                             text-green-300">
                                    ✓
                                </span>

                                Techniciens qualifiés

                            </div>


                            <div class="flex items-center gap-2">

                                <span class="flex h-6 w-6 items-center justify-center
                                             rounded-full
                                             bg-green-400/20
                                             text-green-300">
                                    ✓
                                </span>

                                Réponse rapide

                            </div>


                            <div class="flex items-center gap-2">

                                <span class="flex h-6 w-6 items-center justify-center
                                             rounded-full
                                             bg-green-400/20
                                             text-green-300">
                                    ✓
                                </span>

                                Partout au Maroc

                            </div>

                        </div>

                    </div>

                </div>

            </div>


    
            </div>

        </section>

<!-- =====================================================
     STATISTIQUES
====================================================== -->

<section class="relative z-20 -mt-20 bg-transparent">

    <div class="max-w-7xl mx-auto px-6 lg:px-10">

        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">

            <!-- MISSIONS -->

            <div class="group rounded-2xl
                        border border-slate-200
                        bg-white
                        p-6
                        shadow-xl
                        shadow-slate-900/10
                        transition
                        hover:-translate-y-1
                        hover:shadow-2xl">

                <div class="flex items-center justify-between">

                    <div class="flex h-11 w-11 items-center justify-center
                                rounded-xl
                                bg-[#e0f2fe]
                                text-[#075985]">

                        <svg
                            class="h-5 w-5"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.8"
                                d="M9 12h6m-6 4h4M7 4h10a2 2 0 012 2v12a2 2 0 01-2 2H7a2 2 0 01-2-2V6a2 2 0 012-2z"
                            />
                        </svg>

                    </div>

                    <span class="rounded-full
                                 bg-green-50
                                 px-2.5 py-1
                                 text-xs font-semibold
                                 text-green-600">

                        Actives

                    </span>

                </div>

                <div class="mt-5">

                    <p class="text-3xl font-extrabold tracking-tight text-[#075985]">
                        +1200
                    </p>

                    <p class="mt-1 text-sm font-medium text-slate-500">
                        Missions publiées
                    </p>

                </div>

            </div>

            <!-- TECHNICIENS -->

            <div class="group rounded-2xl
                        border border-slate-200
                        bg-white
                        p-6
                        shadow-xl
                        shadow-slate-900/10
                        transition
                        hover:-translate-y-1
                        hover:shadow-2xl">

                <div class="flex items-center justify-between">

                    <div class="flex h-11 w-11 items-center justify-center
                                rounded-xl
                                bg-[#e0f2fe]
                                text-[#075985]">

                        <svg
                            class="h-5 w-5"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.8"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM4 21a8 8 0 0116 0"
                            />
                        </svg>

                    </div>

                    <span class="rounded-full
                                 bg-green-50
                                 px-2.5 py-1
                                 text-xs font-semibold
                                 text-green-600">

                        Vérifiés

                    </span>

                </div>

                <div class="mt-5">

                    <p class="text-3xl font-extrabold tracking-tight text-[#075985]">
                        +850
                    </p>

                    <p class="mt-1 text-sm font-medium text-slate-500">
                        Techniciens
                    </p>

                </div>

            </div>

            <!-- SATISFACTION -->

            <div class="group rounded-2xl
                        border border-slate-200
                        bg-white
                        p-6
                        shadow-xl
                        shadow-slate-900/10
                        transition
                        hover:-translate-y-1
                        hover:shadow-2xl">

                <div class="flex items-center justify-between">

                    <div class="flex h-11 w-11 items-center justify-center
                                rounded-xl
                                bg-yellow-50
                                text-yellow-500">

                        <svg
                            class="h-5 w-5"
                            fill="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path d="M12 2.5l2.95 5.98 6.6.96-4.78 4.66 1.13 6.58L12 17.57l-5.9 3.11 1.13-6.58-4.78-4.66 6.6-.96L12 2.5z"/>
                        </svg>

                    </div>

                    <span class="rounded-full
                                 bg-yellow-50
                                 px-2.5 py-1
                                 text-xs font-semibold
                                 text-yellow-600">

                        Excellent

                    </span>

                </div>

                <div class="mt-5">

                    <p class="text-3xl font-extrabold tracking-tight text-[#075985]">
                        98%
                    </p>

                    <p class="mt-1 text-sm font-medium text-slate-500">
                        Satisfaction
                    </p>

                </div>

            </div>

            <!-- RÉPONSE -->

            <div class="group rounded-2xl
                        border border-slate-200
                        bg-white
                        p-6
                        shadow-xl
                        shadow-slate-900/10
                        transition
                        hover:-translate-y-1
                        hover:shadow-2xl">

                <div class="flex items-center justify-between">

                    <div class="flex h-11 w-11 items-center justify-center
                                rounded-xl
                                bg-[#e0f2fe]
                                text-[#075985]">

                        <svg
                            class="h-5 w-5"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.8"
                                d="M12 8v4l3 2m6-2a9 9 0 11-18 0 9 9 0 0118 0z"
                            />
                        </svg>

                    </div>

                    <span class="rounded-full
                                 bg-green-50
                                 px-2.5 py-1
                                 text-xs font-semibold
                                 text-green-600">

                        Rapide

                    </span>

                </div>

                <div class="mt-5">

                    <p class="text-3xl font-extrabold tracking-tight text-[#075985]">
                        24h
                    </p>

                    <p class="mt-1 text-sm font-medium text-slate-500">
                        Réponse moyenne
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>

        <!-- =====================================================
             COMMENT ÇA MARCHE
        ====================================================== -->

        <section id="fonctionnement" class="bg-white py-20">

            <div class="max-w-7xl mx-auto px-6 lg:px-10">

                <div class="max-w-2xl">

                    <h2 class="text-3xl sm:text-4xl
                               font-extrabold text-slate-950">
                        Comment ça marche ?
                    </h2>

                    <p class="mt-4 text-slate-500 leading-7">
                        Une démarche simple pour trouver rapidement
                        le professionnel adapté à votre besoin.
                    </p>

                </div>


                <div class="mt-12 grid md:grid-cols-3 gap-6">

                    <!-- 01 -->

                    <div class="rounded-2xl border border-slate-200
                                bg-white p-7
                                shadow-sm
                                hover:-translate-y-1
                                hover:shadow-md
                                transition">

                        <div class="flex h-11 w-11 items-center justify-center
                                    rounded-xl bg-[#e0f2fe]
                                    text-sm font-extrabold text-[#075985]">

                            01

                        </div>

                        <h3 class="mt-6 text-lg font-bold text-slate-900">
                            Publiez votre mission
                        </h3>

                        <p class="mt-3 text-sm leading-6 text-slate-500">
                            Décrivez votre besoin de maintenance et
                            indiquez les informations nécessaires.
                        </p>

                    </div>


                    <!-- 02 -->

                    <div class="rounded-2xl border border-slate-200
                                bg-white p-7
                                shadow-sm
                                hover:-translate-y-1
                                hover:shadow-md
                                transition">

                        <div class="flex h-11 w-11 items-center justify-center
                                    rounded-xl bg-[#e0f2fe]
                                    text-sm font-extrabold text-[#075985]">

                            02

                        </div>

                        <h3 class="mt-6 text-lg font-bold text-slate-900">
                            Comparez les offres
                        </h3>

                        <p class="mt-3 text-sm leading-6 text-slate-500">
                            Consultez les offres, les compétences,
                            les prix et les délais proposés.
                        </p>

                    </div>


                    <!-- 03 -->

                    <div class="rounded-2xl border border-slate-200
                                bg-white p-7
                                shadow-sm
                                hover:-translate-y-1
                                hover:shadow-md
                                transition">

                        <div class="flex h-11 w-11 items-center justify-center
                                    rounded-xl bg-[#e0f2fe]
                                    text-sm font-extrabold text-[#075985]">

                            03

                        </div>

                        <h3 class="mt-6 text-lg font-bold text-slate-900">
                            Choisissez votre technicien
                        </h3>

                        <p class="mt-3 text-sm leading-6 text-slate-500">
                            Sélectionnez le professionnel qui correspond
                            le mieux à votre besoin.
                        </p>

                    </div>

                </div>

            </div>

        </section>


        <!-- =====================================================
             À PROPOS
        ====================================================== -->

        <section id="apropos" class="bg-slate-50 py-20">

            <div class="max-w-7xl mx-auto px-6 lg:px-10">

                <div class="grid lg:grid-cols-2 gap-12 items-center">

                    <div class="overflow-hidden rounded-3xl
                                border border-slate-200
                                bg-white shadow-lg">

                        <img
                            src="{{ asset('images/maintenance.jpg') }}"
                            alt="Maintenance industrielle"
                            class="h-[380px] w-full object-cover"
                        >

                    </div>


                    <div>

                        <p class="text-sm font-bold uppercase tracking-wider
                                  text-[#075985]">
                            À propos
                        </p>

                        <h2 class="mt-3 text-3xl sm:text-4xl
                                   font-extrabold text-slate-950">

                            Une solution pensée pour
                            la maintenance industrielle

                        </h2>

                        <p class="mt-5 leading-7 text-slate-600">

                            MaintenanceConnect permet aux entreprises
                            industrielles de trouver plus facilement
                            des techniciens qualifiés pour leurs
                            interventions de maintenance.

                        </p>


                        <div class="mt-7 space-y-4">

                            <div class="flex gap-3">

                                <span class="flex h-6 w-6 shrink-0 items-center justify-center
                                             rounded-full bg-green-100
                                             text-sm font-bold text-green-600">
                                    ✓
                                </span>

                                <p class="text-slate-600">
                                    Techniciens qualifiés et disponibles
                                </p>

                            </div>


                            <div class="flex gap-3">

                                <span class="flex h-6 w-6 shrink-0 items-center justify-center
                                             rounded-full bg-green-100
                                             text-sm font-bold text-green-600">
                                    ✓
                                </span>

                                <p class="text-slate-600">
                                    Mise en relation rapide
                                </p>

                            </div>


                            <div class="flex gap-3">

                                <span class="flex h-6 w-6 shrink-0 items-center justify-center
                                             rounded-full bg-green-100
                                             text-sm font-bold text-green-600">
                                    ✓
                                </span>

                                <p class="text-slate-600">
                                    Gestion simple des missions
                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>


        <!-- =====================================================
             CTA
        ====================================================== -->

        <section class="bg-white py-20">

            <div class="max-w-6xl mx-auto px-6">

                <div class="overflow-hidden rounded-3xl
                            bg-[#082f49]
                            px-7 py-14
                            text-center
                            sm:px-12">

                    <p class="text-sm font-bold uppercase tracking-wider
                              text-[#e0f2fe]">
                        MaintenanceConnect
                    </p>

                    <h2 class="mt-3 text-3xl sm:text-4xl
                               font-extrabold text-white">

                        Prêt à trouver votre prochain
                        technicien ?

                    </h2>

                    <p class="mx-auto mt-4 max-w-2xl
                              leading-7 text-sky-100">

                        Publiez votre mission et connectez-vous
                        avec des professionnels de la maintenance
                        industrielle.

                    </p>


                    <div class="mt-8 flex flex-wrap justify-center gap-3">

                        <a href="/register"
                           class="rounded-lg
                                  bg-yellow-400
                                  px-6 py-3.5
                                  text-sm font-bold text-slate-900
                                  hover:bg-yellow-300
                                  transition">

                            Créer un compte

                        </a>


                        <a href="/login"
                           class="rounded-lg
                                  border border-white/30
                                  px-6 py-3.5
                                  text-sm font-semibold text-white
                                  hover:bg-white/10
                                  transition">

                            Se connecter

                        </a>

                    </div>

                </div>

            </div>

        </section>

    </main>


    <!-- =====================================================
         FOOTER
    ====================================================== -->

    <footer id="contact" class="bg-slate-950 text-white">

        <div class="max-w-7xl mx-auto px-6 lg:px-10 py-14">

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-10">

                <!-- LOGO -->

                <div>

                    <x-application-logo dark />

                    <p class="mt-5 max-w-xs
                              text-sm leading-6
                              text-slate-400">

                        La plateforme qui connecte les entreprises
                        industrielles marocaines aux techniciens
                        de maintenance.

                    </p>

                </div>


                <!-- NAVIGATION -->

                <div>

                    <h3 class="font-bold">
                        Navigation
                    </h3>

                    <div class="mt-5 space-y-3 text-sm">

                        <a href="#accueil"
                           class="block text-slate-400 hover:text-white transition">
                            Accueil
                        </a>

                        <a href="#fonctionnement"
                           class="block text-slate-400 hover:text-white transition">
                            Comment ça marche ?
                        </a>

                        <a href="#apropos"
                           class="block text-slate-400 hover:text-white transition">
                            À propos
                        </a>

                    </div>

                </div>


                <!-- SERVICES -->

                <div>

                    <h3 class="font-bold">
                        Services
                    </h3>

                    <div class="mt-5 space-y-3 text-sm">

                        <p class="text-slate-400">
                            Publication de missions
                        </p>

                        <p class="text-slate-400">
                            Recherche de techniciens
                        </p>

                        <p class="text-slate-400">
                            Gestion des interventions
                        </p>

                        <p class="text-slate-400">
                            Évaluation des prestations
                        </p>

                    </div>

                </div>


                <!-- CONTACT -->

                <div>

                    <h3 class="font-bold">
                        Contact
                    </h3>

                    <div class="mt-5 space-y-3 text-sm">

                        <p class="text-slate-400">
                            📍 Maroc
                        </p>

                        <p class="text-slate-400">
                            ✉ contact@maintenanceconnect.ma
                        </p>

                        <p class="text-slate-400">
                            ☎ +212 5 XX XX XX XX
                        </p>

                    </div>

                </div>

            </div>


            <div class="mt-12 flex flex-col md:flex-row
                        items-center justify-between gap-4
                        border-t border-slate-800
                        pt-6">

                <p class="text-sm text-slate-500">

                    © {{ date('Y') }} MaintenanceConnect.
                    Tous droits réservés.

                </p>


                <div class="flex gap-6 text-sm">

                    <a href="#"
                       class="text-slate-500 hover:text-white transition">

                        Politique de confidentialité

                    </a>

                    <a href="#"
                       class="text-slate-500 hover:text-white transition">

                        Conditions d'utilisation

                    </a>

                </div>

            </div>

        </div>

    </footer>

</body>
</html>
