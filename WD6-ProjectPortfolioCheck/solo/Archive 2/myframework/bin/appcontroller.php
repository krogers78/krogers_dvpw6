<?php
  session_start();
  class AppController {
    public function __construct($urlPathParts, $config) {

      // db information
      $dsn = "mysql:dbname=" . $config['dbname'] . ";";
      $user = $config['dbuser'];
      $password = $config['dbpass'];


      $this->db = new PDO($dsn, $user, $password);
      
      $this->urlPathParts = $urlPathParts;

       if ($urlPathParts[0]) {

        include './controllers/' . $urlPathParts[0] . '.php';

        $appcon = new $urlPathParts[0]($this);

        if (isset($urlPathParts[1])) {
          $appcon->$urlPathParts[1]();
        } else {
          $methodVariable = [$appcon, 'index'];
          if (is_callable($methodVariable, false, $callable_name)) {
            $appcon->index($this);
          }
        }
      } else {
        include './controllers/' . $config['defaultController'] . '.php';
        $appcon = new $config['defaultController']($this);

        if (isset($urlPathParts[1])) {
          $appcon->config['defaultController'][1]();
        } else {
          $methodVariable = [$appcon, 'index'];
          if (is_callable($methodVariable, false, $callable_name)) {
            $appcon->index($this);
          }
        }
      }
    }
    public function getView($page, $data=[]) {
      require_once './views/' . $page . '.php';
    }
    public function getModel($page) {
      // add this later
      // get then pass data to that page
      require_once './models/' . $page . '.php';
      $model = new $page($this);
      return $model; 
    }
  }

?>