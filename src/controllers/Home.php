<?php 
    class Home extends Controller{
        function SayHi()
        {
        echo "hello ";
        }

        function Search($s){
            echo "Search: ".$s;
        }

        function Menu(){
            $menu = $this->Model("MenuModel");
            echo $menu->get();
        }

    }
?>