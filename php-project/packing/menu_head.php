<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<!-- bar menu -->
<script>
  $(document).ready(function() {

    $("#bar_config").on('click', function() {
      $("#show_menu").toggle(400);
    });


    $(document).on('click', function(event) {

      if (!$(event.target).closest("#bar_config, #show_menu").length) {
        $("#show_menu").hide(400);

      }
    });



    $("#bar_scan").on('click', function() {
      $("#show_scan").toggle(400);
    });


    $(document).on('click', function(event) {

      if (!$(event.target).closest("#bar_scan, #show_scan").length) {

        $("#show_scan").hide(400);
      }
    });


    $("#drop_sign").on('click', function() {
      $("#ul_sign").toggle(200);
    });
    $(document).on('click', function(event) {

      if (!$(event.target).closest("#drop_sign, #ul_sign").length) {
        $("#ul_sign").hide(200);
      }
    });
  });
</script>

<style>
  li:hover {
    border-left: 4px solid #007bff;

  }
</style>




<header class="p-3 mb-3 bg-white border-bottom" style="box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

      <img src="\packing/image/logo.png" style="width: 10%; height: 9%; margin-left: -4%; margin-right: 3%;">
      <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
        <!-- <li><a href="\packing/home.php" class="nav-link px-2 link-body-emphasis">Home</a></li> -->
        <a href="\packing/Webpage/productionOrder/formProductionOrder.php" class="nav-link px-2 link-body-emphasis">Production Order</a>
        <a id="bar_config" href="#" class="d-block  text-decoration-none dropdown-toggle nav-link px-2 link-secondary " aria-expanded="false">
          <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" class="bi bi-wrench-adjustable" viewBox="0 0 16 16">
            <path d="M16 4.5a4.5 4.5 0 0 1-1.703 3.526L13 5l2.959-1.11q.04.3.041.61" />
            <path d="M11.5 9c.653 0 1.273-.139 1.833-.39L12 5.5 11 3l3.826-1.53A4.5 4.5 0 0 0 7.29 6.092l-6.116 5.096a2.583 2.583 0 1 0 3.638 3.638L9.908 8.71A4.5 4.5 0 0 0 11.5 9m-1.292-4.361-.596.893.809-.27a.25.25 0 0 1 .287.377l-.596.893.809-.27.158.475-1.5.5a.25.25 0 0 1-.287-.376l.596-.893-.809.27a.25.25 0 0 1-.287-.377l.596-.893-.809.27-.158-.475 1.5-.5a.25.25 0 0 1 .287.376M3 14a1 1 0 1 1 0-2 1 1 0 0 1 0 2" />
          </svg>
          Config
        </a>
        <ul id="show_menu" class="dropdown-menu shadow w-220px" data-bs-theme="dark" style="margin-top:2%;">
          <li><a class="dropdown-item d-flex" href="\packing/Webpage/configOrder/category_config">Category config</a></li>
          <li><a class="dropdown-item d-flex" href="\packing/Webpage/configOrder/invoice_config">Invoice config</a></li>
          <li><a class="dropdown-item d-flex" href="\packing/Webpage/configOrder/item_description_config">Item description config</a></li>
          <li><a class="dropdown-item d-flex" href="\packing/Webpage/configOrder/packing_config">Packing config</a></li>
          <li><a class="dropdown-item d-flex" href="\packing/Webpage/configOrder/Vendor_config">Vendor config</a></li>
          <li><a class="dropdown-item d-flex" href="\packing/Webpage/configOrder/model">Model config</a></li>
          <li><a class="dropdown-item d-flex" href="\packing/Webpage/configOrder/product_status">Product Status config</a></li>
        </ul>


        <!-- scan select bar -->
        <a id="bar_scan" href="#" class="d-block  text-decoration-none dropdown-toggle nav-link px-2 link-secondary " aria-expanded="false">
        MANUAL 
        </a>
        <ul id="show_scan" class="dropdown-menu shadow w-220px" data-bs-theme="dark" style="margin-top:2%; left:34.5%;">
          <li><a class="dropdown-item d-flex" href="\packing/Webpage/system_scan/quality">Quality</a></li>
          <li><a class="dropdown-item d-flex" href="\packing/Webpage/system_scan/warehouse">Ware house</a></li>
          <li><a class="dropdown-item d-flex" href="\packing/Webpage/system_scan/delivery">Delivery</a></li>
        </ul>

        <a href="/packing/home.php" class="nav-link px-2 link-secondary">Pallet Position</a>



      </ul>



      <div class="dropdown text-end">
        <a href="#" id="drop_sign" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" aria-expanded="false">
          <img src="\packing/image/p.jpg" alt="Admin" width="32" height="32" class="rounded-circle" style=" color: darkslategrey;">
          <span id="username-display"></span>
        </a>
        <ul class="dropdown-menu text-small" id="ul_sign" style="margin-top:3%;">

          <li><a class="dropdown-item" href="#" onclick="signout()">Sign out</a></li>

        </ul>
      </div>
    </div>
  </div>
</header>
<script>
  const data = localStorage.getItem('username');

  if (data == null) {
    window.location.href = "/packing";
  } else {
    document.getElementById('username-display').textContent = data.toString();
  }

  function signout() {
    localStorage.removeItem('username');
    window.location.reload();
  }
</script>