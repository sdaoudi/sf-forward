# Symfony Requests Forward

[![Build Status](https://travis-ci.org/sdaoudi/sf-forward.svg?branch=master)](https://travis-ci.org/sdaoudi/sf-forward)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/sdaoudi/sf-forward/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/sdaoudi/sf-forward/?b=master)
[![Latest Stable Version](https://poser.pugx.org/sdaoudi/sf-forward/v/stable)](https://packagist.org/packages/sdaoudi/sf-forward)
[![Total Downloads](https://poser.pugx.org/sdaoudi/sf-forward/downloads)](https://packagist.org/packages/sdaoudi/sf-forward)

SfForwardBundle est un bundle qui vous permet de forwarder les requêtes HTTP
côté serveur, à l'aide de la librairie Guzzle.

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
    type: annotation
```

##### Configuration Guzzle:
Pour la configuration Guzzle, voir la documentation du projet 
[8p/EightPointsGuzzleBundle][1]

![alt text](http://blog.sdaoudi.ovh/wp-content/uploads/github/guzzle_base_uri.png "Examples of Guzzle base_uri")

##### Exemple d'utilisation:

``` link
http://symfony.local/sfForwardFront/service=UM&routeId=_cinema_film_2174
```

 - service: C'est la clé du client configuré avec Guzzle.
 - routeId: C'est la route qu'on souhaite cibler, mais il suffit de remplacer 
 les slash (/) de la route avec des underscores (_)

Afin de respecter [les conventions de nommages des services Symfony][2]
le service passé en paramètre serait transformé en [Snake Case][3].

[1]: https://github.com/8p/EightPointsGuzzleBundle
[2]: https://symfony.com/doc/current/contributing/code/standards.html#service-naming-conventions
[3]: https://fr.wikipedia.org/wiki/Snake_case