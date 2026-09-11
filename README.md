# MaintenanceConnect

MaintenanceConnect est une application web Laravel qui met en relation des entreprises et des techniciens autour de missions de maintenance industrielle. Le code actuel permet de publier des missions, de déposer des offres et de suivre leur traitement depuis une interface Blade.

## Fonctionnalités présentes

- Inscription avec le rôle `Entreprise` ou `Technicien`.
- Connexion, déconnexion, confirmation du mot de passe et réinitialisation du mot de passe.
- Vérification d'adresse e-mail via les routes Laravel dédiées.
- Consultation et modification du profil, changement de mot de passe et suppression du compte.
- Tableau de bord différent selon le rôle connecté.
- Consultation et recherche de missions par titre, description ou localisation.
- Création, modification et suppression de missions par leur entreprise propriétaire ou par un administrateur.
- Modification contrôlée du statut d'une mission : `Affectée` vers `En cours` ou `Annulée`, puis `En cours` vers `Terminée` ou `Annulée`.
- Dépôt d'une offre par un technicien sur une mission `Publiée` ou `En attente`.
- Modification ou suppression d'une offre par son technicien lorsqu'elle est `en attente`.
- Acceptation ou refus d'une offre par l'entreprise propriétaire de la mission.
- Passage de la mission à `Affectée` et refus automatique des autres offres en attente lors de l'acceptation d'une offre.
- Gestion des compétences et des expériences professionnelles par les techniciens.
- Évaluation d'une mission terminée par son entreprise, avec une note et un commentaire facultatif.
- Enregistrement de notifications applicatives dans une table dédiée.
- Consultation des comptes `Entreprise` et `Technicien` depuis la page `/admin/users`.

## Utilisateurs et autorisations

Les rôles définis dans la migration `users` et utilisés dans le code sont :

- `Admin` : accès au tableau de bord administrateur et autorisation de modifier ou supprimer les missions selon les Policies. L'inscription publique refuse ce rôle.
- `Entreprise` : création de missions, gestion de ses missions et acceptation ou refus des offres reçues. Elle peut évaluer une mission terminée dont elle est propriétaire.
- `Technicien` : consultation des missions, dépôt et gestion de ses offres en attente, gestion de ses compétences et de ses expériences.

Les Policies `MissionPolicy` et `OffrePolicy` contrôlent les principales actions sur les missions et les offres. Les contrôles de rôle des compétences, expériences et évaluations sont effectués dans leurs contrôleurs.

## Technologies et dépendances

### Backend

- PHP `^8.3`.
- Laravel `^13.17`.
- Laravel Eloquent.
- Laravel Blade.
- Laravel Breeze `^2.4` pour les écrans et contrôleurs d'authentification présents dans le projet.
- Laravel Events et Listeners pour les notifications liées aux offres.
- Laravel Tinker `^3.0`.

### Frontend

- Vite `^8.0` avec `laravel-vite-plugin`.
- Tailwind CSS `^3.1`.
- Alpine.js `^3.4.2`.
- PostCSS et Autoprefixer.
- Composants Blade dans `resources/views/components`.

### Outils de développement

- PHPUnit `^12.5.12`.
- Laravel Pint `^1.27`.
- Faker `^1.23`.
- Mockery `^1.6`.

Aucune dépendance React, Vue ou Sanctum n'est déclarée dans les fichiers de dépendances du projet.

## Architecture du projet

```text
app/
├── Events/              Événements liés aux offres
├── Http/Controllers/    Contrôleurs web et authentification
├── Http/Requests/       Validation des formulaires
├── Listeners/           Création de notifications
├── Models/              Modèles Eloquent
├── Policies/            Autorisations des missions et des offres
└── Providers/           Enregistrement des Gates et listeners

database/
├── factories/           Factories utilisées par les tests et seeders
├── migrations/          Schéma de la base de données
└── seeders/             Données de démonstration

resources/
├── css/                 Styles Tailwind
├── js/                  Initialisation d'Alpine.js
└── views/               Vues Blade et composants

routes/
├── auth.php             Routes d'authentification
├── console.php          Routes de console
└── web.php              Routes web de l'application

tests/
├── Feature/             Tests fonctionnels
└── Unit/                Tests unitaires
```

## Modèle de données

Les modèles et migrations définissent notamment les tables suivantes :

- `users` : utilisateurs, adresse e-mail, téléphone et rôle (`Admin`, `Entreprise`, `Technicien`).
- `missions` : localisation, titre, description, budget, priorité, statut, dates et entreprise propriétaire.
- `offres` : prix, message, pré-diagnostic, délai, statut, mission et technicien.
- `competences` et `competences_users` : compétences et relation plusieurs-à-plusieurs avec les utilisateurs.
- `experiences` : expériences professionnelles rattachées à un utilisateur.
- `evaluations` : note et commentaire rattachés à une mission et à un utilisateur.
- `notifications` : type, message, date et utilisateur destinataire.

Les relations Eloquent principales sont les suivantes :

