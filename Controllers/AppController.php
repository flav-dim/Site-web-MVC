<?php
include_once ('../Config/db.php');

class AppController
{
    protected $model;
    protected $vars = array();
    protected $layout = 'default';

    public function loadModel($model){
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
        if($file != null){
            if(file_exists('../Views/'.get_class($this).'/'.$file.'.php')){

                require ('../Views/'.get_class($this).'/'.$file.'.php');
            }
        } else {
            AppController::toIndex();
        }

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

    public static function secure_input(&$data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public static function toIndex(){//redirect to index page
        header('Location: '.RACINE.'/Home');
        die;
    }
    public static function toUserManager(){//redirect to index page
        header('Location: '.RACINE.'/Home/Admin/users/');
        die;
    }
    public static function toArticleManager(){
        header('Location: '.RACINE.'/Home/Admin/articles/');
        die;
    }
    public static function toCategoryManager(){
        header('Location: '.RACINE.'/Home/Admin/categories/');
        die;
    }
    public static function toTagManager(){
        header('Location: '.RACINE.'/Home/Admin/tags/');
        die;
    }
    public static function toCommentManager(){
        header('Location: '.RACINE.'/Home/Admin/comments/');
        die;
    }
    public static function toView($id){
        header('Location: '.RACINE.'/Home/Articles/view/'.$id.'/');
        die;
    }
    public static function toUpdateUser($id){
        header('Location: '.RACINE.'/Home/Users/updateUser/'.$id.'/');
        die;
    }
    public static function toAddArticle(){
        header('Location: '.RACINE.'/Home/Admin/newArticle/');
        die;
    }
    public static function toUpdateArticle($id){
        header('Location: '.RACINE.'/Home/Articles/updateArticle/'.$id.'/');
        die;
    }

    public static function toAddCategory(){
        header('Location: '.RACINE.'/Home/Admin/newCategory/');
        die;
    }
    public static function toUpdateCategory($id){
        header('Location: '.RACINE.'/Home/Admin/updateCategory/'.$id.'/');
        die;
    }

    public static function toUpdateTag($id){
        header('Location: '.RACINE.'/Home/Articles/updateTag/'.$id.'/');
        die;
    }
    public static function toAddTag(){
        header('Location: '.RACINE.'/Home/Admin/newTag/');
        die;
    }







}

 ?>
