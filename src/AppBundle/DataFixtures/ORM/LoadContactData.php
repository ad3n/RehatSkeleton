<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Contact;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadContactData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i <= 99; ++$i) {
            $contact = new Contact();
            $contact->setFullName('Fullname');
            $contact->setGroup($this->getReference('group'.$i));
            $contact->setEmail('mail'.$i.'@mail.com');
            $contact->setPhoneNumber($i.'134535');

            $manager->persist($contact);
        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 2;
    }
}
