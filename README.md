# **REVIRSE**

## Application pour VIR Transport

### Description:

REVIRSE est une application de gestion des retours clients pour le réseau VIR Transport.

REVIRSE permet de faire le suivi , l'inventaire ainsi que la gestion des retours de chaques agences vers le HUB national ou vers les clients locaux.

### Installation:

1. Clone du dépôt GIT
2. Initialisation du projet:
    1. Composer Install
    2. php bin/console doctrine:database:create
    3. php bin/console doctrine:schema:update -f
    4. php bin/console cache:clear --no-warmup -e=prod
    5. (optionnel: donner les droits en écriture au dossier VAR/)
3. Import des données de base
    1. en cours ...

### Démo:

A venir ...






