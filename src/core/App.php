<?php
class App
{

    protected $controller="Home";
    protected $action="SayHi";
    protected $method;
    protected $params=[];


    function __construct()
    {
        $url = $this->UrlProcess();

        // Xu ly Controller
        if(file_exists("./src/controllers/".$url[0].".php")){
            $this->controller=$url[0];
            unset($url[0]);
        }
        require_once "./src/controllers/".$this->controller.".php";

        // Xu ly Action
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->action=$url[1];
            }
            unset($url[1]);
        }

        // Xu ly Params
        $this->params=$url?array_values($url):[];

        echo "control=".$this->controller."</br>  action=".$this->action." </br> ";
        print_r($this->params);

        // Goi
        call_user_func_array(array($this->controller, $this->action), $this->params);

    }

    function UrlProcess()
    {
        if (isset($_GET['url'])) {
            //Xu ly chuoi
            $trimUrl = trim($_GET['url']);
            $vardUrl = filter_var($trimUrl, FILTER_VALIDATE_DOMAIN);
            // Cat chuoi
            return explode("/", $vardUrl);
            
        }
    }
}
?>