<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Hateoas\Configuration\Annotation as Hateoas;
use JMS\Serializer\Annotation as Serializer;
use Symfonian\Indonesia\RehatBundle\Annotation\Filterable;
use Symfonian\Indonesia\RehatBundle\Annotation\Searchable;
use Symfonian\Indonesia\RehatBundle\Annotation\Sortable;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Table(name="pl_user")
 * @ORM\Entity
 *
 * @Serializer\XmlRoot("user")
 * @Hateoas\Relation("self", href = "expr('/api/users/' ~ object.getId())")
 */
class User implements UserInterface
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_BLACKLIST = -1;

    /**
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     * @Serializer\XmlAttribute
     */
    private $id;

    /**
     * @ORM\Column(name="username", type="string", length=77)
     * @Searchable()
     * @Filterable()
     * @Sortable()
     */
    private $username;

    /**
     * @ORM\Column(name="roles", type="array")
     * @Searchable()
     * @Filterable()
     * @Sortable()
     */
    private $roles;

    /**
     * @ORM\Column(name="organization", type="string", length=77)
     * @Searchable()
     * @Filterable()
     * @Sortable()
     */
    private $organization;

    /**
     * @ORM\Column(name="api_key", type="string", length=40)
     */
    private $apiKey;

    /**
     * @ORM\Column(name="secret_key", type="string", length=40)
     */
    private $secretKey;

    /**
     * @ORM\Column(name="status", type="smallint", length=1)
     * @Searchable()
     * @Filterable()
     * @Sortable()
     */
    private $status;

    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    public function addRole($role)
    {
        if (!in_array($role, $this->roles)) {
            $this->roles[] = $role;
        }
    }

    /**
     * @param array $roles
     */
    public function setRoles(array $roles)
    {
        $this->roles = $roles;
    }

    /**
     * @return array
     */
    public function getRoles()
    {
        return array_unique($this->roles);
    }

    public function setOrganization($organization)
    {
        $this->organization = $organization;
    }

    public function getOrganization()
    {
        return $this->organization;
    }

    /**
     * @param string $apiKey
     */
    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * @return string
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * @param string $secretKey
     */
    public function setSecretKey($secretKey)
    {
        $this->secretKey = $secretKey;
    }

    /**
     * @return string
     */
    public function getSecretKey()
    {
        return $this->secretKey;
    }

    public function enable()
    {
        $this->status = self::STATUS_ACTIVE;
    }

    public function disable()
    {
        $this->status = self::STATUS_INACTIVE;
    }

    public function blackList()
    {
        $this->status = self::STATUS_BLACKLIST;
    }

    /**
     * @return bool
     */
    public function isActive()
    {
        if (self::STATUS_ACTIVE === $this->status) {
            return true;
        }

        return false;
    }

    /**
     * @return bool
     */
    public function isBlackList()
    {
        if (self::STATUS_BLACKLIST === $this->status) {
            return true;
        }

        return false;
    }

    //All method below is not implemented
    public function getPassword()
    {
    }
    public function getSalt()
    {
    }
    public function eraseCredentials()
    {
    }
}