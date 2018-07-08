<?php
include_once 'Cars.php';
$cars = new Cars();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $str = file_get_contents('newjson.json');
        $json = json_decode($str, true);

        if ($json['city'] == 'Hamburg') {
            $name = $json['name'];
            $age = intval($json['age']);
            $country = $json['country'];
            $city = $json['city'];
            $carsstringname = "";
            $carsstringmodel = "";
            for ($i = 1; $i <= count($json['cars']); $i++) {
                $carsstringname = $carsstringname . ',' . $json['cars'][$i - 1]['name'];
                $carsstringmodel = $carsstringmodel . ',' . $json['cars'][$i - 1]['model'];
            }




            $carsname = $json['cars'][0]['name'];
            $carsmodel = $json['cars'][0]['model'];



            $sql = "Insert into cars (name, age, country, city, cars_name, cars_model) values ('$name', $age,'$country','$city',"
                    . "'$carsstringname','$carsstringmodel')";

            echo $sql;

            $result = $cars->insert($sql);
            if ($result) {
                echo "success";
            } else {
                echo "Failure";
            }
        } else
            echo "Not Hamburg";
        ?>
    </body>
</html>
