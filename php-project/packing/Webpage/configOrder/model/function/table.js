TableConfig()
function TableConfig() {

  Data = {
    "table": "config_sn_model",
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
    data: JSON.stringify(Data),

    success: function (response) {
      

      var invoice = response['Message']
      $('#model_table').DataTable({
        data: invoice,
        columns: [{
          data: 'id'
        },
        { data: 'sn_id' },
        { data: 'sn_partno' },
        { data: 'sn_describe' },
        { data: 'type' },
        { data: 'flag' },
        { data: 'updatetime' },
        {
          data: null,
          render: function (row) {
            var editButton = '<button class="btn btn-warning edit-btn" data-id="' + row.id + '">' +
              'Edit' +
              '</button>';
            var deleteButton = '<button class="btn btn-danger delete-btn" data-id="' + row.id + '">' +
              '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16"><path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/></svg>' +
              '</button>';

            return editButton + '\n' + deleteButton;
          }
        }]
      });

      var id = null
      $('#model_table').on('click', '.edit-btn', function () {
        id = $(this).data('id');
        var text_id = "WHERE id=" + "'" + id + "'"

        var value = {
          "table": "config_sn_model",
          "operation": "select",
          "sections": "*",
          "condition": text_id,
          "sorted": "",
          "header_fm": "",
          "value_fm": ""
        }


        $('#edit').modal('show');

        $.ajax({
          type: "POST",
          url: "http://10.19.5.106:5001/api/fConfCommand",
          dataType: "json",
          contentType: "application/json; charset=utf-8",
          data: JSON.stringify(value),

          success: function (response) {
            var rep = response['Message']

            $('#sn_id_edit').val(rep[0].sn_id);
            $('#sn_partno_edit').val(rep[0].sn_partno)
            $('#sn_describe_edit').val(rep[0].sn_describe)
            $('#type_edit').val(rep[0].type)
            $('#add_flag_edit').val(rep[0].flag)

          }
        });

        //         //button uptade
        $('#update').on('click', function () {
          var text_id = "id=" + "'" + id + "'"
          var sn_id = $('#sn_id_edit').val();
          var partno = $('#sn_partno_edit').val();
          var des = $('#sn_describe_edit').val();
          var type = $('#type_edit').val();
          var flag = $('#add_flag_edit').val();



          var text_value = `sn_id='${sn_id}', sn_partno='${partno}', sn_describe='${des}', type='${type}', flag='${flag}'` //"flag=" + "'" + option_flag + "'" + "," + "status_name=" + "'" + edit_status_name + "'"
         
          var data_edit_status = {
            "table": "config_sn_model",
            "operation": "update",
            "sections": "",
            "condition": text_id,
            "sorted": "",
            "header_fm": "",
            "value_fm": text_value
          }
        

          if (sn_id &&
            partno &&
            type
          ) {
            $.ajax({
              type: "POST",
              url: "http://10.19.5.106:5001/api/fConfCommand",
              dataType: "json",
              contentType: "application/json; charset=utf-8",
              data: JSON.stringify(data_edit_status),

              success: function (response) {

                loadDataTable();

                if (response['MsgResult'] === '000000') {
                  $('.alert').remove();
                  $('<div class="alert alert-success d-flex align-items-center" role="alert" style="position: fixed; z-index: 1; margin-left:78%; width:20%;">' +
                    '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">' +
                    '<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg>' +
                    response['ErrorMessage'] + '</div>').appendTo('.AlertTEST');

                  setTimeout(function () {
                    $('.alert').remove();
                  }, 5000);
                } else {


                  $('.alert').remove();
                  $('<div class="alert alert-success d-flex align-items-center" role="alert" style="position: fixed; z-index: 1; margin-left:78%; width:20%;">' +
                    '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">' +
                    '<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg>' +
                    response['ErrorMessage'] + ' </div>').appendTo('.AlertTEST');

                  setTimeout(function () {
                    $('.alert').remove();
                  }, 5000);
                }


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

      });
      //delete funtion
      var del_id = null;
      $('#model_table').on('click', '.delete-btn', function () {
        $('#delete_confirm').modal('show');
        del_id = $(this).data('id');
        var text_id = "id=" + "'" + del_id + "'"
        var where_status = "WHERE id =" + "'" + del_id + "'"

        var select= {
          "table": "config_sn_model",
          "operation": "select",
          "sections": "*",
          "condition": where_status,
          "sorted": "",
          "header_fm": "",
          "value_fm": ""
        }

        $.ajax({
          type: "POST",
          url: "http://10.19.5.106:5001/api/fConfCommand",
          dataType: "json",
          contentType: "application/json; charset=utf-8",
          data: JSON.stringify(select),

          success: function (response) {
            var rep = response['Message'];

            var partno = rep[0].sn_partno;
            var type = rep[0].type;
            $("#config-del").html('<div style="color:red;">' + partno + " " + type + " ?" + '</div>');
          }
        });


        $('#Delete').on('click', function () {
          data_delete = {
            "table": "config_sn_model",
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
              loadDataTable()

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
      });



    }

  });
}

// function reset table
function loadDataTable() {
  data_reset = {
    "table": "config_sn_model",
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

      var table_reset = response['Message']


      $('#model_table').DataTable({
        destroy: true,
        data: table_reset,
        columns: [{
          data: 'id'
      },
      {
          data: 'sn_id'
      },
      {
          data: 'sn_partno'
      },
      {
          data: 'sn_describe'
      },
      {
          data: 'type'
      },
      {
          data: 'flag'
      },
      {
          data: 'updatetime'
      },
      {
          data: null,
          render: function(row) {
              var editButton = '<button class="btn btn-warning edit-btn" data-id="' + row.id + '">' +
                  'Edit' +
                  '</button>';
              var deleteButton = '<button class="btn btn-danger delete-btn" data-id="' + row.id + '">' +
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
