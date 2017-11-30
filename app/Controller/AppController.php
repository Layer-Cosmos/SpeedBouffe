<?php
/**
 * Created by PhpStorm.
 * User: Layer
 * Date: 26/10/2017
 * Time: 13:32
 */

namespace App\Controller;

use Core\Controller\Controller;

class AppController extends Controller{

    protected $template = 'default';

    public function __construct(){
        $this->viewPath = '../app/Views/';
    }

}
