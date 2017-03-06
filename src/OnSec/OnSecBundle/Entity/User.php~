<?php

namespace OnSec\OnSecBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use OnSec\OnSecBundle\Entity\Role;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="OnSec\OnSecBundle\Repository\UserRepository")
 */
class User
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="surname", type="string", length=255, nullable=true)
     */
    private $surname;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=255, nullable=true)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, unique=true)
     */
    private $email;

    /**
     * @var bool
     *
     * @ORM\Column(name="notificationActive", type="boolean", nullable=true)
     */
    private $notificationActive;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\Column(name="roles", type="\Doctrine\Common\Collections\Collection")
     */
    private $roles;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set surname
     *
     * @param string $surname
     *
     * @return User
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname
     *
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     *
     * @return User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set notificationActive
     *
     * @param boolean $notificationActive
     *
     * @return User
     */
    public function setNotificationActive($notificationActive)
    {
        $this->notificationActive = $notificationActive;

        return $this;
    }

    /**
     * Get notificationActive
     *
     * @return bool
     */
    public function getNotificationActive()
    {
        return $this->notificationActive;
    }

    /**
     * Add roles
     *
     * @param Role $role
     *
     * @return User
     */
    public function setRoles(Role $role)
    {
        $this->roles[] = $role;

        return $this;
    }

    /**
     * Get roles
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRoles()
    {
        return $this->roles;
    }
    /**
     * @var \OnSec\OnSecBundle\Entity\Course
     */
    private $course;

    /**
     * @var \OnSec\OnSecBundle\Entity\Instruction
     */
    private $instruction;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->roles = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add role
     *
     * @param \OnSec\OnSecBundle\Entity\Role $role
     *
     * @return User
     */
    public function addRole(\OnSec\OnSecBundle\Entity\Role $role)
    {
        $this->roles[] = $role;

        return $this;
    }

    /**
     * Remove role
     *
     * @param \OnSec\OnSecBundle\Entity\Role $role
     */
    public function removeRole(\OnSec\OnSecBundle\Entity\Role $role)
    {
        $this->roles->removeElement($role);
    }

    /**
     * Set course
     *
     * @param \OnSec\OnSecBundle\Entity\Course $course
     *
     * @return User
     */
    public function setCourse(\OnSec\OnSecBundle\Entity\Course $course = null)
    {
        $this->course = $course;

        return $this;
    }

    /**
     * Get course
     *
     * @return \OnSec\OnSecBundle\Entity\Course
     */
    public function getCourse()
    {
        return $this->course;
    }

    /**
     * Set instruction
     *
     * @param \OnSec\OnSecBundle\Entity\Instruction $instruction
     *
     * @return User
     */
    public function setInstruction(\OnSec\OnSecBundle\Entity\Instruction $instruction = null)
    {
        $this->instruction = $instruction;

        return $this;
    }

    /**
     * Get instruction
     *
     * @return \OnSec\OnSecBundle\Entity\Instruction
     */
    public function getInstruction()
    {
        return $this->instruction;
    }
    /**
     * @var \OnSec\OnSecBundle\Entity\Course
     */
    private $course_subs;

    /**
     * @var \OnSec\OnSecBundle\Entity\Course
     */
    private $course_mods;


    /**
     * Set courseSubs
     *
     * @param \OnSec\OnSecBundle\Entity\Course $courseSubs
     *
     * @return User
     */
    public function setCourseSubs(\OnSec\OnSecBundle\Entity\Course $courseSubs = null)
    {
        $this->course_subs = $courseSubs;

        return $this;
    }

    /**
     * Get courseSubs
     *
     * @return \OnSec\OnSecBundle\Entity\Course
     */
    public function getCourseSubs()
    {
        return $this->course_subs;
    }

    /**
     * Set courseMods
     *
     * @param \OnSec\OnSecBundle\Entity\Course $courseMods
     *
     * @return User
     */
    public function setCourseMods(\OnSec\OnSecBundle\Entity\Course $courseMods = null)
    {
        $this->course_mods = $courseMods;

        return $this;
    }

    /**
     * Get courseMods
     *
     * @return \OnSec\OnSecBundle\Entity\Course
     */
    public function getCourseMods()
    {
        return $this->course_mods;
    }
}
