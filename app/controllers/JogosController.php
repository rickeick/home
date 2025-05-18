<?php
require_once dirname(__DIR__).'/base/Controller.php';
require_once dirname(__DIR__).'/models/Jogo.php';

class JogosController extends Controller {
    public function __construct() {
        $this->model = new Jogo();
        $this->verify_database();
    }

    public function create() : void {
        if (!empty($_POST)) {
            $dados = [
                'nome' => $_POST['nome'] ?? '',
                'tamanho' => $_POST['tamanho'] ?? 0.0,
                'launcher' => $_POST['launcher'] ?? '',
                'execucao' => $_POST['execucao'] ?? ''
            ];
            $state = $this->model->create($dados);
            $this->verify_state($state);
            if ($state > 0) {
                $this->send(Message::save_success('/jogos/listar'));
            }
        } else {
            $this->render_view('jogos/cadastrar');
        }
    }

    public function list() : void {
        $this->disable_cache();
        $result = $this->model->get_all();
        $this->render_view('jogos/listar', $result);
    }
}
?>
