<!DOCTYPE html>
<html>
    <head>
        <title>Calculator</title>
        <meta charset="utf-8">
    </head>

    <body>
    <?php
        $num1 = $num2 = $pheptoan = "";
        $numErr = $pheptoanErr = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            if (empty($_POST["num1"])) {
                $numErr = "Number is required";
              } else {
                $num1 = test_input($_POST["num1"]);
              }
            
            if (empty($_POST["num2"])) {
                $numErr = "Number is required";
              } else {
                $num2 = test_input($_POST["num2"]);
              }
            
              if (empty($_POST["pheptoan"])) {
                $pheptoanErr = "Operation is required";
              } else {
                $pheptoan = test_input($_POST["pheptoan"]);
              }
        }
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
          }
        ?>
        <h2>Web Calculator</h2>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            Số hạng thứ 1: <input type="text" name = "num1">
            <span class="error" style="color: red;">* <?php echo $numErr;?></span>
                <br><br>
            <input type="radio" name="pheptoan" value="+">+&nbsp;&nbsp;&nbsp;&nbsp;
            
            <input type="radio" name="pheptoan" value="-">-&nbsp;&nbsp;&nbsp;&nbsp;
            
            <input type="radio" name="pheptoan" value="x">x&nbsp;&nbsp;&nbsp;&nbsp;
            
            <input type="radio" name="pheptoan" value="/">/&nbsp;&nbsp;&nbsp;&nbsp;
            <span class="error" style="color: red;">* <?php echo $pheptoanErr;?></span>
            <br><br>
            
            Số hạng thứ 2: <input type="text" name="num2">
            <span class="error" style="color: red;">* <?php echo $numErr;?></span>
            <br><br>
            <button>Submit</button>
        </form>
        
        <h3><?php
        echo "Result: ";
        switch ($pheptoan){
            case "+":
                echo $num1+$num2;
                break;
            case "-":
                echo $num1-$num2;
                break;
            case "x":
                echo $num1*$num2;
                break;
            case "/":
                echo $num1/$num2;
                break;
        }
        ?></h3>
    </body>
</html>