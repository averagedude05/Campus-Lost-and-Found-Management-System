<?php

require "dbConnection.php";

function insertNewFoundItem($user_id, $category_id, $date_found, $location, $description,$image,$name)
{
    global $conn;

    $sql = "insert into found_item (user_id, category_id, date_found, location, description,image_url,item_name) values (?, ?, ?, ?, ?,?,?)";

    if ($stmt = $conn->prepare($sql)) {

        $stmt->bind_param(
            "iisssss",$user_id,$category_id,$date_found,$location,$description,$image,$name);

        if ($stmt->execute()) {
            //echo "New record created successfully";
             header("Location: ../Controller/Found Item Dashboard Contoller.php");

           
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
       
        exit();

    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
function getUserId(){
    global $conn;
    $sql= "select user_id from Users where user_id=".$_SESSION['user_id'];
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        $row=mysqli_fetch_assoc($result);
        return $row['user_id'];
    }
    else echo "unsuccessful";
}
function getAllCategories(){
    global $conn;
    $sql="select * from category";
    $result=mysqli_query($conn, $sql);
    $rows=array();
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
            $rows[]=$row;
        }
       
        return $rows;
    }
    else{
        echo "Problem occured";
        
    }
}
function insertNewLostItem($user_id, $category_id, $description, $date_lost, $location, $image_url,$name){
   global $conn;
    $sql = "insert into lost_item (user_id, category_id, description, date_lost, location, image_url, item_name)
            values (?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {

        $stmt->bind_param(
            "iisssss",
            $user_id,
            $category_id,
            $description,
            $date_lost,
            $location,
            $image_url,
            $name
        );

        if ($stmt->execute()) {
            header("Location: ../Controller/Found Item Dashboard Contoller.php");
            exit();

        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();

    } else {
        echo "Error: " . $conn->error;
    }

}
function getAllReports($userId){
    global $conn;
    $sql="select f.found_id,f.item_name,c.category_id,c.category_name,f.date_found,f.status
    from found_item f join category c on f.category_id=c.category_id
    where user_id=".$userId."
    order by f.found_id desc";
    $rows=array();
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
            $rows[]=$row;
        }
        return $rows;
    }
    else{
        return array();

    }
}
function getAllClaims($userId){
     global $conn;
    $sql="select l.lost_id,l.item_name,c.category_id,c.category_name,l.date_lost,l.status
    from lost_item l join category c on l.category_id=c.category_id
    where user_id=".$userId."
    order by l.lost_id desc";
    $rows=array();
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
            $rows[]=$row;
        }
        return $rows;
    }
    else{
        return array();

    }
}
function getDetails($id){
    $sql="select * from found_item where found_id=".$id;
    global $conn;
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        return $result=mysqli_fetch_assoc($result);
    } 
    else{
        echo "error";
    }

}

function getLostItemDetails($id){
    global $conn;

    $sql = "select * from lost_item where lost_id=".$id;

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)>0){
        return mysqli_fetch_assoc($result);
    }
    else{
        echo "error";
    }
}

function getSelectedCategory($category_id){
    $sql="select category_name from category where category_id=".$category_id;
    global $conn;
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        return $result=mysqli_fetch_assoc($result);
    }
}

function updateRequest($user_id, $category_id, $description, $date_found, $location, $image_url, $name, $found_id){
    global $conn;

    $sql = "update found_item set user_id=?, category_id=?, description=?, date_found=?, location=?, image_url=?, item_name=? where found_id=".$found_id;

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param(
            "iisssss",
            $user_id,
            $category_id,
            $description,
            $date_found,
            $location,
            $image_url,
            $name
        );

        if ($stmt->execute()) {
            header("Location: ../Controller/Found Item Dashboard Contoller.php");
            exit();

        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();

    } else {
        echo "Error: " . $conn->error;
    }
}

