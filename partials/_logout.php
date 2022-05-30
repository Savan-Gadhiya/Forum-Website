<?php
echo "Logging you out. Please wait...";
session_start();
session_unset();
session_destroy();
header("location: /php/Forum Project/");

?>