<?php
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
// echo getcwd();
require("../autoload.php");
$obj = new Product();
$case = $_GET['function'];

switch($case){
    case 'getCategoryDetails':
        $data = $obj->getCategory();
        echo json_encode($data);
        break;
    case 'getSubCategoryDetails':
        $catID = $_GET['cat_id'];
        $data = $obj->getSubCategory($catID);
        echo json_encode($data);
        break;
    case 'submitProductData':
        $data = $obj->submitProductData($_POST,$_FILES);
        header("location:../index.php");
        break;
    case 'getProductList':        
        $cat = $_POST['cat'];
        $subCat = $_POST['subCat'];
        $data = $obj->getProductData($cat,$subCat);
        
        $output = array(
            'draw' => intval($_POST['draw']),
            'recordsFiltered' => 0,
            'recordsTotal' => count($data),
            'data' => $data
        );
        echo json_encode($output);
        break;
    case 'deleteProduct':
        $data = $obj->deleteProduct($_POST['pid']);
        echo json_encode($data);
        break;
    case 'getProductData':
        $data = $obj->getProductDataByID($_POST['id']);
        echo json_encode($data);
        break;
    case 'deleteProductImage' :
        $pid = $_POST['pid'];
        $imageID =$_POST['imageId'];
        $imagePath = $_POST['imagePath'];
        $data = $obj->deleteProductImage($pid,$imageID,$imagePath);
        break;
    case 'updateProductData':
        $data = $obj->updateProductDetails($_POST,$_FILES);
        header("location:../index.php");
        break;

    default;
        break;
}

?>