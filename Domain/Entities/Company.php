<?php

namespace Domain\Entities;

/**
 * Company
 */
class Company
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
    private $cnpj;

    /**
     * @var string
     */
    private $socialReason;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $telephone;

    /**
     * @var string
     */
    private $address;

    /**
     * @var string
     */
    private $addressNumber;

    /**
     * @var string
     */
    private $addressDistrict;

    /**
     * @var string
     */
    private $addressComplement;

    /**
     * @var string
     */
    private $zipcode;

    /**
     * @var string
     */
    private $latitude;

    /**
     * @var string
     */
    private $longitude;

    /**
     * @var string
     */
    private $distanceToZeroReferential;

    /**
     * @var boolean
     */
    private $active = '1';

    /**
     * @var string
     */
    private $cnae;

    /**
     * @var string
     */
    private $presentation;

    /**
     * @var string
     */
    private $policies;

    /**
     * @var string
     */
    private $contactPerson;

    /**
     * @var string
     */
    private $contactPersonTelephone;

    /**
     * @var string
     */
    private $logo;

    /**
     * @var string
     */
    private $thumbnail;

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
    private $cityShippingDays = '0';

    /**
     * @var string
     */
    private $stateShippingDays = '0';

    /**
     * @var string
     */
    private $countryShippingDays = '0';

    /**
     * @var string
     */
    private $useTerms;

    /**
     * @var string
     */
    private $bank;

    /**
     * @var string
     */
    private $bankCode;

    /**
     * @var string
     */
    private $agency;

    /**
     * @var string
     */
    private $agencyVd;

    /**
     * @var string
     */
    private $account;

    /**
     * @var string
     */
    private $accountVd;

    /**
     * @var string
     */
    private $accountType;

    /**
     * @var string
     */
    private $documentNumber;

    /**
     * @var string
     */
    private $legalName;

    /**
     * @var string
     */
    private $splitPercentage;

    /**
     * @var string
     */
    private $transferInterval;

    /**
     * @var string
     */
    private $transferDay;

    /**
     * @var string
     */
    private $ambientePagarme;

    /**
     * @var string
     */
    private $homologacaoRecipientId;

    /**
     * @var string
     */
    private $producaoRecipientId;

    /**
     * @var string
     */
    private $uuid;

    /**
     * @var string
     */
    private $slugName;

    /**
     * @var \Domain\Entities\Plan
     */
    private $plan;

    /**
     * @var \Domain\Entities\Country
     */
    private $country;

    /**
     * @var \Domain\Entities\State
     */
    private $state;

    /**
     * @var \Domain\Entities\City
     */
    private $city;


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
     * @return Company
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
     * Set cnpj
     *
     * @param string $cnpj
     *
     * @return Company
     */
    public function setCnpj($cnpj)
    {
        $this->cnpj = $cnpj;

        return $this;
    }

    /**
     * Get cnpj
     *
     * @return string
     */
    public function getCnpj()
    {
        return $this->cnpj;
    }

    /**
     * Set socialReason
     *
     * @param string $socialReason
     *
     * @return Company
     */
    public function setSocialReason($socialReason)
    {
        $this->socialReason = $socialReason;

        return $this;
    }

    /**
     * Get socialReason
     *
     * @return string
     */
    public function getSocialReason()
    {
        return $this->socialReason;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Company
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
     * Set telephone
     *
     * @param string $telephone
     *
     * @return Company
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
     * Set address
     *
     * @param string $address
     *
     * @return Company
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set addressNumber
     *
     * @param string $addressNumber
     *
     * @return Company
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
     * Set addressDistrict
     *
     * @param string $addressDistrict
     *
     * @return Company
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
     * Set addressComplement
     *
     * @param string $addressComplement
     *
     * @return Company
     */
    public function setAddressComplement($addressComplement)
    {
        $this->addressComplement = $addressComplement;

        return $this;
    }

    /**
     * Get addressComplement
     *
     * @return string
     */
    public function getAddressComplement()
    {
        return $this->addressComplement;
    }

    /**
     * Set zipcode
     *
     * @param string $zipcode
     *
     * @return Company
     */
    public function setZipcode($zipcode)
    {
        $this->zipcode = $zipcode;

        return $this;
    }

    /**
     * Get zipcode
     *
     * @return string
     */
    public function getZipcode()
    {
        return $this->zipcode;
    }

    /**
     * Set latitude
     *
     * @param string $latitude
     *
     * @return Company
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return string
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude
     *
     * @param string $longitude
     *
     * @return Company
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return string
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set distanceToZeroReferential
     *
     * @param string $distanceToZeroReferential
     *
     * @return Company
     */
    public function setDistanceToZeroReferential($distanceToZeroReferential)
    {
        $this->distanceToZeroReferential = $distanceToZeroReferential;

        return $this;
    }

    /**
     * Get distanceToZeroReferential
     *
     * @return string
     */
    public function getDistanceToZeroReferential()
    {
        return $this->distanceToZeroReferential;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return Company
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set cnae
     *
     * @param string $cnae
     *
     * @return Company
     */
    public function setCnae($cnae)
    {
        $this->cnae = $cnae;

        return $this;
    }

    /**
     * Get cnae
     *
     * @return string
     */
    public function getCnae()
    {
        return $this->cnae;
    }

    /**
     * Set presentation
     *
     * @param string $presentation
     *
     * @return Company
     */
    public function setPresentation($presentation)
    {
        $this->presentation = $presentation;

        return $this;
    }

    /**
     * Get presentation
     *
     * @return string
     */
    public function getPresentation()
    {
        return $this->presentation;
    }

    /**
     * Set policies
     *
     * @param string $policies
     *
     * @return Company
     */
    public function setPolicies($policies)
    {
        $this->policies = $policies;

        return $this;
    }

    /**
     * Get policies
     *
     * @return string
     */
    public function getPolicies()
    {
        return $this->policies;
    }

    /**
     * Set contactPerson
     *
     * @param string $contactPerson
     *
     * @return Company
     */
    public function setContactPerson($contactPerson)
    {
        $this->contactPerson = $contactPerson;

        return $this;
    }

    /**
     * Get contactPerson
     *
     * @return string
     */
    public function getContactPerson()
    {
        return $this->contactPerson;
    }

    /**
     * Set contactPersonTelephone
     *
     * @param string $contactPersonTelephone
     *
     * @return Company
     */
    public function setContactPersonTelephone($contactPersonTelephone)
    {
        $this->contactPersonTelephone = $contactPersonTelephone;

        return $this;
    }

    /**
     * Get contactPersonTelephone
     *
     * @return string
     */
    public function getContactPersonTelephone()
    {
        return $this->contactPersonTelephone;
    }

    /**
     * Set logo
     *
     * @param string $logo
     *
     * @return Company
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Get logo
     *
     * @return string
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Set thumbnail
     *
     * @param string $thumbnail
     *
     * @return Company
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Company
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
     * @return Company
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
     * Set cityShippingDays
     *
     * @param string $cityShippingDays
     *
     * @return Company
     */
    public function setCityShippingDays($cityShippingDays)
    {
        $this->cityShippingDays = $cityShippingDays;

        return $this;
    }

    /**
     * Get cityShippingDays
     *
     * @return string
     */
    public function getCityShippingDays()
    {
        return $this->cityShippingDays;
    }

    /**
     * Set stateShippingDays
     *
     * @param string $stateShippingDays
     *
     * @return Company
     */
    public function setStateShippingDays($stateShippingDays)
    {
        $this->stateShippingDays = $stateShippingDays;

        return $this;
    }

    /**
     * Get stateShippingDays
     *
     * @return string
     */
    public function getStateShippingDays()
    {
        return $this->stateShippingDays;
    }

    /**
     * Set countryShippingDays
     *
     * @param string $countryShippingDays
     *
     * @return Company
     */
    public function setCountryShippingDays($countryShippingDays)
    {
        $this->countryShippingDays = $countryShippingDays;

        return $this;
    }

    /**
     * Get countryShippingDays
     *
     * @return string
     */
    public function getCountryShippingDays()
    {
        return $this->countryShippingDays;
    }

    /**
     * Set useTerms
     *
     * @param string $useTerms
     *
     * @return Company
     */
    public function setUseTerms($useTerms)
    {
        $this->useTerms = $useTerms;

        return $this;
    }

    /**
     * Get useTerms
     *
     * @return string
     */
    public function getUseTerms()
    {
        return $this->useTerms;
    }

    /**
     * Set bank
     *
     * @param string $bank
     *
     * @return Company
     */
    public function setBank($bank)
    {
        $this->bank = $bank;

        return $this;
    }

    /**
     * Get bank
     *
     * @return string
     */
    public function getBank()
    {
        return $this->bank;
    }

    /**
     * Set bankCode
     *
     * @param string $bankCode
     *
     * @return Company
     */
    public function setBankCode($bankCode)
    {
        $this->bankCode = $bankCode;

        return $this;
    }

    /**
     * Get bankCode
     *
     * @return string
     */
    public function getBankCode()
    {
        return $this->bankCode;
    }

    /**
     * Set agency
     *
     * @param string $agency
     *
     * @return Company
     */
    public function setAgency($agency)
    {
        $this->agency = $agency;

        return $this;
    }

    /**
     * Get agency
     *
     * @return string
     */
    public function getAgency()
    {
        return $this->agency;
    }

    /**
     * Set agencyVd
     *
     * @param string $agencyVd
     *
     * @return Company
     */
    public function setAgencyVd($agencyVd)
    {
        $this->agencyVd = $agencyVd;

        return $this;
    }

    /**
     * Get agencyVd
     *
     * @return string
     */
    public function getAgencyVd()
    {
        return $this->agencyVd;
    }

    /**
     * Set account
     *
     * @param string $account
     *
     * @return Company
     */
    public function setAccount($account)
    {
        $this->account = $account;

        return $this;
    }

    /**
     * Get account
     *
     * @return string
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * Set accountVd
     *
     * @param string $accountVd
     *
     * @return Company
     */
    public function setAccountVd($accountVd)
    {
        $this->accountVd = $accountVd;

        return $this;
    }

    /**
     * Get accountVd
     *
     * @return string
     */
    public function getAccountVd()
    {
        return $this->accountVd;
    }

    /**
     * Set accountType
     *
     * @param string $accountType
     *
     * @return Company
     */
    public function setAccountType($accountType)
    {
        $this->accountType = $accountType;

        return $this;
    }

    /**
     * Get accountType
     *
     * @return string
     */
    public function getAccountType()
    {
        return $this->accountType;
    }

    /**
     * Set documentNumber
     *
     * @param string $documentNumber
     *
     * @return Company
     */
    public function setDocumentNumber($documentNumber)
    {
        $this->documentNumber = $documentNumber;

        return $this;
    }

    /**
     * Get documentNumber
     *
     * @return string
     */
    public function getDocumentNumber()
    {
        return $this->documentNumber;
    }

    /**
     * Set legalName
     *
     * @param string $legalName
     *
     * @return Company
     */
    public function setLegalName($legalName)
    {
        $this->legalName = $legalName;

        return $this;
    }

    /**
     * Get legalName
     *
     * @return string
     */
    public function getLegalName()
    {
        return $this->legalName;
    }

    /**
     * Set splitPercentage
     *
     * @param string $splitPercentage
     *
     * @return Company
     */
    public function setSplitPercentage($splitPercentage)
    {
        $this->splitPercentage = $splitPercentage;

        return $this;
    }

    /**
     * Get splitPercentage
     *
     * @return string
     */
    public function getSplitPercentage()
    {
        return $this->splitPercentage;
    }

    /**
     * Set transferInterval
     *
     * @param string $transferInterval
     *
     * @return Company
     */
    public function setTransferInterval($transferInterval)
    {
        $this->transferInterval = $transferInterval;

        return $this;
    }

    /**
     * Get transferInterval
     *
     * @return string
     */
    public function getTransferInterval()
    {
        return $this->transferInterval;
    }

    /**
     * Set transferDay
     *
     * @param string $transferDay
     *
     * @return Company
     */
    public function setTransferDay($transferDay)
    {
        $this->transferDay = $transferDay;

        return $this;
    }

    /**
     * Get transferDay
     *
     * @return string
     */
    public function getTransferDay()
    {
        return $this->transferDay;
    }

    /**
     * Set ambientePagarme
     *
     * @param string $ambientePagarme
     *
     * @return Company
     */
    public function setAmbientePagarme($ambientePagarme)
    {
        $this->ambientePagarme = $ambientePagarme;

        return $this;
    }

    /**
     * Get ambientePagarme
     *
     * @return string
     */
    public function getAmbientePagarme()
    {
        return $this->ambientePagarme;
    }

    /**
     * Set homologacaoRecipientId
     *
     * @param string $homologacaoRecipientId
     *
     * @return Company
     */
    public function setHomologacaoRecipientId($homologacaoRecipientId)
    {
        $this->homologacaoRecipientId = $homologacaoRecipientId;

        return $this;
    }

    /**
     * Get homologacaoRecipientId
     *
     * @return string
     */
    public function getHomologacaoRecipientId()
    {
        return $this->homologacaoRecipientId;
    }

    /**
     * Set producaoRecipientId
     *
     * @param string $producaoRecipientId
     *
     * @return Company
     */
    public function setProducaoRecipientId($producaoRecipientId)
    {
        $this->producaoRecipientId = $producaoRecipientId;

        return $this;
    }

    /**
     * Get producaoRecipientId
     *
     * @return string
     */
    public function getProducaoRecipientId()
    {
        return $this->producaoRecipientId;
    }

    /**
     * Set uuid
     *
     * @param string $uuid
     *
     * @return Company
     */
    public function setUuid($uuid)
    {
        $this->uuid = $uuid;

        return $this;
    }

    /**
     * Get uuid
     *
     * @return string
     */
    public function getUuid()
    {
        return $this->uuid;
    }

    /**
     * Set slugName
     *
     * @param string $slugName
     *
     * @return Company
     */
    public function setSlugName($slugName)
    {
        $this->slugName = $slugName;

        return $this;
    }

    /**
     * Get slugName
     *
     * @return string
     */
    public function getSlugName()
    {
        return $this->slugName;
    }

    /**
     * Set plan
     *
     * @param \Domain\Entities\Plan $plan
     *
     * @return Company
     */
    public function setPlan(\Domain\Entities\Plan $plan = null)
    {
        $this->plan = $plan;

        return $this;
    }

    /**
     * Get plan
     *
     * @return \Domain\Entities\Plan
     */
    public function getPlan()
    {
        return $this->plan;
    }

    /**
     * Set country
     *
     * @param \Domain\Entities\Country $country
     *
     * @return Company
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

    /**
     * Set state
     *
     * @param \Domain\Entities\State $state
     *
     * @return Company
     */
    public function setState(\Domain\Entities\State $state = null)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return \Domain\Entities\State
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set city
     *
     * @param \Domain\Entities\City $city
     *
     * @return Company
     */
    public function setCity(\Domain\Entities\City $city = null)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return \Domain\Entities\City
     */
    public function getCity()
    {
        return $this->city;
    }
}

