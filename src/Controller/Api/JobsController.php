<?php

declare(strict_types=1);

namespace App\Controller\Api;

use App\Form\JobFormType;
use App\Repository\JobRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Doctrine\Persistence\ManagerRegistry;

class JobsController extends AbstractController
{
    #[Route('/api/jobs', name: 'jobs', methods: 'GET')]
    public function index(SerializerInterface $serializer, JobRepository $jobs)
    {
        return new JsonResponse(
            $serializer->serialize($jobs->findAll(), 'json'),
            Response::HTTP_OK,
            [],
            true,
        );
    }

    #[Route('/api/jobs/new', name: 'new_job', methods: 'POST')]
    public function newJobRequest(ManagerRegistry $doctrine, Request $request): JsonResponse
    {
        $form = $this->createForm(JobFormType::class);
        $data = json_decode($request->getContent(), true);

        $form->submit($data);

        if (! $form->isSubmitted() || ! $form->isValid()) {
            return new JsonResponse(
                json_encode([Response::HTTP_BAD_REQUEST]),
                Response::HTTP_OK,
                [],
                true,
            );
        }
        $property = $form->getData();

        $entityManager = $doctrine->getManager();
        $entityManager->persist($property);
        $entityManager->flush();

        return new JsonResponse(
            json_encode([Response::HTTP_OK]),
            Response::HTTP_OK,
            [],
            true,
        );
    }
}
