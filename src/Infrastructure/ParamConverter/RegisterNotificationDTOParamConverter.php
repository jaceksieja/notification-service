<?php

namespace App\Infrastructure\ParamConverter;

use App\Application\Model\RegisterNotificationDTO;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterInterface;
use Symfony\Component\HttpFoundation\Request;

class RegisterNotificationDTOParamConverter implements ParamConverterInterface
{
    public function apply(Request $request, ParamConverter $configuration): bool
    {
        $param = $configuration->getName();

        $request->attributes->set($param, new RegisterNotificationDTO());

        return true;
    }

    public function supports(ParamConverter $configuration): bool
    {
        return RegisterNotificationDTO::class === $configuration->getClass();
    }
}
