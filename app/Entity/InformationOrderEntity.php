<?php
/**
 * Created by PhpStorm.
 * User: Layer
 * Date: 03/11/2017
 * Time: 14:38
 */

namespace App\Entity;


use Core\Entity\Entity;

class InformationOrderEntity extends Entity
{
    /**
     * @var boolean
     */
    public $cash;

    /**
     * @var string
     */
    public $day;

    /**
     * @var string
     */
    public $time;

    private function setCash($cash)
    {
        switch ($cash) {
            case 'Non':
                $this->cash = false;
                break;
            case 'Oui':
                $this->cash = true;
                break;
        }
    }//end setCash()

    /**
     * @param boolean $cash
     * @param string  $day
     * @param string  $time
     */
    public function __construct($cash = true, $day = '', $time = '')
    {
        $this->cash = $cash;
        $this->day  = $day;
        $this->time = $time;
    }//end __construct()

    public function setProperties($attributes)
    {
        $this->setCash($attributes['Paiement_espece']);
        $this->day  = $attributes['Jour'];
        $this->time = $attributes['Horaire_livraison'];
    }//end setProperties()

    /**
     * @return string
     */
    public function getTime()
    {
        return $this->time;
    }//end getTime()

    /**
     * @return string
     */
    public function getDay()
    {
        return $this->day;
    }//end getDay()

    /**
     * @return boolean
     */
    public function getCash()
    {
        return $this->cash;
    }//end getCash()

}