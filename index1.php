<?php
require_once "core/init.php";

if(Input::exists('post'))
{
    $text=Input::get("text");
    $db=DB::getInstance();
    $data=$db->get('ordermain',array('orderid','=',$text));
    $count=$db->count();
//    echo $count;
    if($count>0)
    {$status=$data->results()[0]->status;}
}

?>
<html>
<head>
    <title>Order Status</title>
</head>
<body>
<form action="index.php" method="post">
    <input type="text" name="text" id="text">
    <ul id="list"></ul>
    <button type="submit" id="search">Search</button>
    <div>
        <?php
        if($count>0) {
            if ($status == 'pickup') {
                $pickup = $db->get('pickup', array('orderid', '=', $text));
                echo "Name of the excecutive: " . $pickup->results()[0]->name . "<br>";
                echo "Contact number :" . $pickup->results()[0]->number . "<br>";
                echo "Date of pickup :" . $pickup->results()[0]->date . "<br>";
                echo "Time of pickup :" . $pickup->results()[0]->time . "<br>";
            }
            if ($status == 'repair') {
                $repair = $db->get('repair', array('orderid', '=', $text));
                $res = $repair->results()[0];
                echo "Time of repair :" . $res->time . "<br>";
                echo "Comment :" . $res->comments . "<br>";
            }
            if ($status == 'delivery') {
                $delivery = $db->get('delivery', array('orderid', '=', $text));
                $result = $delivery->results()[0];
                echo "Delivery excecutive name :" . $result->name . "<br>";
                echo "Contact number :" . $result->number . "<br>";
                echo "Date of delievry :" . $result->date . "<br>";
                echo "Time of delivery :" . $result->time . "<br>";
                echo "Amount to be paid :" . $result->amount . "<br>";
            }
        }
        ?>
    </div>
    <span id="run"></span>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
       $("#text").keyup(function () {
           var val= $("#text").val();
           if(val.length>2)
           {    $.ajax({
              url:'search.php',
               data: 'name='+val,
               success:function (data) {
                 $("#run").html(data);


//

               }
           });

           }
       });
    });

</script>
</body>
</html>