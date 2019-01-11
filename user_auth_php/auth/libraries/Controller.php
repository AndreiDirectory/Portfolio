<?php

  class Controller {
    // Model
    public function model($model){
      require_once '../auth/models/' . $model . '.php';
      return new $model();
    }
    // View
    public function view($view, $data = []){
      if(file_exists('../auth/views/' . $view . '.php')){
        require_once '../auth/views/' . $view . '.php';
      } else {
        die('View not available');
      }
    }
  }