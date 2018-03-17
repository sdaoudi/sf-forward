<?php
/**
 * Created by PhpStorm.
 * User: sdaoudi
 * Date: 11/03/18
 * Time: 15:35
 */

namespace SfForward\Controller;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use SfForward\Util\ParamsListService;
use SfForward\Util\RequestMethodMapping;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class SfForwardController
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


            /** @var ResponseInterface $guzzleResponse */
            $guzzleResponse = $client->{$method}(
                $params->getRouteId(),
                [ 'query' => $request->{RequestMethodMapping::$methodsMapping[$method]}->all() ]
            );

            $response = new Response($guzzleResponse->getBody());
            $response->setStatusCode($guzzleResponse->getStatusCode());
            $response->setProtocolVersion($guzzleResponse->getProtocolVersion());

            return $response;
        }

        throw new NotFoundHttpException(sprintf('Service "%s" not found', $params->getServiceName()));
    }

}