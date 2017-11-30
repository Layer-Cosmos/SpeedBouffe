<?php
/**
 * Created by PhpStorm.
 * User: Layer
 * Date: 03/11/2017
 * Time: 14:37
 */

namespace App\Entity;


use Core\Entity\Entity;

class ClientEntity extends Entity
{
    /**
     * @var integer
     */
    public $id;

    /**
     * @var string
     */
    public $name;

    /**
     * @var integer
     */
    public $gender;

    /**
     * @var string
     */
    public $first_name;

    /**
     * @var integer
     */
    public $age;

    private function setGender($gender)
    {
        switch ($gender) {
            case 'Monsieur':
                $this->gender = 0;
                break;
            case 'Madame':
                $this->gender = 1;
                break;
            case 'Mademoiselle':
                $this->gender = 2;
                break;
        }
    }//end setGender()

    public function __construct($name='', $gender=0, $first_name='', $age=0)
    {
        $this->id         = 0;
        $this->name       = $name;
        $this->gender     = $gender;
        $this->first_name = $first_name;
        $this->age        = $age;
        if (is_string($gender) === true) {
            $this->setGender($gender);
        }
    }//end __construct()

    /**
     * @param mixed[] $attributes
     */
    public function setProperties($attributes)
    {
        $this->name       = $attributes['Nom'];
        $this->first_name = $attributes['Prenom'];
        $this->age        = $attributes['Age'];
        $this->setGender($attributes['Civilite']);
    }//end setProperties()

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }//end getId()

    public function setId($id)
    {
        return $this->id = $id;
    }//end setId()

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