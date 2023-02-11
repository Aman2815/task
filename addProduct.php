<?php
// include("classes/product.class.php");

// $obj = new Product();
// $data = $obj->getCategory();
// print_r($data);
// $con = $obj->connection();
// $stmt = "SELECT * FROM product_category";
// $result = mysqli_query($con,$stmt);
// $data = mysqli_fetch_all($result,MYSQLI_ASSOC);
// echo '<pre>';
// print_r($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product Details</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css" />
    <link rel="stylesheet" href="Multiple-Uploader.js-main\src\css\main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="Multiple-Uploader.js-main\src\js\multiple-uploader.js"></script>



</head>
<body>
    <div class="container">
        <div class="col-md-12 text-center">
            <h2>Add Product Details</h2>
        </div>
        <div class="row">
            <div class="col-md-12">    
                <form class="form-horizontal" method="POST" action="controller/categoryController.php?function=submitProductData" id="productForm" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-3">
                                <label class="control-label">Product Name :</label>
                                <input type="text" class="form-control" name="prod_name" id="prod_name" required/>
                        </div>
                        <div class="col-md-3">
                                <label class="control-label">Product Desc :</label>
                                <textarea type="text" class="form-control" name="prod_desc" id="prod_desc" required></textarea>
                        </div>
                        <div class="col-md-3">
                                <label class="control-label">Category :</label>
                                <select class="form-control" name="prod_cat" id="prod_cat">

                                </select>
                        </div>
                        <div class="col-md-3">
                            <label class="control-label">Sub Category :</label>
                            <select class="form-control" name="prod_sub_cat" id="prod_sub_cat">
                                
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label class="control-label">Product Images : </label>
                            <div class="multiple-uploader" id="multiple-uploader">
                                <div class="mup-msg">
                                    <span class="mup-main-msg">click to upload images.</span>
                                    <span class="mup-msg" id="max-upload-number">Upload up to 10 images</span>
                                    <span class="mup-msg">Only images are allowed for upload</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 pull-right">
                            <button class="btn btn-primary pull-right" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<script src="js/main.js"></script>
<script>

    // Fetch Category List
   

    $(document).ready(function(e){
        e.preventDefault;
        getCategoryDetails();
        getSubCategoryDetails();
    });

    $(document).on("change","#prod_cat",function(){
        cat_id = $(this).val();
        // console.log("cat_id",cat_id);
        getSubCategoryDetails(cat_id);
    });
    let multipleUploader = new MultipleUploader('#multiple-uploader').init({
        // input name sent to backend
        filesInpName:'images', 
        // form selector
        formSelector: '#productForm', 
        maxUpload : 5,
        
    });
    multipleUploader.clear();
    $("#productForm").on("submit",function(e){
        e.preventDefault;
        $.ajax({
            url:"controller/categoryController.php?function=submitProductData",
            type:"POST",
            data:$(this).serialize(),
            contentType: false,
            processData: false,
            success:function(res){
                console.log(res);
            }
        })
        
    });
    // $("#submitBtn").on("click",function(e){
    //     e.preventDefault();
    //     $("#productForm").submit();
    // })
</script>
</body>
</html>