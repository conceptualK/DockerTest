$(document).ready(function () {
    
    $.ajax({
        type: "GET",
        url: "http://10.19.5.106:5001/api/GetConfData",
        dataType: "json",
        success: function (data) {

            var category = data['category'];
            var cell_grade = data['cell_grade'];
            var delivery_to = data['delivery_to'];
            var invoice_no = data['invoice_no'];
            var item_description = data['item_description'];
            var model = data['model'];
            var packing_style = data['packing_style'];
          

           
            // category
            for (var index in category) {


                var item = category[index]
                var check = item['flag']

                if (check == "T") {
                    var category_id = item['category_id']
                    var category_name = item['category_name']

                    var id_name = category_id + " " + category_name


                    $(' <option value="' + id_name + '">' + id_name + '</option>').appendTo('select[name=category]');

                    $(' <option value="' + id_name + '">' + id_name + '</option>').appendTo('#info_category');


                } else if (check == "F") {
                    var item = category[index]
                    var category_id = item['category_id']
                    var category_name = item['category_name']
                    var id_name = category_id + " " + category_name
                    $(' <option value="' + id_name + '" disabled>' + id_name + '</option>').appendTo('select[name=category]');

                    $(' <option value="' + id_name + '" disabled>' + id_name + '</option>').appendTo('#info_category');
                }
            }

            //cell grade
            for (var index in cell_grade) {

                var cell = cell_grade[index]
                $(' <option value="' + cell['firstgrade'] + '">' + cell['firstgrade'] + '</option>').appendTo('select[name=cell-grade]');

                $(' <option value="' + cell['firstgrade'] + '">' + cell['firstgrade'] + '</option>').appendTo('#info_modalgrade');


            }

            //delivery to
            for (var index in delivery_to) {

                var delivery = delivery_to[index]
                var check = delivery['enabled']
                if (check == "Y") {
                    var code = delivery['vendor_code']
                    var name = delivery['vendor_name']
                    var code_name = code + " " + name

                    $(' <option value="' + code_name + '">' + code_name + '</option>').appendTo('select[name=delivery-to]');

                    $(' <option value="' + code_name + '">' + code_name + '</option>').appendTo('#info_deliveryto');
                } else if (check == "N") {
                    var code = delivery['vendor_code']
                    var name = delivery['vendor_name']
                    var code_name = code + " " + name

                    $(' <option value="' + code_name + '" disabled>' + code_name + '</option>').appendTo('select[name=delivery-to]');

                    $(' <option value="' + code_name + '" disabled>' + code_name + '</option>').appendTo('#info_deliveryto');
                }


            }
            //item description
            for (var index in item_description) {
                var description = item_description[index]
                var check = description['flag']
                if (check == "T") {
                    var item_id = description['item_id']
                    var item_name = description['item_name']
                    var itemName_itemID = item_id + " " + item_name
                    $(' <option value="' + itemName_itemID + '">' + itemName_itemID + '</option>').appendTo('select[name=description]');

                    $(' <option value="' + itemName_itemID + '">' + itemName_itemID + '</option>').appendTo('#info_itemDes');
                } else if (check == "F") {
                    var item_id = description['item_id']
                    var item_name = description['item_name']
                    var itemName_itemID = item_id + " " + item_name
                    $(' <option value="' + itemName_itemID + '" disabled>' + itemName_itemID + '</option>').appendTo('select[name=description]');

                    $(' <option value="' + itemName_itemID + '" disabled>' + itemName_itemID + '</option>').appendTo('#info_itemDes');
                }


            }
            //packing style
            for (var index in packing_style) {
                var style = packing_style[index]
                var check = style['flag']
                if (check == "T") {
                    var style_id = style['style_id']
                    var style_name = style['style_name']
                    var styleName_styleID = style_id + " " + style_name
                    $(' <option value="' + styleName_styleID + '">' + styleName_styleID + '</option>').appendTo('select[name=Pack-style]');

                    $(' <option value="' + styleName_styleID + '">' + styleName_styleID + '</option>').appendTo('#info_packstyle');
                } else if (check == "F") {
                    var style_id = style['style_id']
                    var style_name = style['style_name']
                    var styleName_styleID = style_id + " " + style_name
                    $(' <option value="' + styleName_styleID + '" disabled>' + styleName_styleID + '</option>').appendTo('select[name=Pack-style]');

                    $(' <option value="' + styleName_styleID + '" disabled>' + styleName_styleID + '</option>').appendTo('#info_packstyle');
                }


            }



            //Model
            for (var index in model) {
                var Product_model = model[index]
                var check = Product_model['enabled']
                if (check == "Y") {
                    var part_no = Product_model['part_no']
                    var spac_Name = Product_model['spec1']
                    var partNO_spac = part_no + " " + spac_Name

                    $(' <option value="' + partNO_spac + '">' + partNO_spac + '</option>').appendTo('select[name=model]');

                    $(' <option value="' + partNO_spac + '">' + partNO_spac + '</option>').appendTo('#info_modelty');
                } else if (check == "N") {
                    var Product_model = model[index]
                    var part_no = Product_model['part_no']
                    var spac_Name = Product_model['spec1']
                    var partNO_spac = part_no + " " + spac
                    $(' <option value="' + partNO_spac + '" disabled>' + partNO_spac + '</option>').appendTo('select[name=model]');

                    $(' <option value="' + partNO_spac + '" disabled>' + partNO_spac + '</option>').appendTo('#info_modelty');
                }


            }

            // invoice NO.
            for (var index in invoice_no) {
                var invoice = invoice_no[index]
                var check = invoice['flag']
                if (check == "T") {
                    var invoice_id = invoice['invoice_id']
                    var invoice_name = invoice['invoice_name']
                    var invoiceID_NAME = invoice_id + " " + invoice_name
                    $(' <option value="' + invoiceID_NAME + '">' + invoiceID_NAME + '</option>').appendTo('select[name=invoice]');

                    $(' <option value="' + invoiceID_NAME + '">' + invoiceID_NAME + '</option>').appendTo('#info_invoice');
                } else if (check == "F") {
                    var invoice_id = invoice['invoice_id']
                    var invoice_name = invoice['invoice_name']
                    var invoiceID_NAME = invoice_id + " " + invoice_name
                    $(' <option value="' + invoiceID_NAME + '" disabled>' + invoiceID_NAME + '</option>').appendTo('select[name=invoice]');

                    $(' <option value="' + invoiceID_NAME + '" disabled>' + invoiceID_NAME + '</option>').appendTo('#info_invoice');
                }


            }








        }
    });
});