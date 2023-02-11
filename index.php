<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/main.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css" />
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'></link>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="container">
        <div class="col-md-12 text-center">
            <h2 class="text-center">Product List</h2>
        </div>
        <div class="row">
            <div class="col-md-12 pull-right">
                <a href="addProduct.php"  class="btn btn-info pull-right">Add Product</a>
            </div>
            <div class="col-md-12">
                <div class="col-md-4 pull-right">
                    <label class="control-label">Select Sub Category</label>
                    <select id="prod_sub_cat" name="prod_sub_cat" class="form-control"></select>
                </div>
                <div class="col-md-4 pull-right">
                    <label class="control-label">Select Category</label>
                    <select id="prod_cat" name="prod_cat" class="form-control"></select>
                </div>
            </div>
            <div class="col-md-12" style="margin-top:10px">
                <table class="display table-bordered" id="product_table" style="width:100%">
                    <thead>
                        <tr>
                            <th>Product ID</th>
                            <th>Product Name</th>
                            <th>Product Desc</th>
                            <th>Product Cat</th>
                            <th>Product Sub Cat</th>
                            <th>Image Path</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
<script type="text/javascript" src="js/main.js"></script>
<script>
    let cat;
    let subCat;
    $(document).ready(function(e){
        e.preventDefault;
        getCategoryDetails();
        getSubCategoryDetails();        
    });
   
        var table = $("#product_table").DataTable({
            processing:true,
            serverside:true,
            ajax:{
                url:'controller/categoryController.php?function=getProductList',
                type:'POST',
                data:function(d){
                    // console.log(cat);
                    d.cat = cat;
                    d.subCat = subCat;
                }
                
            },
            dom: 'Blfrtip',
            columns:[
                {data:'ID'},
                {data:'product_name'},
                {data:'product_desc'},
                {data:'category_name'},
                {data:'sub_category_name'},
                {data:'image_path'},
                {data:'ID'}
                
            ],
            columnDefs: [
            {
                targets: 6,
                render: function(data, type, full, meta){
                        // console.log(data);
                        data = '<a class="btn btn-info" style="margin:10px;" href="updateProductData.php?id='+data+'">Edit</a>'
                        +'<button class="btn btn-danger deleteProduct" data-pid='+data+'>Delete</button>';                     
                    
                    
                    return data;
                }
            
            },
            {
                targets:5,
                render:function(data,type,full,meta){
                    // console.log(data);
                    if(data != null){
                        var imgArr = data.split(",");
                        var img ="";
                        imgArr.forEach(function(el){
                            img += '<img class="img-responsive" style="margin:10px;" width="100" height="100" src="uploadFiles/'+el+'" >';
                            console.log(img);
                        });
                        // console.log(img);
                        data = img;
                    }
                    return data;
                },
            }
            ]
        });
    $(document).on("change","#prod_cat",function(){
        cat = $(this).val();
        subCat='';
        getSubCategoryDetails(cat);
        table.ajax.reload(null,true);
    });
    $(document).on("change","#prod_sub_cat",function(){
        subCat = $(this).val();
        table.ajax.reload(null,true);
    });
    $(document).on("click",".deleteProduct",function(e){
        e.preventDefault();
        var id = $(this).attr('data-pid');
        $.ajax({
            url:'controller/categoryController.php?function=deleteProduct',
            type:'POST',
            data:{"pid":id},
            success:function(res){
                // console.log(res);
                if(res == "true"){
                    console.log("res is true");
                    Swal.fire({
                        icon: 'success',
                        text: 'Record successfully deleted',
                        });
                }else{
                    Swal.fire({
                        icon: 'error',
                        text: 'Something went wrong!',
                        });
                }
                table.ajax.reload(null,true);

            }
        })
    });
</script>
</body>
</html>