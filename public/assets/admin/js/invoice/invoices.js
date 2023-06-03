$(document).ready(function(){
    $(document).on('input','#price',function(e){
        if ($('#quantity').val()!='') {
            if ($(this).val() !='') {
                var price=$(this).val();
                var serivce_rota=$('#serivce_rota').val();
                var quantity=$('#quantity').val();
                var total_befor_tex=$(this).val()* quantity;
                $('#total_befor_tex').val(total_befor_tex);
                var total_tex= (total_befor_tex * serivce_rota) /100;
                var total_after_tex=total_befor_tex + total_tex;
                $('#total_after_tex').val(total_after_tex);
                $('#total_tex').val(total_tex);
                $('#service_amount').val(total_tex);


            }else{
                $('#tex').val('');

            }

        } else {
            alert('يرجى ادخال الكمية اولا');
            $(this).val('');



        }
    });
    $(document).on('input','#tex',function(e){
        if ($('#total').val() =='') {
            alert('يرجى ادخال المبلغ الشامل الضريبة اولا');
            $(this).val('');
            $('#total').focus();
            return false;
        }
    });


    $(document).on('click','#addCustomer',function(e){
        make_search();

    });
    function make_search(){
        var no_invoice=$('#no_invoice').val();
        var suppler_id=$('#suppler_id').val();
        var date=$('#date').val();
        var no_support=$('#no_support').val();
        var customer_id=$('#customer_id').val();
        var name_product=$('#name_product').val();
        var quantity=$('#quantity').val();
        var price=$('#price').val();
        var total_befor_tex=$('#total_befor_tex').val();
        var discount=$('#discount').val();
        var total_tex=$('#total_tex').val();
        var total_after_tex=$('#total_after_tex').val();
        var serivce_rota=$('#serivce_rota').val();
        var service_amount=$('#service_amount').val();
        var escort_expenses=$('#escort_expenses').val();
        var other_expenses=$('#other_expenses').val();
        var statement_expenses=$('#statement_expenses').val();
        var ajax_search_url=$('#ajax_search_url').val();
        var token_search=$('#token_search').val();
        jQuery.ajax({

            url:ajax_search_url,
            type:'post',
            dataType:'html',
            cache:false,
            data:{no_invoice:no_invoice,suppler_id:suppler_id,date:date,no_support:no_support,
                customer_id:customer_id,name_product:name_product,quantity:quantity,price:price,
                total_befor_tex:total_befor_tex,discount:discount,total_after_tex:total_after_tex,
                serivce_rota:serivce_rota,service_amount:service_amount,escort_expenses:escort_expenses,
                other_expenses:other_expenses,statement_expenses:statement_expenses,total_tex:total_tex,'_token':token_search},
            success:function(data){

                $(".addCustomerAjax").html(data);

            },
            error:function(){
                alert(34);
            }
        });

    }

$(document).on('click','#addNewCustomer',function(e){
    addcustomer();

});
function addcustomer(){

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
    var ajax_search_url=$('#ajax_addCustomerAjax_url').val();
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
