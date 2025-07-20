<?php
require_once dirname(__DIR__).'/base/Model.php';

class Software extends Model {
    public function create($dados) : int {
        $nome = $dados['nome'];
        $link = $dados['link'];
        $tamanho = $dados['tamanho'];
        $categoria = $dados['categoria'];
        $plataforma = $dados['plataforma'];
        $sql = "INSERT INTO softwares (id, nome, plataforma, categoria, tamanho, link) VALUES (NULL, ?, ?, ?, ?, ?)";
        return $this->execute($sql, 'sssds', $nome, $plataforma, $categoria, $tamanho, $link);
    }

    public function get_all() : mysqli_result | false {
        $sql = 'SELECT * FROM softwares ORDER BY categoria ASC, nome ASC';
        return $this->db->query($sql);
    }
}
?>
