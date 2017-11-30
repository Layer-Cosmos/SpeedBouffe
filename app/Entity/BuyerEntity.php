<?php
/**
 * Created by PhpStorm.
 * User: Layer
 * Date: 03/11/2017
 * Time: 14:36
 */

namespace App\Entity;


use Core\Entity\Entity;

class BuyerEntity extends Entity
{
    /**
     * @var integer
     */

    public $client_id;
    /**
     * @var string
     */

    public $email;
    /**
     * @param  integer $client_id
     */

    public function __construct($client_id=-1)
    {
        $this->client_id = $client_id;
    }//end __construct()

    public function setProperties($attributes)
    {
        $this->email = $attributes['Email'];
    }//end setProperties()

    public function getClientId()
    {
        return $this->client_id;
    }//end getClientId()

    /**
     * @return string
     */

    public function getEmail()
    {
        return $this->email;
    }//end getEmail()

}