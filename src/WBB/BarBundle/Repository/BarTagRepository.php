<?php

namespace WBB\BarBundle\Repository;

use WBB\CoreBundle\Repository\EntityRepository;

/**
 * BarRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class BarTagRepository extends EntityRepository
{
    public function findYouMayAlsoLike($bar, $location, $exceptBars = null, $onTop = true, $tags = true, $limit = 4)
    {
        if($bar)
        {
            $ids = array($bar->getId());
            if($exceptBars != null)
            {
                foreach($exceptBars as $exBar)
                {
                    if($exBar and $exBar->getBar())
                        $ids[] = $exBar->getBar()->getId();
                }
            }

            $qb = $this->createQuerybuilder($this->getAlias());

            $qb
                ->select($this->getAlias())
                ->innerjoin($this->getAlias().'.bar', 'b')
                ->innerjoin('b.city', 'c')
                ->where($qb->expr()->notIn('b.id',':exceptBars'))
                ->setParameter('exceptBars', $ids)
            ;

            if($onTop == true){
                $qb
                    ->andWhere($qb->expr()->eq('b.onTop', $qb->expr()->literal(true)));
            }

            if($tags == true){
                $qb
                    ->innerjoin($this->getAlias().'.tag', 't')
                    ->andWhere($qb->expr()->in('t.id',':tags'))
                    ->setParameter('tags', $bar->getTagsIds());
            }

            if($location == BarRepository::BAR_LOCATION_CITY and !is_null($bar->getCity()))
            {
                $qb
                    ->andWhere($qb->expr()->eq('b.city', ':city'))
                    ->setParameter('city', $bar->getCity());
            }

            if($location == BarRepository::BAR_LOCATION_COUNTRY and !is_null($bar->getCity()) and !is_null($bar->getCity()->getCountry()))
            {
                $qb
                    ->andWhere($qb->expr()->eq('c.country', ':country'))
                    ->setParameter('country', $bar->getCity()->getCountry());
            }

            $qb
                ->groupBy('b')
                ->setMaxResults($limit);


//            if($location==BarRepository::BAR_LOCATION_CITY and $tags == false)
//            {
//                var_dump($limit);die;
//            }

            return $qb->getQuery()->getResult();
        }
        else{
            return null;
        }
    }
} 