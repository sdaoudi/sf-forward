<?php

/*
 * This file is part of the SF Forward Bundle.
 *
 * (c) DAOUDI Soufian <soufian.daoudi2@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SfForward\Manager;

use Psr\Http\Message\ResponseInterface;
use SfForward\Util\PublicDirectory;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Response;

class ResponseManager
{
    /**
     * @var ResponseInterface
     */
    protected $response;

    /**
     * @var string
     */
    protected $projectDir;

    /**
     * ResponseManager constructor.
     *
     * @param ResponseInterface $response
     * @param string            $projectDir
     */
    public function __construct(ResponseInterface $response, $projectDir)
    {
        $this->response = $response;
        $this->projectDir = $projectDir;
    }

    /**
     * @return BinaryFileResponse|Response
     */
    public function getResponse()
    {
        if ($this->response->hasHeader('Content-Disposition')) {
            return $this->getBinaryFileResponse();
        }

        return $this->getHttpResponse();
    }

    /**
     * @return BinaryFileResponse
     */
    protected function getBinaryFileResponse()
    {
        $projectDir = PublicDirectory::getPublicDir($this->projectDir);
        $filename = $projectDir.mt_rand();

        $fileSystem = new Filesystem();
        $fileSystem->dumpFile(
            $filename,
            $this->response->getBody()->getContents()
        );

        return (
            new BinaryFileResponse(
                $filename,
                $this->response->getStatusCode(),
                $this->response->getHeaders()
            )
        )->deleteFileAfterSend(true);
    }

    /**
     * @return Response
     */
    protected function getHttpResponse()
    {
        $response = new Response($this->response->getBody());
        $response->setStatusCode($this->response->getStatusCode());

        return $response;
    }
}
