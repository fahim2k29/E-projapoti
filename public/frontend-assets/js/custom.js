// Developed by Smart Software Limited

$(document).ready(function() {
    $(".owl-carousel").owlCarousel({
        loop: true,
        margin: 10,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 1,
                nav: false
            },
            1000: {
                items: 2,
                nav: true,
                loop: false,
                margin: 50
            }
        }
    })
})

/* Animate  */

jQuery(document).ready(function($) {
    $(".fadeOut").owlCarousel({
        items: 1,
        animateOut: "fadeOut",
        loop: true,
        margin: 10
    })
    $(".custom1").owlCarousel({
        animateOut: "slideOutDown",
        animateIn: "flipInX",
        items: 1,
        margin: 30,
        stagePadding: 30,
        smartSpeed: 450
    })
})

//
// $('.CategoryId').click(function (){
//     var id = $(this).data('id');
//     getSubCategoriesData(id)
// })
//
// function getSubCategoriesData(categoriesId){
//     axios.post('/getSubCategoriesData',{ id:categoriesId })
//         .then(function (response){
//             var jsonData = response.data;
//
//             $.each(jsonData, function(i, item) {
//                 $("<li>").html(
//                     "<a href='#'><i class='mdi mdi-circle'></i>"+ item.name +"</a>"
//                 ).appendTo('#SubCatgoryId');
//             });
//
//         }).catch(function (error){
//
//     })
// }




// Wholesale Sub SubCategory Products Details

function getWholesaleSubSubDetails(detailsId){
    $('#subSubWholesateDetailsModalShow').modal('show')

    axios.post('/subSubDetails',{id:detailsId})
        .then(function (response){
            if (response.status==200){

                $('#subsubnameDelailsWholesale').html(response.data.name);
                $('#subsubtitleDelailsWholesale').html(response.data.title);
                $('#subsubpriceDelailsWholesale').html('$ '+ response.data.business_price);
                $('#subsubdescriptionDelailsWholesale').html(response.data.description);
                $('#subsubimagesWholesale').html('<img class="img-fluid" style="height: 400px" src="/images/'+ response.data.images[0]['product_image'] +'">');
            }
            else {

            }
        })
        .catch(function(error) {

        })
}

// Corporate Sub SubCategory Products Details

function getCorporateSubSubDetails(detailsId){
    $('#subSubCorporateDetailsModalShow').modal('show')

    axios.post('/subSubDetails',{id:detailsId})
        .then(function (response){
            if (response.status==200){

                $('#subsubnameDelailsCorporate').html(response.data.name);
                $('#subsubtitleDelailsCorporate').html(response.data.title);
                $('#subsubpriceDelailsCorporate').html('$ '+ response.data.corporate_price);
                $('#subsubdescriptionDelailsCorporate').html(response.data.description);
                $('#subsubimagesCorporate').html('<img class="img-fluid" style="height: 400px" src="/images/'+ response.data.images[0]['product_image'] +'">');
            }
            else {

            }
        })
        .catch(function(error) {

        })
}






// WholesateCategory Products Details

function getWholesaleCategoryDetails(detailsId){
    $('#categoryWholesaleExtraID').html(detailsId);
    $('#CategoryWholesateDetailsModalShow').modal('show')

    axios.post('/subSubDetails',{id:detailsId})
        .then(function (response){
            if (response.status==200){

                console.log(response.data);
                $('#nameDelailsWholesale').html(response.data.name);
                $('#titleDelailsWholesale').html(response.data.title);
                $('#priceDelailsWholesale').html('$ '+ response.data.business_price);
                $('#descriptionDelailsWholesale').html(response.data.description);
                $('#imagesWholesale').html('<img class="img-fluid" style="height: 400px" src="/images/'+ response.data.images[0]['product_image'] +'">');
            }
            else {

            }
        }).catch(function (error){

    })
}

// Corporate Category Products Details

function getCorporateCategoryDetails(detailsId){
    $('#CategoryCorporateDetailsModalShow').modal('show')

    axios.post('/subSubDetails',{id:detailsId})
        .then(function (response){
            if (response.status==200){

                console.log(response.data);
                $('#nameDelailsCorporate').html(response.data.name);
                $('#titleDelailsCorporate').html(response.data.title);
                $('#priceDelailsCorporate').html('$ '+ response.data.corporate_price);
                $('#descriptionDelailsCorporate').html(response.data.description);
                $('#imagesCorporate').html('<img class="img-fluid" style="height: 400px" src="/images/'+ response.data.images[0]['product_image'] +'">');
            }
            else {

            }
        }).catch(function (error){

    })
}






