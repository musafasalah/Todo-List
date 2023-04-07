<?php 
namespace Request;
class Request {

    public function get($key=null){

        return ($key!=null) ? (isset($_GET[$key]) ?$_GET[$key] : null): null;

    }
    public function hasGet($key){

        return isset($_GET[$key]);
     }

    public function post($key=null){

        return ($key!=null) ? (isset($_POST[$key]) ?$_POST[$key] : null): null;
        return $_POST[$key];

    }

    public function HasPost($key){

       return isset($_POST[$key]);
    }

    public function clean($key){
        
        return trim(htmlspecialchars($_POST[$key]));
    }

    
    public function header($file){
        
        return header("location:$file");
    }
}


?>