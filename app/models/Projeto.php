<?php
require_once dirname(__DIR__).'/base/Model.php';

class Projeto extends Model {
    public function create($dados) : int {
        $link = $dados['link'];
        $grupo = $dados['grupo'];
        $titulo = $dados['titulo'];
        $status = $dados['status'];
        $descricao = $dados['descricao'];
        $anotacoes = $dados['anotacoes'];
        $sql = "INSERT INTO projetos (id, titulo, grupo, status, link, descricao, anotacoes) VALUES (NULL, ?, ?, ?, ?, ?, ?)";
        return $this->execute($sql, 'ssssss', $titulo, $grupo, $status, $link, $descricao, $anotacoes);
    }

    public function update($dados) : int {
        $id = $dados['id'];
        $link = $dados['link'];
        $status = $dados['status'];
        $descricao = $dados['descricao'];
        $anotacoes = $dados['anotacoes'];
        $sql = "UPDATE projetos SET status = ?, link = ?, descricao = ?, anotacoes = ? WHERE id = ?";
        return $this->execute($sql, 'ssssi', $status, $link, $descricao, $anotacoes, $id);
    }

    public function get_all() : mysqli_result | false {
        $sql = 'SELECT id, titulo, grupo, status, link FROM projetos ORDER BY titulo';
        return $this->db->query($sql);
    }

    public function get($id) : mysqli_result | false {
        $sql = "SELECT * FROM projetos WHERE id = ?";
        return $this->consult($sql, 'i', $id);
    }
}
?>
