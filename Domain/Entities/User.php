<?php

namespace Domain\Entities;

/**
 * User
 */
class User
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
    private $email;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $profile;

    /**
     * @var string
     */
    private $thumbnail;

    /**
     * @var boolean
     */
    private $confirmed = '0';

    /**
     * @var string
     */
    private $resetPasswordToken;

    /**
     * @var string
     */
    private $socialIdentifier;

    /**
     * @var string
     */
    private $socialProvider;

    /**
     * @var \DateTime
     */
    private $createdAt = 'CURRENT_TIMESTAMP';

    /**
     * @var \DateTime
     */
    private $deletedAt;

    /**
     * @var string
     */
    private $socialId;

    /**
     * @var string
     */
    private $profileUrl;

    /**
     * @var string
     */
    private $addressZipcode;

    /**
     * @var string
     */
    private $addressStreet;

    /**
     * @var string
     */
    private $addressDistrict;

    /**
     * @var string
     */
    private $addressNumber;

    /**
     * @var string
     */
    private $addressCity;

    /**
     * @var string
     */
    private $addressState;

    /**
     * @var string
     */
    private $telephone;

    /**
     * @var string
     */
    private $homeTelephone;

    /**
     * @var string
     */
    private $oneClickBuy;

    /**
     * @var string
     */
    private $cardId;

    /**
     * @var string
     */
    private $cpf;

    /**
     * @var string
     */
    private $birthday;


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
     * @return User
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
     * Set email
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = password_hash($password,PASSWORD_DEFAULT);

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set profile
     *
     * @param string $profile
     *
     * @return User
     */
    public function setProfile($profile)
    {
        $this->profile = $profile;

        return $this;
    }

    /**
     * Get profile
     *
     * @return string
     */
    public function getProfile()
    {
        return $this->profile;
    }

    /**
     * Set thumbnail
     *
     * @param string $thumbnail
     *
     * @return User
     */
    public function setThumbnail($thumbnail)
    {
        $this->thumbnail = $thumbnail;

        return $this;
    }

    /**
     * Get thumbnail
     *
     * @return string
     */
    public function getThumbnail()
    {
        return $this->thumbnail;
    }

    /**
     * Set confirmed
     *
     * @param boolean $confirmed
     *
     * @return User
     */
    public function setConfirmed($confirmed)
    {
        $this->confirmed = $confirmed;

        return $this;
    }

    /**
     * Get confirmed
     *
     * @return boolean
     */
    public function getConfirmed()
    {
        return $this->confirmed;
    }

    /**
     * Set resetPasswordToken
     *
     * @param string $resetPasswordToken
     *
     * @return User
     */
    public function setResetPasswordToken($resetPasswordToken)
    {
        $this->resetPasswordToken = $resetPasswordToken;

        return $this;
    }

    /**
     * Get resetPasswordToken
     *
     * @return string
     */
    public function getResetPasswordToken()
    {
        return $this->resetPasswordToken;
    }

    /**
     * Set socialIdentifier
     *
     * @param string $socialIdentifier
     *
     * @return User
     */
    public function setSocialIdentifier($socialIdentifier)
    {
        $this->socialIdentifier = $socialIdentifier;

        return $this;
    }

    /**
     * Get socialIdentifier
     *
     * @return string
     */
    public function getSocialIdentifier()
    {
        return $this->socialIdentifier;
    }

    /**
     * Set socialProvider
     *
     * @param string $socialProvider
     *
     * @return User
     */
    public function setSocialProvider($socialProvider)
    {
        $this->socialProvider = $socialProvider;

        return $this;
    }

    /**
     * Get socialProvider
     *
     * @return string
     */
    public function getSocialProvider()
    {
        return $this->socialProvider;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return User
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
     * @return User
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
     * Set socialId
     *
     * @param string $socialId
     *
     * @return User
     */
    public function setSocialId($socialId)
    {
        $this->socialId = $socialId;

        return $this;
    }

    /**
     * Get socialId
     *
     * @return string
     */
    public function getSocialId()
    {
        return $this->socialId;
    }

    /**
     * Set profileUrl
     *
     * @param string $profileUrl
     *
     * @return User
     */
    public function setProfileUrl($profileUrl)
    {
        $this->profileUrl = $profileUrl;

        return $this;
    }

    /**
     * Get profileUrl
     *
     * @return string
     */
    public function getProfileUrl()
    {
        return $this->profileUrl;
    }

    /**
     * Set addressZipcode
     *
     * @param string $addressZipcode
     *
     * @return User
     */
    public function setAddressZipcode($addressZipcode)
    {
        $this->addressZipcode = $addressZipcode;

        return $this;
    }

    /**
     * Get addressZipcode
     *
     * @return string
     */
    public function getAddressZipcode()
    {
        return $this->addressZipcode;
    }

    /**
     * Set addressStreet
     *
     * @param string $addressStreet
     *
     * @return User
     */
    public function setAddressStreet($addressStreet)
    {
        $this->addressStreet = $addressStreet;

        return $this;
    }

    /**
     * Get addressStreet
     *
     * @return string
     */
    public function getAddressStreet()
    {
        return $this->addressStreet;
    }

    /**
     * Set addressDistrict
     *
     * @param string $addressDistrict
     *
     * @return User
     */
    public function setAddressDistrict($addressDistrict)
    {
        $this->addressDistrict = $addressDistrict;

        return $this;
    }

    /**
     * Get addressDistrict
     *
     * @return string
     */
    public function getAddressDistrict()
    {
        return $this->addressDistrict;
    }

    /**
     * Set addressNumber
     *
     * @param string $addressNumber
     *
     * @return User
     */
    public function setAddressNumber($addressNumber)
    {
        $this->addressNumber = $addressNumber;

        return $this;
    }

    /**
     * Get addressNumber
     *
     * @return string
     */
    public function getAddressNumber()
    {
        return $this->addressNumber;
    }

    /**
     * Set addressCity
     *
     * @param string $addressCity
     *
     * @return User
     */
    public function setAddressCity($addressCity)
    {
        $this->addressCity = $addressCity;

        return $this;
    }

    /**
     * Get addressCity
     *
     * @return string
     */
    public function getAddressCity()
    {
        return $this->addressCity;
    }

    /**
     * Set addressState
     *
     * @param string $addressState
     *
     * @return User
     */
    public function setAddressState($addressState)
    {
        $this->addressState = $addressState;

        return $this;
    }

    /**
     * Get addressState
     *
     * @return string
     */
    public function getAddressState()
    {
        return $this->addressState;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     *
     * @return User
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set homeTelephone
     *
     * @param string $homeTelephone
     *
     * @return User
     */
    public function setHomeTelephone($homeTelephone)
    {
        $this->homeTelephone = $homeTelephone;

        return $this;
    }

    /**
     * Get homeTelephone
     *
     * @return string
     */
    public function getHomeTelephone()
    {
        return $this->homeTelephone;
    }

    /**
     * Set oneClickBuy
     *
     * @param string $oneClickBuy
     *
     * @return User
     */
    public function setOneClickBuy($oneClickBuy)
    {
        $this->oneClickBuy = $oneClickBuy;

        return $this;
    }

    /**
     * Get oneClickBuy
     *
     * @return string
     */
    public function getOneClickBuy()
    {
        return $this->oneClickBuy;
    }

    /**
     * Set cardId
     *
     * @param string $cardId
     *
     * @return User
     */
    public function setCardId($cardId)
    {
        $this->cardId = $cardId;

        return $this;
    }

    /**
     * Get cardId
     *
     * @return string
     */
    public function getCardId()
    {
        return $this->cardId;
    }

    /**
     * Set cpf
     *
     * @param string $cpf
     *
     * @return User
     */
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;

        return $this;
    }

    /**
     * Get cpf
     *
     * @return string
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * Set birthday
     *
     * @param string $birthday
     *
     * @return User
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;

        return $this;
    }

    /**
     * Get birthday
     *
     * @return string
     */
    public function getBirthday()
    {
        return $this->birthday;
    }
}

