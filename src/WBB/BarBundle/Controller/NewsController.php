<?php

namespace WBB\BarBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use WBB\BarBundle\Entity\Tag;
use WBB\BarBundle\Entity\Tip;
use WBB\BarBundle\Form\TipType;
use WBB\BarBundle\Repository\BarRepository;
use Symfony\Component\HttpFoundation\Session\Session;

class NewsController extends Controller
{
    public function landingPageAction($citySlug = false)
    {
        $city = ($citySlug)? $this->container->get('city.repository')->findOneBySlug($citySlug) : null;

        $allNews = $this->container->get('news.repository')->findLatestNews($city, 0, false);

        $latestNews = array_slice($allNews, 0, 10, true);

        $articles = array();
        $interviews = array();
        $newsList = array();

        $nbArticles = 0;
        $nbInteviews = 0;

        foreach($allNews as $news)
        {
            if($news->getIsAnInterview() and $nbInteviews < 4 ){
                $interviews[] = $news;
                $nbInteviews++;
            }elseif($nbArticles < 5){
                $articles[] = $news;
                $nbArticles++;
            }else{
                $newsList[] = $news;
            }
        }
        $topCities = $this->container->get('city.repository')->findTopCities();
        shuffle($topCities);
        return $this->render('WBBBarBundle:News:landingPage.html.twig', array(
            'city'      => $city,
            'latest'    => $latestNews,
            'articles'  => $articles,
            'interviews'=> $interviews,
            'newsList'  => $newsList,
            'topCities' => $topCities
        ));
    }
}