<?php 
// Database connection info 
$dbDetails = array( 
    'host' => 'localhost', 
    'user' => 'root', 
    'pass' => '', 
    'db'   => 'order_crm' 
); 
 
// DB table to use 
$table = 'tb_pelanggan'; 
 
// Table's primary key 
$primaryKey = 'id_pel'; 
 
// Array of database columns which should be read and sent back to DataTables. 
// The `db` parameter represents the column name in the database.  
// The `dt` parameter represents the DataTables column identifier. 
$columns = array( 
    array( 'db' => 'id_pel', 'dt' => 0 ),
    array( 'db' => 'id_pel', 'dt' => 1 ), 
    array( 'db' => 'nama_pel', 'dt' => 2 ), 
    array( 'db' => 'layanan',  'dt' => 3 ), 
    array( 'db' => 'ca',      'dt' => 4 ), 
    array( 'db' => 'ca_site',     'dt' => 5 ), 
    array( 'db' => 'ca_nipnas',    'dt' => 6 ), 
    array( 'db' => 'ba',    'dt' => 7 ), 
    array( 'db' => 'ba_site',    'dt' => 8 ), 
    array( 'db' => 'nomor_quote',    'dt' => 9 ), 
    array( 'db' => 'nomor_aggre',    'dt' => 10 ), 
    array( 'db' => 'nomor_order',    'dt' => 11 ), 
    array( 'db' => 'sid',    'dt' => 12 ), 
    array( 'db' => 'alamat',    'dt' => 13 ), 
    array( 'db' => 'phone',    'dt' => 14 ), 
); 
 
// Include SQL query processing class 
require 'ssp.class.php'; 
 
// Output data as json format 
echo json_encode( 
    SSP::simple( $_GET, $dbDetails, $table, $primaryKey, $columns ) 
);