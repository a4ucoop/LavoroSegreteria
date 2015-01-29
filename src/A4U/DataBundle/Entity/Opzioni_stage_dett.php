<?php

namespace A4U\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Opzioni_stage_dett
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Opzioni_stage_dett
{

    /**
     * @var integer
     *
     * @ORM\Column(name="idRecord", type="integer")
     * @ORM\Id
     */
    private $idRecord;

    /**
     * @var integer
     *
     * @ORM\Column(name="IdOpzione", type="integer")
     */
    private $idOpzione;

    /**
     * @var string
     *
     * @ORM\Column(name="Cod_stage", type="string", length=10)
     */
    private $codStage;

    /**
     * @var string
     *
     * @ORM\Column(name="Desc_stage", type="string", length=250)
     */
    private $descStage;

    /**
     * @var integer
     *
     * @ORM\Column(name="Attivo", type="integer")
     */
    private $attivo;

    /**
     * @var integer
     *
     * @ORM\Column(name="idperiodo_bloccato", type="integer")
     */
    private $idperiodoBloccato;

    /**
     * @var string
     *
     * @ORM\Column(name="desc_opzione_bloccata", type="string", length=50)
     */
    private $descOpzioneBloccata;


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
     * Set idRecord
     *
     * @param integer $idRecord
     * @return Opzioni_stage_dett
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
     * Set idOpzione
     *
     * @param integer $idOpzione
     * @return Opzioni_stage_dett
     */
    public function setIdOpzione($idOpzione)
    {
        $this->idOpzione = $idOpzione;

        return $this;
    }

    /**
     * Get idOpzione
     *
     * @return integer 
     */
    public function getIdOpzione()
    {
        return $this->idOpzione;
    }

    /**
     * Set codStage
     *
     * @param string $codStage
     * @return Opzioni_stage_dett
     */
    public function setCodStage($codStage)
    {
        $this->codStage = $codStage;

        return $this;
    }

    /**
     * Get codStage
     *
     * @return string 
     */
    public function getCodStage()
    {
        return $this->codStage;
    }

    /**
     * Set descStage
     *
     * @param string $descStage
     * @return Opzioni_stage_dett
     */
    public function setDescStage($descStage)
    {
        $this->descStage = $descStage;

        return $this;
    }

    /**
     * Get descStage
     *
     * @return string 
     */
    public function getDescStage()
    {
        return $this->descStage;
    }

    /**
     * Set attivo
     *
     * @param integer $attivo
     * @return Opzioni_stage_dett
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
     * Set idperiodoBloccato
     *
     * @param integer $idperiodoBloccato
     * @return Opzioni_stage_dett
     */
    public function setIdperiodoBloccato($idperiodoBloccato)
    {
        $this->idperiodoBloccato = $idperiodoBloccato;

        return $this;
    }

    /**
     * Get idperiodoBloccato
     *
     * @return integer 
     */
    public function getIdperiodoBloccato()
    {
        return $this->idperiodoBloccato;
    }

    /**
     * Set descOpzioneBloccata
     *
     * @param string $descOpzioneBloccata
     * @return Opzioni_stage_dett
     */
    public function setDescOpzioneBloccata($descOpzioneBloccata)
    {
        $this->descOpzioneBloccata = $descOpzioneBloccata;

        return $this;
    }

    /**
     * Get descOpzioneBloccata
     *
     * @return string 
     */
    public function getDescOpzioneBloccata()
    {
        return $this->descOpzioneBloccata;
    }
}
