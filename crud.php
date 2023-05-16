<?php

// Array para armazenar os dados dos alunos
$alunos = [];

// Verificar se houve uma requisição POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar qual funcionalidade foi selecionada
    if ($_POST['acao'] === 'incluir') {
        incluirAluno();
    } elseif ($_POST['acao'] === 'alterar') {
        alterarAluno();
    } elseif ($_POST['acao'] === 'excluir') {
        excluirAluno();
    }
}

// Função para incluir um novo aluno
function incluirAluno()
{
    global $alunos;

    // Verificar se todos os campos foram preenchidos
    if (!empty($_POST['nome']) && !empty($_POST['matricula']) && !empty($_POST['curso'])) {
        // Obter as informações do aluno
        $nome = $_POST['nome'];
        $matricula = $_POST['matricula'];
        $curso = $_POST['curso'];

        // Criar um novo aluno com as informações fornecidas
        $aluno = [
            'nome' => $nome,
            'matricula' => $matricula,
            'curso' => $curso
        ];

        // Adicionar o aluno ao array de alunos
        $alunos[] = $aluno;

        echo "Aluno cadastrado com sucesso!\n";
    } else {
        echo "Por favor, preencha todos os campos!\n";
    }
}

// Função para alterar os dados de um aluno existente
function alterarAluno()
{
    global $alunos;

    // Verificar se todos os campos foram preenchidos
    if (!empty($_POST['matricula'])) {
        // Obter a matrícula do aluno a ser alterado
        $matricula = $_POST['matricula'];

        // Procurar o aluno com a matrícula fornecida
        $aluno = encontrarAlunoPorMatricula($matricula);

        if ($aluno !== null) {
            // Verificar se os novos campos foram preenchidos
            if (!empty($_POST['novoNome']) && !empty($_POST['novoCurso'])) {
                // Obter as novas informações do aluno
                $nome = $_POST['novoNome'];
                $curso = $_POST['novoCurso'];

                // Atualizar os dados do aluno
                $aluno['nome'] = $nome;
                $aluno['curso'] = $curso;

                echo "Aluno alterado com sucesso!\n";
            } else {
                echo "Por favor, preencha todos os campos!\n";
            }
        } else {
            echo "Aluno não encontrado!\n";
        }
    } else {
        echo "Por favor, preencha todos os campos!\n";
    }
}

// Função para excluir um aluno
function excluirAluno()
{
    global $alunos;

    // Verificar se a matrícula foi fornecida
    if (!empty($_POST['matricula'])) {
        // Obter a matrícula do aluno a ser excluído
        $matricula = $_POST['matricula'];

        // Procurar o aluno com a matrícula fornecida
        $aluno = encontrarAlunoPorMatricula($matricula);

        if ($al
