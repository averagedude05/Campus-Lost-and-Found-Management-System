<?php 
function reoloadCategory($category,$result){
    foreach($result as $row){
        if($row['category_id']==$category){
            return $row;
        }
    }
}
?>