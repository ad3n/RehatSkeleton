<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\User;
use Ramsey\Uuid\Uuid;

class LoadUserData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $superAdmin = new User();
        $superAdmin->setUsername('admin');
        $superAdmin->setApiKey(Uuid::uuid4());
        $superAdmin->setSecretKey(sha1(Uuid::uuid4()));
        $superAdmin->addRole('ROLE_SUPER_ADMIN');
        $superAdmin->setOrganization('NINJA VPS');
        $superAdmin->enable();

        $manager->persist($superAdmin);
        $manager->flush();
    }
}