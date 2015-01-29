<?php

namespace A4U\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Opzioni_stage
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Opzioni_stage
{

    /**
     * @var integer
     *
     * @ORM\Column(name="idrecord", type="integer")
     * @ORM\Id
     */
    private $idrecord;

    /**
     * @var string
     *
     * @ORM\Column(name="Descrizione", type="string", length=250)
     */
    private $descrizione;

    /**
     * @var integer
     *
     * @ORM\Column(name="ordinevis", type="integer")
     */
    private $ordinevis;

    /**
     * @var integer
     *
     * @ORM\Column(name="Anno", type="integer")
     */
    private $anno;

    /**
     * @var integer
     *
     * @ORM\Column(name="Attivo", type="integer")
     */
    private $attivo;


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
     * Set idrecord
     *
     * @param integer $idrecord
     * @return Opzioni_stage
     */
    public function setIdrecord($idrecord)
    {
        $this->idrecord = $idrecord;

        return $this;
    }

    /**
     * Get idrecord
     *
     * @return integer 
     */
    public function getIdrecord()
    {
        return $this->idrecord;
    }

    /**
     * Set descrizione
     *
     * @param string $descrizione
     * @return Opzioni_stage
     */
    public function setDescrizione($descrizione)
    {
        $this->descrizione = $descrizione;

        return $this;
    }

    /**
     * Get descrizione
     *
     * @return string 
     */
    public function getDescrizione()
    {
        return $this->descrizione;
    }

    /**
     * Set ordinevis
     *
     * @param integer $ordinevis
     * @return Opzioni_stage
     */
    public function setOrdinevis($ordinevis)
    {
        $this->ordinevis = $ordinevis;

        return $this;
    }

    /**
     * Get ordinevis
     *
     * @return integer 
     */
    public function getOrdinevis()
    {
        return $this->ordinevis;
    }

    /**
     * Set anno
     *
     * @param integer $anno
     * @return Opzioni_stage
     */
    public function setAnno($anno)
    {
        $this->anno = $anno;

        return $this;
    }

    /**
     * Get anno
     *
     * @return integer 
     */
    public function getAnno()
    {
        return $this->anno;
    }

    /**
     * Set attivo
     *
     * @param integer $attivo
     * @return Opzioni_stage
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
}
