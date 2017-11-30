<?php
/**
 * Created by PhpStorm.
 * User: Layer
 * Date: 03/11/2017
 * Time: 14:40
 */

namespace App\Entity;


use Core\Entity\Entity;

class OrderEntity extends Entity
{
    /**
     * @var integer
     */
    public $id;

    /**
     * @var InformationOrder
     */
    public $info_order;

    /**
     * @var string
     */
    public $meal;

    /**
     * @var string
     */
    public $entre;

    /**
     * @var string
     */
    public $dessert;

    /**
     * @var string
     */
    public $rate;

    /**
     * @var string
     */
    public $gender;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $first_name;

    /**
     * @var integer
     */
    public $age;

    /**
     * @var boolean
     */
    public $treated;

    /**
     * @param InformationOrder $info_order
     * @param string           $meal
     * @param integer          $gender
     * @param string           $name
     * @param string           $first_name
     * @param integer          $age
     * @param string           $rate
     */
    public function __construct($info_order = null, $gender = 0, $name = '', $first_name = '', $age = 0, $rate = '')
    {
        //$this->meal       = $meal;
        $this->gender     = $gender;
        $this->first_name = $first_name;
        $this->name       = $name;
        $this->age        = $age;
        if ($info_order !== null) {
            $this->info_order = clone $info_order;
        } else {
            $this->info_order = null;
        }
    }//end __construct()

    public function setProperties($attributes)
    {
        $this->meal       = $attributes['Repas'];
        $this->entre      = $attributes['Entre'];
        $this->dessert    = $attributes['Dessert'];
        $this->gender     = $attributes['Civilite'];
        $this->rate       = $attributes['Tarif'];
        $this->name       = $attributes['Nom'];
        $this->first_name = $attributes['Prenom'];
        $this->age        = $attributes['Age'];
    }//end setProperties()

    /**
     * @return boolean
     */
    public function isTreated()
    {
        return treated;
    }

    /**
     * @return string
     */
    public function getMeal()
    {
        return $this->meal;
    }//end getMeal()

    /**
     * @return string
     */
    public function getEntre()
    {
        return $this->entre;
    }//end getEntre()

    /**
     * @return string
     */
    public function getDessert()
    {
        return $this->dessert;
    }//end getDessert()

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }//end getName()

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->first_name;
    }//end getFirstName()

    /**
     * @return InformationOrder
     */
    public function getInfoOrder()
    {
        return $this->info_order;
    }//end getInfoOrder()

    /**
     * @return string
     */
    public function getRate()
    {
        return $this->rate;
    }//end getRate()

    /**
     * @return integer
     */
    public function getAge()
    {
        return $this->age;
    }//end getAge()

    /**
     * @return integer
     */
    public function getGender()
    {
        return $this->gender;
    }//end getGender()

}