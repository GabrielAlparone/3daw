<?php

// Array para armazenar as perguntas e respostas
$perguntas = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar qual funcionalidade foi selecionada
    if ($_POST['acao'] === 'criar') {
        criarPergunta();
    }
}
// Função para criar uma nova pergunta
function criarPergunta()
{
    global $perguntas;

    // Verificar se todos os campos foram preenchidos
    if (!empty($_POST['pergunta']) && !empty($_POST['resposta1']) && !empty($_POST['resposta2']) && !empty($_POST['resposta3']) && !empty($_POST['resposta4']) && !empty($_POST['correta'])) {
        // Obter a pergunta
        $pergunta = $_POST['pergunta'];

        // Array para armazenar as respostas
        $respostas = [
            $_POST['resposta1'],
            $_POST['resposta2'],
            $_POST['resposta3'],
            $_POST['resposta4']
        ];

        // Obter o índice da resposta correta
        $indiceCorreta = $_POST['correta'];

        // Criar um novo item de pergunta com as informações fornecidas
        $itemPergunta = [
            'pergunta' => $pergunta,
            'respostas' => $respostas,
            'correta' => $indiceCorreta
        ];

        // Adicionar a pergunta ao array de perguntas
        $perguntas[] = $itemPergunta;

        echo "Pergunta criada com sucesso!\n";
    } else {
        echo "Por favor, preencha todos os campos!\n";
    }
}

// Função para exibir todas as perguntas
function exibirPerguntas()
{
    global $perguntas;

    if (count($perguntas) > 0) {
        echo "Lista de Perguntas:\n";
        foreach ($perguntas as $index => $pergunta) {
            echo "Pergunta " . ($index + 1) . ": " . $pergunta['pergunta'] . "\n";
            foreach ($pergunta['respostas'] as $i => $resposta) {
                echo "Resposta " . ($i + 1) . ": " . $resposta . "\n";
            }
            echo "Resposta Correta: " . $pergunta['correta'] . "\n";
            echo "-------------------\n";
        }
    } else {
        echo "Nenhuma pergunta criada!\n";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Perguntas de Múltipla Escolha</title>
</head>
<body>
    <h1>Criar Pergunta</h1>
    <form method="post" action="">
        <label for="pergunta">Pergunta:</label><br>
        <input type="text" id="pergunta" name="pergunta" required><br><br>

        <label for="resposta1">Resposta 1:</label><br>
        <input type="text" id="resposta1" name="resposta1" required><br><br>

        <label for="resposta2">Resposta 2:</label><br>
        <input type="text" id="resposta2" name="resposta2" required><br><br>
        
    <label for="resposta3">Resposta 3:</label><br>
    <input type="text" id="resposta3" name="resposta3" required><br><br>

    <label for="resposta4">Resposta 4:</label><br>
    <input type="text" id="resposta4" name="resposta4" required><br><br>

    <label for="correta">Resposta Correta:</label><br>
    <select id="correta" name="correta" required>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
    </select><br><br>

    <input type="hidden" name="acao" value="criar">
    <input type="submit" value="Criar Pergunta">
</form>

<h1>Perguntas Criadas</h1>
<?php exibirPerguntas(); ?>
</body>
</html>
