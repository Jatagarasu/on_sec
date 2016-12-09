<?php

namespace OnSec\OnSecBundle\Entity;

/**
 * Keywords
 */
class Keywords
{
    /**
     * @var integer
     */
    private $keyId;

    /**
     * @var string
     */
    private $bezeichnung;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $kurs;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $raum;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $unterweisung;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->kurs = new \Doctrine\Common\Collections\ArrayCollection();
        $this->raum = new \Doctrine\Common\Collections\ArrayCollection();
        $this->unterweisung = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get keyId
     *
     * @return integer
     */
    public function getKeyId()
    {
        return $this->keyId;
    }

    /**
     * Set bezeichnung
     *
     * @param string $bezeichnung
     *
     * @return Keywords
     */
    public function setBezeichnung($bezeichnung)
    {
        $this->bezeichnung = $bezeichnung;

        return $this;
    }

    /**
     * Get bezeichnung
     *
     * @return string
     */
    public function getBezeichnung()
    {
        return $this->bezeichnung;
    }

    /**
     * Add kur
     *
     * @param \OnSec\OnSecBundle\Entity\Kurs $kur
     *
     * @return Keywords
     */
    public function addKur(\OnSec\OnSecBundle\Entity\Kurs $kur)
    {
        $this->kurs[] = $kur;

        return $this;
    }

    /**
     * Remove kur
     *
     * @param \OnSec\OnSecBundle\Entity\Kurs $kur
     */
    public function removeKur(\OnSec\OnSecBundle\Entity\Kurs $kur)
    {
        $this->kurs->removeElement($kur);
    }

    /**
     * Get kurs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getKurs()
    {
        return $this->kurs;
    }

    /**
     * Add raum
     *
     * @param \OnSec\OnSecBundle\Entity\Raum $raum
     *
     * @return Keywords
     */
    public function addRaum(\OnSec\OnSecBundle\Entity\Raum $raum)
    {
        $this->raum[] = $raum;

        return $this;
    }

    /**
     * Remove raum
     *
     * @param \OnSec\OnSecBundle\Entity\Raum $raum
     */
    public function removeRaum(\OnSec\OnSecBundle\Entity\Raum $raum)
    {
        $this->raum->removeElement($raum);
    }

    /**
     * Get raum
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRaum()
    {
        return $this->raum;
    }

    /**
     * Add unterweisung
     *
     * @param \OnSec\OnSecBundle\Entity\Unterweisung $unterweisung
     *
     * @return Keywords
     */
    public function addUnterweisung(\OnSec\OnSecBundle\Entity\Unterweisung $unterweisung)
    {
        $this->unterweisung[] = $unterweisung;

        return $this;
    }

    /**
     * Remove unterweisung
     *
     * @param \OnSec\OnSecBundle\Entity\Unterweisung $unterweisung
     */
    public function removeUnterweisung(\OnSec\OnSecBundle\Entity\Unterweisung $unterweisung)
    {
        $this->unterweisung->removeElement($unterweisung);
    }

    /**
     * Get unterweisung
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUnterweisung()
    {
        return $this->unterweisung;
    }
}

