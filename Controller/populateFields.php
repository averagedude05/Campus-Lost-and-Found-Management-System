<?php 
function populateFields($result){
    foreach($result as $i){
        print("<option value=".$i['category_id'].">".$i['category_name']."</option>");

}
}
?>