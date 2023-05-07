<?php

namespace App\Infrastructure\Controller;

use App\Application\Action\Inbox;
use App\Application\Model\RegisterNotificationDTO;
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

    #[Route('/', name: 'register_notification', methods: ['POST'])]
    public function __invoke(RegisterNotificationDTO $data): JsonResponse
    {
        try {
            $ids = [];
            foreach ($data->getChannels() as $channel) {
                $ids[] = ($this->inbox)(
                    $channel,
                    $data->getUserIdentifier(),
                )->getId();
            }
            $this->entityManager->flush();

            return new JsonResponse(['ids' => $ids], Response::HTTP_CREATED);
        } catch (\Throwable) {
            return new JsonResponse([], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
