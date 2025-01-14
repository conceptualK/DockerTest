 <!-- info and edit  -->

 <div class="modal fade bd-example-modal-lg modal-fullscreen" id="info-order" tabindex="-1" role="dialog" aria-labelledby="infoOrderLabel" aria-hidden="true">
     <div class="modal-dialog modal-fullscreen">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="infoOrderLabel">Info Order</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="close_info()"></button>

             </div>
             <div class="modal-body">
                 <div><label>
                         <h2><svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-boxes" viewBox="0 0 16 16">
                                 <path d="M7.752.066a.5.5 0 0 1 .496 0l3.75 2.143a.5.5 0 0 1 .252.434v3.995l3.498 2A.5.5 0 0 1 16 9.07v4.286a.5.5 0 0 1-.252.434l-3.75 2.143a.5.5 0 0 1-.496 0l-3.502-2-3.502 2.001a.5.5 0 0 1-.496 0l-3.75-2.143A.5.5 0 0 1 0 13.357V9.071a.5.5 0 0 1 .252-.434L3.75 6.638V2.643a.5.5 0 0 1 .252-.434zM4.25 7.504 1.508 9.071l2.742 1.567 2.742-1.567zM7.5 9.933l-2.75 1.571v3.134l2.75-1.571zm1 3.134 2.75 1.571v-3.134L8.5 9.933zm.508-3.996 2.742 1.567 2.742-1.567-2.742-1.567zm2.242-2.433V3.504L8.5 5.076V8.21zM7.5 8.21V5.076L4.75 3.504v3.134zM5.258 2.643 8 4.21l2.742-1.567L8 1.076zM15 9.933l-2.75 1.571v3.134L15 13.067zM3.75 14.638v-3.134L1 9.933v3.134z" />
                             </svg> Production Order</h2>
                     </label></div>
                 <br>
                 <br>



                 <form action="" id="form-Order">
                     <div class="row">

                         <div class="col">
                             <label for="recipient-name" class="col-form-label">Order ID</label>
                             <input type="text" class="form-control" id="info_orderid" placeholder="Enter Production Order no./PO" disabled>
                         </div>
                         <div class="col">
                             <label for="recipient-name" class="col-form-label">Production Order no./PO</label>
                             <input type="text" class="form-control" id="info_pdorder" placeholder="Enter Production Order no./PO" disabled>
                         </div>
                         <br>


                     </div>




                     <div class="row">
                         <div class="col">
                             <label for="NO-PO" class="col-form-label">NO./PO</label>
                             <input min="1" type="number" class="form-control" id="info_po" placeholder="Enter NO." oninput="updateOutput()" disabled>
                         </div>
                         <div class="col">
                             <label for="invoice" class="col-form-label">Invoice No</label>
                             <select class="form-select" id="info_invoice" disabled>
                                 <option value="">Please enter invoice</option>
                             </select>
                         </div>




                     </div>

                     <div class="row">
                         <div class="col">
                             <label for="category" class="col-form-label">Category</label>
                             <select class="form-select" id="info_category" disabled>
                                 <option value="">Please enter category</option>
                             </select>
                         </div>
                         <div class="col">
                             <label for="description" class="col-form-label" style=" margin-right: 17%;">Item Description</label>
                             <select class="form-select" id="info_itemDes" disabled>
                                 <option value="">Please enter item</option>
                             </select>
                         </div>
                         <div class="col">
                             <label for="Pack-style" class="col-form-label">Packing style</label>
                             <select class="form-select" id="info_packstyle" disabled>
                                 <option value="">Please enter packing style</option>
                             </select>
                         </div>
                     </div>



                     <div class="row">
                         <div class="col">
                             <label for="delivery-to" class="col-form-label">Delivery to</label>
                             <select class="form-select" id="info_deliveryto" style="margin-right: 1%;" disabled>
                                 <option value="">Please enter delivery</option>
                             </select>
                         </div>

                         <div class="col">
                             <label for="model" class="col-form-label">Model</label>
                             <select class="form-select" id="info_modelty" disabled>
                                 <option value="">Please enter model</option>
                             </select>
                         </div>
                     </div>

                     <br>
                     <div class="row">
                         <div class="col">
                             <label id="ty-model">Production Q'ty '(Module)</label>

                             <div class="col border p-3 ">
                                 <input disabled type="number" min="1" class="form-control " id="info_pdQty" oninput="on_ptymodel()">
                                 </p>
                                 <label id="display-pallet" style="color:#749ab3;"></label>
                                 <p></p>

                             </div>
                         </div>

                         <div class="col">

                             <label id="ty-model">Cell grade</label>
                             <label id="display_edit_cell" style="color:#749ab3;"></label>
                             <div class="col border p-3">
                                 <input type="text" disabled class="form-control" id="info_cellgrade">
                                 </p>
                                 <div class="col d-flex align-items-center">
                                     <select class="form-select" id="info_modalgrade" disabled>
                                         <option value="">Please enter cell grade</option>
                                     </select>

                                     <input type="number" disabled class="form-control w-25" id="numedit_cell" value="0" min="0" style="margin-left:2%;">
                                     <button id="cell_addedit" type="button" class="btn btn-primary ms-2 " onclick="addEdit_cell()" disabled>add</button>
                                     <button id="cell_clearedit" type="button" class="btn btn-danger ms-2 " onclick="clearform_cell()" disabled>clear</button>
                                 </div>

                             </div>

                         </div>


                     </div>
                     <br>

                     <div class="row">
                         <div class="col">
                             <label for="party" class="col-form-label">Issue date</label>
                             <input class="form-control" id="info_party" type="datetime-local" disabled />
                         </div>

                         <div class="col">
                             <label for="party" class="col-form-label">Status</label>
                             <input class="form-control" id="info_status" type="text" disabled />
                         </div>

                     </div>

                     <div class="row">

                         <div class="col">
                             <label for="message-text_edit" class="col-form-label">Remark:</label>
                             <textarea type="text" maxlength="1024" class="form-control" id="info_remark" disabled></textarea>
                         </div>


                     </div>
                     <br>

                 </form>

             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-primary" onclick="save_info()" data-bs-dismiss="modal" id="save_edit" disabled>Save</button>
                 <button type="button" class="btn btn-warning" onclick="edit_info()" id="btn_edit">Edit</button>
                 <button type="button" class="btn btn-secondary" onclick="close_info()" data-bs-dismiss="modal">Close</button>
             </div>
         </div>
     </div>
 </div>

 <script>
     //ส่วนของ cell grade

     var edit_qty = 0;
     var edit_number = 0;
     var sum_cellEdit = 0;
     var text_edit = "";



     function on_ptymodel() {
         clearform_cell() //reset ทุกเมื่อมีการ input

         edit_qty = parseInt($('#info_pdQty').val());
         console.log("ค่าคงที่: ", edit_qty)
     }

     function addEdit_cell() {

         edit_number = parseInt($('#numedit_cell').val())
         cell_grade = $('#info_modalgrade').val()

         console.log("รวม cell: ", sum_cellEdit)
         console.log("ค่าคงที่: ", edit_qty)

         //เช็ค value ของ select_grade กับ จำนวน cell
         if (cell_grade && edit_number) {
             sum_cellEdit += edit_number; //เพิ่ม cell
             if (edit_qty > sum_cellEdit) {

                 text_edit += cell_grade + "-" + $('#numedit_cell').val() + "_"
                 $('#info_cellgrade').val(text_edit)





                 console.log("รวม cell: ", sum_cellEdit)
                 console.log("ค่าคงที่: ", edit_qty)
                 reset_select()

                 //ถ้า add cell ครบ
             } else if (edit_qty == sum_cellEdit) {
                 text_edit += cell_grade + "-" + $('#numedit_cell').val() + "_"
                 text_edit = text_edit.slice(0, -1);
                 $('#info_cellgrade').val(text_edit)
                 console.log("รวม add cell: ", sum_cellEdit)
                 console.log("ค่าคงที่ add: ", edit_qty)
                 reset_select()
                 document.getElementById('save_edit').disabled = false;


                 document.getElementById('display_edit_cell').innerHTML = `<label style="color:green;">cell ครบแล้ว*</label>`;
                 setTimeout(function() {
                     document.getElementById('display_edit_cell').innerHTML = `<label style="color:red;"></label>`;
                 }, 3000);
                 document.getElementById("cell_addedit").disabled = true;


                 //ถ้า เพิ่ม เกินกว่าที่ cell มี
             } else if (edit_qty < sum_cellEdit) {
                 sum_cellEdit = sum_cellEdit - edit_number;

                 console.log("ส่วนเกิน || ค่าคงที่: ", edit_qty)
                 console.log("ส่วนเกิน || sum cell: ", sum_cellEdit)

                 document.getElementById('display_edit_cell').innerHTML = `<label style="color:red;">จำนวนเกิน*</label>`;
                 setTimeout(function() {
                     document.getElementById('display_edit_cell').innerHTML = `<label style="color:red;"></label>`;
                 }, 3000);

             }
         } else {

             document.getElementById('display_edit_cell').innerHTML = `<label style="color:red;">โปรดเช็คข้อมูลอีกครั้ง*</label>`;
             setTimeout(function() {
                 document.getElementById('display_edit_cell').innerHTML = `<label style="color:red;"></label>`;
             }, 3000);

         }


     }


     function clearform_cell() {

         edit_qty = parseInt($('#info_pdQty').val());
         edit_number = 0;
         sum_cellEdit = 0;
         text_edit = "";
         $('#numedit_cell').val(0)
         $('#info_modalgrade').val("")
         $('#info_cellgrade').val("")
         document.getElementById('cell_addedit').disabled = false;
         document.getElementById('save_edit').disabled = true;
     }

     function reset_select() {
         $('#info_modalgrade').val("")
         $('#numedit_cell').val(0)
     }



     $('#numedit_cell').on('input', function() {
         var value = $(this).val();
         if (value.includes('-')) {
             $(this).val(value.replace('-', ''));
             alert('ไม่อนุญาตให้ใส่เครื่องหมายลบ');
         }
     });
     $('#info_pdQty').on('input', function() {
         var value = $(this).val();
         if (value.includes('-')) {
             $(this).val(value.replace('-', ''));
             alert('ไม่อนุญาตให้ใส่เครื่องหมายลบ');
         }
     });
 </script>