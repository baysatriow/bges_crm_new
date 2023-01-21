<?php 
// Database connection info 
$dbDetails = array( 
    'host' => 'localhost', 
    'user' => 'root', 
    'pass' => '', 
    'db'   => 'order_crm' 
); 
 
// DB table to use 
$table = 'tb_order'; 

 
// Table's primary key 
$primaryKey = 'id_order'; 
 
// Array of database columns which should be read and sent back to DataTables. 
// The `db` parameter represents the column name in the database.  
// The `dt` parameter represents the DataTables column identifier. 
$columns = array( 
    array( 'db' => 'id_order', 'dt' => 0 ),
    array( 'db' => 'nama_am', 'dt' => 1 ), 
    // array( 'db' => 'segmen', 'dt' => 2 ), 
    // array( 'db' => 'nama_am', 'dt' => 3 ),
    // array( 'db' => 'nama_pel', 'dt' => 4 ),
    // array( 'db' => 'layanan', 'dt' => 5 ),
    // array( 'db' => 'hrg_otc', 'dt' => 6 ),
    // array( 'db' => 'hrg_mountly', 'dt' => 7 ),
    // array( 'db' => 'status_lyn', 'dt' => 8 ),
    // array( 'db' => 'ca', 'dt' => 9 ),
    // array( 'db' => 'ca_site', 'dt' => 10 ),
    // array( 'db' => 'ca_nipnas', 'dt' => 11 ),
    // array( 'db' => 'ba', 'dt' => 12 ),
    // array( 'db' => 'ba_site', 'dt' => 13 ),
    // array( 'db' => 'nomor_quote', 'dt' => 14 ),
    // array( 'db' => 'nomor_aggre', 'dt' => 15 ),
    // array( 'db' => 'nomor_order', 'dt' => 16 ),
    // array( 'db' => 'status_order', 'dt' => 17 ),
    // array( 'db' => 'date_end', 'dt' => 18 ),
    // array( 'db' => 'date_end', 'dt' => 19 ),
    // array( 'db' => 'date_prov', 'dt' => 20 ),
    // array( 'db' => 'order_lama', 'dt' => 21 ),
    // array( 'db' => 'sid', 'dt' => 22 ),
    // array( 'db' => 'ket', 'dt' => 23 ),
    array(  'db' => 'id_order',
            'dt' => 24,

            // kalo kalian mau bikin tombol edit pake 'formatter' => function($d, $row) {return ....}
            // kalian bisa custom dengan menggunakan class bootstrap untuk mempercantik tampilan
            'formatter' => function($d, $row) {
                return '<a href="edit?id='.$d.'">EDIT</a>';
            }
         ),
); 
 
// Include SQL query processing class 
require 'ssp.class.php'; 
 
// Output data as json format 
echo json_encode( 
    SSP::simple( $_GET, $dbDetails, $table, $primaryKey, $columns ) 
);