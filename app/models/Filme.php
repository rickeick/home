<?php
require_once dirname(__DIR__).'/base/Model.php';

class Filme extends Model {
    public function create($dados) : int {
        $ano = $dados['ano'];
        $titulo = $dados['titulo'];
        $duracao = $dados['duracao'];
        $sql = "INSERT INTO filmes (id, titulo, duracao, ano) VALUES (NULL, ?, ?, ?)";
        return $this->execute($sql, 'sii', $titulo, $duracao, $ano);
    }

    public function get_all() : mysqli_result | false {
        $sql = 'SELECT id, titulo, duracao, ano FROM filmes ORDER BY titulo';
        return $this->db->query($sql);
    }
}
?>
