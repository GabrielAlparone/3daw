<!DOCTYPE html>
<html>
<head>
    <title>Calculadora PHP - Soma e Subtração</title>
</head>
<body>
    <h1>Calculadora PHP - Soma e Subtração</h1>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        Valor 1: <input type="text" name="valor1"><br>
        Valor 2: <input type="text" name="valor2"><br>
        Operação:
        <select name="operacao">
            <option value="soma">Adição</option>
            <option value="subtracao">Subtração</option>
        </select><br>
        <input type="submit" value="Calcular">
    </form>

    <?php
    // Função para realizar a adição
    function soma($valor1, $valor2) {
        return $valor1 + $valor2;
    }

    // Função para realizar a subtração
    function subtracao($valor1, $valor2) {
        return $valor1 - $valor2;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtemos os valores e a operação do formulário
        $valor1 = $_POST["valor1"];
        $valor2 = $_POST["valor2"];
        $operacao = $_POST["operacao"];

        // Chamamos a função correspondente à operação selecionada
        switch ($operacao) {
            case 'soma':
                $resultado = soma($valor1, $valor2);
                break;
            case 'subtracao':
                $resultado = subtracao($valor1, $valor2);
                break;
            default:
                $resultado = "Operação inválida.";
                break;
        }

        // Exibimos o resultado
        echo "Resultado: " . $resultado;
    }
    ?>
</body>
</html>
