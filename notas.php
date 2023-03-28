<?php
$nome = array ("Joe", "Neusa", "Antonio", "Erika", "Tiago", );
$notas = array(7, 5, 7, 8, 7, 1, 8, 0, 8, 5, 7, 7);
?>
<!doctype HTML>
<HTML>
<HEAD>
    <title>IDAI</title>
</HEAD>
<body>
    <h1>array</h1>
    <table>
        <tr>
            <td>nome</td>
            <td>nota</td>
            <td>status</td>
        </tr>
        <tr>
            
            <td><?php echo $nome[0] ?></td>
            <td><?php echo $notas[0] ?></td>
            <td><?php if ($notas[0] > 8) {
                echo "aprovado";
                    else
                        echo "reprovado";
            } ?></td>
    <table>
</body>
</html>