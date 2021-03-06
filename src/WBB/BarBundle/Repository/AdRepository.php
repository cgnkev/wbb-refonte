<?php

namespace WBB\BarBundle\Repository;

use WBB\BarBundle\Entity\Ad;
use WBB\CoreBundle\Entity\Country;
use WBB\CoreBundle\Repository\EntityRepository;

/**
 * AdRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class AdRepository extends EntityRepository
{
    public function findOneByPositionAndCountry($position = Ad::WBB_ADS_HP_300X250, Country $country = null)
    {
        $qb = $this->createQuerybuilder($this->getAlias());

        $qb
            ->select($this->getAlias())
            ->where($qb->expr()->eq($this->getAlias().'.position', $qb->expr()->literal($position)))
            ->andWhere($qb->expr()->gte($qb->expr()->literal(date('Y-m-d')), $this->getAlias().'.beginAt'))
            ->andWhere($qb->expr()->lte($qb->expr()->literal(date('Y-m-d')), $this->getAlias().'.endAt'))
            ->orderBy($this->getAlias().'.id', 'DESC')
            ->setMaxResults(1);
        ;

        if($country){
            $qb
                ->addSelect('c')
                ->leftJoin($this->getAlias().'.countries', 'c')
                ->andWhere($qb->expr()->eq('c.id', $country->getId()))
            ;
        }
        else{
            $qb
                ->leftJoin($this->getAlias().'.countries', 'c')
                ->groupBy($this->getAlias())
                ->having($qb->expr()->eq($qb->expr()->count('c.id'), 0));
        }

        return $qb->getQuery()->getOneOrNullResult();
    }
} 