<?php include('modal_pl.php');?>

<?php
$receivedArray = $_POST['myArray'];
$startButton = $_POST['startButton'];
$endButton = $_POST['endButton'];
$orderID = $_POST['orderID'];
$flag = $_POST['flag'];
$f = $_POST['f'];

// echo $startButton;
// echo $endButton;


for ($i = $startButton; $i <= $endButton; $i++) {
    ?>
    <div class="d-grid gap-2 col-4  mb-3">
        <button onclick="trigger_md('<?php echo $orderID[$i]; ?>','<?php echo $receivedArray[$i]; ?>','<?php echo $flag[$i]; ?>','<?php echo $f[$i]; ?>','')" value="<?php echo $receivedArray[$i]; ?>"
            class="btn btn-primary"><?php echo $receivedArray[$i]; ?> <i class="fa fa-info-circle" aria-hidden="true"></i></i>
        </button>
    </div>
    <?php
}
?>  
