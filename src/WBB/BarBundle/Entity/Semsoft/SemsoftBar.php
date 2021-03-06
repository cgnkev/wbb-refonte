<?php

namespace WBB\BarBundle\Entity\Semsoft;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use WBB\BarBundle\Entity\Bar;
use WBB\BarBundle\Entity\BarOpening;
use WBB\BarBundle\Entity\Collections\BarTag;
use WBB\CoreBundle\Entity\City;
use WBB\CoreBundle\Entity\CitySuburb;
use WBB\CoreBundle\Entity\Country;

/**
 * SemsoftBars
 *
 * @ORM\Table(name="wbb_semsoft_imported_bar")
 * @ORM\Entity
 */
class SemsoftBar
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="county", type="string", length=255, nullable=true)
     */
    private $county;

    /**
     * @var string
     *
     * @ORM\Column(name="postal_code", type="string", length=255, nullable=true)
     */
    private $postalCode;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="text", nullable=true)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="latitude", type="decimal", nullable=true)
     */
    private $latitude;

    /**
     * @var string
     *
     * @ORM\Column(name="longitude", type="decimal", nullable=true)
     */
    private $longitude;

    /**
     * @var string
     *
     * @ORM\Column(name="website", type="string", length=255, nullable=true)
     */
    private $website;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=255, nullable=true)
     */
    private $phone;

    /**
     * @var integer
     *
     * @ORM\Column(name="price", type="smallint", nullable=true)
     */
    private $price;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_credit_card", type="boolean", nullable=true)
     */
    private $creditCard;

    /**
     * @var string
     *
     * @ORM\Column(name="seo_description", type="text", nullable=true)
     */
    private $seoDescription;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_out_door_seating", type="boolean", nullable=true)
     */
    private $outDoorSeating;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_happy_hour", type="boolean", nullable=true)
     */
    private $happyHour;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_wifi", type="boolean", nullable=true)
     */
    private $wifi;

    /**
     * @var string
     *
     * @ORM\Column(name="menu", type="string", length=255, nullable=true)
     */
    private $menu;

    /**
     * @var boolean
     *
     * @ORM\Column(name="reservation", type="boolean", nullable=true)
     */
    private $reservation;

    /**
     * @var string
     *
     * @ORM\Column(name="parking_type", type="string", length=255, nullable=true)
     */
    private $parkingType;

    /**
     * @var string
     *
     * @ORM\Column(name="facebook_id", type="string", length=255, nullable=true)
     */
    private $facebookID;

    /**
     * @var string
     *
     * @ORM\Column(name="facebook_user_page", type="string", length=255, nullable=true)
     */
    private $facebookUserPage;

    /**
     * @var integer
     *
     * @ORM\Column(name="facebook_likes", type="integer", nullable=true)
     */
    private $facebookLikes;

    /**
     * @var integer
     *
     * @ORM\Column(name="facebook_check_ins", type="integer", nullable=true)
     */
    private $facebookCheckIns;

    /**
     * @var string
     *
     * @ORM\Column(name="twitter_name", type="string", length=255, nullable=true)
     */
    private $twitterName;

    /**
     * @var string
     *
     * @ORM\Column(name="twitter_user_page", type="string", length=255, nullable=true)
     */
    private $twitterUserPage;

    /**
     * @var string
     *
     * @ORM\Column(name="instagram_id", type="string", length=255, nullable=true)
     */
    private $instagramID;

    /**
     * @var string
     *
     * @ORM\Column(name="instagram_user_page", type="string", length=255, nullable=true)
     */
    private $instagramUserPage;

    /**
     * @var string
     *
     * @ORM\Column(name="google_plus_user_page", type="string", length=255, nullable=true)
     */
    private $googlePlusUserPage;

    /**
     * @var string
     *
     * @ORM\Column(name="foursquare_id", type="string", length=255, nullable=true)
     */
    private $foursquareID;

    /**
     * @var string
     *
     * @ORM\Column(name="foursquare_user_page", type="string", length=255, nullable=true)
     */
    private $foursquareUserPage;

    /**
     * @var integer
     *
     * @ORM\Column(name="foursquare_check_ins", type="integer", nullable=true)
     */
    private $foursquareCheckIns;

    /**
     * @var integer
     *
     * @ORM\Column(name="foursquare_likes", type="integer", nullable=true)
     */
    private $foursquareLikes;

    /**
     * @var integer
     *
     * @ORM\Column(name="foursquare_tips", type="integer", nullable=true)
     */
    private $foursquareTips;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_permanently_closed", type="boolean", nullable=true)
     */
    private $permanentlyClosed;

    /**
     * @var boolean
     *
     * @ORM\Column(name="business_found", type="boolean", nullable=true)
     */
    private $businessFound;

    /**
     * @var array
     *
     * @ORM\Column(name="updated_columns", type="array", nullable=true)
     */
    private $updatedColumns;

    /**
     * @var array
     *
     * @ORM\Column(name="overwritten_columns", type="array", nullable=true)
     */
    private $overwrittenColumns;

    /**
     * @ORM\ManyToOne(targetEntity="WBB\CoreBundle\Entity\Country", inversedBy="semsoftBars")
     */
    private $country;

    /**
     * @ORM\ManyToOne(targetEntity="WBB\CoreBundle\Entity\City", inversedBy="semsoftBars", cascade={"persist"})
     */
    private $city;

    /**
     * @ORM\ManyToOne(targetEntity="WBB\CoreBundle\Entity\CitySuburb", inversedBy="semsoftBars", cascade={"persist"})
     */
    private $suburb;

    /**
     * @ORM\ManyToOne(targetEntity="WBB\BarBundle\Entity\Bar", inversedBy="semsoftBars")
     */
    private $bar;

    /**
     * @ORM\ManyToOne(targetEntity="WBB\BarBundle\Entity\Tag", inversedBy="semsoftBarsLevel", cascade={"persist"})
     */
    private $energyLevel;

    /**
     * @ORM\OneToMany(targetEntity="WBB\BarBundle\Entity\Collections\BarTag", mappedBy="semsoftBar", cascade={"persist", "remove"} , orphanRemoval=true)
     * @ORM\OrderBy({"position" = "ASC"})
     */
    private $tags;

    /**
     * @ORM\OneToMany(targetEntity="WBB\BarBundle\Entity\BarOpening", mappedBy="semsoftBar", cascade={"persist", "remove"}, orphanRemoval=true)
     * @ORM\OrderBy({"openingDay" = "ASC"})
     */
    private $openings;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return SemsoftBar
     */
    public function setName($name)
    {
        $this->name = trim($name);

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        if($this->name)
            return $this->name;
        elseif($this->bar)
            return $this->bar->getName();
        else
            return '';
    }

    /**
     * Set postalCode
     *
     * @param string $postalCode
     * @return SemsoftBar
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    /**
     * Get postalCode
     *
     * @return string 
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return SemsoftBar
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set latitude
     *
     * @param string $latitude
     * @return SemsoftBar
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return string 
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude
     *
     * @param string $longitude
     * @return SemsoftBar
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return string 
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set website
     *
     * @param string $website
     * @return SemsoftBar
     */
    public function setWebsite($website)
    {
        $this->website = $website;

        return $this;
    }

    /**
     * Get website
     *
     * @return string 
     */
    public function getWebsite()
    {
        if($this->website)
            return $this->website;
        elseif($this->bar)
            return $this->bar->getWebsite();
        else
            return null;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return SemsoftBar
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return SemsoftBar
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set price
     *
     * @param integer $price
     * @return SemsoftBar
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return integer 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Get isCreditCard
     *
     * @return boolean 
     */
    public function isCreditCard()
    {
        return $this->creditCard;
    }

    /**
     * Set seoDescription
     *
     * @param string $seoDescription
     * @return SemsoftBar
     */
    public function setSeoDescription($seoDescription)
    {
        $this->seoDescription = $seoDescription;

        return $this;
    }

    /**
     * Get seoDescription
     *
     * @return string 
     */
    public function getSeoDescription()
    {
        return $this->seoDescription;
    }

    /**
     * Set isOutDoorSeating
     *
     * @param boolean $isOutDoorSeating
     * @return SemsoftBar
     */
    public function setOutDoorSeating($isOutDoorSeating)
    {
        $this->outDoorSeating = $isOutDoorSeating;

        return $this;
    }

    /**
     * Get isOutDoorSeating
     *
     * @return boolean 
     */
    public function isOutDoorSeating()
    {
        return $this->outDoorSeating;
    }

    /**
     * Set isHappyHour
     *
     * @param boolean $isHappyHour
     * @return SemsoftBar
     */
    public function setHappyHour($isHappyHour)
    {
        $this->happyHour = $isHappyHour;

        return $this;
    }

    /**
     * Get isHappyHour
     *
     * @return boolean 
     */
    public function isHappyHour()
    {
        return $this->happyHour;
    }

    /**
     * Set isWiFi
     *
     * @param boolean $isWiFi
     * @return SemsoftBar
     */
    public function setWifi($isWiFi)
    {
        $this->wifi = $isWiFi;

        return $this;
    }

    /**
     * Get isWiFi
     *
     * @return boolean 
     */
    public function isWifi()
    {
        return $this->wifi;
    }

    /**
     * Set menu
     *
     * @param string $menu
     * @return SemsoftBar
     */
    public function setMenu($menu)
    {
        $this->menu = $menu;

        return $this;
    }

    /**
     * Get menu
     *
     * @return string 
     */
    public function getMenu()
    {
        return $this->menu;
    }

    /**
     * Set reservation
     *
     * @param boolean $reservation
     * @return SemsoftBar
     */
    public function setReservation($reservation)
    {
        $this->reservation = $reservation;

        return $this;
    }

    /**
     * Get reservation
     *
     * @return boolean 
     */
    public function isReservation()
    {
        return $this->reservation;
    }

    /**
     * Set parkingType
     *
     * @param string $parkingType
     * @return SemsoftBar
     */
    public function setParkingType($parkingType)
    {
        $this->parkingType = $parkingType;

        return $this;
    }

    /**
     * Get parkingType
     *
     * @return string 
     */
    public function getParkingType()
    {
        return $this->parkingType;
    }

    /**
     * Set facebookID
     *
     * @param string $facebookID
     * @return SemsoftBar
     */
    public function setFacebookID($facebookID)
    {
        $this->facebookID = $facebookID;

        return $this;
    }

    /**
     * Get facebookID
     *
     * @return string 
     */
    public function getFacebookID()
    {
        return $this->facebookID;
    }

    /**
     * Set facebookUserPage
     *
     * @param string $facebookUserPage
     * @return SemsoftBar
     */
    public function setFacebookUserPage($facebookUserPage)
    {
        $this->facebookUserPage = $facebookUserPage;

        return $this;
    }

    /**
     * Get facebookUserPage
     *
     * @return string 
     */
    public function getFacebookUserPage()
    {
        return $this->facebookUserPage;
    }

    /**
     * Set twitterName
     *
     * @param string $twitterName
     * @return SemsoftBar
     */
    public function setTwitterName($twitterName)
    {
        $this->twitterName = $twitterName;

        return $this;
    }

    /**
     * Get twitterName
     *
     * @return string 
     */
    public function getTwitterName()
    {
        return $this->twitterName;
    }

    /**
     * Set twitterUserPage
     *
     * @param string $twitterUserPage
     * @return SemsoftBar
     */
    public function setTwitterUserPage($twitterUserPage)
    {
        $this->twitterUserPage = $twitterUserPage;

        return $this;
    }

    /**
     * Get twitterUserPage
     *
     * @return string 
     */
    public function getTwitterUserPage()
    {
        return $this->twitterUserPage;
    }

    /**
     * Set instagramID
     *
     * @param string $instagramID
     * @return SemsoftBar
     */
    public function setInstagramID($instagramID)
    {
        $this->instagramID = $instagramID;

        return $this;
    }

    /**
     * Get instagramID
     *
     * @return string 
     */
    public function getInstagramID()
    {
        return $this->instagramID;
    }

    /**
     * Set instagramUserPage
     *
     * @param string $instagramUserPage
     * @return SemsoftBar
     */
    public function setInstagramUserPage($instagramUserPage)
    {
        $this->instagramUserPage = $instagramUserPage;

        return $this;
    }

    /**
     * Get instagramUserPage
     *
     * @return string 
     */
    public function getInstagramUserPage()
    {
        return $this->instagramUserPage;
    }

    /**
     * Set googlePlusUserPage
     *
     * @param string $googlePlusUserPage
     * @return SemsoftBar
     */
    public function setGooglePlusUserPage($googlePlusUserPage)
    {
        $this->googlePlusUserPage = $googlePlusUserPage;

        return $this;
    }

    /**
     * Get googlePlusUserPage
     *
     * @return string 
     */
    public function getGooglePlusUserPage()
    {
        return $this->googlePlusUserPage;
    }

    /**
     * Set foursquareCheckIns
     *
     * @param integer $foursquareCheckIns
     * @return SemsoftBar
     */
    public function setFoursquareCheckIns($foursquareCheckIns)
    {
        $this->foursquareCheckIns = $foursquareCheckIns;

        return $this;
    }

    /**
     * Get foursquareCheckIns
     *
     * @return integer 
     */
    public function getFoursquareCheckIns()
    {
        return $this->foursquareCheckIns;
    }

    /**
     * Set facebookCheckIns
     *
     * @param integer $facebookCheckIns
     * @return SemsoftBar
     */
    public function setFacebookCheckIns($facebookCheckIns)
    {
        $this->facebookCheckIns = $facebookCheckIns;

        return $this;
    }

    /**
     * Get facebookCheckIns
     *
     * @return integer 
     */
    public function getFacebookCheckIns()
    {
        return $this->facebookCheckIns;
    }

    /**
     * Set foursquareLikes
     *
     * @param integer $foursquareLikes
     * @return SemsoftBar
     */
    public function setFoursquareLikes($foursquareLikes)
    {
        $this->foursquareLikes = $foursquareLikes;

        return $this;
    }

    /**
     * Get foursquareLikes
     *
     * @return integer 
     */
    public function getFoursquareLikes()
    {
        return $this->foursquareLikes;
    }

    /**
     * Set facebookLikes
     *
     * @param integer $facebookLikes
     * @return SemsoftBar
     */
    public function setFacebookLikes($facebookLikes)
    {
        $this->facebookLikes = $facebookLikes;

        return $this;
    }

    /**
     * Get facebookLikes
     *
     * @return integer 
     */
    public function getFacebookLikes()
    {
        return $this->facebookLikes;
    }

    /**
     * Set isPermanentlyClosed
     *
     * @param boolean $isPermanentlyClosed
     * @return SemsoftBar
     */
    public function setPermanentlyClosed($isPermanentlyClosed)
    {
        $this->permanentlyClosed = $isPermanentlyClosed;

        return $this;
    }

    /**
     * Get isPermanentlyClosed
     *
     * @return boolean 
     */
    public function isPermanentlyClosed()
    {
        return $this->permanentlyClosed;
    }

    /**
     * Set businessFound
     *
     * @param boolean $businessFound
     * @return SemsoftBar
     */
    public function setBusinessFound($businessFound)
    {
        $this->businessFound = $businessFound;

        return $this;
    }

    /**
     * Get businessFound
     *
     * @return boolean 
     */
    public function getBusinessFound()
    {
        return $this->businessFound;
    }

    /**
     * Set overwrittenColumns
     *
     * @param array $overwrittenColumns
     * @return SemsoftBar
     */
    public function setOverwrittenColumns($overwrittenColumns)
    {
        $this->overwrittenColumns = $overwrittenColumns;

        return $this;
    }

    /**
     * Get overwrittenColumns
     *
     * @return array 
     */
    public function getOverwrittenColumns()
    {
        return $this->overwrittenColumns;
    }

    /**
     * Set updatedColumns
     *
     * @param array $updatedColumns
     * @return SemsoftBar
     */
    public function setUpdatedColumns($updatedColumns)
    {
        $this->updatedColumns = $updatedColumns;

        return $this;
    }

    /**
     * Get updatedColumns
     *
     * @return array
     */
    public function getUpdatedColumns()
    {
        return $this->updatedColumns;
    }

    /**
     * Set county
     *
     * @param string $county
     * @return SemsoftBar
     */
    public function setCounty($county)
    {
        $this->county = $county;

        return $this;
    }

    /**
     * Get county
     *
     * @return string 
     */
    public function getCounty()
    {
        return $this->county;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tags = new ArrayCollection();
        $this->openings = new ArrayCollection();
    }

    /**
     * Set city
     *
     * @param City $city
     * @return SemsoftBar
     */
    public function setCity(City $city = null)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return City 
     */
    public function getCity()
    {
        if($this->city)
            return $this->city;
        elseif($this->bar)
            return $this->bar->getCity();
        else
            return null;
    }

    /**
     * Set suburb
     *
     * @param CitySuburb $suburb
     * @return SemsoftBar
     */
    public function setSuburb(CitySuburb $suburb = null)
    {
        $this->suburb = $suburb;

        return $this;
    }

    /**
     * Get suburb
     *
     * @return CitySuburb 
     */
    public function getSuburb()
    {
        if($this->suburb)
            return $this->suburb;
        elseif($this->bar)
            return $this->bar->getSuburb();
        else
            return null;
    }

    /**
     * Add tags
     *
     * @param BarTag $tags
     * @return SemsoftBar
     */
    public function addTag(BarTag $tags)
    {
        $this->tags[] = $tags;

        return $this;
    }

    /**
     * Remove tags
     *
     * @param BarTag $tags
     */
    public function removeTag(BarTag $tags)
    {
        $this->tags->removeElement($tags);
    }

    /**
     * Get tags
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Add openings
     *
     * @param BarOpening $openings
     * @return SemsoftBar
     */
    public function addOpening(BarOpening $openings)
    {
        $this->openings[] = $openings;

        return $this;
    }

    /**
     * Remove openings
     *
     * @param BarOpening $openings
     */
    public function removeOpening(BarOpening $openings)
    {
        $this->openings->removeElement($openings);
    }

    /**
     * Get openings
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOpenings()
    {
        return $this->openings;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return SemsoftBar
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set foursquareID
     *
     * @param string $foursquareID
     * @return SemsoftBar
     */
    public function setFoursquareID($foursquareID)
    {
        $this->foursquareID = $foursquareID;

        return $this;
    }

    /**
     * Get foursquareID
     *
     * @return string 
     */
    public function getFoursquareID()
    {
        return $this->foursquareID;
    }

    /**
     * Set foursquareUserPage
     *
     * @param string $foursquareUserPage
     * @return SemsoftBar
     */
    public function setFoursquareUserPage($foursquareUserPage)
    {
        $this->foursquareUserPage = $foursquareUserPage;

        return $this;
    }

    /**
     * Get foursquareUserPage
     *
     * @return string 
     */
    public function getFoursquareUserPage()
    {
        return $this->foursquareUserPage;
    }

    /**
     * Set foursquareTips
     *
     * @param integer $foursquareTips
     * @return SemsoftBar
     */
    public function setFoursquareTips($foursquareTips)
    {
        $this->foursquareTips = $foursquareTips;

        return $this;
    }

    /**
     * Get foursquareTips
     *
     * @return integer 
     */
    public function getFoursquareTips()
    {
        return $this->foursquareTips;
    }

    /**
     * Set country
     *
     * @param Country $country
     * @return SemsoftBar
     */
    public function setCountry(Country $country = null)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return Country
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set bar
     *
     * @param Bar $bar
     * @return SemsoftBar
     */
    public function setBar(Bar $bar = null)
    {
        $this->bar = $bar;

        return $this;
    }

    /**
     * Get bar
     *
     * @return Bar
     */
    public function getBar()
    {
        return $this->bar;
    }



    /**
     * Set energyLevel
     *
     * @param \WBB\BarBundle\Entity\Tag $energyLevel
     * @return SemsoftBar
     */
    public function setEnergyLevel(\WBB\BarBundle\Entity\Tag $energyLevel = null)
    {
        $this->energyLevel = $energyLevel;

        return $this;
    }

    /**
     * Get energyLevel
     *
     * @return \WBB\BarBundle\Entity\Tag
     */
    public function getEnergyLevel()
    {
        return $this->energyLevel;
    }

    public function hydrateByBar(Bar $bar)
    {
        $this
            ->setName($bar->getName())
            ->setCity($bar->getCity())
            ->setAddress($bar->getAddress())
            ->setEmail($bar->getEmail())
            ->setBar($bar)
            ->setCountry(($bar->getCity())?$bar->getCity()->getCountry():null)
            ->setDescription($bar->getDescription())
            ->setSeoDescription($bar->getSeoDescription())
            ->setFacebookID($bar->getFacebook())
            ->setInstagramID($bar->getInstagram())
            ->setWebsite($bar->getWebsite())
            ->setTwitterName($bar->getTwitter())
            ->setSuburb($bar->getSuburb())
            ->setReservation($bar->isReservation())
            ->setPrice($bar->getPrice())
            ->setPhone($bar->getPhone())
            ->setLatitude($bar->getLatitude())
            ->setLongitude($bar->getLongitude())
            ->setParkingType($bar->getParking())
            ->setMenu($bar->getMenu())
            ->setCreditCard($bar->isCreditCard())
            ->setFoursquareID($bar->getFoursquare());

        return $this;
    }

    public function getUpdatedBar()
    {
        $bar = null;
        if($this->getBar()){
            $bar = $this->getBar();
        }else{
            $bar = new Bar();
        }

        if($this->getName())
            $bar->setName($this->getName());

        if($this->getAddress())
            $bar->setAddress($this->getAddress());

        if($this->getCity())
            $bar->setCity($this->getCity());

        if($this->getEmail())
            $bar->setEmail($this->getEmail());

        if($this->getDescription())
            $bar->setDescription($this->getDescription());

        if($this->getSeoDescription())
            $bar->setSeoDescription($this->getSeoDescription());

        if($this->getFacebookID())
            $bar->setFacebook($this->getFacebookID());

        if($this->getInstagramID())
            $bar->setInstagram($this->getInstagramID());

        if($this->getWebsite())
            $bar->setWebsite($this->getWebsite());

        if($this->getTwitterName())
            $bar->setTwitter($this->getTwitterName());

        if($this->getSuburb())
            $bar->setSuburb($this->getSuburb());

        if($this->isReservation())
            $bar->setReservation($this->isReservation());

        if($this->getPrice())
            $bar->setPrice($this->getPrice());

        if($this->getPhone())
            $bar->setPhone($this->getPhone());

        if($this->getLatitude())
            $bar->setLatitude($this->getLatitude());

        if($this->getLongitude())
            $bar->setLongitude($this->getLongitude());

        if($this->getParkingType())
            $bar->setParking($this->getParkingType());

        if($this->getMenu())
            $bar->setMenu($this->getMenu());

        if($this->isCreditCard())
            $bar->setCreditCard($this->isCreditCard());

        if($this->getFoursquareID())
            $bar->setFoursquare($this->getFoursquareID());

        if($this->getCounty())
            $bar->setCounty($this->getCounty());

        if($this->isOutDoorSeating())
            $bar->setOutDoorSeating($this->isOutDoorSeating());

        if($this->isHappyHour())
            $bar->setHappyHour($this->isHappyHour());

        if($this->isWifi())
            $bar->setWifi($this->isWifi());
//
//        if($this->getFacebookUserPage())
//            $bar->setFacebookUserPage($this->getFacebookUserPage());

        if($this->getFacebookLikes())
            $bar->setFacebookLikes($this->getFacebookLikes());

        if($this->getFacebookCheckIns())
            $bar->setFacebookCheckIns($this->getFacebookCheckIns());

//        if($this->getTwitterUserPage())
//            $bar->setTwitterUserPage($this->getTwitterUserPage());

        if($this->getInstagramUserPage())
            $bar->setInstagram($this->getInstagramUserPage());

        if($this->getGooglePlusUserPage())
            $bar->setGooglePlus($this->getGooglePlusUserPage());

//        if($this->getFoursquareUserPage())
//            $bar->setFoursquareUserPage($this->getFoursquareUserPage());

        if($this->getFoursquareCheckIns())
            $bar->setFoursquareCheckIns($this->getFoursquareCheckIns());

        if($this->getFoursquareLikes())
            $bar->setFoursquareLikes($this->getFoursquareLikes());

        if($this->getFoursquareTips())
            $bar->setFoursquareTips($this->getFoursquareTips());

        if($this->getBusinessFound())
            $bar->setStatus(Bar::BAR_STATUS_ENABLED_VALUE);

        if($this->isPermanentlyClosed())
            $bar->setStatus(Bar::BAR_STATUS_DISABLED_VALUE);

        if($this->getEnergyLevel())
            $bar->setEnergyLevel($this->getEnergyLevel());

        if($this->getTags()){
            $tags = $this->getTags();
            foreach($tags as $tag)
            {
                $tag->setBar($bar);
                $bar->addTag($tag);
                $this->removeTag($tag);
                $tag->setSemsoftBar(null);
            }
        }

        if($this->getOpenings()){
            $ops = $this->getOpenings();
            foreach($ops as $op)
            {
                $op->setBar($bar);
                $bar->addOpening($op);
                $this->removeOpening($op);
                $op->setSemsoftBar(null);
            }
        }

        return $bar;
    }

    /**
     * Set creditCard
     *
     * @param boolean $creditCard
     * @return SemsoftBar
     */
    public function setCreditCard($creditCard)
    {
        $this->creditCard = $creditCard;

        return $this;
    }

    /**
     * Get creditCard
     *
     * @return boolean 
     */
    public function getCreditCard()
    {
        return $this->creditCard;
    }

    /**
     * Get outDoorSeating
     *
     * @return boolean 
     */
    public function getOutDoorSeating()
    {
        return $this->outDoorSeating;
    }

    /**
     * Get happyHour
     *
     * @return boolean 
     */
    public function getHappyHour()
    {
        return $this->happyHour;
    }

    /**
     * Get wifi
     *
     * @return boolean 
     */
    public function getWifi()
    {
        return $this->wifi;
    }

    /**
     * Get reservation
     *
     * @return boolean 
     */
    public function getReservation()
    {
        return $this->reservation;
    }

    /**
     * Get permanentlyClosed
     *
     * @return boolean 
     */
    public function getPermanentlyClosed()
    {
        return $this->permanentlyClosed;
    }
}
