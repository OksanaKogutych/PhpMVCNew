<?php if (isset($_SESSION['username'])) { ?>
<h3>Hello,<?php echo $_SESSION['username'];  ?>!</h3> <?php } else {?>
<h3>Hello  unauthorized user! </h3><?php } ?>


