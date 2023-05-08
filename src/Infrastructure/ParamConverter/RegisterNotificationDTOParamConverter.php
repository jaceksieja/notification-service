<?php

namespace App\Infrastructure\ParamConverter;

use App\Application\Model\RegisterNotificationDTO;
use App\Domain\Channel\Channel;
use App\Domain\Notification\Type;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterInterface;
use Symfony\Component\HttpFoundation\Request;

class RegisterNotificationDTOParamConverter implements ParamConverterInterface
{
    public function apply(Request $request, ParamConverter $configuration): bool
    {
        $param = $configuration->getName();

        $channels = [];
        foreach ($request->request->all('channels') as $channel) {
            $channels[] = Channel::from($channel);
        }

        $request->attributes->set(
            $param,
            new RegisterNotificationDTO(
                Type::from($request->request->get('type')),
                $channels,
                $request->request->get('userIdentifier'),
            )
        );

        return true;
    }

    public function supports(ParamConverter $configuration): bool
    {
        return RegisterNotificationDTO::class === $configuration->getClass();
    }
}
