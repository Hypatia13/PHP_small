<?php

class Model
{
    public $message;

    public function __construct(){
        $this->message = "Hello, world!";
    }

}

class View
{
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function showText() {
        return '<p><a href="mine.php?action=clickText">' . $this->model->message . '</a></p>';
    }
}

class Controller
{
    private $model;

    public function __construct($model){
        $this->model = $model;
    }

    public function clickText() {
        $this->model->message = "Updated Hello World";
    }
}

$model = new Model;
$controller = new Controller($model);
$view = new View($model);

if (isset($_GET['action'])) {$controller->{$_GET['action']}();}

echo $view->showText();

//Reference: https://www.sitepoint.com/the-mvc-pattern-and-php-1/
?>

