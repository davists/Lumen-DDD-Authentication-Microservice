<?php

namespace Domain\Entities;

/**
 * Customer
 */
class Customer
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $createdAt = 'CURRENT_TIMESTAMP';

    /**
     * @var \DateTime
     */
    private $deletedAt;

    /**
     * @var boolean
     */
    private $firstPetshop = '0';

    /**
     * @var \Domain\Entities\Company
     */
    private $company;

    /**
     * @var \Domain\Entities\User
     */
    private $user;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Customer
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set deletedAt
     *
     * @param \DateTime $deletedAt
     *
     * @return Customer
     */
    public function setDeletedAt($deletedAt)
    {
        $this->deletedAt = $deletedAt;

        return $this;
    }

    /**
     * Get deletedAt
     *
     * @return \DateTime
     */
    public function getDeletedAt()
    {
        return $this->deletedAt;
    }

    /**
     * Set firstPetshop
     *
     * @param boolean $firstPetshop
     *
     * @return Customer
     */
    public function setFirstPetshop($firstPetshop)
    {
        $this->firstPetshop = $firstPetshop;

        return $this;
    }

    /**
     * Get firstPetshop
     *
     * @return boolean
     */
    public function getFirstPetshop()
    {
        return $this->firstPetshop;
    }

    /**
     * Set company
     *
     * @param \Domain\Entities\Company $company
     *
     * @return Customer
     */
    public function setCompany(\Domain\Entities\Company $company = null)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return \Domain\Entities\Company
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set user
     *
     * @param \Domain\Entities\User $user
     *
     * @return Customer
     */
    public function setUser(\Domain\Entities\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Domain\Entities\User
     */
    public function getUser()
    {
        return $this->user;
    }
}

