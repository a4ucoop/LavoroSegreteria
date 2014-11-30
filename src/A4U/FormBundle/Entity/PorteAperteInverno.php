<?php

namespace A4U\FormBundle\Entity;

use Gedmo\Timestampable;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * PorteAperteInverno
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class PorteAperteInverno
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=128)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="surname", type="string", length=128)
     */
    private $surname;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="cap", type="string", length=32)
     */
    private $cap;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=128)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=128)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=128)
     */
    private $phone;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthdate", type="datetimetz")
     */
    private $birthDate;

    /**
     * @var string
     *
     * @ORM\Column(name="birthplace", type="string", length=128)
     */
    private $birthPlace;

    /**
     * @var string
     *
     * @ORM\Column(name="attendedSchool", type="string", length=128)
     */
    private $attendedSchool;

    /**
     * @var string
     *
     * @ORM\Column(name="attendedSchoolCity", type="string", length=128)
     */
    private $attendedSchoolCity;

    /**
     * @var boolean
     *
     * @ORM\Column(name="hasAttendedToOtherActivities", type="boolean")
     */
    private $hasAttendedToOtherActivities;

    /**
     * @var string
     *
     * @ORM\Column(name="activity", type="string", length=128, nullable=true)
     */
    private $activity;

    /**
     * @var string
     *
     * @ORM\Column(name="otherActivity", type="string", length=128, nullable=true)
     */
    private $otherActivity;

    /**
     * @var string
     *
     * @ORM\Column(name="reference", type="string", length=128, nullable=true)
     */
    private $reference;

    /**
     * @var string
     *
     * @ORM\Column(name="otherReference", type="string", length=128, nullable=true)
     */
    private $otherReference;

    /**
     * @var string
     *
     * @ORM\Column(name="unicamCourse", type="string", length=128)
     */
    private $unicamCourse;

    /**
     * @var string
     *
     * @ORM\Column(name="fiscalcode", type="string", length=128)
     */
    private $fiscalcode;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="submissiondate", type="datetimetz")
     * @Gedmo\Timestampable(on="create")
     */
    private $submissionDate;


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
     * @return PorteAperteInverno
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
     * @return PorteAperteInverno
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
     * Set address
     *
     * @param string $address
     * @return PorteAperteInverno
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
     * @return PorteAperteInverno
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
     * @return PorteAperteInverno
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
     * Set email
     *
     * @param string $email
     * @return PorteAperteInverno
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
     * @return PorteAperteInverno
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
     * Set birthDate
     *
     * @param \DateTime $birthDate
     * @return PorteAperteInverno
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
     * Set birthPlace
     *
     * @param string $birthPlace
     * @return PorteAperteInverno
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
     * Set attendedSchool
     *
     * @param string $attendedSchool
     * @return PorteAperteInverno
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
     * Set attendedSchoolCity
     *
     * @param string $attendedSchoolCity
     * @return PorteAperteInverno
     */
    public function setAttendedSchoolCity($attendedSchoolCity)
    {
        $this->attendedSchoolCity = $attendedSchoolCity;

        return $this;
    }

    /**
     * Get attendedSchoolCity
     *
     * @return string 
     */
    public function getAttendedSchoolCity()
    {
        return $this->attendedSchoolCity;
    }

    /**
     * Set hasAttendedToOtherActivities
     *
     * @param boolean $hasAttendedToOtherActivities
     * @return PorteAperteInverno
     */
    public function setHasAttendedToOtherActivities($hasAttendedToOtherActivities)
    {
        $this->hasAttendedToOtherActivities = $hasAttendedToOtherActivities;

        return $this;
    }

    /**
     * Get hasAttendedToOtherActivities
     *
     * @return boolean 
     */
    public function getHasAttendedToOtherActivities()
    {
        return $this->hasAttendedToOtherActivities;
    }

    /**
     * Set activity
     *
     * @param \stdClass $activity
     * @return PorteAperteInverno
     */
    public function setActivity($activity)
    {
        $this->activity = $activity;

        return $this;
    }

    /**
     * Get activity
     *
     * @return \stdClass 
     */
    public function getActivity()
    {
        return $this->activity;
    }

    /**
     * Set otherActivity
     *
     * @param string $otherActivity
     * @return PorteAperteInverno
     */
    public function setOtherActivity($otherActivity)
    {
        $this->otherActivity = $otherActivity;

        return $this;
    }

    /**
     * Get otherActivity
     *
     * @return string 
     */
    public function getOtherActivity()
    {
        return $this->otherActivity;
    }

    /**
     * Set reference
     *
     * @param \stdClass $reference
     * @return PorteAperteInverno
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get reference
     *
     * @return \stdClass 
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set otherReference
     *
     * @param string $otherReference
     * @return PorteAperteInverno
     */
    public function setOtherReference($otherReference)
    {
        $this->otherReference = $otherReference;

        return $this;
    }

    /**
     * Get otherReference
     *
     * @return string 
     */
    public function getOtherReference()
    {
        return $this->otherReference;
    }

    /**
     * Set unicamCourse
     *
     * @param \stdClass $unicamCourse
     * @return PorteAperteInverno
     */
    public function setUnicamCourse($unicamCourse)
    {
        $this->unicamCourse = $unicamCourse;

        return $this;
    }

    /**
     * Get unicamCourse
     *
     * @return \stdClass 
     */
    public function getUnicamCourse()
    {
        return $this->unicamCourse;
    }

    /**
     * Set fiscalcode
     *
     * @param string $fiscalcode
     * @return Generico
     */
    public function setFiscalcode($fiscalcode)
    {
        $this->fiscalcode = $fiscalcode;
    
        return $this;
    }

    /**
     * Get fiscalcode
     *
     * @return string 
     */
    public function getFiscalcode()
    {
        return $this->fiscalcode;
    }

    /**
     * Set submissionDate
     *
     * @param \DateTime $submissionDate
     * @return PorteAperteInverno
     */
    public function setSubmissionDate($submissionDate)
    {
        $this->submissionDate = $submissionDate;

        return $this;
    }

    /**
     * Get submissionDate
     *
     * @return \DateTime 
     */
    public function getSubmissionDate()
    {
        return $this->submissionDate;
    }
}
