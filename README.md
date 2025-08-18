
# Projet à réaliser 

## 1: Développement POO:

Le but de ce développement est de permettre de gérer l'inventaire du sac à dos d'un aventurier.
Celui-ci comportera, une gourde, des rations de survie, un couteau de chasse, une boussole, une carte, un briquet tempête, de l'amadou, un sac de couchage, une trousse de secours ainsi que de quoi confectionner des torches.

Chacun de ces éléments comportera les propriétés minimales suivantes, ainsi que les méthodes associées permettant de récupérer leurs valeurs:
 - Sac à dos:
   - Nombre d'éléments
   - Poids 
   - Volume

Pour les autres éléments, tout ou partie, suivant la pertinence vis-à-vis de l'élément:
 - Un nom 
 - Une description 
 - Un facteur d'usure 
 - Le nombre restant  
 - Le poids

Afin de procéder à l'implémentation, voici les patterns à utiliser obligatoirement:
   - Interface
   - Classe Abstraite
   - Classe concrète
   - Héritage
   - Surcharge de méthode
   - Service / Manager

## 2: Développement API:

Pour faire suite à la première partie, il sera demandé dans celle-ci de mettre à disposition les fonctionnalités sous la forme d'une API.

Cette implémentation devra contenir les parties suivantes:
   - Mise à disposition des routes afin d'exposer les fonctionnalités de la première partie.
   - Création des contrôleurs pour la prise en compte des end-points des routes.
   - Mise en place des FormRequest nécessaires pour la validation des payload de chaque requête.
   - Persistance des informations dés éléments en utilisant l'ORM Eloquent de Laravel.
   - Création des objet JSON utilisés par les contrôleurs afin de retourner le résultat.

## 3: Développement Front:

Enfin, cette partie de développement sera dédiée à l'affichage de caractéristique du sac à dos, ainsi qu'à son contenu, sous la forme d'un tableau, permettant de visualiser les caractéristiques des éléments.

L'implémentation devra couvrir les besoins suivants:
 - Partie back:
        Une implémentation via des Controllers/Méthodes de l'affichage des donnée avec [Inertia.js](https://inertiajs.com/). 
        Le but étant de mettre à disposition les composants Vue.js permettant l'affichage du contenu du tableau.

 - Partie front:
        Les composants Vue.js nécessaires, en Composition API (Vue 3).

 - Génération du contenu:
    Les données d'utilisation devront être générées par des Seeders (via des [Eloquent Factories](https://laravel.com/docs/12.x/eloquent-factories)), afin de mettre à disposition du contenu pour la visualisation.


## Pre-requis:
La mise en place de l'environnement sera au choix suivant une de ces deux options:
- Installation en local de la stack technique nécessaire. 
  Se référer à la documentation Laravel : https://laravel.com/docs/12.x/installation
               
- Création d'un environnement docker.
       **Point Important : la solution Sail fournie par Laravel ne pourra pas être utilisée.**

## Présentation du résultat:
Suite à la livraison de la réalisation sous la forme d'une branche Github, une **présentation orale devra être réalisée** afin de présenter les différentes parties de ce test technique.
