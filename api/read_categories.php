<?php

//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

//call the initialize.php (initializing the api)
include_once('../core/initialize.php');

//instantiate post
$category = new Category($db);

//blog post query
$result = $category->read();

//get the row count
$num = $result->rowCount();

if($num > 0){
    $category_arr = array();
    $category_arr['data'] = array();
    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $category_item = array(
            'id'            => $id,
            'name'          => $name,
            'create_date'   => $create_date
        );
        array_push($category_arr['data'], $category_item);
    }

    //convert to JSON and then output
    echo json_encode($category_arr);


}else{
    echo json_encode(array('message' => 'No posts found.'));
}

?>