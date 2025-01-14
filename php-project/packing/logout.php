<?php
session_start();
session_unset();
session_destroy();

?>

<script>
  sessionStorage.clear();
</script>


<?php exit;?>