<?php

namespace AppBundle\EventListener;

use AppBundle\Entity\User;
use Ramsey\Uuid\Uuid;
use Symfonian\Indonesia\RehatBundle\Event\FilterFormEvent;

class UpdateUserListener
{
    public function onPreFormSubmit(FilterFormEvent $event)
    {
        $entity = $event->getData();
        if (!$entity instanceof User) {
            return;
        }

        $entity->setApiKey(Uuid::uuid4());
        $entity->setSecretKey(sha1(Uuid::uuid4()));
        $entity->enable();
    }
}