- Un `User` possède plusieurs `Mission`, `Offre`, `Experience`, `Evaluation` et `Notification`.
- Un `User` possède plusieurs `Competence` au moyen de `competences_users`.
- Une `Mission` appartient à un `User`, possède plusieurs `Offre` et peut posséder une `Evaluation`.
- Une `Offre` appartient à une `Mission` et à un `User`.
- Une `Experience`, une `Evaluation` et une `Notification` appartiennent à un `User`.

Les migrations Laravel fournissent aussi les tables `password_reset_tokens`, `sessions`, `cache`, `cache_locks`, `jobs`, `job_batches` et `failed_jobs`.

## Événements et notifications

Le projet contient les événements `NewOfferReceived` et `OfferAccepted`, ainsi que les listeners `CreateOfferNotification` et `CreateOfferAcceptedNotification`.

Lorsqu'une offre est acceptée, l'événement correspondant est enregistré dans `AppServiceProvider` avec son listener et une notification est créée pour le technicien sélectionné. Lorsqu'une offre est déposée, `NewOfferReceived` est déclenché par le contrôleur ; l'enregistrement de `CreateOfferNotification` dans `AppServiceProvider` n'est pas présent dans le code actuel.

## Installation locale

### Prérequis confirmés par le projet

- PHP `8.3` ou supérieur.
- Composer.
- Node.js et npm pour les ressources Vite.
- Une base MySQL lorsque la configuration `.env` reprend les valeurs de `.env.example`.

### Installation

Depuis la racine du projet :

```bash
composer install
```

Créer le fichier d'environnement :

```powershell
Copy-Item .env.example .env
php artisan key:generate
```

Installer et compiler les ressources frontend :

```bash
npm install
npm run build
```

Créer ou rendre accessible la base configurée, puis exécuter les migrations :

```bash
php artisan migrate
```

Les données de démonstration peuvent être chargées avec :

```bash
php artisan db:seed
```

Le script Composer `setup` regroupe également l'installation, la création de `.env`, la génération de clé, la migration, l'installation npm et le build Vite :

```bash
composer run setup
```

## Configuration

`.env.example` définit notamment :

```env
APP_NAME=MaintenanceConnect
APP_URL=http://localhost:8080
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=maintenanceconnect
DB_USERNAME=maintenance
DB_PASSWORD=maintenance
SESSION_DRIVER=database
CACHE_STORE=database
QUEUE_CONNECTION=database
MAIL_MAILER=log
```

Le fichier contient également les paramètres Laravel de journalisation, stockage, Redis et AWS. Les valeurs sensibles, notamment `APP_KEY`, doivent rester dans `.env` et ne doivent pas être publiées.

## Lancement et développement

Pour lancer le serveur de développement Laravel et les processus prévus par le projet :

```bash
composer run dev
```

Vite peut être lancé séparément avec :

```bash
npm run dev
```

Pour générer les ressources frontend compilées :

```bash
npm run build
```

## Docker

Le dépôt contient un `Dockerfile` PHP 8.3 avec Apache et une configuration `docker-compose.yml` composée d'un service applicatif et d'un service MySQL 8.0.

La configuration expose l'application sur `http://localhost:8080` et MySQL sur le port hôte `3308`. Elle utilise la base `maintenanceconnect`, l'utilisateur `maintenance` et le mot de passe `maintenance` pour la connexion entre les services.

La commande de démarrage de la configuration Compose est :

```bash
docker compose up --build
```

## Tests

La configuration PHPUnit utilise SQLite en mémoire, une file d'attente synchrone, des sessions en tableau et un cache en tableau.

Lancer les tests :

```bash
php artisan test
```

Le script Composer `test` nettoie d'abord la configuration puis lance cette commande :

```bash
composer test
```

Les tests présents couvrent l'accueil, l'authentification, l'inscription, la vérification d'e-mail, la réinitialisation et la modification du mot de passe, la confirmation du mot de passe, le profil et l'autorisation de création des missions selon le rôle. Aucun test dédié aux offres, aux transitions de mission, aux compétences, aux expériences, aux évaluations ou aux notifications n'est présent dans `tests`.

## Commande de qualité

Laravel Pint est installé comme dépendance de développement et peut être exécuté avec :

```bash
vendor/bin/pint
```

## État vérifiable et limites

- Les routes `/dashboard` et `/admin/users` utilisent les middlewares `auth` et `verified`, mais le contrôleur de `/admin/users` ne contient pas de contrôle explicite du rôle `Admin`.
- Les statuts par défaut déclarés par certaines migrations (`ouverte` et `en_attente`) ne sont pas toujours identiques aux valeurs utilisées dans les contrôleurs et seeders (`Publiée`, `En attente`, etc.).
- Le listener de l'événement `NewOfferReceived` existe et l'événement est déclenché, mais son enregistrement dans `AppServiceProvider` n'est pas présent.
- Le dépôt ne permet pas de confirmer, par la seule lecture des fichiers, qu'un serveur MySQL, Docker ou un worker de file d'attente est actuellement démarré.

