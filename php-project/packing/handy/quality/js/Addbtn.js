function send_sv() {
    var order_id = $('input[name=order-id]').val();
    var pallet_id = $('input[name=pallet-id]').val();
    var model_id = $('input[name=model-id]').val();
    var judge = $('select[name=opstatus]').val(); 
    
    if(order_id !="" && pallet_id !="" && model_id !="" && judge !=""){
            var order_id_string = order_id.toString();
            var pallet_id_string = pallet_id.toString();
            var model_id_string = model_id.toString()
            var qc_string = judge.toString();

            dataQC = {
                "order_id": order_id_string,
                "pallet_id": pallet_id_string,
                "module_id": model_id_string,
                "judge": qc_string
              }
            
              //console.log(order_id_string +" "+pallet_id_string +" "+ model_id_string +" "+ qc_string)
            $("#status").html('<div id="status" class="row text-center" style="color: #00E30E; text-align: center;">Saveing...</div>');
            
            $.ajax({
                
                type: "POST",
                url: "http://10.19.5.106:5001/api/C2QCCheck",
                dataType : "json",
                contentType: "application/json; charset=utf-8",
                data : JSON.stringify(dataQC),
                
                success: function (response) {
                    console.log(response)


                    if(response['MsgCode'] === "00000"){
                        document.getElementById('status').style.color = '#ffffff';
                        document.getElementById('status').style.backgroundColor = 'rgb(0, 110, 110)';
                    
                    $("#status").html(response);
                    //setTimeout(function(){short_func()} ,1000);
                    status_save()
                    setTimeout(function() {
                        status_save_remove()
                    }, 5000);
                        
                    reset()

                    function status_save() {
                        $("#status").html('<div id="status" class="row text-center"background-color: rgb(0, 110, 110); style="color: #0ee512;">'+ response['Status'] +'</div>')
                    }
                    function status_save_remove() {
                        $("#status").html('<div id="status" class="row text-center"background-color: rgb(0, 110, 110); style="color: white;">')
                    }

                    }else{
                        status_save()
                        setTimeout(function() {
                            status_save_remove()
                        }, 5000);
                            
    
                        function status_save() {
                            $("#status").html('<div id="status" class="row text-center"background-color: rgb(0, 110, 110); style="color: #ff0000;">'+ response['Status'] +'</div>')
                        }
                        function status_save_remove() {
                            $("#status").html('<div id="status" class="row text-center"background-color: rgb(0, 110, 110); style="color: white;">')
                        }
                    }

                    
                    
                    
                }
            
            });                      
       
        
            
            
        
        
    }  
    else{alert("คุณยังไม่ได้กรอกข้อมูล !!")}



     
    

}




function submit_event(){
    submits.disabled()= false;  
}
function reset(){
    document.getElementById('insert_form').reset();
}    