<!DOCTYPE html>
<html>
    <head>
        <title>Xử lý xâu</title>
        <meta charset="utf-8">
    </head>

    <body>
        <?php
        $str = $function = "";
        $strErr = $functionErr =  "";
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            if (empty($_POST["str"])) {
                $strErr = "String is required";
              } else {
                $str = test_input($_POST["str"]);
              }
            
              if (empty($_POST["function"])) {
                $genderErr = "Function is required";
              } else {
                $function = test_input($_POST["function"]);
              }
        }
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
          }
        ?>
        <h2 style="color: blue;">Minh họa các hàm xử lý xâu</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            
            Nhập nội dung xâu ký tự:
            <input type="text" name="str" id="str">
            <span class="error" style="color: red;">* <?php echo $strErr;?></span>
            <br><br>
            <!-- Lựa chọn hàm -->
            <input type="radio" name="function" id="strlen" value="strlen">strlen
            <!-- <label for="strlen">strlen</label> -->
            <input type="radio" name="function" id="strtolower" value="strtolower">strtolower
            <br><br>
            <!-- <label for="strtolower">strtolower</label><br> -->
            <input type="radio" name="function" id="trim" value="trim">trim
            <!-- <label for="trim">trim</label> -->
            <input type="radio" name="function" id="strtoupper" value="strtoupper">strtoupper
            <!-- <label for="strtoupper">strtoupper</label><br> -->
            <br><br>
            <button>Submit</button>
        </form>

        <?php
        echo "<h2>Result:</h2>";
        switch($function){
            case "strlen":
                echo strlen($str);
                break;
            case "trim":
                echo trim($str);
                break;
            case "strtolower":
                echo strtolower($str);
                break;
            case "strtoupper":
                echo strtoupper($str);
                break;
        }
        ?>
    </body>
</html>