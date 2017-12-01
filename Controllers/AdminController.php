<?php
// include_once ('AppController.php');
//SINGLETON
class Admin extends AppController
{

    public function __construct() { }
    //method articles

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

    function view(){
        $this->render('view');
    }
    function newUser(){
        $this->render('inscription');
    }
    function newArticle(){
        $this->loadModel('Category');
        $d['categories'] = Category::getAll();
        $this->set($d);
        $this->render('add_article');
    }

    function newCategory(){
        $this->render('add_category');
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
            toUserManager();
        } else {
            setFlashMessage('Can\'t desactivate');
        }
        $this->render('users');

    }






}

 ?>
