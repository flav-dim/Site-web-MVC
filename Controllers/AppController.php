<?php
include_once ('../Config/db.php');

class AppController
{
    protected $model;
    protected $vars = array();
    protected $layout = 'default';

    function __construct(){
        if(isset($_POST)){
            $this->data = $_POST;
        }

        if(isset($this->models)){
            foreach($this->models as $mod){
                $this->loadModel($mod);
            }
        }
    }

    public function loadModel($model){
        //Loads the Database class so that it can be accessed in the controller by using $this->$model.
        require_once('../Models/'.$model.'.php');
        $this->model = new $model();
    }

    public function set($d){
        $this->vars = array_merge($this->vars, $d);
    }
    public function render($file = null){
        //Method calling the view file. In the case where the parameter is null, we load the view file associated to
        //the method. So without parameter, we get Views/<nom_du_controller>/<nom_de_l’action>.html.twig
        extract($this->vars);
        ob_start();
        require ('../Views/'.get_class($this).'/'.$file.'.php');

        $content_for_layout = ob_get_clean();

        if($this->layout == false){
            echo $content_for_layout;
        } else {
            require ('../Views/Layouts/'.$this->layout.'.php');
        }

    }



    public function beforeRender(){

        //Method called right before the call to the view. This is to do some actions before the rendering.
    }

    protected function redirect($param){

        // Redirects a user from a method of the router to another method of the router.
        // $param is an array with the URL of the route.
        // You have to use Dispatcher class.
    }










}

 ?>
