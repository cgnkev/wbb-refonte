<?php

namespace WBB\BarBundle\Repository;

use WBB\CoreBundle\Repository\EntityRepository;

/**
 * NewsRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class NewsRepository extends EntityRepository
{
    public function findLatestNews($city = null, $limit = 3, $onlyOnTop = true, $asArray = false)
    {
        $qb = $this->createQuerybuilder($this->getAlias());

        $qb
            ->select($this->getAlias().', nm, m')
            ->leftJoin($this->getAlias().'.medias', 'nm')
            ->leftJoin('nm.media', 'm')
            ->where($qb->expr()->eq(1, 1))
        ;

        if($limit > 0)
        {
            $qb->setMaxResults($limit);
        }

        if($onlyOnTop){
            $qb
                ->where($qb->expr()->eq($this->getAlias().'.onTop', $qb->expr()->literal(true)))
                ->orderBy($this->getAlias().'.createdAt', 'DESC');
        }else{
            $qb
                ->orderBy($this->getAlias().'.onTop', 'DESC')
                ->addOrderBy($this->getAlias().'.createdAt', 'DESC');
        }

        if($city){
            $qb
                ->leftJoin($this->getAlias().'.cities', 'c')
                ->andWhere($qb->expr()->eq('c.id', $city->getId()));
        }

        if($asArray)
            return $qb->getQuery()->getArrayResult();
        else
            return $qb->getQuery()->getResult();
    }

    public function findRelatedNews($cities = null, $limit = 3, $exceptIds = array(0))
    {
        $qb = $this->createQuerybuilder($this->getAlias());

        $qb
            ->select($this->getAlias().', nm, m')
            ->leftJoin($this->getAlias().'.medias', 'nm')
            ->leftJoin('nm.media', 'm')
            ->where($qb->expr()->notIn($this->getAlias().'.id', $exceptIds))
            ->orderBy($this->getAlias().'.onTop', 'DESC')
        ;

        if($limit > 0)
        {
            $qb->setMaxResults($limit);
        }

        if($cities){
            $qb
                ->addSelect('count(c.id) as HIDDEN nbCities')
                ->leftjoin($this->getAlias().'.cities', 'c')
                ->andWhere($qb->expr()->in('c.id', $cities))
                ->groupBy($this->getAlias().'.id')
                ->addOrderBy('nbCities', 'DESC')
            ;
        }

        $qb->addOrderBy($this->getAlias().'.createdAt', 'DESC');

        return $qb->getQuery()->getResult();
    }

    public function findBarRelatedNews($bar, $onTop = true, $limit = 5)
    {
        $qb = $this->createQuerybuilder($this->getAlias());

        $qb
            ->select($this->getAlias().', nm, m')
            ->leftJoin($this->getAlias().'.medias', 'nm')
            ->leftJoin('nm.media', 'm')
            ->innerJoin($this->getAlias().'.bars', 'b')
            ->orderBy($this->getAlias().'.createdAt', 'DESC')
            ->where($qb->expr()->eq('b.id', $bar->getId()))
            ->setMaxResults($limit)
        ;

        if($onTop)
            $qb->andWhere($qb->expr()->eq($this->getAlias().'.onTop', $qb->expr()->literal(true)));
        elseif($onTop == false)
            $qb->andWhere($qb->expr()->eq($this->getAlias().'.onTop', $qb->expr()->literal(false)));

        return $qb->getQuery()->getResult();
    }
} 