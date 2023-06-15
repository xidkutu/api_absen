<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

function antiinjection($data){
    $filter_sql = stripslashes(strip_tags(htmlspecialchars($data, ENT_QUOTES)));
    return $filter_sql;
}

function cleartag($data){
    $filter_sql = stripslashes(strip_tags($data));
    return $filter_sql;
}

function uniq_id($data){
    $pref_salt = uniqid(rand(), true);
    $suff_salt = time();
    $data = time() . md5($pref_salt . $data . $suff_salt) . uniqid(rand());
    return $data;
}
function encrypt_decrypt($data = array(), $aksi = "encrypt") {
    $CI =& get_instance();
    $method = array(
        'driver' => 'openssl',
        'cipher' => 'aes-256',
        'mode' => 'cbc',
    );
    $CI->encryption->initialize($method);
    if ($aksi == "decrypt") {
        $decrypt = $CI->encryption->decrypt($data);
        $dt_return = unserialize($decrypt);
    } else {
        $dt_serial = serialize($data);
        $dt_return = $CI->encryption->encrypt($dt_serial);
    }
    return $dt_return;
}

function encrypt_string($data) {
    $CI =& get_instance();
    $method = array(
        'driver' => 'openssl',
        'cipher' => 'aes-256',
        'mode' => 'cbc',
    );
    $CI->encryption->initialize($method);
    $dt_return = $CI->encryption->encrypt($data);
    return $dt_return;
}

function decrypt_string($data) {
    $CI =& get_instance();
    $method = array(
        'driver' => 'openssl',
        'cipher' => 'aes-256',
        'mode' => 'cbc',
    );
    $CI->encryption->initialize($method);
    $dt_return = $CI->encryption->decrypt($data);
    return $dt_return;
}
?>