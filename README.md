# Districall

Ce projet est une application Symfony permettant de gérer des tâches via une API RESTful. Elle comprend les fonctionnalités de création, modification, suppression, pagination, et recherche des tâches.

---

1. Création d'une tâche : Ajout d'une tâche avec validation des données.
2. Modification d'une tâche : Mise à jour des attributs d'une tâche existante.
3. Suppression d'une tâche : Suppression d'une tâche par ID.
4. Liste paginée des tâches : Affichage trié par statut, 10 tâches par page.

---

Installation et Configuration

Cloner le dépôt :
   
$ git clone <url_du_dépôt>
$ cd <nom_du_dépôt>

Installer les dépendances :

$ composer install

Configurer la base de données :

(fichier .env)
DATABASE_URL="mysql://username:password@127.0.0.1:3306/nom_de_la_base?serverVersion=8.0"

Créer la base de données et les migrations :

php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate

Lancer le serveur local :

symfony server:start

et pour tester l'api il faut utiliser postman ou un équivalent