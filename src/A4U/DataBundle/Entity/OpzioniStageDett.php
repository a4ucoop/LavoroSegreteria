<?php

namespace A4U\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OpzioniStageDett
 * @ORM\Table()
 * @ORM\Entity
 */
class OpzioniStageDett
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
     * @ORM\Column(name="idOpzione", type="integer")
     */
    private $idOpzione;

    /**
     * @var string
     * @ORM\Column(name="codStage", type="string", length=10)
     */
    private $codStage;

    /**
     * @var string
     * @ORM\Column(name="descStage", type="string", length=250)
     */
    private $descStage;

    /**
     * @var integer
     * @ORM\Column(name="attivo", type="integer")
     */
    private $attivo;

    /**
     * @var integer
     * @ORM\Column(name="idperiodoBloccato", type="integer")
     */
    private $idperiodoBloccato;

    /**
     * @var string
     * @ORM\Column(name="descOpzioneBloccata", type="string", length=50)
     */
    private $descOpzioneBloccata;


    /**
     * Set idRecord
     *
     * @param integer $idRecord
     * @return OpzioniStageDett
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
     * @return OpzioniStageDett
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
     * @return OpzioniStageDett
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
     * @return OpzioniStageDett
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
     * @return OpzioniStageDett
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
     * @return OpzioniStageDett
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
     * @return OpzioniStageDett
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



//-------------------------METODI MICHELANGELO----------------------------
    

    /**
     * Get AvailableChoices
     *
     * @return array 
     */

    public function getAvailableChoices($studyField)
    {
        return array(0, 1, 2);
    }


}
