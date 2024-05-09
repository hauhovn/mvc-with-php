<?php 
class IngredientModel extends DB{

    public function get($params){
        //set default
        $filter="";$limit = 5;print_r($params);
        
        //set filter
        if(isset($params['filter'])){
            switch($params['filter']){
                case "new":
                    $filter="ORDER by created_at DESC";
                break;
            }
        }
        //set limit
        if(isset($params['limit'])){
            $limit=$params['limit'];
        }

        //sql
        $data = array();
        $query = "SELECT * FROM ingredients ".$filter." LIMIT ".$limit;
        echo $query;
        $result = mysqli_query( $this->conn, $query );
        if($result){
            while ($row = $result->fetch_assoc())
            {
                $data['id'] = $row['id'] ;  
                $data['name'] = $row['name'] ;  
                $data['price'] = $row['price'] ;  
                $data['unit'] = $row['unit'] ;  
                $data['created_at'] = $row['created_at'] ;  
            }
        }

        return $data;
    }
}
?>