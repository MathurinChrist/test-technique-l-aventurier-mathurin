## 1: Développement POO:
    Le but de ce développement est de permettre de gérer l'inventaire du sac à dos d'un aventurier.
	Celui-ci comportera, une gourde, des rations de survie, un couteau de chasse, une boussole, une carte, un briquet tempête, de l'amadou, un sac de couchage, une trousse de secours ainsi que de quoi confectionner des torches.

	Chaqu'un de ces éléments comportera les propriétés minimales suivantes, ainsi que les méthodes associées permettant de récupérer leurs valeurs:
		Sac à dos:
			- Nombre d'élément
			- Poids 
			- Volume

		Pour les autres éléments, tout ou partie, suivant la pertinence vis-à-vis de l'élément:
			- Un nom
			- Une description
			- Un facteur d'usure
			- Le nombre restant 
            - le poids

	Afin de procéder à l'implémentation, voici les patterns à utiliser obligatoirement:
		- Interface
		- Classe Abstraite
		- Classe concrète
		- Héritage
		- Surcharge de méthode
		- Service / Manager

## 2: Développement API:
    Pour faire suite à la première partie, il sera demandé dans celle-ci de mettre à disposition les fonctionnalités sous la forme d'une API.

    Cette implémentation devra contenir les partis suivantes:
        - Mise à disposition des routes afin d'exposer les fonctionnalités de la première partie.
        - Création des contrôleurs pour la prise en compte des end-points des routes.
        - Mise en place des FormRequest nécessaires afin pour la validation des payload de chaque requête.
        - Persistance des informations dés éléments en utilisant l'ORM Eloquent de Laravel.
        - Création des objet JSON utilisées par les contrôleurs afin de retourner le résultat.

## 3: Développement Front:
	Enfin, cette partie de développement sera dédiée à l'affichage de caractéristique du sac à dos, ainsi qu'à son contenu, sous la forme d'une tableau, permettant de visualiser les caractéristiques des éléments.

	L'implémentation devra couvrir les besoins suivant:
        - Partie back:
            Un nouvelle implémentation de la deuxième partie, ceci en vus d'utiliser la solution 'Inertia' de Laravel afin de mettre à disposition le ou les composant VueJs permettant l'affichage du contenu du tableau.

        - Partie front:
            Les composants Vuejs nécessaires.

        - Génération du contenu:
            Les informations devront être générées par Seeders Laravel Eloquent, afin de mettre à disposition du contenu pour la visualisation.

## Pre-requis:
	La mise en place de l'environnement sera au choix suivant une de ces deux options:
		- Installation en locale de la stack technique nécessaire. (Ce référer à la documentation Laravel https://laravel.com/docs/12.x/installation)
                
		- Création d'un environnement docker.
        Point Important -> la solution Sail fournie par Laravel ne pourra pas être utilisée.

## Présentation du résultat:
    Suite à la livraison de la réalisation sous la forme d'une branche Github, une présentation orale devra être réalisée afin de présenter les différentes parties de ce test technique.


