#!/usr/bin/php
<?php
/*
 * Usage: generate.php [key]
 *
 * If no key is provided as an arg, the script will ask for it.
 *
 */

function base32_decode($str)
{
    $str = strtolower($str);
    $str = str_replace(' ', '', $str);
    $alphabet = 'abcdefghijklmnopqrstuvwxyz234567';
    $tmp = '';

    foreach (str_split($str) as $c) {
        if (($v = strpos($alphabet, $c)) === false) {
            $v = 0;
        }
        $tmp .= sprintf('%05b', $v);
    }

    $args = array_map('bindec', str_split($tmp, 8));
    array_unshift($args, 'C*');
    return rtrim(call_user_func_array('pack', $args), "\0");
}

$key = '';

if ($argc == 2) {
    $key = $argv[1];
} else {
    echo "Enter secret key: ";
    $key = trim(fgets(STDIN));

    if ($key == '') {
        echo "No key provided\n";
        exit(1);
    }
}

$key = base32_decode($key);

include 'totp.php';

echo "Token: " . (new Totp())->GenerateToken($key) . "\n";