# Symfony Requests Forward

[![Build Status](https://travis-ci.org/sdaoudi/sf-forward.svg?branch=master)](https://travis-ci.org/sdaoudi/sf-forward)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/sdaoudi/sf-forward/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/sdaoudi/sf-forward/?b=master)
[![Latest Stable Version](https://poser.pugx.org/sdaoudi/sf-forward/v/stable)](https://packagist.org/packages/sdaoudi/sf-forward)
[![Total Downloads](https://poser.pugx.org/sdaoudi/sf-forward/downloads)](https://packagist.org/packages/sdaoudi/sf-forward)

SfForwardBundle is a bundle that allows you to forward server-side HTTP requests 
using the Guzzle library.

## INSTALLATION

To install this bundle, run the following command:

``` bash
$ composer require sdaoudi/sf-forward
```

## USAGE

##### Enable bundle:

``` php
SfForward\SfForwardBundle::class => ['all' => true],
```

##### Add the SfForward route to your routing.yml file:

``` yaml
sf_forward:
    resource: '@SfForwardBundle/Controller/SfForwardController.php'
    type: annotation
```

##### Guzzle configuration:

For the Guzzle configuration, see the [8p/EightPointsGuzzleBundle][1] project
documentation:

``` yaml
# EightPoints GuzzleBundle
# A full list of configuration options can be found here:
# https://github.com/8p/EightPointsGuzzleBundle/blob/master/src/Resources/doc/configuration-reference.md
eight_points_guzzle:
    clients:
        my_client:
            # Write here the host where to do requests
            base_url: "http://localhost:8000"

            # Request options: http://docs.guzzlephp.org/en/stable/request-options.html
            options:
                # timeout in seconds
                timeout: 30

                # set to false to disable throwing exceptions on an HTTP protocol errors (4xx and 5xx responses)
                http_errors: true

                # each key is the name of a header, and each value is a string or array of strings representing the
                # header field values.
                headers:
                    User-Agent: "EightPointsGuzzleBundle/v7"
```

##### Examples:

``` link
http://symfony.local//sfForwardFront/service=MyClient&routeId=_my_route_example_2174?key=value
```

- service: is the key of the client configured with Guzzle.
- routeId: is the target route, just replace the slashes (/) by underscores (_).

In order to respect [Symfony naming conventions][2], the service passed in 
parameter would be transformed into [Snake Case][3].

[1]: https://github.com/8p/EightPointsGuzzleBundle
[2]: https://symfony.com/doc/current/contributing/code/standards.html#service-naming-conventions
[3]: https://fr.wikipedia.org/wiki/Snake_case

