<!DOCTYPE html>
<html>
    <head>
        <title>Date Time Processing</title>
        <meta charset="utf-8">
    </head>
    <body>
        <?php
            $name = "";
            $nameErr = "";

            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                if (empty($_POST["name"])){
                    $nameErr = "Name is required";
                } else {
                    $name = test_input($_POST["name"]);
                }

            }
            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
              }
        ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            Enter your name anh select date and time for appointment <br><br>
            <table>
                <tr>
                    <td>Your name: </td>
                    <td>
                        <input type="text" name="name">
                        <span class="error" style="color: red;">* <?php echo $nameErr;?></span>
                    </td>
                </tr>
               
                <tr>
                    <td>Date:</td>
                    <td>
                        <select name="day" id="day">
                           <?php
                                for ($i =1;$i<=31;$i++){
                                    print("<option>$i</option>");
                                }
                           ?>
                        </select>
                        <select name="month" id="month">
                            <?php
                                for ($i =1;$i<=12;$i++){
                                    print("<option>$i</option>");
                                }
                           ?>
                        </select>
                        <select name="year" id="year">
                            <?php
                                for ($i=date("Y");$i <=(date("Y")+100);$i++){
                                    print("<option>$i</option>");
                                }
                           ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Time:</td>
                    <td>
                        <select name="hour" id="hour">
                            <?php
                                for ($i =0;$i<=23;$i++){
                                    print("<option>$i</option>");
                                }
                           ?>
                        </select>
                        <select name="minute" id="minute">
                            <?php
                                for ($i =0;$i<=59;$i++){
                                    print("<option>$i</option>");
                                }
                           ?>
                        </select>
                        <select name="second" id="second">
                            <?php
                                for ($i =0;$i<=59;$i++){
                                    print("<option>$i</option>");
                                }
                           ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td align="right">
                        <input type="SUBMIT" value="Submit">
                    </td>
                    <td align="left">
                        <input type="RESET" value="Reset">
                    </td>
                </tr>
            </table>
            <?php
                // Kiem tra nam nhuan
                function isCheck($year){
                    return (($year % 4 == 0 && $year % 100 != 0) || $year % 400 == 0);
                }
                // Tra ve so ngay trong thang
                function day_month($month,$year){
                    switch($month){
                        case 1:
                            case 3:
                            case 5:
                            case 7:
                            case 8:
                            case 10:
                            case 12:
                                return 31;
                                break;
                            case 4:
                            case 6:
                            case 9:
                            case 11:
                                return 30;
                                break;
                            case 2:
                                if (isCheck($year))
                                    return 29;
                                else
                                    return 28;
                                break;
                    }
                }

                // main
                if (array_key_exists("day",$_POST)){
                    $day = $_POST["day"];
                    $month = $_POST["month"];
                    $year = $_POST["year"];
                    $hour = $_POST["hour"];
                    $minute = $_POST["minute"];
                    $second = $_POST["second"];
                    
                    $d = mktime($hour, $minute, $second, $month, $day, $year);

                    
                    if ((strtotime("today") < strtotime($d))){
                        echo "Now: ".date("Y-m-d H:i:s!!!")."<br>";
                        echo "D-day:".date("Y-m-d H:i:s!!!",$d)."<br>";
                        echo ("Choose a day in the future!");
                    } else{
                        $x = day_month($month,$year);               
                        echo "Hi $name!<br>";
                        echo "You have choose to have an appointment on ".date("H:i:s, d/m/Y",$d)."<br>";
                        echo "More information <br>";
                        echo "In 12 hours, the time and date is ".date("h:i:sa, d/m/Y",$d)."<br>";
                        echo "This month has $x days!";
                    }

                    
                }                
                
            ?>
        </form>
        
    </body>
</html>