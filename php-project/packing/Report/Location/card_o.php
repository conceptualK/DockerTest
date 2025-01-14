<?php
$receivedArray = json_decode($_POST['myArray'], true);


$totalButtons = count($receivedArray) - 1;
$buttonsPerPage = 36;
$totalPages = ceil($totalButtons / $buttonsPerPage);

$currentPage = isset($_POST['page']) ? (int) $_POST['page'] : 1;

$startButton = ($currentPage - 1) * $buttonsPerPage + 1;
$endButton = min($startButton + $buttonsPerPage - 1, $totalButtons);


?>


<div class="p-3 border bg-light" style="height:540px;">
    <div class="row">
        <div class="col-12 mb-4">
            <div class="row" id="reload_btn"></div>
        </div>
    </div>
</div>


<?php
if ($totalButtons > $buttonsPerPage) {

    ?>
    <div class="row">
        <!-- Pagination -->
        <div class="sticky-bottom">
            <nav aria-label="Page navigation" class="mt-4">
                <ul class="pagination justify-content-center">

                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <li class="page-item">
                            <a class="page-link" href="#"
                                onclick="reload_btn(<?php echo $i . ',' . $buttonsPerPage . ',' . $totalPages . ',' . $startButton . ',' . $buttonsPerPage . ',' . $endButton . ',' . $totalButtons; ?>)"><?php echo $i; ?></a>
                        </li>
                    <?php endfor; ?>
                </ul>
            </nav>
        </div>
    </div>
<?php } ?>


<script>

    $('#reload_btn').html("");

    $.ajax({
        type: "POST",
        url: 'oload_id.php',
        data: { 'page': 1, 'myArray': <?php echo $_POST["myArray"]; ?>, 'endButton': <?php echo $endButton; ?>, 'startButton': <?php echo $startButton; ?> },
        success: function (data) {
            $('#reload_btn').html(data);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.error(textStatus, errorThrown);

        }
    });

    function reload_btn(index, buttonsPerPage, totalPages, startButton, buttonsPerPage, endButton, totalButtons) {
        startButton = (index - 1) * buttonsPerPage + 1;
        endButton = Math.min(startButton + buttonsPerPage - 1, totalButtons);

        console.log('buttonsPerPage :' + buttonsPerPage + 'totalPages : ' + totalPages + 'currentPage : ' + index + 'startButton : ' + startButton + 'endButton :' + endButton);
        $('#reload_btn').html("");

        $.ajax({
            type: "POST",
            url: 'oload_id.php',
            data: { 'page': index, 'myArray': <?php echo $_POST["myArray"]; ?>, 'endButton': endButton, 'startButton': startButton },
            success: function (data) {
                // console.log(data);
                $('#reload_btn').html(data);
            }
        });

    }
</script>