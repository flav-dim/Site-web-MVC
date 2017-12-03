<?php
// include_once ('AppController.php');
//SINGLETON
class Admin extends AppController
{

    private static $_instance = null;

    private function __construct() {
    }

    public static function getInstance() {

      if(is_null(self::$_instance)) {
        self::$_instance = new Admin();
      }

      return self::$_instance;
    }

    function index(){
        $this->render('admin');//inclu les info dans indx
    }
    function users(){
        $d = array();
        $this->loadModel('User');
        $d['users'] = User::getAll();
        $this->set($d);
        $this->render('users');//inclu les info dans indx
    }
    function articles(){
        $d = array();
        $this->loadModel('Article');
        $this->loadModel('Category');
        $d['articles'] = Article::getAll();
        $d['categories'] = Category::getAll();
        $this->set($d);
        $this->render('articles');//inclu les info dans indx
    }
    function categories(){
        $d = array();
        $this->loadModel('Category');
        $d['categories'] = Category::getAll();
        $this->set($d);
        $this->render('categories');//inclu les info dans indx
    }
    function tags(){
        $d = array();
        $this->loadModel('Tag');
        $d['tags'] = Tag::getAll();
        $this->set($d);
        $this->render('tags');//inclu les info dans indx
    }
    function comments(){
        $d = array();
        $this->loadModel('Comment');
        $d['comments'] = Comment::getAll();
        $this->set($d);
        $this->render('comments');//inclu les info dans indx
    }

    function view(){
        $this->render('view');
    }
    function newUser(){
        $this->render('inscription');
    }

    function newArticle(){
        $this->loadModel('Category');
        $d['categories'] = Category::getAll();
        $this->loadModel('Tag');
        $d['tags'] = Tag::getAll();
        $this->set($d);
        $this->render('add_article');
    }
    function updateArticle(){
        $this->loadModel('Category');
        $d['categories'] = Category::getAll();
        $this->set($d);
        $this->render('add_article');
    }

    function newCategory(){
        $this->render('add_category');
    }
    function newTag(){
        $this->render('add_tag');
    }

    // function updateCat(){
    //     $this->render('updateCategory');
    // }

    function updateCategory($id){
        $this->loadModel('Category');
        $d['category'] = Category::get($id);
        $this->set($d);
        $this->render('updateCategory');
    }

    function desactivate($id){
        $this->loadModel('User');
        $banned = User::isBanned($id) ? false : true;
        if(User::updateOne('status', $banned, $id)){
            if($banned){
                setFlashMessage('User desactivated');
            } else {
                setFlashMessage('User reactivated');
            }
            AppController::toUserManager();
        } else {
            setFlashMessage('Can\'t desactivate');
        }
        $this->render('users');

    }

    public static function isUserConnected(){//return true if user is connected
        return isset($_SESSION['user']);
    }

    public static function userSecurity(){
        if(!Admin::isUserConnected() ){
            toLogin();
        }
    }

    public static function isUserAdmin(){
        return Admin::isUserConnected() && $_SESSION['user']['user_group'] == 2 ;// return if user is admin
    }
    public static function isUserWriter(){
        return Admin::isUserConnected() && ($_SESSION['user']['user_group'] == 1 || $_SESSION['user']['user_group'] == 2) ;// return if user is admin or writer
    }

    public static function adminSecurity(){
        if(!Admin::isUserAdmin() ){
            AppController::toIndex();//if not admin go to index
        }
    }
    public static function writerSecurity(){
        if(!Admin::isUserWriter() ){
            AppController::toIndex();//if not writer go to index
        }
    }





}

 ?>
