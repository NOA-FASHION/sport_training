
# PROJET SPORT-TRAINING
SPORT-TRAINING
Ce document est un guide de déploiement et un manuel d'utilisation 
pour l'application Sport_training dévéloppé dans le cadre de l'ECF 
de l'école STUDI.
Selon le cahier des charges l'application demandé devra être
un gestionnaire d'acces à des modules d'une application tierce.


# Fonctionnalités de l'application


1. ## Gestion des partenaires

#### Utilisateur consernés: Equipe Tech

* Ajout de partenaire franchisé.
* Association et création d'un compte apartenaire par partenaire
* Activation/désaction des partenaires

2.  ## Gestion des structures

#### Utilisateur consernés: Equipe Tech

* Ajout de structures par partenaire
* Association et création d'un compte structure par structure
* Activation/désaction des structures

3.  ## Gestion des acces

#### Utilisateur consernés: Equipe Tech le partenaire, la structure

* Acces en lecture/ecriture permission : Equipe tech
* Acces en lecture permission: Partenaire et structure

4.  ## Se connecter

#### Utilisateur consernés: Equipe Tech le partenaire, la structure

* Email envoyer lors de la création de structures ou partenaires
* Information d'autentification envoyer par email aux gérants de structures et aux partenaires.
* Email envoyer lors des modifications de permissions.
* Acces des gérants de structures et des partenaires à la platefrome apres authentification en lecture seul. 
* Acces apres authentification en lecture/ecriture aux admins à la plateforme.


5.  ## Confirmation de sécurité

#### Utilisateur consernés: Equipe Tech

* A chaque modification ou suppréssion,affichage d'un méssage de confirmation pour valider l'action. 

6.  ## Recherche dynamique

#### Utilisateur consernés: Equipe Tech  le partenaire, la structure

* l'application proposera une barre de recherche pour filter les recherches
* le premier filtre sera disponible en tapant les premieres lettres du partenaires ou de la structure
* le deuxieme sera paramétré par rapport aux éléments actifs ou non.
------
# Tech Stack

**Client:** Css, Html, Bootstrap, Bootswatch, js

**Server:** Php, Symfony

**Sql:** PostGres

------
# Installation de l'environement


## Les pré-requis 

### installation de la base de données

Télécharger les paquets de postgress à l'adresse suivante : 
[Download PostGress](postgresql.org/download/macosx/), installer les paquets sur votre ordinateurs

### installation de symfony

