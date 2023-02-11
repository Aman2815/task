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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                <form class="form-horizontal" method="POST" action="controller/categoryController.php?function=updateProductData" id="productForm" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-3">
                                <label class="control-label">Product Name :</label>
                                <input type="hidden" value="<?php echo $_GET['id'];?>" id="prod_id" name="prod_id"/>
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
                        <div class="col-md-12">
                            <label class="control-label">Preuploaded Images :</label>
                            <div id="preUpload" data-id="1">
                            
                            </div>
                        </div>
                        <div class="col-md-12 pull-right" style="margin-top:10px;">
                            <button class="btn btn-primary pull-right" type="submit">Update</button>
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
        
        getCategoryDetails();
        getSubCategoryDetails();
        var pid = '<?php echo $_GET['id']?>';
        getProductDataByID(pid)

    });
    
    $(document).on("change","#prod_cat",function(){
        cat_id = $(this).val();
        getSubCategoryDetails(cat_id);
    });

    let multipleUploader = new MultipleUploader('#multiple-uploader').init({
        filesInpName:'images', 
        formSelector: '#productForm', 
        maxUpload : 5,
        
        
    });
    multipleUploader.clear();
    $(document).on("click",".deleteImage",function(e){
        var pid = $(this).attr('data-pid');
        var imageID = $(this).attr('data-id');
        var imagePath = $(this).attr('data-imagePath');
        deleteImage(imageID,pid,imagePath);
        getProductDataByID(pid)
    });
  
</script>
</body>
</html>