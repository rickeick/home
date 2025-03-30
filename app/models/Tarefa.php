<?php
require_once dirname(__DIR__).'/base/Model.php';

class Tarefa extends Model {
    public function create($dados) {
        $data = $dados['data'];
        $grupo = $dados['grupo'];
        $titulo = $dados['titulo'];
        $anotacoes = $dados['anotacoes'];
        $sql = "INSERT INTO tarefas (id, titulo, data, grupo, anotacoes, ativo) VALUES (NULL, ?, ?, ?, ?, 1)";
        return $this->execute($sql, 'ssss', $titulo, $data, $grupo, $anotacoes);
    }

    public function update($dados) {
        $id = $dados['id'];
        $data = $dados['data'];
        $titulo = $dados['titulo'];
        $anotacoes = $dados['anotacoes'];
        $sql = "UPDATE tarefas SET titulo = ?, data = ?, anotacoes = ? WHERE id = ?";
        return $this->execute($sql, 'sssi', $titulo, $data, $anotacoes, $id);
    }

    public function conclude($id) {
        $sql = "UPDATE tarefas SET ativo = 0 WHERE id = ?";
        return $this->execute($sql, 'i', $id);
    }

    public function get_all($mes, $ano) {
        $sql = "SELECT * FROM tarefas WHERE ativo = 1 AND MONTH(data) = ? AND YEAR(data) = ? ORDER BY data";
        return $this->consult($sql, 'ii', $mes, $ano);
    }

    public function get($id) {
        $sql = "SELECT * FROM tarefas WHERE id = ?";
        return $this->consult($sql, 'i', $id);
    }
}
?>
