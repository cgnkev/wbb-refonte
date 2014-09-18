<?php

namespace WBB\BarBundle\Feed;

use WBB\BarBundle\Entity\Bar;

/**
 * Foursquare
 */
class FoursquareTips implements FeedInterface
{
    private $container;
    private $em;
    private $limit;

    /**
     * __construct
     *
     * @param $container
     * @param $em
     * @param $limit
     */
    public function __construct($container, $em, $limit)
    {
        $this->container    = $container;
        $this->em           = $em;
        $this->limit        = $limit;
    }

    /**
     * find
     *
     * @param  null  $id
     * @param  int   $next
     * @return array
     */
    public function find($id = null, $next = 0)
    {
        $params = array( 'venue_id' => $id, 'limit' => ($this->limit + 1));

        if($next > 0) $params['offset'] = $next;

        $client  = $this->container->get('jcroll_foursquare_client');
        $command = $client->getCommand('venues/tips', $params);
        $response= $command->execute();
        $tips    = $response['response']['tips']['items'];

        return array(
            'type' => 'fsTips',
            'data' => $tips
        );
    }

    /**
     * findByHash
     *
     * @param string $id
     *
     * @return array
     */
    public function findByHash($id)
    {

        $params = array( 'tip_id' => $id);

        $client = $this->container->get('jcroll_foursquare_client');
        $command = $client->getCommand('tips', $params);
        $tip = $command->execute();

        return array(
            'data' => $tip['response']['tip']
        );
    }

    /**
     * createFeed
     *
     * @param string                    $hash
     * @param \WBB\BarBundle\Entity\Bar $bar
     *
     * @return Object
     */
    public function createObject($hash, Bar $bar = null)
    {
        $bar->addFsExcludedTip($hash);
        $this->em->persist($bar);
        $this->em->flush($bar);

        return $bar;
    }

    /**
     * removeObject
     *
     * @param string                    $hash
     * @param \WBB\BarBundle\Entity\Bar $bar
     *
     * @return Object
     */
    public function removeObject($hash, Bar $bar = null)
    {
        $bar->removeFsExcludedTips($hash);
        $this->em->persist($bar);
        $this->em->flush();

        return $bar->getFsExcludedTips();
    }

    /**
     * listAll
     * @param  \WBB\BarBundle\Entity\Bar $bar
     * @return array
     */
    public function listAll(Bar $bar)
    {
        return $bar->getFsExcludedTips();
    }
}
