<?php

class Controller
{
    private $_f3;

    function __construct($_f3)
    {
        $this->_f3 = $_f3;
    }

    /**
     * Home route
     * @return void
     */
    function home()
    {
        $view = new Template();
        echo $view->render('views/home.html');
    }
}

