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
git clone https://votre-depot-git/projet-codeigniter.git
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


