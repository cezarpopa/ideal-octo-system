<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

abstract class AbstractApiController extends AbstractController
{
    protected SerializerInterface $serializer;

    protected ?int $httpStatusOverride;

    private int $httpStatus;

    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
        $this->httpStatusOverride = null;
        $this->httpStatus = Response::HTTP_OK;
    }

    public function handleApiResponse(array $responseData): JsonResponse {
        return new JsonResponse(
            $this->serializeResponseData($responseData),
            (int) ($this->httpStatusOverride ?? $this->httpStatus),
            [],
            true,
        );
    }

    private function serializeResponseData($data): string
    {
        return $this->serializer->serialize($data, 'json');
    }
}
