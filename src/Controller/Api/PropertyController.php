<?php

declare(strict_types=1);

namespace App\Controller\Api;

use App\Controller\AbstractApiController;
use App\Repository\PropertyRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class PropertyController extends AbstractApiController
{
    #[Route('/api/properties', name: 'properties', methods: 'GET')]
    public function index(PropertyRepository $properties): JsonResponse
    {
        return $this->handleApiResponse($properties->findAll());
    }
}
