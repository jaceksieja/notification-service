<?php

namespace App\Infrastructure\Controller;

use App\Application\Action\Inbox;
use App\Application\Model\RegisterNotificationDTO;
use App\Infrastructure\Entity\Type;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

readonly class NotificationController
{
    public function __construct(
        private Inbox $inbox,
        private EntityManagerInterface $entityManager
    ) {
    }

    #[Route('/notifications', name: 'register_notification', methods: ['POST'])]
    public function __invoke(RegisterNotificationDTO $createNotificationDTO): Response
    {
        try {
            $id = ($this->inbox)(Type::from('notification'), $createNotificationDTO->getContent());
            $this->entityManager->flush();

            return new JsonResponse(['id' => $id->getId()], Response::HTTP_CREATED);
        } catch (\Throwable $throwable) {
            var_dump($throwable->getMessage());

            return new JsonResponse([], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
