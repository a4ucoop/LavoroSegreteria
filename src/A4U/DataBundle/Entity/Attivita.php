<?php

namespace A4U\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Attivita
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Attivita
{

    /**
     * @var integer
     *
     * @ORM\Column(name="IDRecord", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $iDRecord;

    /**
     * @var string
     *
     * @ORM\Column(name="Descrizione", type="string", length=50)
     */
    private $descrizione;

    /**
     * @var string
     *
     * @ORM\Column(name="Anno", type="string", length=10)
     */
    private $anno;

    /**
     * @var string
     *
     * @ORM\Column(name="Attivo", type="string", length=1, nullable=true)
     */
    private $attivo;



    /**
     * Get IDRecord
     *
     * @return integer 
     */
    public function getIDRecord()
    {
        return $this->IDRecord;
    }

    /**
     * Set descrizione
     *
     * @param string $descrizione
     * @return Attivita
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
     * Set anno
     *
     * @param string $anno
     * @return Attivita
     */
    public function setAnno($anno)
    {
        $this->anno = $anno;

        return $this;
    }

    /**
     * Get anno
     *
     * @return string 
     */
    public function getAnno()
    {
        return $this->anno;
    }

    /**
     * Set attivo
     *
     * @param string $attivo
     * @return Attivita
     */
    public function setAttivo($attivo)
    {
        $this->attivo = $attivo;

        return $this;
    }

    /**
     * Get attivo
     *
     * @return string 
     */
    public function getAttivo()
    {
        return $this->attivo;
    }
}
