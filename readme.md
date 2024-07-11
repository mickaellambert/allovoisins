# Test technique Allovoisins

Ce projet utilise CodeIgniter 3 avec des migrations pour gérer la base de données et des variables d'environnement pour configurer la connexion à la base de données.

## Prérequis

- PHP >= 7.2
- Composer
- Serveur MySQL

## Installation

### 1. Cloner le projet

Clonez le dépôt sur votre machine locale :

```sh
git clone git@github.com:mickaellambert/allovoisins.git
cd projet-codeigniter
```

### 2. Installer les dépendances

```sh
composer install
```

### 3. Créer votre BDD

Créer une BDD sur votre serveur MySQL en lui donnant le nom que vous souhaitez. 

### 4. Configuration des variables d'environnement

- Créez un fichier .env en copiant le fichier .env.dist
- Editer le fichier .env en modifiant les valeurs de vos propres variables d'environnement

### 5. Exécuter les migrations

Naviguez vers le répertoire racine du projet et exécutez la commande suivante : 

```sh
php index.php cli/migrate
```

### 6. Générer les données

Afin de faciliter l'utilisation et le test de l'application, des fausses données peuvent être ajoutées facilement. Exécutez la commande suivante : 

```sh
php index.php cli/fixtures
```

### 7. Supprimer tous les utilisateurs inactifs depuis 36 mois

Pensez à ajouter au crontab de votre serveur cette ligne (ne pas oublier de remplacer le chemin du projet par le votre) :

```sh
0 0 * * * /usr/bin/php /path/to/project/crons/delete_inactive_users.php
```