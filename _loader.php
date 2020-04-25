<?php

function pre() {
    $numargs = func_num_args();
    $arguments = func_get_args();

    echo '<pre>';
    for ($i = 0; $i < $numargs; $i++) {
        var_dump($arguments[$i]);
    }
    echo '</pre>';
}

spl_autoload_register(
    function ($pClassName) {
        require_once str_replace("\\", "/", $pClassName) . '.php';
    }
);
