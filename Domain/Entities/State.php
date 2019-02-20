<?php

namespace Domain\Entities;

/**
 * State
 */
class State
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $uf;

    /**
     * @var \Domain\Entities\Country
     */
    private $country;


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
     * Set name
     *
     * @param string $name
     *
     * @return State
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set uf
     *
     * @param string $uf
     *
     * @return State
     */
    public function setUf($uf)
    {
        $this->uf = $uf;

        return $this;
    }

    /**
     * Get uf
     *
     * @return string
     */
    public function getUf()
    {
        return $this->uf;
    }

    /**
     * Set country
     *
     * @param \Domain\Entities\Country $country
     *
     * @return State
     */
    public function setCountry(\Domain\Entities\Country $country = null)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return \Domain\Entities\Country
     */
    public function getCountry()
    {
        return $this->country;
    }
}

