<?php
require_once dirname(__DIR__).'/base/Controller.php';
require_once dirname(__DIR__).'/models/Software.php';

class SoftwareController extends Controller {
    public function __construct() {
        $this->model = new Software();
        $this->verify_database();
    }

    public function create() : void {
        if (!empty($_POST)) {
            $dados = [
                'nome' => $_POST['nome'] ?? '',
                'link' => $_POST['link'] ?? '',
                'tamanho' => $_POST['tamanho'] ?? 0.0,
                'categoria' => $_POST['categoria'] ?? '',
                'plataforma' => $_POST['plataforma'] ?? ''
            ];
            $state = $this->model->create($dados);
            $this->verify_state($state);
            if ($state > 0) {
                $this->send(Message::save_success('/softwares/listar'));
            }
        } else {
            $this->render_view('softwares/cadastrar');
        }
    }

    public function list() : void {
        $this->disable_cache();
        $result = $this->model->get_all();
        $this->render_view('softwares/listar', $result);
    }
}
?>
