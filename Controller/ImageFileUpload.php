    <?php
    function imageUpload($name){
    $target_dir = "uploads/";
    //$target_file = $target_dir . basename($_FILES["$name"]["name"]);
    $uploadOk = true;
    $imageFileType =$_FILES["$name"]["type"]; 
    $allowedImageType=["image/jpeg", "image/png"];
    $result=array();
    //original filename of the uploaded file
    $fileName=$_FILES["$name"]["name"];
    $basePath=$_FILES["$name"]["tmp_name"];
    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["$name"]["tmp_name"]);
    if($check) {
        if(in_array($imageFileType,$allowedImageType)){
        $result=array("msg"=>"Image uploaded","file_path"=>$target_dir.$fileName);
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
        if(move_uploaded_file($basePath,$target_dir.$fileName)){
            return $result;
        }
        else{
            $result=array("msg"=>"Image Upload failed","file_path"=>0);
            return $result;
        }
    }
    return $result;

    }
    ?>
