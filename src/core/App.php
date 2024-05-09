<?php
class App
{

    protected $controller = "Home";
    protected $action = "SayHi";
    protected $method;
    protected $params = [];


    function __construct()
    {
        $url="";
        if(isset($_GET['url'])){
            $url = $this->UrlProcess($_GET['url']);
        }

        // Xu ly Controller
        if (isset($url[0])) {
            if (file_exists("./src/controllers/" . $url[0] . ".php")) {
                $this->controller = $url[0];
            }
            unset($url[0]);
        }
        require_once "./src/controllers/" . $this->controller . ".php";

        // Xu ly Action
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->action = $url[1];
            }else{
                 // Controller không tồn tại, hiển thị trang lỗi 404 hoặc thông báo lỗi
                    header("HTTP/1.0 404 Not Found");
                    require_once "./public/html/404.html";
                    exit;
            }
            unset($url[1]);
        }

        // Xu ly Params
        $this->params = $url ? array_values($url) : [];

        // LOGs
        // echo "controller=".$this->controller."</br>action=".$this->action."</br>params=";
        // print_r($this->params);

        // Call func goi Controller-A vs Params
        call_user_func_array([new $this->controller, $this->action], $this->params);
    }

    function UrlProcess($url)
    {
            //Xu ly chuoi
            $trimUrl = trim($url);
            $vardUrl = filter_var($trimUrl, FILTER_VALIDATE_DOMAIN);
            // Cat chuoi
            return explode("/", $vardUrl);
    }
}
?>