Selon la [Documentation](https://symfony.com/doc/current/setup.html#technical-requirements) de symfony avant de créer votre première 
application Symfony vous devez :


### Installer PHP 8.1
* Installez PHP 8.1 ou supérieur et ces extensions.

### Installer Composer
* install Composer , qui est utilisé pour installer les packages PHP.



### Installer Symfony CLI
Il est recommandé aussi l'installation de 
[Symfony CLI](https://symfony.com/download)

La descriptions des procédures d'installation suivantes sont destinées à l'OS MACOS, pour les autres système 
d'exploitaion vous pouvez vous référez à la documentation officielle.

## Procédures d'installation 

### Installation de php
```Terminal 
$ brew install php
```

### Installation de symfony-cli

```Terminal 
$ brew install symfony-cli/tap/symfony-cli

```
### Installation de Composer

```Terminal 
$ brew install composer
```
crée le lien symbolique:

```Terminal 
$ brew link --overwrite composer
```

## Test de l'environnement 

Le symfonybinaire fournit également un outil pour vérifier si votre ordinateur répond à toutes 
les exigences. 
Ouvrez votre terminal de console et exécutez cette commande :
```Terminal 
$ symfony check:requirements
```
Si votre environnement est optimal vous recevrez un retour positif dans votre terminal:


```Terminal 
$ [OK]                                         
 Your system is ready to run Symfony projects 
```


------


# Création et fonctionnement d'une application symfony


## Création de l'application
Apres avoir créer le dossier qui recevra tous les élements de votre appplication symfony, 
vous pouvez l'ouvrir avec votre éditeur de texte préféré.

Ensuite vous ouvrz un terminal à la racine du dossier et vous tapez la commande suivante:

```Terminal 
$ symfony new my_project --full
```

L'option --full est l'option pour préciser à symfony cli d'installer tous les packets nécéssaires 
pour faire une application web complète.

## Démarer l'environnement

Pour démarer l'environement il faut rentrer dans le projet et démarer le server symfony 
avec les commandes suivantes:
```Terminal 
$ cd my-project/
$ symfony server:start
```

------
# Installation de  l'environnement GIT

Se connecter sur le serveur GITHUB et créer un repositories.

## Initialiser votre dépot et créer votre premier commit
* git init
* git add README.md
* git commit -m "first commit"
* git branch -M main
* git remote add origin https://github.com/NOA-FASHION/sport-training.git

## Synchroniser le sur votre serveur GITHUB.
git push -u origin main

------


# Déploiement de l'application
Le déploiement à été éffectué sur un serveur VPS, le choix du provider est Hostinger.

# Installation de l'environement

## Les pré-requis 


### installation de la base de données PostGres

La procédure d'installation est la suivante:

```Terminal 
$ sudo sh -c 'echo "deb http://apt.postgresql.org/pub/repos/apt $(lsb_release -cs)-pgdg main" > /etc/apt/sources.list.d/pgdg.list'

$ wget --quiet -O - https://www.postgresql.org/media/keys/ACCC4CF8.asc | sudo apt-key add -

$ sudo apt-get update

$ sudo apt-get -y install postgresql
```

### installation de symfony

Selon la documentation de symfony avant de créer votre première 
application Symfony vous devez :

[Documentation symfony](https://symfony.com/doc/current/setup.html#technical-requirements)
### Installer PHP 8.1
* Installez PHP 8.1 ou supérieur et ces extensions.

### Installer Composer
* install Composer , qui est utilisé pour installer les packages PHP.



### Installer Symfony CLI
Il est recommandé aussi l'installation de 
[Symfony CLI](https://symfony.com/download)

La descriptions des procédures d'installation suivantes sont destinées à l'OS Linux Ubuntu, pour les autres système 
d'exploitaion vous pouvez vous référez à la documentation officielle.

## Procédures d'installation 

### Mise à jour des paquets d'installation
```Terminal 
$ sudo apt-get update && apt-get upgrade
```
### Installation de php
```Terminal 
$ sudo apt-get install php
```

### Installation de symfony-cli

```Terminal 
$ sudo apt install git zip unzip
$ wget https://get.symfony.com/cli/installer -O - | bash
```
### Installation de Composer

```Terminal 
$ sudo apt install composer
```
Se définir propriétaire des répertoires associés pour permettre
 à composer de créer les caches sans utiliser sudo

```Terminal 
$ sudo chown -R $USER $HOME/.composer
```

crée le lien symbolique:

```Terminal 
$ export PATH="$HOME/.symfony/bin:$PATH"
```

# Test de l'environnement 

Le symfonybinaire fournit également un outil pour vérifier si votre ordinateur répond à toutes 
les exigences. 
Ouvrez votre terminal de console et exécutez cette commande :
```Terminal 
$ symfony check:requirements
```
Si votre environnement est optimal vous recevrez un retour positif dans votre terminal:


```Terminal 
$ [OK]                                         
 Your system is ready to run Symfony projects 
```



# Instalation et paramétrage de GIT


## installer GIT
```Terminal 
$ sudo apt install git
```

## initialisr Git
```Terminal 
$ git config --global user.name "Your Name"
$ git config --global user.email "youremail@domain.com"
```
## syncroniser Github avec votre Git en local

```Terminal 
$ git remote add origin https://github.com/NOA-FASHION/sport-training.git
$ git branch -M main
$ git push -u origin main
```
------
# sécurisation de l'environement

il est maintenant temps de mettre en place un pare-feu. Un pare-feu est essentiel lors de la configuration du VPS pour limiter le trafic indésirable sortant ou entrant dans votre VPS. Installez ufw et configurez un pare-feu pour autoriser les opérations SSH en faisant .

## Installation du parefeu ufw
```Terminal
$ sudo apt install ufw -y
```
## configuration du parefeu

```Terminal
$ sudo ufw allow OpenSSH
$ sudo ufw allow 443
$ sudo ufw allow OpenSSH
$ sudo ufw enable -y 
```
## Installation du fail2ban

fail2ban est un logiciel qui se charge d'analyser les logs de divers services installés sur la machine, pour bannir automatiquement un hôte via iptables pour une durée déterminée, en cas d'échec après X tentatives.
C'est un élément essentiel pour sécuriser son système, et éviter des intrusions via brute-force.

```Terminal
$ sudo apt install fail2ban
```


------
# mise en production de l'environement