<?php

/*
 * This file is part of the SF Forward Bundle.
 *
 * (c) DAOUDI Soufian <soufian.daoudi2@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SfForward\Controller;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use SfForward\Manager\ResponseManager;
use SfForward\Util\ParamsListService;
use SfForward\Util\RequestMethodMapping;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class SfForwardController.
 */
class SfForwardController extends Controller
{
    /**
     * @Route("/sfForwardFront/{paramsList}", name="sf_forward_front")
     *
     * @param Request $request
     * @param string  $paramsList
     *
     * @return Response
     */
    public function sfForwardFront(Request $request, $paramsList)
    {
        $params = new ParamsListService($paramsList);
        $guzzleServiceName = sprintf('eight_points_guzzle.client.%s', $params->getServiceName());
        $method = strtolower($request->getMethod());

        if (RequestMethodMapping::isValidMethod($method) && $this->has($guzzleServiceName)) {
            /** @var Client $client */
            $client = $this->get($guzzleServiceName);

            $contentType = RequestMethodMapping::$contentTypes[$method];
            $methodName = RequestMethodMapping::$methodsMapping[$method];

            /** @var ResponseInterface $guzzleResponse */
            $guzzleResponse = $client->{$method}(
                $params->getRouteId(),
                [
                    $contentType => $request->{$methodName}->all(),
                ]
            );

            return (
                new ResponseManager($guzzleResponse, $this->container->getParameter('kernel.project_dir'))
            )->getResponse();
        }

        throw new NotFoundHttpException(sprintf('Service "%s" not found', $params->getServiceName()));
    }
}
