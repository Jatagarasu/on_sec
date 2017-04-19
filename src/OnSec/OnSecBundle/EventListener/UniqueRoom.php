<?php

namespace OnSec\OnSecBundle\EventListener;

use Doctrine\ORM\Event\LifecycleEventArgs;

use Onsec\OnSecBundle\Entity\Instruction;

class UniqueRoom
{

    /**
     * This will be called on newly created entities
     */
    public function prePersist(LifecycleEventArgs $args)
    {

        $entity = $args->getEntity();

        if ($entity instanceof Instruction) {

            $entityManager = $args->getEntityManager();
            $rooms = $entity->getRooms();

            foreach($rooms as $key => $room){

                $results = $entityManager->getRepository('OnSec\OnSecBundle\Entity\Room')->findBy(array('description' => $room->getDescription()), array('id' => 'ASC') );

                if (count($results) > 0){

                    $rooms[$key] = $results[0];
                }

            }

        }

    }

    /**
     * Called on updates of existent entities
     *
     * New rooms were already created and persisted (although not flushed)
     * so we decide now wether to add them to Instructions or delete the duplicated ones
     */
    public function preUpdate(LifecycleEventArgs $args)
    {

        $entity = $args->getEntity();

        // we're interested in Dishes only
        if ($entity instanceof Instruction) {

            $entityManager = $args->getEntityManager();
            $rooms = $entity->getRooms();

            var_dump($rooms);


            foreach($rooms as $room){

                // let's check for existance of this room
                // find by name and sort by id keep the older room first

                var_dump($room->getDescription());

                $results = $entityManager->getRepository('OnSec\OnSecBundle\Entity\Room')->findBy(array('description' => $room->getDescription()), array('id' => 'ASC') );

                var_dump($results);


                // if room exists at least two rows will be returned
                // keep the first and discard the second
                if (count($results) > 1){

                    $knownRoom = $results[0];
                    $entity->addRoom($knownRoom);

                    // remove the duplicated room
                    $duplicatedRoom = $results[1];
                    $entity->removeRoom($duplicatedRoom);
                    $entityManager->remove($duplicatedRoom);

                }else{

                    // room doesn't exist yet, add relation
                    $entity->addRoom($room);

                }

            }

        }

    }

}
