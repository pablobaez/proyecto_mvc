<?php
unset($_SESSION[k_username]);
session_destroy();
header('Location:?view=index');
 ?>
