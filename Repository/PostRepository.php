<?php

use Doctrine\ORM\EntityRepository;

class PostRepository extends EntityRepository
{
    public function findAllOrderedById()
    {
        $qb = $this->_em->createQueryBuilder();
        $qb->select('p')
           ->from('Post', 'p')
           ->orderBy('p.id', 'DESC');
        
        return $qb->getQuery()->getResult();
    }
}