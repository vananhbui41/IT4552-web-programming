<html>
    <head>
        <title>Date Time Function</title>
        <meta charset="utf-8">
        <style>
            table {
                border-collapse: separate;
                border-spacing: 30px 0;
            }

            td {
                padding: 5px 0;
            }
        </style>
    </head>
    <body>
    <?php
            $name1 = $name2 = $date1 = $date2 = "";

            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                if (empty($_POST["name1"])){
                    echo "<span style='color:red;'>Error: Name is required</span>";
                }
                else {
                    $name1 = test_input($_POST["name1"]);
                }
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                if (empty($_POST["name2"])){
                    echo "<span style='color:red;'>Error: Name is required</span>";
                }
                else {
                    $name2 = test_input($_POST["name2"]);
                }
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                if (empty($_POST["date1"])){
                    echo "<span style='color:red;'>Error: Date of birth is required</span>";
                }
                else {
                    $date1 = test_input($_POST["date1"]);
                }
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                if (empty($_POST["date2"])){
                    echo "<span style='color:red;'>Error: Date of birth is required</span>";
                }
                else {
                    $date2 = test_input($_POST["date2"]);
                }
            }

            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
              }
        ?>

        <!-- Function -->
        <?php
            // Validate them if birthday
                function checkIsAValidDate($myDateString){
                    return (bool)strtotime($myDateString);
                }
            
            // Display in two dates in letter
                function dateInLetter($d){
                    return date("l,F d,Y",$d);
                }
            //
                function daysBetweenDates($first_date,$second_date){
                    $datediff = abs($first_date - $second_date);
                    return floor($datediff / (60*60*24));
                }

                function age($d){
                    $diff = abs(strtotime("today") - $d);
                    return floor($diff / (365*60*60*24));
                }
           ?> 

           <table>
               <?php
                    // main
                    if (checkIsAValidDate($date1) && checkIsAValidDate($date2)){
                        echo "<tr><th>Name</th><th>Date of birth</th><th>Age</th></tr>";
                        $date1 = strtotime($date1);
                        $date2 = strtotime($date2);
    
                        echo "<tr><td>$name1</td><td>".dateInLetter($date1)."</td><td>".age($date1)."</td></tr>";
                        echo "<tr><td>$name2</td><td>".dateInLetter($date2)."</td><td>".age($date2)."</td></tr>";

                        echo "<tr><th>The difference in days between two dates:</th><td>".daysBetweenDates($date1,$date2)."</td><td>&nbsp;</td></tr>";
                        echo "<tr><th>The difference years between two persons:</th><td>".abs(age($date1)-age($date2))."</td><td>&nbsp;</td></tr>";
                    }
                    else {
                        echo "Date is invalid!!!";
                    }
               ?>
           </table>
    </body>
</html>