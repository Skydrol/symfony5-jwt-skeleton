<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @Route("/api")
 */
class ProfileController extends AbstractController
{

    private $userRepository;
    private $security;
    private $serializerInterface;

    public function __construct(
        UserRepository $userRepository,
        Security $security,
        SerializerInterface $serializerInterface

    )
    {
        $this->userRepository = $userRepository;
        $this->security = $security;
        $this->serializerInterface = $serializerInterface;
    }

    /**
     * @Route("/register", name="user.register")
     * @param Request $request
     * @return JsonResponse
     */
    public function register(Request $request): JsonResponse
    {
        $jsonData = json_decode($request->getContent());
        $user = $this->userRepository->create($jsonData);


        return new JsonResponse([
            'user' => $this->serializerInterface->serialize($user, 'json')
        ], 201);

    }

    /**
     * @Route("/profile", name="user.profile")
     * @return JsonResponse
     */
    public function profile(): JsonResponse
    {
        $currentUser = $this->security->getUser();
        $user = $this->serializerInterface->serialize($currentUser, 'json');

        return new JsonResponse([
            'user' => $user
        ], 200);

    }
}
