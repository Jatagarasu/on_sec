<?php

namespace OnSec\OnSecBundle\Entity;

/**
 * UserRechteKurs
 */
class UserRechteKurs
{
    /**
     * @var \OnSec\OnSecBundle\Entity\Kurs
     */
    private $kurs;

    /**
     * @var \OnSec\OnSecBundle\Entity\Rechte
     */
    private $rechte;

    /**
     * @var \OnSec\OnSecBundle\Entity\User
     */
    private $user;


    /**
     * Set kurs
     *
     * @param \OnSec\OnSecBundle\Entity\Kurs $kurs
     *
     * @return UserRechteKurs
     */
    public function setKurs(\OnSec\OnSecBundle\Entity\Kurs $kurs = null)
    {
        $this->kurs = $kurs;

        return $this;
    }

    /**
     * Get kurs
     *
     * @return \OnSec\OnSecBundle\Entity\Kurs
     */
    public function getKurs()
    {
        return $this->kurs;
    }

    /**
     * Set rechte
     *
     * @param \OnSec\OnSecBundle\Entity\Rechte $rechte
     *
     * @return UserRechteKurs
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
     * Set user
     *
     * @param \OnSec\OnSecBundle\Entity\User $user
     *
     * @return UserRechteKurs
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

