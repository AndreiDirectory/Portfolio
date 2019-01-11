<?php
  class Pages extends Controller {
    public function __construct(){
     
    }
    
    public function index(){
      $data = [
        'title' => 'UserAuth',
        'description' => 'User authentification system'
      ];
     
      $this->view('pages/index', $data);
    }
  }