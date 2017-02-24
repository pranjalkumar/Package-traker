<?php
require_once "core/init.php";

$z = 0;
if(Input::exists('post'))
{
    $z = 0;
    $text=Input::get("text");
    $db=DB::getInstance();
    $data=$db->get('ordermain',array('orderid','=',$text));
    $count=$db->count();
//    echo $count;
    if($count>0)
    {
        $z = 1;
        $status=$data->results()[0]->status;
    }
}
?>

<html>
<head>
    <title>Package Tracker | Track your Package</title>
    <meta name="viewport"
          content="width=device-width, initial-scale=1"/>
    <link rel="icon" href="package.ico">

    <!-- Material Icons -->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Materialize -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
</head>
<body>
    <nav>
        <div class="nav-wrapper container">
            <a href="#" class="brand-logo"><img src="package.ico" height="40" width="40"> PACKAGE TRACKER</a>
        </div>
    </nav>
    <div class="container">
        <br>
        <div class="center-align"><i style="text-transform: uppercase;">Get the complete information about your order.</i></div>
        <br>
        <form action="index.php" method="post">
            <div class="input-field">
                <input id="text" name="text" type="text" class="autocomplete">
                <label for="text">Enter your order ID</label>
            </div>
            <ul id="list"></ul>
            <div class="input-field">
                <button class="waves-effect waves-light btn" type="submit" id="search"><i class="material-icons left">search</i>Search</button>
            </div>
            <div>
                <?php
                if($z > 0) {
                    if ($status == 'pickup') {
                        $pickup = $db->get('pickup', array('orderid', '=', $text));

                        echo "<div class='card'><div class='card-content'><p>";

                        echo "<b>Name of the excecutive: </b>" . $pickup->results()[0]->name . "<br>";
                        echo "<b>Contact number: </b>" . $pickup->results()[0]->number . "<br>";
                        echo "<b>Date of pickup: </b>" . $pickup->results()[0]->date . "<br>";
                        echo "<b>Time of pickup: </b>" . $pickup->results()[0]->time . "<br>";

                        echo "</p></div></div>";
                    }
                    if ($status == 'repair') {
                        $repair = $db->get('repair', array('orderid', '=', $text));
                        $res = $repair->results()[0];

                        echo "<div class='card'><div class='card-content'><p>";

                        echo "<b>Time of repair: </b>" . $res->time . "<br>";
                        echo "<b>Comment: </b>" . $res->comments . "<br>";

                        echo "</p></div></div>";
                    }
                    if ($status == 'delivery') {
                        $delivery = $db->get('delivery', array('orderid', '=', $text));
                        $result = $delivery->results()[0];

                        echo "<div class='card'><div class='card-content'><p>";

                        echo "<b>Delivery excecutive name: </b>" . $result->name . "<br>";
                        echo "<b>Contact number: </b>" . $result->number . "<br>";
                        echo "<b>Date of delievry: </b>" . $result->date . "<br>";
                        echo "<b>Time of delivery: </b>" . $result->time . "<br>";
                        echo "<b>Amount to be paid: </b>" . $result->amount . "<br>";

                        echo "</p></div></div>";
                    }
                }
                ?>
            </div>
        </form>
    </div>



    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <script>
        $(document).ready(function () {
           $("#text").keyup(function () {
               $("#list").html("");
               var val= $("#text").val();
               if(val.length>2)
               {    $.ajax({
                  url:'search.php',
                   data: 'name='+val,
                   success:function (data) {
                       var parsed = JSON.parse(data);

                       var list = [];

                       for (var i = 0; i < parsed.length; ++i)
                       {
                           list[parsed[i].id] = null;
                       }

                       $('input.autocomplete').autocomplete({
                           data: list,
                           limit: 4
                       });
                   }
               });
               }
           });
        });
    </script>

    <!-- Materialize -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>

</body>
</html>