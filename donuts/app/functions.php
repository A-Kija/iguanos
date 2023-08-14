<?php
function flash()
{
    $_SESSION['flash'] = $_POST;
}

function clearFlash()
{
    unset($_SESSION['flash']);
}

function old($field, $default = '')
{
    return $_SESSION['flash'][$field] ?? $default;
}
