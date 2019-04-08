<?php

/*
 * This file is part of the SF Forward Bundle.
 *
 * (c) DAOUDI Soufian <soufian.daoudi2@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SfForward\Tests\Manager;

use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use SfForward\Manager\ResponseManager;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Response;

class ResponseManagerTest extends TestCase
{
    protected $projectDir;

    protected function setUp()
    {
        $this->projectDir = __DIR__.'/../..';
    }

    public function testGetResponseSuccess()
    {
        $response = $this->getMockedResponse();
        $responseManager = new ResponseManager($response, $this->projectDir);

        $this->assertInstanceOf(Response::class, $responseManager->getResponse());
        $this->assertSame(Response::HTTP_OK, $responseManager->getResponse()->getStatusCode());
    }

    public function testGetResponseNotFound()
    {
        $response = $this->getMockedResponse('test content', Response::HTTP_NOT_FOUND);
        $responseManager = new ResponseManager($response, $this->projectDir);

        $this->assertInstanceOf(Response::class, $responseManager->getResponse());
        $this->assertSame(Response::HTTP_NOT_FOUND, $responseManager->getResponse()->getStatusCode());
    }

    public function testGetBinaryFileResponse()
    {
        $response = $this->getMockedResponse('test content', Response::HTTP_OK, 'content-disposition', 1);
        $responseManager = new ResponseManager($response, $this->projectDir);
        $responseReturn = $responseManager->getResponse();
        unlink($responseReturn->getFile()->getPathname());

        $this->assertInstanceOf(BinaryFileResponse::class, $responseReturn);
        $this->assertSame(Response::HTTP_OK, $responseReturn->getStatusCode());

    }

    /**
     * @param string $body
     * @param int    $statusCode
     * @param string $contentDisposition
     *
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    protected function getMockedResponse($body = '', $statusCode = Response::HTTP_OK, $contentDisposition = null, $exactly = 2)
    {
        $stream = $this->createMock(StreamInterface::class);
        $stream->method('getContents')
            ->willReturn($body);

        $response = $this->createMock(ResponseInterface::class);

        $response->expects($this->exactly($exactly))
            ->method('getBody')
            ->willReturn($stream);

        $response->expects($this->exactly($exactly))
            ->method('getStatusCode')
            ->willReturn($statusCode);

        $response->expects($this->exactly($exactly))
            ->method('hasHeader')
            ->with('Content-Disposition')
            ->willReturn($contentDisposition);

        $response->method('getHeaders')
            ->willReturn([]);

        return $response;
    }
}
