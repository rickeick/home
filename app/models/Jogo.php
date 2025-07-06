<?php
require_once dirname(__DIR__).'/base/Model.php';

class Jogo extends Model {
    public function create($dados) : int {
        $nome = $dados['nome'];
        $tamanho = $dados['tamanho'];
        $launcher = $dados['launcher'];
        $execucao = $dados['execucao'];
        $sql = "INSERT INTO jogos (id, nome, tamanho, launcher, execucao) VALUES (NULL, ?, ?, ?, ?)";
        return $this->execute($sql, 'sdss', $nome, $tamanho, $launcher, $execucao);
    }

    public function get_all() : mysqli_result | false {
        $sql = 'SELECT * FROM jogos ORDER BY launcher ASC, nome ASC';
        return $this->db->query($sql);
    }
}
?>
