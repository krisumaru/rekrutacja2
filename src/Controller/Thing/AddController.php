<?php

namespace App\Controller\Thing;

use App\Entity\Thing;
use App\Repository\ThingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path: '/thing', name: 'add-thing', methods: ['POST', 'GET'])]
class AddController extends AbstractController
{
    public function __construct(
        private readonly ThingRepository $repository
    ) {
    }

    public function __invoke(Request $request): JsonResponse
    {
        $name = trim($request->get('name'));

        if (empty($name)) {
            return new JsonResponse(
                ['error_message' => 'Invalid parameters'],
                Response::HTTP_BAD_REQUEST
            );
        }

        if ($this->repository->findOneByName($name)) {
            return new JsonResponse(
                ['error_message' => 'Thing already exists'],
                Response::HTTP_BAD_REQUEST
            );
        }

        $thing = new Thing($name);
        $this->repository->save($thing);

        return new JsonResponse(
            ['message' => 'Created'],
            Response::HTTP_CREATED
        );
    }
}
