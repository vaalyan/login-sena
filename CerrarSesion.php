<?php

    session_start();
    session_unset();
    session_destroy();

    header("Locaton: index.php");