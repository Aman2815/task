
function getCategoryDetails(){
    var category = '';
    $.ajax({
        url:"controller/categoryController.php?function=getCategoryDetails",
        type:"GET",
        async:false,
        dataType:"JSON",
        success:function(res){
            for(var i = 0; i < res.length; i++){
                category += '<option value="'+res[i]['ID']+'">'+res[i]['category_name']+'</option>';
            }
            $("#prod_cat").empty().append(category);
        }
       
    });
}

function getSubCategoryDetails(cat_id = null){
    var category = '';
    $.ajax({
        url:"controller/categoryController.php?function=getSubCategoryDetails",
        async:false,
        type:"GET",
        data:{'cat_id':cat_id},
        dataType:"JSON",
        success:function(res){
            for(var i = 0; i < res.length; i++){
                category += '<option value="'+res[i]['ID']+'">'+res[i]['sub_category_name']+'</option>';
            }
            $("#prod_sub_cat").empty().append(category);
        }
       
    });
}

function deleteImage(id,pid,imagePath){
    $.ajax({
        url:"controller/categoryController.php?function=deleteProductImage",
        async:false,
        type:"POST",
        data:{'pid':pid,'imageId':id,'imagePath':imagePath},
        dataType:'JSON',
        success:function(res){
            window.location.reload();
        }
    });
}

function getProductDataByID(pid){        
    $("#preUpload").empty();
    $.ajax({
        url:"controller/categoryController.php?function=getProductData",
        type:"POST",
        data:{'id':pid},
        dataType:'JSON',
        success:function(res){
            var image_path = res[0]['image_path'];
            $("#prod_name").val(res[0]['product_name']);
            $("#prod_desc").val(res[0]['product_desc']);
            $("#prod_cat").val(res[0]['product_cat']);
            $("#prod_sub_cat").val(res[0]['product_sub_cat']);
            images = image_path.split(",");
            div ="<div>";
            images.forEach(function(el){
                var imDetails = el.split(";");
                // console.log(imDetails);
                div += "<div class='img_class'><img class='preUploadedImages'  width='100' height='100' style='margin:10px' src='uploadFiles/"+imDetails[0]+"'/><div class='deleteImage' data-id='"+imDetails[1]+"' data-imagePath='uploadFiles/"+imDetails[0]+"' data-pid='"+pid+"'>Delete</div></div>";
            });
            div += "</div>";
            
            
            $("#preUpload").append(div);
        }
    });

    
}
