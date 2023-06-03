$(document).ready(function(){
    $(document).on('input','#total',function(e){
        if ($(this).val() !='') {
            var total=$(this).val();
            var tex= (total * 15) /100;
            $('#tex').val(tex);

        }else{
            $('#tex').val('');

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


    $(document).on('input','#no_support',function(e){
        make_search();

    });
    $(document).on('input','#exchange',function(e){
        make_search();

    });
    $(document).on('change','#start_at',function(e){
        make_search();

    });
    $(document).on('change','#end_at',function(e){
        make_search();

    });
    function make_search(){
        var no_support=$('#no_support').val();
        var exchange=$('#exchange').val();
        var start_at=$('#start_at').val();
        var end_at=$('#end_at').val();
        var ajax_search_url=$('#ajax_search_url').val();
        var token_search=$('#token_search').val();
        jQuery.ajax({

            url:ajax_search_url,
            type:'post',
            dataType:'html',
            cache:false,
            data:{no_support:no_support,exchange:exchange,start_at:start_at,end_at:end_at,'_token':token_search},
            success:function(data){
                $("#example2").html(data);

            },
            error:function(){

            }
        });

    }



});

$(document).ready(function(){
    $(document).on('click','#printReport',function(e){
        var printContent=document.getElementById('print').innerHTML;
        var oiginalContent=document.body.innerHTML;
        document.body.innerHTML=printContent;
        window.print();
        document.body.innerHTML=oiginalContent;

    })
})

$(document).ready(function(){
        var no_support2=$('#no_support').val()
       $('#no_support2').html(no_support2)


    $(document).on('input','#exchange',function(){
        var exchange2=$('#exchange').val()
       $('#exchange2').html(exchange2)

    })
    $(document).on('input','#statement',function(){
        var statmenet2=$('#statement').val()
       $('#statmenet2').html(statmenet2)

    })
    $(document).on('input','#payment',function(){
        var payment2=$('#payment').val()
        $('#payment2').html(payment2)

    })
    $(document).on('input','#number_shek',function(){
        var shek2=$('#number_shek').val()
        $('#shek2').html(shek2)

    })
    $(document).on('input','#bank',function(){
        var bank2=$('#bank').val()
        $('#bank2').html(bank2)

    })
    $(document).on('input','#total',function(){
        var total2=$('#total').val()
         $('#total2').html(total2)
        var tex2=$('#tex').val()
        $('#tex2').html(tex2)
        var totalnottex=total2 - tex2
         $('#totalnottex').html(totalnottex)

    })

    $(document).on('click','#printdiv',function(e){
        $('#print').show()

        var printContent=document.getElementById('print').innerHTML;
        var oiginalContent=document.body.innerHTML;
        document.body.innerHTML=printContent;
        window.print();
        document.body.innerHTML=oiginalContent;
        $('#print').hide()

    })
})
