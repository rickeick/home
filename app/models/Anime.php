<?php
require_once dirname(__DIR__).'/base/Model.php';

class Anime extends Model {
    public function create($dados) : int {
        $nome = $dados['nome'];
        $link = $dados['link'];
        $total = $dados['total'];
        $status = $dados['status'];
        $atuais = $dados['atuais'];
        $lancamento = $dados['lancamento'];
        $concluidos = $dados['concluidos'];
        $sql = "INSERT INTO animes (id, nome, status, concluidos, atuais, total, lancamento, link) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?)";
        return $this->execute($sql, 'ssiiiss', $nome, $status, $concluidos, $atuais, $total, $lancamento, $link);
    }

    public function renew($dados) : int {
        $id = $dados['id'];
        $link = $dados['link'];
        $atuais = $dados['atuais'];
        $lancamento = $dados['lancamento'];
        $sql = "UPDATE animes SET status = 'atual', atuais = ?, lancamento = ?, link = ? WHERE status = 'concluido' && id = ?";
        return $this->execute($sql, 'issi', $atuais, $lancamento, $link, $id);
    }

    public function conclude($id) : int {
        $sql = "UPDATE animes SET status = 'concluido', concluidos = concluidos+1, total = total+atuais, atuais = 0, lancamento = '', link = '' WHERE status = 'atual' && id = ?";
        return $this->execute($sql, 'i', $id);
    }

    public function set_pending($id) : int {
        $sql = "UPDATE animes SET status = 'pendente', lancamento = SUBSTRING(lancamento, 3) WHERE status = 'atual' && id = ?";
        return $this->execute($sql, 'i', $id);
    }

    public function set_hidden($id) : int {
        $sql = "UPDATE animes SET status = 'oculto' WHERE status = 'concluido' && id = ?";
        return $this->execute($sql, 'i', $id);
    }

    public function get_concluded() : mysqli_result | false {
        $sql = "SELECT id, nome, status, concluidos, total FROM animes WHERE concluidos > 0 ORDER BY nome";
        return $this->db->query($sql);
    }

    public function get_current() : mysqli_result | false {
        $sql = "SELECT * FROM animes WHERE status = 'atual' ORDER BY LEFT(lancamento, 1) ASC, nome ASC";
        return $this->db->query($sql);
    }

    public function get_pending() : mysqli_result | false {
        $sql = "SELECT * FROM animes WHERE status = 'pendente' ORDER BY lancamento DESC, nome ASC";
        return $this->db->query($sql);
    }

    public function get_hidden() : mysqli_result | false {
        $sql = "SELECT id, nome, concluidos, total FROM animes WHERE status = 'oculto' ORDER BY nome";
        return $this->db->query($sql);
    }

    public function get($id) : mysqli_result | false {
        $sql = "SELECT * FROM animes WHERE id = ?";
        return $this->consult($sql, 'i', $id);
    }
}
?>
