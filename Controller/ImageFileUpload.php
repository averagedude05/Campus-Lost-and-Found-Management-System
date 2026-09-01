    <?php
    function imageUpload($name){
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["$name"]["name"]);
    $uploadOk = true;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $allowedImageType=["jpg","png"];
    $result=array();
    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["$name"]["tmp_name"]);
    if($check) {
        if(in_array($imageFileType,$allowedImageType)){
        $result=array("msg"=>"Image uploaded","file_path"=>$target_file);
        }
        else{
            $imageUploadMsg="Please upload jpg or png";
            $result=array("msg"=> $imageUploadMsg,"file_path"=>0);
            $uploadOk=false;
        }
    }
    else {
    $result=array("msg"=> "File is not an image.","file_path"=>0);
    $uploadOk = false;
    }
    
    if($uploadOk){
        if(move_uploaded_file($_FILES["$name"]["tmp_name"], $target_file)){
            return $result;
        }
        else{
            $result=array("msg"=>"Image Upload failed","file_path"=>0);
            return $result;
        }
    }
    var_dump($result);
    return $result;

    }
    ?>
