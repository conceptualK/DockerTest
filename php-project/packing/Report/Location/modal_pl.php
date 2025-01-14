
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <div id="order_lb">
                    <i class="fa fa-circle" aria-hidden="true" style="color:#000;" id="order_i"></i>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>
            <div class="modal-body">
                <div class="mt-3 row">
                    <div class="col-4">
                        <label for="pallet_txt"><strong>Pallet Number</strong></label>
                        <input type="text" class="form-control" name="pallet_txt" id="pallet_txt" value="PA-24081900099"
                            readonly>
                    </div>
                    <div class="col-1">
                        <label for="flag_txt"><strong>Flag</strong></label>
                        <input type="text" class="form-control" name="falg_txt" id="falg_txt" value="W" readonly>
                    </div>
                    <div class="col-3">
                        <label for="status_txt"><strong>Status</strong></label>
                        <input type="text" class="form-control" name="status_txt" id="status_txt" value="Pack Already"
                            readonly>
                    </div>
                    <div class="col-2">
                        <label for="packdate_txt"><strong>Pack Date</strong></label>
                        <input type="text" class="form-control" name="packdate_txt" id="packdate_txt" value="21-AUG-24"
                            readonly>
                    </div>
                    <div class="col-2">
                        <label for="packdate_txt"><strong>Pallet Location</strong></label>
                        <input type="text" class="form-control" name="packdate_txt" id="location_txt" value="21-AUG-24"
                            readonly>
                    </div>
                </div>
                <hr>


                <div class="mt-5  mb-5 row ">

                    <div class="row g-3 align-items-center">
                        <div class="col-auto">
                            <label for="filter_txt" class="col-form-label"><strong>Module Details</strong></label>
                        </div>
                        <div class="col-5">
                            <input type="text" id="filter_txt" class="form-control" aria-describedby="filter_txt" autocomplete="off">
                        </div>

                        <div class="col-5">
                            <button type="button" class="btn btn-primary"
                                onclick="read_keyup('', '', '', '','')">Search</button>
                        </div>

                    </div>

                    <div id="drawing" class="mt-5 row">

                    </div>

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="close_md()">Close</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
    </div>
</div>
<script>
    function read_keyup(order_id, pallet_id, flag, f, module_id) {

        if (module_id.length > 1) {
            module_id = $('#filter_txt').val();
        }
        else {
            order_id = $('#order_i').text();
            pallet_id = $('#pallet_txt').val();
            flag = $('#status_txt').val();
            f = $('#falg_txt').val();
            module_id = $('#filter_txt').val();
        }
        trigger_md(order_id, pallet_id, flag, f, module_id);
    }
    function trigger_md(order_id, pallet_id, flag, f, module_id) {

        console.log(order_id + " | " + pallet_id + " | " + flag + " | " + f + " | " + module_id);
        if (module_id.length > 1) {
            order_id = $('#order_i').text();
            pallet_id = $('#pallet_txt').val();
            flag = $('#status_txt').val();
            f = $('#falg_txt').val();
            module_id = $('#filter_txt').val();
        }
        else {
            $('#order_i').text(order_id);
            $('#pallet_txt').val(pallet_id);
            $('#status_txt').val(flag);
            $('#falg_txt').val(f);
            $('#filter_txt').val();
            module_id = '';
        }

        console.log(module_id);

        let circle_color = '';
        jque = {
            "order_id": order_id.trim(),
            "pallet_id": pallet_id.trim(),
            "flag": f.trim(),
            "module_id": module_id.trim()
        };
        console.log(jque);

        $("#drawing").html('');

        $.ajax({
            type: "POST",
            url: 'http://10.19.5.106:5001/api/fGetPackingStatus',
            dataType: "json",
            contentType: "application/json; charset=utf-8",
            data: JSON.stringify(jque),
            success: function (data) {
                var row = data.Message;
                console.log(row);
                if (row[0]["f"] == "D") { circle_color = '#ff0000'; }
                else if (row[0]["f"] == "N") { circle_color = '#333'; }
                else if (row[0]["f"] == "W") { circle_color = '#198754'; }
                else if (row[0]["f"] == "WH") { circle_color = '#0D6EFD'; }
                else if (row[0]["f"] == "OK") { circle_color = '#D63384'; }
                else if (row[0]["f"] == "QC") { circle_color = '#0DCAF0'; }
                else if (row[0]["f"] == "E") { circle_color = '#FFC107'; }
                else { circle_color = '#000'; }

                $('#order_lb').html(`<h3 class="modal-title font-weight-bold"  id="order_i"><i class="fa fa-circle" aria-hidden="true" style="color:${circle_color};"></i> ${order_id} </h3>`);


                $('#location_txt').val(row[0]["pl_location"]);  



                var count = Object.keys(row).length;

                const startDate = new Date(row[0]["charge_date"]);
                const endDate = new Date();

                const diffDays = dateDifference(startDate, endDate);
       
                for (i = 0; i < count; i++) {
                    // console.log(row[i]["module_id"]);
                    let module_id = row[i]["module_id"];
                    let detail = row[i]["detial"];
                    let charge_date = row[i]["charge_date"];
                    $("#drawing").append(`<div class="mt-3 jus col-4 px-md-4">
                                            <div class="row ">
                                                <div class="col-4"> </div>
                                                <div class="col-8 " style="background-color:${circle_color};">
                                                    <div class="pl-3 " style=" color:#fff; font-weight: bold;">   ${charge_date} ( ${diffDays} days)</div>
                                                </div>
                                            </div>
                                            <div class="row ">
                                                 <div class="col-2  rounded text-end" >
                                                    </div>
                                                    <div class="col-2  rounded text-end" >
                                                        <img src="../../image/battery.png" alt="Flowers in Chania" width="56" height="59">
                                                    </div>
                                                    <div class="mx-auto col-8 border" >
                                                        <strong>${module_id}</strong><br>                                            
                                                      <p style="font-size:12px;">${detail}</p>  
                                                    </div>
                                            </div>
                                          </div>`
                                        
                                        );
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error(textStatus, errorThrown);

            }
        });
         $('#exampleModal').modal('show');
    }

    function dateDifference(date1, date2) {
        const diffTime = Math.abs(date2 - date1);
        const diffDays = Math.floor(diffTime / (1000 * 60 * 60 * 24));
        return diffDays;
    }

    function close_md() {
        $('#exampleModal').modal('hide');
    }
</script>