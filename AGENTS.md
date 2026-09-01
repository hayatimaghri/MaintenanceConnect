# MaintenanceConnect — Instructions pour l'Agent

## Stack

- Laravel 13 · PHP 8.3
- Base de données : MySQL
- Frontend : Blade
- CSS : Tailwind CSS
- Données de test : factories + seeders

## Structure

- Contrôleurs : `app/Http/Controllers`
- Modèles : `app/Models`
- Migrations : `database/migrations`
- Factories : `database/factories`
- Seeders : `database/seeders`
- Routes : `routes/web.php`
- Vues : `resources/views`
- Form Requests : `app/Http/Requests`
- Policies : `app/Policies`

## Le domaine

MaintenanceConnect est une plateforme de mise en relation entre
entreprises industrielles et techniciens de maintenance freelances.

Les acteurs principaux sont :

- Administrateur
- Entreprise
- Technicien

Une entreprise peut publier plusieurs missions.

Une mission appartient à une seule entreprise.

Une mission peut recevoir plusieurs offres.

Une offre appartient à une seule mission et à un seul technicien.

Une entreprise peut accepter une seule offre pour une mission.

Une mission peut être : publiée, en attente, affectée, en cours,
terminée ou annulée.

## Authentification

- Utiliser l'authentification Laravel.
- Permettre l'inscription, la connexion et la déconnexion.
- Ne pas créer un système d'authentification personnalisé sans nécessité.
- Respecter la structure Laravel existante.

## Autorisation

- Respecter les rôles : `admin`, `entreprise`, `technicien`.
- Un utilisateur ne doit accéder qu'aux fonctionnalités autorisées
  par son rôle.
- Utiliser les Policies ou Middleware Laravel pour contrôler les accès.

## Conventions

- Utiliser Eloquent pour l'accès aux données.
- Utiliser les relations Eloquent définies dans les Models.
- Valider les données avec des Form Requests.
- Utiliser des migrations pour toute modification de la base de données.
- Garder les Controllers simples et respecter MVC.
- Réutiliser les vues Blade existantes.
- Les textes, labels et messages doivent être en français.

## Interdits

- Ne pas inventer de fonctionnalités non définies dans le projet.
- Ne pas inventer de champs, tables ou relations.
- Ne pas modifier le MCD/MLD sans demande explicite.
- Ne pas modifier le schéma de la base sans migration.
- Ne pas supprimer une fonctionnalité existante sans demande.
- Ne pas ajouter de package sans raison claire.
- Ne pas utiliser React, Vue ou une autre SPA.
- Ne pas utiliser de SQL brut si Eloquent suffit.
- Ne pas modifier plusieurs parties du projet sans nécessité.
- Si une information manque, demander confirmation au lieu de supposer.