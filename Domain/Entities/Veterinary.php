<?php

namespace Domain\Entities;

/**
 * Veterinary
 */
class Veterinary
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $crv;

    /**
     * @var string
     */
    private $information;

    /**
     * @var \DateTime
     */
    private $createdAt = 'CURRENT_TIMESTAMP';

    /**
     * @var \DateTime
     */
    private $deletedAt;

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
     * Set crv
     *
     * @param string $crv
     *
     * @return Veterinary
     */
    public function setCrv($crv)
    {
        $this->crv = $crv;

        return $this;
    }

    /**
     * Get crv
     *
     * @return string
     */
    public function getCrv()
    {
        return $this->crv;
    }

    /**
     * Set information
     *
     * @param string $information
     *
     * @return Veterinary
     */
    public function setInformation($information)
    {
        $this->information = $information;

        return $this;
    }

    /**
     * Get information
     *
     * @return string
     */
    public function getInformation()
    {
        return $this->information;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Veterinary
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
     * @return Veterinary
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
     * Set user
     *
     * @param \Domain\Entities\User $user
     *
     * @return Veterinary
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

