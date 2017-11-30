<?php

/**
 * Created by PhpStorm.
 * User: Layer
 * Date: 30/11/2017
 * Time: 14:24
 */

namespace App\Controller;

use App\App;
use App\Entity\OrderEntity;

class StatsController extends AppController
{

    public function index(){

        $nb_mealMale = App::getInstance()->getTable('order')->getNbOrdersMalePerMeal();
        $nb_mealFemale = App::getInstance()->getTable('order')->getNbOrdersFemalePerMeal();
        $nb_agePerMeal18 = App::getInstance()->getTable('order')->getNbOrdersAgePerMeal(18, 18);
        $nb_agePerMeal1825 = App::getInstance()->getTable('order')->getNbOrdersAgePerMeal(18, 25);
        $nb_agePerMeal2539 = App::getInstance()->getTable('order')->getNbOrdersAgePerMeal(25, 39);
        $nb_agePerMeal4054 = App::getInstance()->getTable('order')->getNbOrdersAgePerMeal(40, 54);
        $nb_agePerMeal55 = App::getInstance()->getTable('order')->getNbOrdersAgePerMeal(55, 100);
        $nb_orderPerMeals = App::getInstance()->getTable('order')->getNbOrdersPerMeal();
        $nb_mealPerDeliveryTimes = App::getInstance()->getTable('order')->getNbMealPerDeliveryTime();
        $nb_mealPerBuyers = App::getInstance()->getTable('order')->getNbMealsPerBuyer();
        //$nb_entrePerMeals = App::getInstance()->getTable('order')->getMealsEntre();
        //$nb_dessertPerMeals = App::getInstance()->getTable('order')->getMealsDessert();
        $this->render('posts.stats', compact('nb_mealMale', 'nb_mealFemale', 'nb_agePerMeal18', 'nb_agePerMeal1825', 'nb_agePerMeal2539', 'nb_agePerMeal4054', 'nb_agePerMeal55', 'nb_orderPerMeals', 'nb_mealPerDeliveryTimes', 'nb_mealPerBuyers', 'nb_entrePerMeals', 'nb_dessertPerMeals'));

    }

}