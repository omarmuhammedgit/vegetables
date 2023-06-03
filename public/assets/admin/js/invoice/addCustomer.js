$(document).ready(function(){
$(document).on('click','#addCustomer',function(e){
    addcustomer();

});
function addcustomer(){
    alert(33444)
    var code=$('#code').val();
    var name=$('#name').val();
    var address=$('#address').val();
    var commercial_record=$('#commercial_record').val();
    var phone=$('#phone').val();
    var Tex_number=$('#Tex_number').val();
    var name_of_deficience=$('#name_of_deficience').val();
    var phone_deficince=$('#phone_deficince').val();
    var service_ratio=$('#service_ratio').val();
    var custom_field_1=$('#custom_field_1').val();
    var custom_field_2=$('#custom_field_2').val();
    var ajax_search_url=$('#ajax_addCustomerAjax_url2').val();
    var token_search=$('#token_search').val();
    // alert(ajax_search_url);
    jQuery.ajax({

        url:ajax_search_url,
        type:'post',
        dataType:'html',
        cache:false,
        data:{code:code,name:name,address:address,commercial_record:commercial_record,
            phone:phone,Tex_number:Tex_number,name_of_deficience:name_of_deficience,phone_deficince:phone_deficince,
            service_ratio:service_ratio,custom_field_1:custom_field_1,custom_field_2:custom_field_2,'_token':token_search},
        success:function(data){

            $(".addCustomerAjax").html(data);

        },
        error:function(){
            alert(55)
        }
    });

}


});
