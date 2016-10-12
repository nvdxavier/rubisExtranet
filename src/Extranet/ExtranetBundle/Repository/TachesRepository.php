<?php
namespace Extranet\ExtranetBundle\Repository;

use Extranet\ExtranetBundle\Entity;
use Extranet\ExtranetBundle\Entity\Projets;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query;

class TachesRepository extends EntityRepository
{
        public function findTachesbyProjet($id)
        {
            $qb = $this->createQueryBuilder('u')
                ->select('u')
                ->where('u.projets_id IN (:array)')
                ->setParameter('array', $id);

            return $qb->getQuery()->getResult();
        }


    public function findTachesbyUser($user)
    {
        $qb = $this->createQueryBuilder($user)
            ->select('u')
            ->where('u.compteutilisateur = :user')
            ->setParameter('user', $user);
        return $qb->getQuery()->getResult();
    }

    public function deleteTache($id)
    {
        $qb = $this->createQueryBuilder($id);

        $qb->delete('Extranet\ExtranetBundle\Entity\Taches', 'u')
            ->where($qb->expr()->eq('u.id', ':id'))
            ->setParameter('id', $id);
        return $qb->getQuery()->getResult();
    }

    public function recherche($chaine)
    {
        $qb = $this->createQueryBuilder('u')
            ->select('u')
            ->where('u.tache like :chaine')
            ->orWhere('u.descriptionTache like :chaine')
            //->andWhere('u.actif = 1')
            ->orderBy('u.id')
            ->setParameter('chaine', '%'.$chaine.'%');
        return $qb->getQuery()->getResult();
    }

    public function getUserListbyProjet($id)
    {
        $qb = $this->createQueryBuilder('u')
            ->select('u')
            ->where('u.projets_id IN (:array)')
            ->setParameter('array', $id)
            ->distinct(true);

        return $qb->getQuery()->getResult();
    }

    public function mdr()
    {
        $qb = $this->createQueryBuilder('u')
        ->select('u','p')
        ->from('taches', 'u')
            //->where('u.id = :id')
            ->leftJoin('p.projets', 'u', 'WITH','u.id = p.id');
        //->setParameter('id', $id);
        return $qb->getQuery()->getResult();
        //->select('COUNT(m)')
        //->from($this->_entityName, 'm')
        //$tasks = $this->createQueryBuilder('u')->join('t.users', 'u', 'WITH', 'u.id = :id');

    }
}