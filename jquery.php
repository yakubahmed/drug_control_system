<?php 

include('includes/config.php');

if(isset($_POST['delete_cat'])){
    $id = $_POST['delete_cat'];
    $stmt = "DELETE FROM tbl_drug_cat WHERE cat_id = '$id'";
    $result = mysqli_query($con, $stmt);
    if($result){
        echo "deleted";
    }else{
        echo "failed";
    }
}

if(isset($_POST['delete_manu'])){
    $id = $_POST['delete_manu'];
    $stmt = "DELETE FROM tbl_manufacturer WHERE manu_id = '$id'";
    $result = mysqli_query($con, $stmt);
    if($result){
        echo "deleted";
    }else{
        echo "failed";
    }
}

if(isset($_POST['delete_drug'])){
    $id = $_POST['delete_drug'];
    $stmt = "DELETE FROM tbl_drug WHERE drug_id = '$id'";
    $result = mysqli_query($con, $stmt);
    if($result){
        echo "deleted";
    }else{
        echo "failed";
    }
}

?>