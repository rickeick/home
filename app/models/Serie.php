<?php
require_once dirname(__DIR__).'/base/Model.php';

class Serie extends Model {
    public function create($dados) : int {
        $titulo = $dados['titulo'];
        $duracao = $dados['duracao'];
        $episodios = $dados['episodios'];
        $temporadas = $dados['temporadas'];
        $sql = "INSERT INTO series (id, titulo, duracao, temporadas, episodios) VALUES (NULL, ?, ?, ?, ?)";
        return $this->execute($sql, 'siii', $titulo, $duracao, $temporadas, $episodios);
    }
    
    public function update($dados) : int {
        $id = $dados['id'];
        $titulo = $dados['titulo'];
        $duracao = $dados['duracao'];
        $episodios = $dados['episodios'];
        $temporadas = $dados['temporadas'];
        $sql = "UPDATE series SET titulo = ?, duracao = ?, temporadas = ?, episodios = ? WHERE id = ?";
        return $this->execute($sql, 'siiii', $titulo, $duracao, $temporadas, $episodios, $id);
    }

    public function get_all() : mysqli_result | false {
        $sql = 'SELECT * FROM series ORDER BY titulo';
        return $this->db->query($sql);
    }

    public function get($id) : mysqli_result | false {
        $sql = "SELECT * FROM series WHERE id = ?";
        return $this->consult($sql, 'i', $id);
    }
}
?>
