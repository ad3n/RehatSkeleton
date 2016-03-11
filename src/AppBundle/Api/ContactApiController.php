<?php

namespace AppBundle\Api;

use AppBundle\Entity\Contact;
use AppBundle\Form\ContactType;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfonian\Indonesia\RehatBundle\Controller\RehatController;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/contacts")
 */
class ContactApiController extends RehatController
{
    /**
     * Get contact create form
     *
     * @Route("/new")
     * @Method({"GET"})
     *
     * @ApiDoc(
     *     section="Master",
     *     resource="Contact",
     *     description="Get contact form to use for ajax"
     * )
     */
    public function newAction()
    {
        return $this->create($this->getForm(ContactType::class));
    }

    /**
     * Create new contact
     *
     * @Route("")
     * @Method({"POST"})
     *
     * @ApiDoc(
     *     section="Master",
     *     resource="Contact",
     *     description="Create new contact",
     *     parameters={
     *          { "name"="contact[group]", "dataType"="integer", "required"=true, "description"="Group id" },
     *          { "name"="contact[full_name]", "dataType"="string", "required"=true, "description"="Contact fullname" },
     *          { "name"="contact[email]", "dataType"="string", "required"=true, "description"="Valid contact email address" },
     *          { "name"="contact[phone_number]", "dataType"="string", "required"=true, "description"="Contact phone number" }
     *     }
     * )
     */
    public function postAction(Request $request)
    {
        return $this->post($request, $this->getForm(ContactType::class), new Contact());
    }

    /**
     * Get contacts edit form
     *
     * @Route("/{id}/edit")
     * @Method({"GET"})
     *
     * @ApiDoc(
     *     section="Master",
     *     resource="Contact",
     *     description="Get contact form to use for ajax"
     * )
     */
    public function editAction($id)
    {
        return $this->edit($this->getForm(ContactType::class), $id, Contact::class);
    }

    /**
     * Update contact by id
     *
     * @Route("/{id}")
     * @Method({"PUT"})
     *
     * @ApiDoc(
     *     section="Master",
     *     resource="Contact",
     *     description="Update contact by id"
     * )
     */
    public function putAction(Request $request, $id)
    {
        return $this->put($request, $this->getForm(ContactType::class), $id, Contact::class);
    }

    /**
     * Get contacts collection
     *
     * @Route("")
     * @Method({"GET"})
     *
     * @ApiDoc(
     *     section="Master",
     *     resource="Contact",
     *     description="Get contacts collection"
     * )
     */
    public function cgetAction(Request $request)
    {
        return $this->getCollection($request, new \ReflectionClass(Contact::class));
    }

    /**
     * Get contact detail by id
     *
     * @Route("/{id}")
     * @Method({"GET"})
     *
     * @ApiDoc(
     *     section="Master",
     *     resource="Contact",
     *     description="Get contact detail by id"
     * )
     */
    public function getAction($id)
    {
        return $this->getSingle($id, Contact::class);
    }

    /**
     * Delete contact detail by id
     *
     * @Route("/{id}")
     * @Method({"DELETE"})
     *
     * @ApiDoc(
     *     section="Master",
     *     resource="Contact",
     *     description="Delete contact detail by id"
     * )
     */
    public function deleteAction($id)
    {
        return $this->delete($id, Contact::class);
    }
}
