<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
</head>

<style>

label,
option {
    font-size: 30px;
}

input,
select {
  width: 200px;
  height: 40px;
  font-size: 25px;
}
    
</style>

<body>
    <h1 style="text-align:center;font-size:50px;">Calculator by Jaded</h1>


    <div style="border: 2px solid black; padding: 20px; width: 90%; margin: auto;">
        <form method="post">
            <label>First Number:</label>
            <input type="number" id="one"name="one" value="<?php echo isset($_POST['one']) ? $_POST['one'] : ''; ?>" required>&nbsp;
            <label>Operation:</label>
            <select name="operator" class="" required>
                <option value="">Select an option</option>
                <option value="+" <?php if(isset($_POST['operator']) && $_POST['operator'] == '+') echo 'selected'; ?>>+</option>
                <option value="-" <?php if(isset($_POST['operator']) && $_POST['operator'] == '-') echo 'selected'; ?>>-</option>
                <option value="*" <?php if(isset($_POST['operator']) && $_POST['operator'] == '*') echo 'selected'; ?>>*</option>
                <option value="/" <?php if(isset($_POST['operator']) && $_POST['operator'] == '/') echo 'selected'; ?>>/</option>
            </select>&nbsp;
            <label>Second Number:</label>
            <input type="number" id="two" name="two" value="<?php echo isset($_POST['two']) ? $_POST['two'] : ''; ?>" required>
            <label>&nbsp;&nbsp;&nbsp;=&nbsp;&nbsp;&nbsp;</label>
            <input type="text" name="output" id="output" value="<?php echo isset($output) ? $output : ''; ?>" readonly><br><br><br><br>
            <button type="submit" name="submit" style="display: block;margin: 0 auto;font-size: 20px;padding: 10px 20px;">Calculate</button>
        </form>

    <?php 
        if(isset($_POST['submit'])){
            $one = $_POST['one'];
            $two = $_POST['two'];
            $operator = $_POST['operator'];
            $output = 0;

            do{
                switch($operator){
                    case '+':
                        $output = $one + $two;
                        break;
                    case '-':
                        $output = $one - $two;
                        break;
                    case '*':
                        $output = $one * $two;
                        break;
                    case '/':
                        if($two == 0){
                            echo "<p style='color:red;'>Error: Division by zero.</p>";
                            break 2;
                        }
                        $output = $one / $two;
                        break;
                    default:
                        $output = '';
                }
                echo "<script>document.getElementById('output').value = '$output';</script>";
            }while(false);   
        }
    ?>
    </div>



    

</body>
</html>
