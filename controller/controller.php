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

    /**
     * plan route
     * @return void
     */
    function plan()
    {
        if(is_null($_GET['plan_id'])) {
            $new_id = bin2hex(random_bytes(3));
            header("Location: https://tsagun.greenriverdev.com/advise_it/planning?plan_id=$new_id");
            die();
        }
        $plan_id = $_GET['plan_id'];
        $GLOBALS['dataLayer']->createPlan($plan_id);
        $this->_f3->set('plan_id', $plan_id);
        $_GET['plan_id'] = $plan_id;
        $view = new Template();
        echo $view->render('views/planning.php');
    }
}

