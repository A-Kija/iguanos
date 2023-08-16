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

function check(array $roles, bool $header = false)
{
    return Donuts\Auth::check($roles, $header);
}
