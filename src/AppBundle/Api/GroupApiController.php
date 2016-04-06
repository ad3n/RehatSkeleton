<?php

namespace AppBundle\Api;

use AppBundle\Entity\Group;
use AppBundle\Form\GroupType;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfonian\Indonesia\RehatBundle\Controller\RehatController;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/groups")
 */
class GroupApiController extends RehatController
{
    /**
     * Get group create form
     *
     * @Route("/new")
     * @Method({"GET"})
     *
     * @ApiDoc(
     *     section="Master",
     *     resource="Group",
     *     description="Get group form to use for ajax"
     * )
     */
    public function newAction()
    {
        return $this->create($this->getForm(GroupType::class));
    }

    /**
     * Create new group
     *
     * @Route("")
     * @Method({"POST"})
     *
     * @ApiDoc(
     *     section="Master",
     *     resource="Group",
     *     description="Create new group",
     *     parameters={
     *          { "name"="group[group]", "dataType"="integer", "required"=true, "description"="Group id" },
     *          { "name"="group[full_name]", "dataType"="string", "required"=true, "description"="Group fullname" },
     *          { "name"="group[email]", "dataType"="string", "required"=true, "description"="Valid group email address" },
     *          { "name"="group[phone_number]", "dataType"="string", "required"=true, "description"="Group phone number" }
     *     }
     * )
     */
    public function postAction(Request $request)
    {
        return $this->post($request, $this->getForm(GroupType::class), new Group());
    }

    /**
     * Get groups edit form
     *
     * @Route("/{id}/edit")
     * @Method({"GET"})
     *
     * @ApiDoc(
     *     section="Master",
     *     resource="Group",
     *     description="Get group form to use for ajax"
     * )
     */
    public function editAction($id)
    {
        return $this->edit($this->getForm(GroupType::class), $id, Group::class);
    }

    /**
     * Update group by id
     *
     * @Route("/{id}")
     * @Method({"PUT"})
     *
     * @ApiDoc(
     *     section="Master",
     *     resource="Group",
     *     description="Update group by id"
     * )
     */
    public function putAction(Request $request, $id)
    {
        return $this->put($request, $this->getForm(GroupType::class, 'PUT'), $id, Group::class);
    }

    /**
     * Get groups collection
     *
     * @Route("", name="groups_list")
     * @Method({"GET"})
     *
     * @ApiDoc(
     *     section="Master",
     *     resource="Group",
     *     description="Get groups collection"
     * )
     */
    public function cgetAction(Request $request)
    {
        return $this->getCollection($request, new \ReflectionClass(Group::class));
    }

    /**
     * Get group detail by id
     *
     * @Route("/{id}")
     * @Method({"GET"})
     *
     * @ApiDoc(
     *     section="Master",
     *     resource="Group",
     *     description="Get group detail by id"
     * )
     */
    public function getAction($id)
    {
        return $this->getSingle($id, Group::class);
    }

    /**
     * Delete group detail by id
     *
     * @Route("/{id}")
     * @Method({"DELETE"})
     *
     * @ApiDoc(
     *     section="Master",
     *     resource="Group",
     *     description="Delete group detail by id"
     * )
     */
    public function deleteAction($id)
    {
        return $this->delete($id, Group::class);
    }
}
