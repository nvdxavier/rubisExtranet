<?php
/**
 * Created by PhpStorm.
 * User: subtonix
 * Date: 09/08/2016
 * Time: 00:15
 */

namespace Extranet\ExtranetBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Extranet\ExtranetBundle\Entity;

class NewslettersRepository extends EntityRepository
{
    public function findNewsletterbyId($id)
    {
        $qb = $this->createQueryBuilder('u')
            ->select('u')
            ->where('u.id IN (:array)')
            ->setParameter('array', $id);

        return $qb->getQuery()->getResult();
    }


} 