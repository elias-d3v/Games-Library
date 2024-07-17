# Mini-Framework

## config.php

Fichier qui contient les infos qui pourraient changer d'un projet à l'autre (ex: acces à la DB)

## Core

Tous les fichiers et classes qui ne seront pas modifiés, mais utilisable tel qu'ils sont. C'est le coeur de notre framework.

## Controllers

Les controllers, qui auront chacun une ou des methodes pour gérer une ou des requetes HTTP.

## Managers

Sont des classes qui servent à émettre des requetes SQL. ( 1 manager par table )

## Entities

Sont des classes qui representent un élément en DB. un manager trouve des données/lignes dans la table qui lui correspond, il retourne soit 
un objet, instance de la classe entité, soit un tableaux d'objets, instances de la meme classe.

## Views

Fichiers *.phtml qui servent à afficher le contenu d'une page

## Public

Contient les assets (styles, scripts, médias, fonts, etc).