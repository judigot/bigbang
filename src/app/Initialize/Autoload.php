<?php

spl_autoload_register(function ($Class) {
    require "$Class.php";
});
