<?php

namespace A4U\FormBundle\Entity;

use Gedmo\Timestampable;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * Stage
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Stage
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
     * @ORM\Column(name="address", type="string", length=128)
     */
    private $address;
 
 
    /**
     * @var string
     *
     * @ORM\Column(name="cap", type="string", length=128)
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
     * @ORM\Column(name="birthDate", type="datetimetz")
     */
    private $birthDate;

    /**
     * @var string
     *
     * @ORM\Column(name="birthPlace", type="string", length=128)
     */
    private $birthPlace;

    /**
     * @ORM\ManyToOne(targetEntity="A4U\DataBundle\Entity\StuAnagScuole", inversedBy="stages")
     * @ORM\JoinColumn(name="attendedSchool_id", referencedColumnName="idRecord")
     */
    protected $attendedSchool;

    /**
     * @var string
     *
     * @ORM\Column(name="fiscalcode", type="string", length=128)
     */
    private $fiscalcode;

    /**
     * @var integer
     *
     * @ORM\Column(name="schoolYear", type="integer")
     */
    private $schoolYear;

    /**
     * @var string
     *
     * @ORM\Column(name="facebookContact", type="string", length=128)
     */
    private $facebookContact;

    /**
     * @var string
     *
     * @ORM\Column(name="stagePeriod", type="string", length=128)
     */
    private $stagePeriod;

    /**
     * @var string
     *
     * @ORM\Column(name="firstStudyField", type="string", length=128)
     */
    private $firstStudyField;

    /**
     * @var string
     *
     * @ORM\Column(name="secondStudyField", type="string", length=128)
     */
    private $secondStudyField;

    /**
     * @var string
     *
     * @ORM\Column(name="firstChoice", type="string", length=10)
     */
    private $firstChoice;
    
    /**
     * @var string
     *
     * @ORM\Column(name="secondChoice", type="string", length=10)
     */
    private $secondChoice;

    /**
     * @var string
     *
     * @ORM\Column(name="moneyPayed", type="string", length=128)
     */
    private $moneyPayed;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="submissiondate", type="datetimetz")
     * @Gedmo\Timestampable(on="create")
     */
    private $submissiondate;



    
}
