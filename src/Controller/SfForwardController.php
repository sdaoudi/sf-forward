<?php
/**
 * Created by PhpStorm.
 * User: sdaoudi
 * Date: 11/03/18
 * Time: 15:35
 */

namespace SfForward\Controller;

use App\Services\ParamsListService;
use GuzzleHttp\Client;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class SfForwardController
 */
class SfForwardController
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

        if ($this->has($guzzleServiceName)) {
            /** @var Client $client */
            $client = $this->get($guzzleServiceName);
            $guzzleResponse = $client->get(
                $params->getRouteId(),
                ['query' => $request->getQueryString()]
            );
            $response = new Response($guzzleResponse->getBody());
            $response->setStatusCode($guzzleResponse->getStatusCode());
            $response->setProtocolVersion($guzzleResponse->getProtocolVersion());

            return $response;
        }

        throw new NotFoundHttpException(sprintf('Service "%s" not found', $params->getServiceName()));
    }

}