<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Config</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="http://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
    <link rel="stylesheet" href="http://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">

    <script src="function/table.js"></script>
    <script src="function/add_btn.js"></script>

</head>

<?php include '../../../menu_head.php' ?>

<body>

    <div class="AlertTEST"></div>
    <div class="container">



        <div style="margin-bottom: 10%;">
            <h3 style=" margin-bottom: 2%; margin-top: 5%; color: #162D5A ; font-weight: bold;">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                    class="bi bi-gear-fill" viewBox="0 0 16 16">
                    <path
                        d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
                </svg>
                Model config
            </h3>
            <!-- Add category button -->
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal"
                style="margin-left: 92.5%;">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                    class="bi bi-plus-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"></path>
                    <path
                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4">
                    </path>
                </svg>
                ADD
            </button>

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Add Vendor</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" id="">

                            <form action="" id="resetform">
                                <div class="form-group">
                                    <label for="sn_id" class="col-form-label">sn_id</label>
                                    <input type="text" class="form-control" id="sn_id" placeholder="">
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="sn_partno" class="col-form-label">sn_part NO</label>
                                    <input type="text" class="form-control" id="sn_partno" placeholder="">
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="sn_describe" class="col-form-label">sn_describe</label>
                                    <input type="text" class="form-control" id="sn_describe" placeholder="">
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="type" class="col-form-label">type</label>
                                    <input type="text" class="form-control" id="type" placeholder="">
                                </div>
                                <br>
                                <label for="edit_flag" class="col-form-label">flag</label>
                                <div class="input-group">

                                    <select class="form-select" id="add_flag" name="add_flag">
                                        <option value="T">True</option>
                                        <option value="F">False</option>
                                    </select>

                                </div>
                                <br>
                                <label for="editName" style="color:#ff3c3c; font-size: 90%;">Flag*</label>
                                <div><label for="editName" style="color:#ff3c3c; font-size:80%;">True หมายถึง เปิดเข้างาน </label></div>
                                <div><label for="editName" style="color:#ff3c3c; font-size:80%;">False หมายถึง ปิดใช้งาน </label></div>
                                <br>
                            </form>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal"
                                onclick="send_add()">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-floppy2-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M1.5 0A1.5 1.5 0 0 0 0 1.5v13A1.5 1.5 0 0 0 1.5 16h13a1.5 1.5 0 0 0 1.5-1.5V2.914a1.5 1.5 0 0 0-.44-1.06L14.147.439A1.5 1.5 0 0 0 13.086 0zM4 6a1 1 0 0 1-1-1V1h10v4a1 1 0 0 1-1 1zM3 9h10a1 1 0 0 1 1 1v5H2v-5a1 1 0 0 1 1-1" />
                                    </svg>
                                    Save
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>



            <!-- popup Edit category -->
            <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="editCategory"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="">Edit Model</h5>
                        </div>


                        <div class="modal-body">
                            <form action="" id="resetform">
                                <div class="form-group">
                                    <label for="sn_id" class="col-form-label">sn_id</label>
                                    <input type="text" class="form-control" id="sn_id_edit" placeholder="">
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="sn_partno" class="col-form-label">sn_part NO</label>
                                    <input type="text" class="form-control" id="sn_partno_edit" placeholder="">
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="sn_describe" class="col-form-label">sn_describe</label>
                                    <input type="text" class="form-control" id="sn_describe_edit" placeholder="">
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="type" class="col-form-label">type</label>
                                    <input type="text" class="form-control" id="type_edit" placeholder="">
                                </div>
                                <br>
                                <label for="edit_flag" class="col-form-label">flag</label>
                                <div class="input-group">

                                    <select class="form-select" id="add_flag_edit">
                                        <option value="T">True</option>
                                        <option value="F">False</option>
                                    </select>

                                </div>
                                <br>
                                <label for="editName" style="color:#ff3c3c; font-size: 90%;">Flag*</label>
                                <div><label for="editName" style="color:#ff3c3c; font-size:80%;">True หมายถึง เปิดเข้างาน </label></div>
                                <div><label for="editName" style="color:#ff3c3c; font-size:80%;">False หมายถึง ปิดใช้งาน </label></div>
                                <br>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="update">Update</button>
                            </button>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Delete confirm -->
            <div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle" style="color:red;">Delete</h5>
                        </div>
                        <div class="modal-body">
                            <span><strong>Do you want to delete</strong></span>
                            <span id="config-del"></span>
                        </div>
                        <div class="modal-footer">
                            <button id="cancel" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal"
                                id="Delete">OK</button>
                        </div>
                    </div>
                </div>
            </div>




            <table class="table table-striped table-bordered table-hover" style="text-align: center;" id="model_table">
                <thead class="table-dark">
                    <tr>
                        <th>id</th>
                        <th>sn id</th>
                        <th>sn partno</th>
                        <th>sn describe</th>
                        <th>type</th>
                        <th>Flag</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
            <br>
            <br>

        </div>

</body>

</html>