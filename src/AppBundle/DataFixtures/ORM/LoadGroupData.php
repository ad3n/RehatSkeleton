<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Group;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadGroupData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i <= 99; ++$i) {
            $group = new Group();
            $group->setName('ABC');

            $this->addReference('group'.$i, $group);
            $manager->persist($group);
        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 1;
    }
}
