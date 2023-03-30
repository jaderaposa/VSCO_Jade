<!DOCTYPE html>
<html>
<head>
    <title>Calculator</title>
</head>
<body>
    <h1>Calculator</h1>
    <form method="post" action="">
        <label>Enter first number:</label>
        <input type="number" name="num1" required><br><br>
        <label>Select operation:</label>
        <select name="operator" required>
            <option value="">Select an option</option>
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select><br><br>
        <label>Enter second number:</label>
        <input type="number" name="num2" required><br><br>
        <br><br>
        <button type="submit" name="calculate">Calculate</button>
    </form>

    <?php 
    if(isset($_POST['calculate'])){
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $operator = $_POST['operator'];
        $result = 0;
        do{
            switch($operator){
                case '+':
                    $result = $num1 + $num2;
                    break;
                case '-':
                    $result = $num1 - $num2;
                    break;
                case '*':
                    $result = $num1 * $num2;
                    break;
                case '/':
                    if($num2 == 0){
                        echo "<p style='color:red;'>Error: Division by zero.</p>";
                        break 2;
                    }
                    $result = $num1 / $num2;
                    break;
                default:
                    echo "<p style='color:red;'>Error: Invalid operator selected.</p>";
                    break 2;
            }
            echo "<p>The result is: $result</p>";
        }while(false);
    }
    ?>

</body>
</html>
