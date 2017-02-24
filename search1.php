<?php
require_once 'core/init.php';

if(Input::exists('get'))
{
    $name=Input::get('name');
    $db=DB::getInstance();
    $data=$db->query("SELECT * FROM ordermain WHERE orderid LIKE '".$name."%';");
    $count=$db->count();
    $i=0;
//    while($i<$count)
//    {
//        $arr[]=array('id'=>$data->results()[$i]->orderid);
//        $i++;
//    }
    $arr[]=array('id'=>$data->results()[0]->orderid);
    echo json_encode($arr);
}

?>