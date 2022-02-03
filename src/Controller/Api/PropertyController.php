<?php
declare(strict_types=1);

namespace App\Controller\Api;

use App\Repository\PropertyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class PropertyController extends AbstractController
{
    #[Route('/api/properties', name: 'properties', methods: 'GET')]
    public function index(SerializerInterface $serializer, PropertyRepository $properties)
    {
        return new JsonResponse(
            $serializer->serialize($properties->findAll(), 'json'),
            Response::HTTP_OK,
            [],
            true,
        );
    }
}
