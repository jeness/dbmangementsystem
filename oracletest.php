<?php

$conn = oci_connect('YYU', '31415Zhang', 'oracle.cise.ufl.edu:1521/orcl');
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$stid = oci_parse($conn, 'SELECT * FROM bookwithcate where rownum<=5');
$r = oci_execute($stid);
oci_fetch_all($stid, $res);
var_dump($res);


$stid1 = oci_parse($conn, 'SELECT * FROM "checkout" where rownum<=5');
$r = oci_execute($stid1);
oci_fetch_all($stid1, $res1);
var_dump($res1);

// Free the statement identifier when closing the connection
oci_free_statement($stid);
oci_free_statement($stid1);
oci_close($conn);

?>