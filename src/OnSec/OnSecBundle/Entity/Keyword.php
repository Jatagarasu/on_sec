<?php

namespace OnSec\OnSecBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use \OnSec\OnSecBundle\Entity\Instruction;
use \OnSec\OnSecBundle\Entity\Room;
use \OnSec\OnSecBundle\Entity\Course;

/**
 * Keyword
 *
 * @ORM\Table(name="keyword")
 * @ORM\Entity(repositoryClass="OnSec\OnSecBundle\Repository\KeywordRepository")
 */
class Keyword
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
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var Instruction
     */
    private $instruction;

    /**
     * @return Instruction
     */
    public function getInstruction()
    {
        return $this->instruction;
    }

    /**
     * @param Instruction $instruction
     */
    public function setInstruction(Instruction $instruction)
    {
        $this->instruction = $instruction;
    }

    /**
     * @var Room
     */
    private $room;

    /**
     * @return \OnSec\OnSecBundle\Entity\Room
     */
    public function getRoom()
    {
        return $this->room;
    }

    /**
     * @param \OnSec\OnSecBundle\Entity\Room $room
     */
    public function setRoom($room)
    {
        $this->room = $room;
    }


    /**
     * @var Course
     */
    private $course;

    /**
     * @return \OnSec\OnSecBundle\Entity\Course
     */
    public function getCourse()
    {
        return $this->course;
    }

    /**
     * @param \OnSec\OnSecBundle\Entity\Course $course
     */
    public function setCourse($course)
    {
        $this->course = $course;
    }

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
     * Set description
     *
     * @param string $description
     *
     * @return Keyword
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
}
