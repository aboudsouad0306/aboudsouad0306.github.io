<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
// include database and object files
include_once 'product.php';
// initialize object
$product = new Product();
// check if more than 0 record found
if(true){
    // products array
$products_arr=array();
$products_arr["records"]=array();
$x=0;
// retrieve our table contents
// fetch() is faster than fetchAll()
// http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
while ($x<10){
// extract row
// this will make $row['name'] to
// just $name only
//extract($row);
$product_item=array(
"id" => 1,
"name" => "hocine",
"description" => "loves souad samta",
"price" => 33,
"category_id" => 4,
"category_name" =>"dkfj dfjd"
);
array_push($products_arr["records"], $product_item);
$x++;
}
echo json_encode($products_arr);
}
else{
echo json_encode(
array("message" => "No products found.")
);
}
?>