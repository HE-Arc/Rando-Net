# Rando-Net

Dorian Tan, Guillaume Mouchet, Benjamin Mouchet - ISC3il-a

---

## Contexte

Cette application web a été réalisée dans le cadre du cours de développement web durant le semestre d'automne 2022. 

Ce projet développé grâce au framework Laravel a pour but de rassembler les amateurs de randonnée. En effet, la page d'accueil regroupe les randonnées partagées par les utilisateurs. Chaque nouvelle randonnée soumise par un utilisateur est d'abord validée par un administrateur avant d'être disponible. Une randonnée comporte les informations suivantes: Titre, difficulté (1-5), description, image (stockée dans le dossier public), tags (prédéfinis par la bd), coordonnées et la région. Il y a une relation many-to-many entre les tags et les randonnées.

Dans l'état actuel de l'application, un utilisateur peut se créer un compte, se login/logout, créer sa randonnée (avec validation backend), afficher et rechercher des randonnées en fonction de tags associés à cette randonnée. Les adminisatrateurs peuvent faire tout ça et en plus modérer les randonnées. Un visiteur non connecté sur le site peut uniquement afficher et rechercher des randonnées.

A l'avenir, nous souhaiterions implémenter un espace de commentaires pour les randonnées ainsi qu'un système de review des randonnées.

## Problèmes rencontrés
Lors de l'ajout de la pagination, nous avons constaté qu'il n'était possible que de voir la première page de résultat de recherche de randonnées par tag. L'url, au lieu d'avoir "?page=1" contenait "?_token ..... =1", ce qui ne permettait pas d'afficher les données récupérées. La pagination a été enlevée pour les tags, le temps à disposition se faisant trop court pour le rendu final. La pagination est en revanche fonctionnelle pour les randonnées dans la page principale, le profile de l'utilisateur et pour la vue des administrateurs.

# Pour tester le projet
Il existe un compte admin seedé pour tester les fonctionnalités du site.

`Username: adminUser`

`Password: admin123`

