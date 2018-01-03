# Examen de certification : Développer une interface liée à une base de données

Cet examen est  nécessaire à l'évaluation de votre aptitude à passer la certification et ses résultats sont demandés par l'institution l'organisant.

Le but de cet examen est d'évaluer votre capacité à réaliser développer une interface liée à une base de données.

Selon le react, il vous est demandé que :

- le jeu d'essai fonctionnel est complet.
- Le code source des composants est documenté.
- Les bonnes pratiques de développement objet sont respectées.


## Installation

* Importez le fichier sql/struct.sql et sql/data.sql au sein de votre base de données.

## Instructions
Forkez le dépot.
Puis clonez le.

Une suite d'exercices a été écrites ci-dessous.
Réalisez au minimum les exercices obligatoires.
Faites un commit pour chaque changement.
Il n'est pas nécessaire de réaliser l'ensemble de ces exercices

## Exercices Algorithmie
### Exercice 01 : Connection à la base de données
La page home.php a été implementée.
Ouvrez la au sein de votre navigateur. Il semblerait qu'une erreur ait lieu.
Vérifiez le code afin de corriger la connection à la base de données.

### Exercice 02 : Gestion de la connection
Un formulaire a déjà été mis en place au sein de la page login.php.
Ecrivez le code nécessaire pour que le formulaire simules une connection à la base de données.


### Exercice 04 : Gestion de la navigation au sein d'un site
Au sein de la page index.php, gérez la navigation entre les deux autres en fonction de si la session est active ou non.

### Exercice 05 : Executer des tests unitaires

Et assurez-vous qu'ils fonctionnent.

## Exercices sur les tests unitaires

### Exercice 01 : Créer un test unitaire
Ouvrez le fichier DbControllerTest et implémentez la fonction testSumDebts();
Ce test unitaire doit tester la fonction getTotalDebts du DBController.

### Exercice 02 : Executer les tests unitaires
Executez l'ensemble des tests unitaires et sauvegardez le rapport au sein du fichier phpunit.initial_result
Corrigez au moins un des tests existants.

## Bonus
### Exercice 06 : Design
Un peu de temps libre ? Vous avez le design attendu au sein du pdf !

### Exercice 07 : Refactoring
Beaucoup de blocs de code sont mal conçus. Refactorez quelques éléments tout en précisant au sein du nom de votre commit le refactoring réalisé.