// Wholesale SubCategory Products Details

function getWholesaleSubCategoryDetails(detailsId){
    $('#subWholesaleExtraID').html(detailsId);
    $('#SubCategoryWholesateDetailsModalShow').modal('show')

    axios.post('/subSubDetails',{id:detailsId})
        .then(function (response){
            if (response.status==200){

                console.log(response.data);
                $('#nameSubDelailsWholesale').html(response.data.name);
                $('#titleSubDelailsWholesale').html(response.data.title);
                $('#priceSubDelailsWholesale').html('$ '+ response.data.business_price);
                $('#descriptionSubDelailsWholesale').html(response.data.description);
                $('#imagesSubWholesale').html('<img class="img-fluid" style="height: 400px" src="/images/'+ response.data.images[0]['product_image'] +'">');
            }
            else {

            }
        }).catch(function (error){

    })
}



// Corporate SubCategory Products Details

function getCorporateSubCategoryDetails(detailsId){
    $('#SubCategoryCorporateDetailsModalShow').modal('show')

    axios.post('/subSubDetails',{id:detailsId})
        .then(function (response){
            if (response.status==200){

                console.log(response.data);
                $('#nameSubDelailsCorporate').html(response.data.name);
                $('#titleSubDelailsCorporate').html(response.data.title);
                $('#priceSubDelailsCorporate').html('$ '+ response.data.corporate_price);
                $('#descriptionSubDelailsCorporate').html(response.data.description);
                $('#imagesSubCorporate').html('<img class="img-fluid" style="height: 400px" src="/images/'+ response.data.images[0]['product_image'] +'">');
            }
            else {

            }
        }).catch(function (error){

    })
}






// Category Products Details

function getCategoryDetails(detailsId) {
    $("#categoryExtraID").html(detailsId)
    $("#CategoryDetailsModalShow").modal("show")

    axios
        .post("/subSubDetails", { id: detailsId })
        .then(function(response) {
            if (response.status == 200) {
                console.log(response.data)
                $("#nameDelails").html(response.data.name)
                $("#titleDelails").html(response.data.title)
                $("#priceDelails").html("$ " + response.data.mrp_price)
                $("#descriptionDelails").html(response.data.description)
                $("#images").html(
                    '<img class="img-fluid" style="height: 400px" src="/images/' +
                        response.data.images[0]["product_image"] +
                        '">'
                )
            } else {
            }
        })
        .catch(function(error) {})
}








// SubCategory Products Details

function getSubCategoryDetails(detailsId){
    $('#subWholesaleExtraID').html(detailsId);
    $('#SubDetailsModalShow').modal('show')

    axios.post('/subSubDetails',{id:detailsId})
        .then(function (response){
            if (response.status==200){

                console.log(response.data);
                $('#nameDelails').html(response.data.name);
                $('#titleDelails').html(response.data.title);
                $('#priceDelails').html('$ '+ response.data.mrp_price);
                $('#descriptionDelails').html(response.data.description);
                $('#images').html('<img class="img-fluid" style="height: 400px" src="/images/'+ response.data.images[0]['product_image'] +'">');
            }
            else {

            }
        }).catch(function (error){

    })
}


// Sub SubCategory Products Details


function getSubSubDetails(detailsId){
    $('#subSubExtraID').html(detailsId);
    $('#SubSubDetailsModalShow').modal('show')

    axios.post('/subSubDetails',{id:detailsId})
        .then(function (response){
            if (response.status==200){

                $('#nameDelails').html(response.data.name);
                $('#titleDelails').html(response.data.title);
                $('#priceDelails').html('$ '+ response.data.mrp_price);
                $('#descriptionDelails').html(response.data.description);
                $('#images').html('<img class="img-fluid" style="height: 400px" src="/images/'+ response.data.images[0]['product_image'] +'">');
            }
            else {

            }
        })
        .catch(function(error) {

        })
}

// Live Search

$document.ready(function () {
    fetch_product_data();
    function fetch_product_data(query = ''){
        $.ajax({
            url:"{{ route('product.livedata') }}",
            method: 'GET',
            data:{ query:query },
            dataType:'json',
            success:function (data)
            {
                $('tbody').html(data.table_data)
                $('#total_records').text(data.total_data)
            }
        })
    }

    $(document).on('keyup','#search', function (){
        var query = $(this).val();
        fetch_product_data(query)
    })
})


