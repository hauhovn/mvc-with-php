<?php 
    class Ingredient extends Controller{
        
        function Select(){
            // Call models
            $ingredients = $this->Model("IngredientModel");

            // Call views
            $this->View("dashboard-layout",[
                "title"=>"Nguyên liệu",
                "page"=>"ingredients",
                "ingredients"=>$ingredients->get()
            ]);
        }

    }
?>