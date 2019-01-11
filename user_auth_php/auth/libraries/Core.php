<?php

  
  class Core {
    protected $presentController = 'Pages';
    protected $presentMethod = 'index';
    protected $parameters = [];

    public function __construct(){

      $url = $this->getUrl();

      // First part url

      if(file_exists('../auth/controllers/' . ucwords($url[0]). '.php')){
        // Set as controller
        $this->presentController = ucwords($url[0]);
        unset($url[0]);
      }

      require_once '../auth/controllers/'. $this->presentController . '.php';

      $this->presentController = new $this->presentController;



      // Second part url and check method in controller

      if(isset($url[1])){
        if(method_exists($this->presentController, $url[1])){
          $this->presentMethod = $url[1];
          unset($url[1]);
        }
      }

      //Parameters
      $this->parameters = $url ? array_values($url) : [];

      // Callback with array of parameters
      call_user_func_array([$this->presentController, $this->presentMethod], $this->parameters);
    }

    public function getUrl(){
      if(isset($_GET['url'])){
        $url = rtrim($_GET['url'], '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode('/', $url);
        return $url;
      }
    }
  } 
  
  