<?php
include 'config.php';
$target_dir="upload/";
$target_file=$target_dir .basename($_FILES["filetoupload"]["name"]);
$uploadOK=1;
$imageFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if(isset($_POST["submit"])){
    $check=getimagesize($_FILES["filetoupload"]["tmp_name"]);
    if($check!= false){
        echo "file is an image -" .$check["mime"]. ".";
        $uploadOK=1;
    } else{
        echo "file is not an image";
        $uploadOK=0;
    }
}
//check if file already exists
if($_FILES["filetoupload"]["size"] > 500000){
    echo "sorry, your file is to large .";
    $uploadOK=0;
}
//allow certain files format=
if($imageFileType != "jpg" && $imageFileType != "png" &&
$imageFileType != "jpeg" && $imageFileType != "gif"){
    echo "sorry only these are allowed";
    $uploadOK=0;

}
//check if $uploadok is set to 0 by any error
if($uploadOK=0){
    echo"sorry, your file was not uploaded.";
}
 else{
    if(move_uploaded_file($_FILES["filetoupload"]["tmp_name"], $target_file)){
        echo "the file" .htmlspecialchars(
            basename($_FILES["filetoupload"]["name"])
        ) . "has been uploaded";
    }
    else{
        echo "sorry, their was an error uploading the file";

    }
}

$file_size=$_FILES['filetoupload']['size'];
$file_type=$_FILES['filetoupload']['type'];
$file_name=$_FILES['filetoupload']['name'];
if(move_uploaded_file($_FILES["filetoupload"]["tmp_name"],$target_file)){
    $sql="INSERT INTO images(id,file,type,size)
    VALUES(null,'$file_name','$file_type','$file_size')";
    mysqli_query($con,$sql);
    ?>
    <script>
        alert('successfully uploaded');
            window.location.href='form.php';
    </script>
    <?php
}else{
    ?>
    <script>
        alert('error while uploading file');
            window.location.href='form.php';
    </script>
    <?php
    
}



?>

<?php


if(isset($_POST['add_product'])){

$product_name = $_POST['product_name'];
$product_price = $_POST['product_price'];
$product_image = $_FILES['product_image']['name'];
$product_image_tmp_name = $_FILES['product_image']['tmp_name'];
$product_image_folder = 'uploaded_img/'.$product_image;

if(empty($product_name) || empty($product_price) || empty($product_image)){
   $message[] = 'please fill out all';
}else{
   $insert = "INSERT INTO products(name, price, image) VALUES('$product_name', '$product_price', '$product_image')";
   $upload = mysqli_query($conn,$insert);
   if($upload){
      move_uploaded_file($product_image_tmp_name, $product_image_folder);
      $message[] = 'new product added successfully';
   }else{
      $message[] = 'could not add the product';
   }
}

};


?>