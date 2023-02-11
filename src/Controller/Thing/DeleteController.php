<?php

declare(strict_types=1);

namespace App\Controller\Thing;

use App\Entity\Thing;
use App\Repository\ThingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path: '/thing/{id}', name: 'delete-thing', methods: ['DELETE'])]
class DeleteController extends AbstractController
{
    public function __construct(
        private readonly ThingRepository $repository
    ) {
    }

    public function __invoke(?Thing $thing): JsonResponse
    {
        if ($thing) {
            $this->repository->remove($thing, true);
        }

        return new JsonResponse(
            ['message' => 'Deleted'],
            Response::HTTP_ACCEPTED
        );
    }
}
