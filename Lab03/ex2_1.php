<!DOCTYPE html>
<!-- convert radians to degrees and vice versa -->
<html>
    <head>
        <title>Radian and Degree</title>
    </head>
    <body>
        <?php
            function radToDeg($rad){
                return ($rad*180/M_PI) ;
            }
            function degToRad($deg){
                return ($deg*M_PI/180);
            }
        ?>
        <h3>Radians and Degrees Converter</h3>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <label>Input:</label>
            <input type="text" placeholder="number" name="input">
            <input type="radio" name="unit" value="rad">radians &nbsp;
            <input type="radio" name="unit" value="deg">degrees &nbsp;
            <br><br><button>Submit</button>

            <?php
            if (array_key_exists("input",$_POST)){
                $input = $_POST["input"];
                $unit = $_POST["unit"];
                echo "<h2>Result</h2>";
                if ($unit == "rad"){
                    echo $input." radians = ".radToDeg($input)." degrees";
                }
                else{
                    echo $input." degrees = ".degToRad($input)." radians";
                }
            }
            ?>
        </form>
    </body>
</html>
