<!DOCTYPE html>
<html>
<head>
    <title>Calculadora em PHP</title>
</head>
<body>
    <h1>Calculadora</h1>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="number" name="num1" placeholder="Número 1" required><br><br>
        <input type="number" name="num2" placeholder="Número 2" required><br><br>
        <select name="operacao">
            <option value="soma">Soma</option>
            <option value="subtracao">Subtração</option>
            <option value="multiplicacao">Multiplicação</option>
            <option value="divisao">Divisão</option>
        </select><br><br>
        <input type="submit" name="calcular" value="Calcular">
    </form>

    <?php
    if(isset($_POST['calcular'])) {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $operacao = $_POST['operacao'];

        switch($operacao) {
            case 'soma':
                $resultado = $num1 + $num2;
                echo "Resultado: " . $resultado;
                break;
            case 'subtracao':
                $resultado = $num1 - $num2;
                echo "Resultado: " . $resultado;
                break;
            case 'multiplicacao':
                $resultado = $num1 * $num2;
                echo "Resultado: " . $resultado;
                break;
            case 'divisao':
                if($num2 != 0) {
                    $resultado = $num1 / $num2;
                    echo "Resultado: " . $resultado;
                } else {
                    echo "Erro: Divisão por zero não é permitida.";
                }
                break;
            default:
                echo "Operação inválida.";
                break;
        }
    }
    ?>
</body>
</html>
