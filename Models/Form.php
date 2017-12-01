<?php

class Form{

  private $data;

  public function __construct($data = array()){
    $this->data = $data;
  }

  public static function input_text($a){
        echo '
        <div class="input-field col s12 m6">
            <input type="text" name="'.$a.'" id="'.$a.'"/>
            <label for="'.$a.'">'.ucfirst($a).'</label>
        </div>';
  }
  public static function input_textarea($a){
        echo '
        <div class="input-field col s12 m6">
            <textarea name="'.$a.'" id="'.$a.'" class="materialize-textarea"></textarea>
            <label for="'.$a.'">'.ucfirst($a).'</label>
        </div>';
  }

  public static function input_button($a){
    echo '<div class="input-field col s12 m6"> <button type="submit" name="'.$a.'"</button> </div>';
  }

  public static function input_password($a){
    echo '<div class="input-field col s12 m6">
    <input type="password" name="'.$a.'" id="'.$a.'"/>
    <label for="'.$a.'">'.ucfirst($a).'</label>
    </div>';
  }

  public static function submit(){
    echo '<div class="input-field col s12 m6"> <p> <button type="submit" name="Submit">Submit</button></p> </div>';

  }

  public static function hidden($a){
    echo '<input type="hidden" name="'.$a.'"/>';
  }



}



?>
