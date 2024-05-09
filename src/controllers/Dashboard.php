<?php 
    class Dashboard extends Controller{
        
        protected $subController="index";
        protected $action="Hello";
        protected $params=[];

        function Ingredient(...$data){
            $this->subController = "Ingredient";
            
            if(file_exists("./src/controllers/SubDashboard/".$this->subController.".php")){
                require_once "./src/controllers/SubDashboard/".$this->subController.".php";
            }
            // Xy ly action
            if(isset($data[0])){
                if(method_exists($this->subController,$data[0])){
                    $this->action = $data[0];
                }else{
                    // Controller không tồn tại, hiển thị trang lỗi 404 hoặc thông báo lỗi
                    header("HTTP/1.0 404 Not Found");
                    require_once "./public/html/404.html";
                    exit;
                }
            }
            unset($data[0]);
            $this->params = array_values($data);

            //CALL FUNCTION
            call_user_func_array(
                [new $this->subController,$this->action]
                ,$this->params);
        }

    }
?>