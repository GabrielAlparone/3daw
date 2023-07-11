<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "seu_usuario";
$password = "sua_senha";
$dbname = "av2";
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// Função para listar os candidatos em ordem de nome, por sala de prova
function listarCandidatosPorSala($conn) {
    $sql = "SELECT * FROM candidatos ORDER BY nome ASC";
    $result = $conn->query($sql);

    $salaAtual = "";
    while ($row = $result->fetch_assoc()) {
        $sala = $row["salaDeProva"];
        if ($sala != $salaAtual) {
            echo "<h2>Sala de Prova: $sala</h2>";
            $salaAtual = $sala;
        }
        echo "<p>Nome: " . $row["nome"] . "<br>";
        echo "CPF: " . $row["cpf"] . "<br>";
        // Exibir outros dados do candidato...
        echo "</p>";
    }
}

// Função para adicionar um fiscal de prova
function adicionarFiscal($conn) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST["nome"];
        $cpf = $_POST["cpf"];
        $salaDeProva = $_POST["salaDeProva"];

        $sql = "INSERT INTO fiscais (nome, cpf, salaDeProva) VALUES ('$nome', '$cpf', '$salaDeProva')";
        if ($conn->query($sql) === TRUE) {
            echo "Fiscal de prova adicionado com sucesso!";
        } else {
            echo "Erro ao adicionar fiscal de prova: " . $conn->error;
        }
    }
}

// Função para alterar a sala de prova de um candidato
function alterarSalaDeProva($conn) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $candidatoId = $_POST["candidatoId"];
        $novaSalaDeProva = $_POST["novaSalaDeProva"];

        $sql = "UPDATE candidatos SET salaDeProva = '$novaSalaDeProva' WHERE id = $candidatoId";
        if ($conn->query($sql) === TRUE) {
            echo "Sala de prova atualizada com sucesso!";
        } else {
            echo "Erro ao atualizar sala de prova: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sistema KeyFalls</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    // Validação dos dados no JavaScript
    $(document).ready(function() {
        // Validação do formulário de adicionar fiscal
        $("#formAdicionarFiscal").submit(function(e) {
            var nome = $("#nome").val();
            var cpf = $("#cpf").val();
            var salaDeProva = $("#salaDeProva").val();

            if (nome.trim() === "" || cpf.trim() === "" || salaDeProva.trim() === "") {
                alert("Por favor, preencha todos os campos.");
                e.preventDefault();
            }
        });

        // Validação do formulário de alterar sala de prova
        $("#formAlterarSalaDeProva").submit(function(e) {
            var novaSalaDeProva = $("#novaSalaDeProva").val();

            if (novaSalaDeProva.trim() === "") {
                alert("Por favor, preencha a nova sala de prova.");
                e.preventDefault();
            }
        });
    });
    </script>
</head>
<body>
    <h1>Sistema KeyFalls - Controle de Entregas</h1>

    <h2>Listar candidatos em ordem de nome, por sala de prova:</h2>
    <?php listarCandidatosPorSala($conn); ?>

    <h2>Incluir fiscal de prova:</h2>
    <form id="formAdicionarFiscal" method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" required><br>

        <label for="cpf">CPF:</label>
        <input type="text" name="cpf" id="cpf" required><br>

        <label for="salaDeProva">Sala de Prova:</label>
        <input type="text" name="salaDeProva" id="salaDeProva" required><br>

        <input type="submit" value="Adicionar Fiscal">
    </form>

    <?php adicionarFiscal($conn); ?>

    <h2>Alterar sala de prova de um candidato:</h2>
    <form id="formAlterarSalaDeProva" method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <input type="hidden" name="candidatoId" value="ID_DO_CANDIDATO_A_SER_ALTERADO">

        <label for="novaSalaDeProva">Nova Sala de Prova:</label>
        <input type="text" name="novaSalaDeProva" id="novaSalaDeProva" required><br>

        <input type="submit" value="Alterar Sala de Prova">
    </form>

    <?php alterarSalaDeProva($conn); ?>

</body>
</html>
