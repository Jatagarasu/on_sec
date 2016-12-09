<?php

namespace OnSec\OnSecBundle\Entity;

/**
 * Rolle
 */
class Rolle
{
    /**
     * @var integer
     */
    private $rolleId;

    /**
     * @var string
     */
    private $bezeichnung;


    /**
     * Get rolleId
     *
     * @return integer
     */
    public function getRolleId()
    {
        return $this->rolleId;
    }

    /**
     * Set bezeichnung
     *
     * @param string $bezeichnung
     *
     * @return Rolle
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
}

