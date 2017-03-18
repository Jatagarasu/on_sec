<?php

namespace OnSec\OnSecBundle\EventListener;

use Doctrine\ORM\Event\LifecycleEventArgs;

use Onsec\OnSecBundle\Entity\Instruction;
use OnSec\OnSecBundle\Entity\Keyword;

class UniqueKeyword
{

    /**
     * This will be called on newly created entities
     */
    public function prePersist(LifecycleEventArgs $args)
    {

        $entity = $args->getEntity();

        // we're interested in Dishes only
        if ($entity instanceof Instruction) {

            $entityManager = $args->getEntityManager();
            $keywords = $entity->getKeywords();

            foreach($keywords as $key => $keyword){

                // let's check for existance of this ingredient
                $results = $entityManager->getRepository('OnSec\OnSecBundle\Entity\Keyword')->findBy(array('description' => $keyword->getDescription()), array('id' => 'ASC') );

                // if ingredient exists use the existing ingredient
                if (count($results) > 0){

                    $keywords[$key] = $results[0];

                }

            }

        }

    }

    /**
     * Called on updates of existent entities
     *
     * New keywords were already created and persisted (although not flushed)
     * so we decide now wether to add them to Instructions or delete the duplicated ones
     */
    public function preUpdate(LifecycleEventArgs $args)
    {

        $entity = $args->getEntity();

        // we're interested in Dishes only
        if ($entity instanceof Instruction) {

            $entityManager = $args->getEntityManager();
            $keywords = $entity->getKeywords();

            foreach($keywords as $keyword){

                // let's check for existance of this keyword
                // find by name and sort by id keep the older keyword first
                $results = $entityManager->getRepository('OnSec\OnSecBundle\Entity\Keyword')->findBy(array('description' => $keyword->getDescription()), array('id' => 'ASC') );

                // if keyword exists at least two rows will be returned
                // keep the first and discard the second
                if (count($results) > 1){

                    $knownKeyword = $results[0];
                    $entity->addKeyword($knownKeyword);

                    // remove the duplicated keyword
                    $duplicatedKeyword = $results[1];
                    $entityManager->remove($duplicatedKeyword);

                }else{

                    // keyword doesn't exist yet, add relation
                    $entity->addKeyword($keyword);

                }

            }

        }

    }

}
