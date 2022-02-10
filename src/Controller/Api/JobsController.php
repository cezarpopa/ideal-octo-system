<?php

declare(strict_types=1);

namespace App\Controller\Api;

use App\Controller\AbstractApiController;
use App\Form\JobFormType;
use App\Repository\JobRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;

class JobsController extends AbstractApiController
{
    #[Route('/api/jobs', name: 'jobs', methods: 'GET')]
    public function index(JobRepository $jobs): JsonResponse
    {
        return $this->handleApiResponse($jobs->findAll());
    }

    #[Route('/api/jobs/new', name: 'new_job', methods: 'POST')]
    public function newJobRequest(ManagerRegistry $doctrine, Request $request): JsonResponse
    {
        $form = $this->createForm(JobFormType::class);
        $data = json_decode($request->getContent(), true);

        $form->submit($data);

        if ( ! $form->isSubmitted() || ! $form->isValid()) {
            return $this->handleApiResponse([Response::HTTP_BAD_REQUEST]);
        }
        $property = $form->getData();

        $entityManager = $doctrine->getManager();
        $entityManager->persist($property);
        $entityManager->flush();

        return $this->handleApiResponse([Response::HTTP_OK]);
    }
}
