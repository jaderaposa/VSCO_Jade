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

    

</body>
</html>
