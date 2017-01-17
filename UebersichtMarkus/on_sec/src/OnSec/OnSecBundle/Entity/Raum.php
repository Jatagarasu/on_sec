<?php

namespace OnSec\OnSecBundle\Entity;

/**
 * Raum
 */
class Raum
{
    /**
     * @var string
     */
    private $raumNr;

    /**
     * @var string
     */
    private $bezeichnung;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $keyword;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->keyword = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get raumNr
     *
     * @return string
     */
    public function getRaumNr()
    {
        return $this->raumNr;
    }

    /**
     * Set bezeichnung
     *
     * @param string $bezeichnung
     *
     * @return Raum
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
     * Add keyword
     *
     * @param \OnSec\OnSecBundle\Entity\Keywords $keyword
     *
     * @return Raum
     */
    public function addKeyword(\OnSec\OnSecBundle\Entity\Keywords $keyword)
    {
        $this->keyword[] = $keyword;

        return $this;
    }

    /**
     * Remove keyword
     *
     * @param \OnSec\OnSecBundle\Entity\Keywords $keyword
     */
    public function removeKeyword(\OnSec\OnSecBundle\Entity\Keywords $keyword)
    {
        $this->keyword->removeElement($keyword);
    }

    /**
     * Get keyword
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getKeyword()
    {
        return $this->keyword;
    }
}

