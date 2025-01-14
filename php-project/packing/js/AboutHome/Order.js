$(document).ready(function() {
    $.getJSON('Webpage/productionOrder/GetOrder.php', function(response) {

                    var item = response['Message']
                    
                    $('#Order').DataTable({
            
                        data: item,
                        columns: [
                            { data: 'order_id'},
                            { data: 'md_type' },
                            { data: 'category' },
                            { data: 'd_to' },
                            { data: 'status' },
                            { data: 'invoice_no' },
                            { data: 'updatetime'},
                            
                        ]
                    });
                });
            });