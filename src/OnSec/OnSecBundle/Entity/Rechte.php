<?php

namespace OnSec\OnSecBundle\Entity;

/**
 * Rechte
 */
class Rechte
{
    /**
     * @var integer
     */
    private $rechteId;

    /**
     * @var string
     */
    private $bezeichnung;


    /**
     * Get rechteId
     *
     * @return integer
     */
    public function getRechteId()
    {
        return $this->rechteId;
    }

    /**
     * Set bezeichnung
     *
     * @param string $bezeichnung
     *
     * @return Rechte
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

