<?php

namespace OnSec\OnSecBundle\Entity;

/**
 * UserRechteUnterweisung
 */
class UserRechteUnterweisung
{
    /**
     * @var \OnSec\OnSecBundle\Entity\Rechte
     */
    private $rechte;

    /**
     * @var \OnSec\OnSecBundle\Entity\Unterweisung
     */
    private $unterweisung;

    /**
     * @var \OnSec\OnSecBundle\Entity\User
     */
    private $user;


    /**
     * Set rechte
     *
     * @param \OnSec\OnSecBundle\Entity\Rechte $rechte
     *
     * @return UserRechteUnterweisung
     */
    public function setRechte(\OnSec\OnSecBundle\Entity\Rechte $rechte = null)
    {
        $this->rechte = $rechte;

        return $this;
    }

    /**
     * Get rechte
     *
     * @return \OnSec\OnSecBundle\Entity\Rechte
     */
    public function getRechte()
    {
        return $this->rechte;
    }

    /**
     * Set unterweisung
     *
     * @param \OnSec\OnSecBundle\Entity\Unterweisung $unterweisung
     *
     * @return UserRechteUnterweisung
     */
    public function setUnterweisung(\OnSec\OnSecBundle\Entity\Unterweisung $unterweisung = null)
    {
        $this->unterweisung = $unterweisung;

        return $this;
    }

    /**
     * Get unterweisung
     *
     * @return \OnSec\OnSecBundle\Entity\Unterweisung
     */
    public function getUnterweisung()
    {
        return $this->unterweisung;
    }

    /**
     * Set user
     *
     * @param \OnSec\OnSecBundle\Entity\User $user
     *
     * @return UserRechteUnterweisung
     */
    public function setUser(\OnSec\OnSecBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \OnSec\OnSecBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}

