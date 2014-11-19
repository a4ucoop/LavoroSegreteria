<?php

namespace A4U\FormBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Stage
 */
class Stage
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
    private $surname;

    /**
     * @var string
     */
    private $birthPlace;

    /**
     * @var \DateTime
     */
    private $birthDate;

    /**
     * @var string
     */
    private $address;

    /**
     * @var string
     */
    private $cap;

    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $fiscalCode;

    /**
     * @var string
     */
    private $attendedSchool;

    /**
     * @var integer
     */
    private $schoolYear;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $phone;

    /**
     * @var string
     */
    private $facebookContact;

    /**
     * @var string
     */
    private $stagePeriod;

    /**
     * @var string
     */
    private $studyField;

    /**
     * @var string
     */
    private $moneyPayed;


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
     * @return Stage
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
     * Set surname
     *
     * @param string $surname
     * @return Stage
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
    
        return $this;
    }

    /**
     * Get surname
     *
     * @return string 
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set birthPlace
     *
     * @param string $birthPlace
     * @return Stage
     */
    public function setBirthPlace($birthPlace)
    {
        $this->birthPlace = $birthPlace;
    
        return $this;
    }

    /**
     * Get birthPlace
     *
     * @return string 
     */
    public function getBirthPlace()
    {
        return $this->birthPlace;
    }

    /**
     * Set birthDate
     *
     * @param \DateTime $birthDate
     * @return Stage
     */
    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;
    
        return $this;
    }

    /**
     * Get birthDate
     *
     * @return \DateTime 
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return Stage
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
     * Set cap
     *
     * @param string $cap
     * @return Stage
     */
    public function setCap($cap)
    {
        $this->cap = $cap;
    
        return $this;
    }

    /**
     * Get cap
     *
     * @return string 
     */
    public function getCap()
    {
        return $this->cap;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Stage
     */
    public function setCity($city)
    {
        $this->city = $city;
    
        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set fiscalCode
     *
     * @param string $fiscalCode
     * @return Stage
     */
    public function setFiscalCode($fiscalCode)
    {
        $this->fiscalCode = $fiscalCode;
    
        return $this;
    }

    /**
     * Get fiscalCode
     *
     * @return string 
     */
    public function getFiscalCode()
    {
        return $this->fiscalCode;
    }

    /**
     * Set attendedSchool
     *
     * @param string $attendedSchool
     * @return Stage
     */
    public function setAttendedSchool($attendedSchool)
    {
        $this->attendedSchool = $attendedSchool;
    
        return $this;
    }

    /**
     * Get attendedSchool
     *
     * @return string 
     */
    public function getAttendedSchool()
    {
        return $this->attendedSchool;
    }

    /**
     * Set schoolYear
     *
     * @param integer $schoolYear
     * @return Stage
     */
    public function setSchoolYear($schoolYear)
    {
        $this->schoolYear = $schoolYear;
    
        return $this;
    }

    /**
     * Get schoolYear
     *
     * @return integer 
     */
    public function getSchoolYear()
    {
        return $this->schoolYear;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Stage
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
     * Set phone
     *
     * @param string $phone
     * @return Stage
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    
        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set facebookContact
     *
     * @param string $facebookContact
     * @return Stage
     */
    public function setFacebookContact($facebookContact)
    {
        $this->facebookContact = $facebookContact;
    
        return $this;
    }

    /**
     * Get facebookContact
     *
     * @return string 
     */
    public function getFacebookContact()
    {
        return $this->facebookContact;
    }

    /**
     * Set stagePeriod
     *
     * @param string $stagePeriod
     * @return Stage
     */
    public function setStagePeriod($stagePeriod)
    {
        $this->stagePeriod = $stagePeriod;
    
        return $this;
    }

    /**
     * Get stagePeriod
     *
     * @return string 
     */
    public function getStagePeriod()
    {
        return $this->stagePeriod;
    }

    /**
     * Set studyField
     *
     * @param string $studyField
     * @return Stage
     */
    public function setStudyField($studyField)
    {
        $this->studyField = $studyField;
    
        return $this;
    }

    /**
     * Get studyField
     *
     * @return string 
     */
    public function getStudyField()
    {
        return $this->studyField;
    }

    /**
     * Set moneyPayed
     *
     * @param string $moneyPayed
     * @return Stage
     */
    public function setMoneyPayed($moneyPayed)
    {
        $this->moneyPayed = $moneyPayed;
    
        return $this;
    }

    /**
     * Get moneyPayed
     *
     * @return string 
     */
    public function getMoneyPayed()
    {
        return $this->moneyPayed;
    }
}
