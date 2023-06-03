$(document).ready(function(){
    $(document).on('click','#printInvoice',function(e){
        var printContent=document.getElementById('print').innerHTML;
        var oiginalContent=document.body.innerHTML;
        document.body.innerHTML=printContent;
        window.print();
        document.body.innerHTML=oiginalContent;
        
    })
})
