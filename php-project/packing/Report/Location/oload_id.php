<?php
$receivedArray = $_POST['myArray'];

$startButton = $_POST['startButton'];

$endButton = $_POST['endButton'];
// echo $endButton ;

for ($i = $startButton; $i <= $endButton; $i++) {
    ?>
    <div class="d-grid gap-2 col-3  mb-3">
        <button onclick="query_id('<?php echo $receivedArray[$i]; ?>')" value="<?php echo $receivedArray[$i]; ?>"
            class="btn btn-dark"><?php echo $receivedArray[$i]; ?> <i class="fa fa-unlock-alt" aria-hidden="true"></i></i>
        </button>
    </div>
    <?php
}
?>

