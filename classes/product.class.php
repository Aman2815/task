<?php


class Product extends DB {

    public function getCategory($id = null){
        if(!isset($id)){
            $stmt = "SELECT ID, category_name FROM product_category where status = 1";
        }else{
            $stmt = "SELECT ID, category_name FROM product_category where status = 1 and ID = $id";
        }
        $result = mysqli_query($this->conn,$stmt);
        $data = mysqli_fetch_all($result,MYSQLI_ASSOC);
        return $data;
    }

    public function getSubCategory($cat_ID = null){
        if($cat_ID == ''){
            $stmt = "SELECT ID,category_ID, sub_category_name FROM product_sub_category where status = 1";
        }else{
            $stmt = "SELECT ID,category_ID, sub_category_name FROM product_sub_category where status = 1 and category_ID = $cat_ID";
        }
        $result = mysqli_query($this->conn,$stmt);
        $data = mysqli_fetch_all($result,MYSQLI_ASSOC);
        return $data;
    }

    public function submitProductData($post,$files){
        $images = array_filter($files['images']['name']);
        $pathArr = array();
        extract($post);
        for($i = 0; $i < count($images); $i++){

            $tmpFilePath = $files['images']['tmp_name'][$i];
            $img_arr = explode(".",$files['images']['name'][$i]);
            if ($tmpFilePath != ""){
                $currentTimeStamp = date('m_d_Y_H_i_s');
                $newFileName = $img_arr[0]."_".$currentTimeStamp.".".$img_arr[1];
                $filePath = "uploadFiles/".$newFileName;
                if(move_uploaded_file($tmpFilePath, "../".$filePath)) {
                    
                   array_push($pathArr,$newFileName);
                }
             }
             
        }
        $stmt = "INSERT INTO product_details (product_name,product_desc,product_cat,product_sub_cat,status) VALUES ('$prod_name','$prod_name',$prod_cat,$prod_sub_cat,1)";
        if(mysqli_query($this->conn,$stmt)){
            $last_inserted_id = mysqli_insert_id($this->conn);
            if($this->uploadImage($pathArr,$last_inserted_id)){
                return true;
            }
        }

    
    }

    public function uploadImage(Array $filepath,$product_id){
        $stmt ="INSERT INTO product_images (product_ID,image_path) VALUES ";
        for($i = 0; $i < count($filepath); $i++){
            $stmt .= " ($product_id,'".$filepath[$i]."') ,";
            
        }
        
        $stmt = rtrim($stmt,' ,');
        echo $stmt;
        if(mysqli_multi_query($this->conn,$stmt)){
            echo "data inserted";
            return true;
        }else{
            echo ''.PHP_EOL;
            echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
        }
         
    }

    public function getProductData($cat = null,$subCat = null){
        $stmt = "SELECT pid.ID,pid.product_name,pid.product_desc,pc.category_name,psc.sub_category_name,GROUP_CONCAT(pim.image_path) as image_path FROM product_details pid
        LEFT JOIN product_images pim ON pid.ID = pim.product_ID
        JOIN product_category pc ON pid.product_cat = pc.ID
        JOIN product_sub_category psc ON pid.product_sub_cat = psc.ID 
        WHERE pid.status = 1";
        if($cat != null){
            $stmt .= " And pid.product_cat = $cat";
        }
        if($subCat != null){
            $stmt .= " And pid.product_sub_cat = $subCat";
        }
        $stmt .=" GROUP BY pid.ID ";
        $result = mysqli_query($this->conn,$stmt);
        $data = mysqli_fetch_all($result,MYSQLI_ASSOC);
        return $data;

    }

    public function deleteProduct(int $pid){
        $stmt = "UPDATE product_details SET status = 2 WHERE ID = $pid";
        if(mysqli_query($this->conn,$stmt)){
            return true;
        }else{
            return false;
        }
    }

    public function getProductDataByID(int $id){
        $stmt = "SELECT pid.ID,pid.product_name,pid.product_desc,pid.product_cat,pid.product_sub_cat,GROUP_CONCAT(pim.image_path,';',pim.ID) as image_path FROM product_details pid
        LEFT JOIN product_images pim on pid.ID = pim.product_ID where pid.ID = $id GROUP BY pid.ID";
        $result = mysqli_query($this->conn,$stmt);
        $data = mysqli_fetch_all($result,MYSQLI_ASSOC);
        return $data;
    }

    public function deleteProductImage($pid,$imageID,$imagePath){
        $stmt = "DELETE FROM product_images WHERE ID = $imageID";
        $result = mysqli_query($this->conn,$stmt);
        if($result){
            unlink($imagePath);
        }
    }

    public function updateProductDetails($post,$files){
        echo '<pre>';
        // print_r($files);
        print_r($post);
        $images = array_filter($files['images']['name']);
        $pathArr = array();
        extract($post);
        for($i = 0; $i < count($images); $i++){

            $tmpFilePath = $files['images']['tmp_name'][$i];
            $img_arr = explode(".",$files['images']['name'][$i]);
            if ($tmpFilePath != ""){
                $currentTimeStamp = date('m_d_Y_H_i_s');
                $newFileName = $img_arr[0]."_".$currentTimeStamp.".".$img_arr[1];
                $filePath = "uploadFiles/".$newFileName;
                if(move_uploaded_file($tmpFilePath, "../".$filePath)) {
                   array_push($pathArr,$newFileName);
                }
            }             
        }
        $stmt = "UPDATE product_details SET product_name='$prod_name',product_desc='$prod_desc',product_cat=$prod_cat,product_sub_cat=$prod_sub_cat WHERE ID = $prod_id";
        // echo $stmt;
        if(mysqli_query($this->conn,$stmt)){
            if($this->uploadImage($pathArr,$prod_id)){
                return true;
            }
        }
    }

}

?>