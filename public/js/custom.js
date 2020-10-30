$(document).ready(function() {

    $('#summernote').summernote();
});


$(document).ready(function (){
    $('.dynamicCategory').change(function (){
      var categoryId =  $(this).val();
        $("#subCategoryDropdown").empty();

      axios.post('/categoryDependSub',{id:categoryId})
          .then(function (response){
            var subCategoryData =  response.data
            // console.log(subCategoryData);
              $.each(subCategoryData,function(key, value)

              {
                  $("#subCategoryDropdown").append('<option value=' + value.id + '>' + value.name  +'</option>');
              });


          }).catch(function (error){

      })

    })
})





$(document).ready(function (){
    $('.dynamicSubCategory').change(function (){
      var subCategoryId =  $(this).val();
        $("#childCategoryDropdown").empty();

      axios.post('/subCategoryDependSub',{id:subCategoryId})
          .then(function (response){
            var childCategoryData =  response.data
            // console.log(subCategoryData);
              $.each(childCategoryData,function(key, value)

              {
                  $("#childCategoryDropdown").append('<option value=' + value.id + '>' + value.name  +'</option>');
              });


          }).catch(function (error){

      })

    })
})


//checkbox on click

$(document).ready(function(){
    $('#WholesaleCheckboxId').click(function(){
        if($(this).prop("checked") == true){
            $("#wholesaleClickCheck").removeClass('hidden')
        }
        else if($(this).prop("checked") == false){
            $("#wholesaleClickCheck").addClass('hidden')
        }
    });
});


$(document).ready(function(){
    $('#CorporateCheckboxId').click(function(){
        if($(this).prop("checked") == true){
            $("#corporateClickCheck").removeClass('hidden')
        }
        else if($(this).prop("checked") == false){
            $("#corporateClickCheck").addClass('hidden')
        }
    });
});



