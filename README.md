# Créateur de Personnages de Game of Thrones

## Description
Ce projet est un site web permettant aux utilisateurs de créer un personnage dans l'univers de Game of Thrones. Les utilisateurs peuvent s'inscrire, se connecter, se déconnecter et supprimer leur compte. Ils peuvent également voir leur personnage apparaître sur la page d'accueil. Les administrateurs ont des privilèges supplémentaires pour gérer les utilisateurs, y compris la modification et la suppression des comptes, ainsi que l'attribution d'animaux (comme des loups ou des dragons).

## Fonctionnalités

### Utilisateurs
- **Inscription** : Les utilisateurs remplissent un formulaire avec les champs suivants :
  - Email
  - Nom d'utilisateur
  - Mot de passe
  - Classe
  - Date de création
- **Connexion** : Les utilisateurs peuvent se connecter avec leur email et mot de passe.
- **Déconnexion** : Les utilisateurs peuvent se déconnecter de leur compte.
- **Affichage du Profil** : Les utilisateurs peuvent voir leurs informations de profil et leur personnage.
- **Suppression de Compte** : Les utilisateurs peuvent supprimer leur compte.

### Administrateurs
- **Modification des Utilisateurs** : Les administrateurs peuvent modifier les informations des utilisateurs, y compris leur rôle et leur classe.
- **Suppression des Utilisateurs** : Les administrateurs peuvent supprimer des utilisateurs.
- **Attribution d'Animaux** : Les administrateurs peuvent attribuer des animaux aux utilisateurs (par exemple, des loups, des dragons).

## Technologies Utilisées
- PHP
- MySQL
- JavaScript
- HTML
- CSS

## Structure de la Base de Données
- **Table `user`** :
  - `id` : ID de l'utilisateur
  - `email` : Adresse email de l'utilisateur
  - `username` : Nom d'utilisateur
  - `password` : Mot de passe (hashé)
  - `class` : Classe du personnage
  - `date` : Date de création du compte
  - `role` : Rôle de l'utilisateur (administrateur ou utilisateur standard)
- **Table `beast`** :
  - `idUSer` : ID de l'utilisateur
  - `name` : Nom de l'animal
  - `PropertyName` : Propriété de l'animal
  - `asset` : Attribut de l'animal
- **Table `class`** :
  - `idUSer` : ID de l'utilisateur
  - `name` : Nom de la classe
  - `skill` : Compétence de la classe

## Sécurité
- Hashage des mots de passe
- Prévention des injections SQL

## Installation
1. Clonez le dépôt :
   ```bash
   git clone https://github.com/votre-utilisateur/game-of-thrones-character-creation.git
