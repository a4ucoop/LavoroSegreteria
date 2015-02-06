<?php

namespace A4U\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AttivitaDate
 * @ORM\Table()
 * @ORM\Entity
 */
class AttivitaDate
{
    /**
     * @var integer
     * @ORM\Column(name="idRecord", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idRecord;

    /**
     * @var integer
     * @ORM\Column(name="idAttivita", type="integer")
     */
    private $idAttivita;

    /**
     * @var \DateTime
     * @ORM\Column(name="dataIni", type="datetime")
     */
    private $dataIni;

    /**
     * @var \DateTime
     * @ORM\Column(name="dataFine", type="datetime")
     */
    private $dataFine;

    /**
     * @var integer
     * @ORM\Column(name="periodo", type="integer")
     */
    private $periodo;

    /**
     * @var string
     * @ORM\Column(name="periodoDesc", type="string", length=150)
     */
    private $periodoDesc;

    /**
     * @var string
     * @ORM\Column(name="periodoDescSupp", type="string", length=255)
     */
    private $periodoDescSupp;

    /**
     * @var string
     * @ORM\Column(name="SEDE", type="string", length=50)
     */
    private $SEDE;

    /**
     * @var integer
     * @ORM\Column(name="attivo", type="integer")
     */
    private $attivo;

    /**
     * @var string
     * @ORM\Column(name="periodoNote", type="string", length=150)
     */
    private $periodoNote;


    /**
     * Set idRecord
     *
     * @param integer $idRecord
     * @return AttivitaDate
     */
    public function setIdRecord($idRecord)
    {
        $this->idRecord = $idRecord;

        return $this;
    }

    /**
     * Get idRecord
     *
     * @return integer 
     */
    public function getIdRecord()
    {
        return $this->idRecord;
    }

    /**
     * Set idAttivita
     *
     * @param integer $idAttivita
     * @return AttivitaDate
     */
    public function setIdAttivita($idAttivita)
    {
        $this->idAttivita = $idAttivita;

        return $this;
    }

    /**
     * Get idAttivita
     *
     * @return integer 
     */
    public function getIdAttivita()
    {
        return $this->idAttivita;
    }

    /**
     * Set dataIni
     *
     * @param \DateTime $dataIni
     * @return AttivitaDate
     */
    public function setDataIni($dataIni)
    {
        $this->dataIni = $dataIni;

        return $this;
    }

    /**
     * Get dataIni
     *
     * @return \DateTime 
     */
    public function getDataIni()
    {
        return $this->dataIni;
    }

    /**
     * Set dataFine
     *
     * @param \DateTime $dataFine
     * @return AttivitaDate
     */
    public function setDataFine($dataFine)
    {
        $this->dataFine = $dataFine;

        return $this;
    }

    /**
     * Get dataFine
     *
     * @return \DateTime 
     */
    public function getDataFine()
    {
        return $this->dataFine;
    }

    /**
     * Set periodo
     *
     * @param integer $periodo
     * @return AttivitaDate
     */
    public function setPeriodo($periodo)
    {
        $this->periodo = $periodo;

        return $this;
    }

    /**
     * Get periodo
     *
     * @return integer 
     */
    public function getPeriodo()
    {
        return $this->periodo;
    }

    /**
     * Set periodoDesc
     *
     * @param string $periodoDesc
     * @return AttivitaDate
     */
    public function setPeriodoDesc($periodoDesc)
    {
        $this->periodoDesc = $periodoDesc;

        return $this;
    }

    /**
     * Get periodoDesc
     *
     * @return string 
     */
    public function getPeriodoDesc()
    {
        return $this->periodoDesc;
    }

    /**
     * Set periodoDescSupp
     *
     * @param string $periodoDescSupp
     * @return AttivitaDate
     */
    public function setPeriodoDescSupp($periodoDescSupp)
    {
        $this->periodoDescSupp = $periodoDescSupp;

        return $this;
    }

    /**
     * Get periodoDescSupp
     *
     * @return string 
     */
    public function getPeriodoDescSupp()
    {
        return $this->periodoDescSupp;
    }

    /**
     * Set SEDE
     *
     * @param string $SEDE
     * @return AttivitaDate
     */
    public function setSEDE($SEDE)
    {
        $this->SEDE = $SEDE;

        return $this;
    }

    /**
     * Get SEDE
     *
     * @return string 
     */
    public function getSEDE()
    {
        return $this->SEDE;
    }

    /**
     * Set attivo
     *
     * @param integer $attivo
     * @return AttivitaDate
     */
    public function setAttivo($attivo)
    {
        $this->attivo = $attivo;

        return $this;
    }

    /**
     * Get attivo
     *
     * @return integer 
     */
    public function getAttivo()
    {
        return $this->attivo;
    }

    /**
     * Set periodoNote
     *
     * @param string $periodoNote
     * @return AttivitaDate
     */
    public function setPeriodoNote($periodoNote)
    {
        $this->periodoNote = $periodoNote;

        return $this;
    }

    /**
     * Get periodoNote
     *
     * @return string 
     */
    public function getPeriodoNote()
    {
        return $this->periodoNote;
    }

    public function __toString()
    {
        return $this->periodoDesc;
    }
}
