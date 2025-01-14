$(document).ready(function () {


  data_packing = {
    "table": "config_packing_style",
    "operation": "select",
    "sections": "*",
    "condition": "",
    "sorted": "",
    "header_fm": "",
    "value_fm": ""
  }


  $.ajax({
    type: "POST",
    url: "http://10.19.5.106:5001/api/fConfCommand",
    dataType: "json",
    contentType: "application/json; charset=utf-8",
    data: JSON.stringify(data_packing),

    success: function (response) {
    

      var invoice = response['Message']
      $('#packing-table').DataTable({
        data: invoice,
        columns: [{
          data: 'style_id'
        },
        { data: 'style_name' },
        { data: 'flag' },
        { data: 'updatetime' },
        {
          data: null,
          render: function (row) {
            var editButton = '<button class="btn btn-warning edit-btn" data-id="' + row.style_id + '">' +
              'Edit' +
              '</button>';
            var deleteButton = '<button class="btn btn-danger delete-btn" data-id="' + row.style_id + '">' +
              '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16"><path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/></svg>' +
              '</button>';

            return editButton + '\n' + deleteButton;
          }
        }]
      });

      var id_edit_packing = null;
      $('#packing-table').on('click', '.edit-btn', function () {
        id_edit_packing = $(this).data('id');
        var text_id = "WHERE style_id=" + "'" + id_edit_packing + "'"

        var value_packing = {
          "table": "config_packing_style",
          "operation": "select",
          "sections": "*",
          "condition": text_id,
          "sorted": "",
          "header_fm": "",
          "value_fm": ""
        }
        //popup edit form invoice
        $('#edit-packing').modal('show');
        $.ajax({
          type: "POST",
          url: "http://10.19.5.106:5001/api/fConfCommand",
          dataType: "json",
          contentType: "application/json; charset=utf-8",
          data: JSON.stringify(value_packing),

          success: function (response) {
            var rep = response['Message']
            $('#edit-option-flag-packing').val(rep[0].flag);
            $('#edit-packing-name').val(rep[0].style_name);
          }
        });
      });

      //button uptade
      $('#update-packing').on('click', function () {
        var textstyle_id = "style_id=" + "'" + id_edit_packing + "'"
        var option_flag = $('select[name=edit-option-flag-packing]').val();
        var edit_style_name = $('input[name=edit-packing-name]').val();
        var text_value = "flag=" + "'" + option_flag + "'" + "," + "style_name=" + "'" + edit_style_name + "'"
        var data_edit_packing = {
          "table": "config_packing_style",
          "operation": "update",
          "sections": "",
          "condition": textstyle_id,
          "sorted": "",
          "header_fm": "",
          "value_fm": text_value
        }
        if (edit_style_name != "") {
          $.ajax({
            type: "POST",
            url: "http://10.19.5.106:5001/api/fConfCommand",
            dataType: "json",
            contentType: "application/json; charset=utf-8",
            data: JSON.stringify(data_edit_packing),

            success: function (response) {
              resetDataTable()

              $('.alert').remove();
              $('<div class="alert alert-success d-flex align-items-center" role="alert" style="position: fixed; z-index: 1; margin-left:78%; width:20%;">' +
                '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">' +
                '<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg>' +
                'update success! </div>').appendTo('.AlertTEST');

              setTimeout(function () {
                $('.alert').remove();
              }, 5000);

            }

          });
        }
        else {
          $('.alert').remove();
          $('<div class="alert alert-danger d-flex align-items-center" role="alert" style="position: fixed; z-index: 1; margin-left:78%; width:20%;">' +
            '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">' +
            '<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>' + '</svg>' +
            'please enter style name. </div>').appendTo('.AlertTEST');

          setTimeout(function () {
            $('.alert').remove();
          }, 5000);
        }


      });


      //delete funtion
      var id_del_packing = null;
      $('#packing-table').on('click', '.delete-btn', function () {
        $('#delete_confirm_packing').modal('show');
        id_del_packing = $(this).data('id');
        var where_style = "WHERE style_id=" + "'" + id_style + "'"

        var select_packing = {
          "table": "config_packing_style",
          "operation": "select",
          "sections": "*",
          "condition": where_style,
          "sorted": "",
          "header_fm": "",
          "value_fm": ""
        }

        $.ajax({
          type: "POST",
          url: "http://10.19.5.106:5001/api/fConfCommand",
          dataType: "json",
          contentType: "application/json; charset=utf-8",
          data: JSON.stringify(select_packing),

          success: function (response) {
            var rep = response['Message'];

            var ID = rep[0].style_id;
            var Name = rep[0].style_name;
            $("#config-del").html('<span style="color:red;">' + ID + " " + Name + " ?" + '</span>');
          }
        });
      });
      //confirm delete
      $('#Delete_packing').on('click', function () {
        var text_id = "style_id=" + "'" + id_del_packing + "'"
        data_delete = {
          "table": "config_packing_style",
          "operation": "delete",
          "sections": "",
          "condition": text_id,
          "sorted": "",
          "header_fm": "",
          "value_fm": ""
        }
        $.ajax({
          type: "POST",
          url: "http://10.19.5.106:5001/api/fConfCommand",
          dataType: "json",
          contentType: "application/json; charset=utf-8",
          data: JSON.stringify(data_delete),

          success: function (response) {
            resetDataTable()

            $('.alert').remove();
            $('<div class="alert alert-success d-flex align-items-center" role="alert" style="position: fixed; z-index: 1; margin-left:78%; width:20%;">' +
              '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">' +
              '<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg>' +
              'delete success! </div>').appendTo('.AlertTEST');

            setTimeout(function () {
              $('.alert').remove();
            }, 5000);

          }

        });

      });



    }

  });
});

// function reset table
function loadDataTable() {
  data_reset = {
    "table": "config_packing_style",
    "operation": "select",
    "sections": "*",
    "condition": "",
    "sorted": "",
    "header_fm": "",
    "value_fm": ""
  }


  $.ajax({
    type: "POST",
    url: "http://10.19.5.106:5001/api/fConfCommand",
    dataType: "json",
    contentType: "application/json; charset=utf-8",
    data: JSON.stringify(data_reset),

    success: function (response) {

      var packing_reset = response['Message']


      $('#packing-table').DataTable({
        destroy: true,
        data: packing_reset,
        columns: [
          { data: 'style_id' },
          { data: 'style_name' },
          { data: 'flag' },
          { data: 'updatetime' },
          {
            data: null,
            render: function (row) {
              var editButton = '<button class="btn btn-warning edit-btn" data-id="' + row.style_id + '">' +
                'Edit' +
                '</button>';

              var deleteButton = '<button class="btn btn-danger delete-btn" data-id="' + row.style_id + '">' +
                '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16"><path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/></svg>' +
                '</button>';

              return editButton + '\n' + deleteButton;
            }
          }

        ]
      });
    }
  });
}
function resetDataTable() {
  loadDataTable();
}