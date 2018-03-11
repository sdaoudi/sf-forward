# Symfony Requests Forward

SfForwardBundle est un bundle qui vous permet de forwarder les requêtes HTTP
côté serveur, à l'aide de la librarie Guzzle.

## INSTALLATION
Pour installer ce bundle, lancez la commande suivante:
``` bash
composer require sdaoudi/sf-forward
```

## USAGE
##### Charger le bundle dans bundles:
``` php
SfForward\SfForwardBundle::class => ['all' => true]
```

##### Ajouter la route SfForward à votre routing global:
``` yaml
sf_forward:
    resource: '@SfForwardBundle/Controller/SfForwardController.php'
    prefix: /
    type: annotation
```

##### Configuration Guzzle:
Pour la configuration Guzzle, voir la documentation du projet 
[8p/EightPointsGuzzleBundle][1]

##### Exemple d'utilisation:
``` link
http://symfony.local/sfForwardFront/service=UM&routeId=_cinema_film_2174
```
 - service: c'est la clé du client configuré avec Guzzle.
 - C'est la route qu'on souhaite cibler, mais il suffit de remplacer 
 les slash (/) de la route avec des underscores (_)
 
[1]: https://github.com/8p/EightPointsGuzzleBundle