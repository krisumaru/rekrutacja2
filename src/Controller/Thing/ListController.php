<?php

declare(strict_types=1);

namespace App\Controller\Thing;

use App\Repository\ThingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path: '/things', name: 'list-things', methods: ['GET'])]
class ListController extends AbstractController
{

    public function __construct(
        private readonly ThingRepository $repository
    ) {
    }

    public function __invoke(): JsonResponse
    {
        $list = $this->repository->findAll();

        return new JsonResponse(
            $list,
            Response::HTTP_OK
        );
    }
}
