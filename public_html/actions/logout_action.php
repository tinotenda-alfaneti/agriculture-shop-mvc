<?php
    include("../settings/core.php");

    // remove all session variables
    session_unset();

    // destroy the session
    session_destroy();

    header('Location:../view/index.php');
?>