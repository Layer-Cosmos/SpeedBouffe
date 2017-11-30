<?php
/**
 * Created by PhpStorm.
 * User: Layer
 * Date: 26/10/2017
 * Time: 13:29
 */

namespace Core\Controller;


class Controller
{

    protected $viewPath;
    protected $template;

    public function render($view, $variables = []){
        ob_start();
        extract($variables);
        //var_dump($this->viewPath);
        require($this->viewPath . str_replace('.', '/', $view) . '.php');
        $content = ob_get_clean();
        require('../app/Views/' . 'templates/' . $this->template . '.php');
    }


}