<?php
require_once dirname(__DIR__).'/base/Controller.php';
require_once dirname(__DIR__).'/models/Projeto.php';

class ProjetosController extends Controller {
    public function __construct() {
        $this->model = new Projeto();
        $this->verify_database();
    }

    public function create() : void {
        if (!empty($_POST)) {
            $dados = [
                'link' => $_POST['link'] ?? '',
                'grupo' => $_POST['grupo'] ?? '',
                'titulo' => $_POST['titulo'] ?? '',
                'status' => $_POST['status'] ?? '',
                'descricao' => $_POST['descricao'] ?? '',
                'anotacoes' => $_POST['anotacoes'] ?? ''
            ];
            if ($dados['link'] != '' && !filter_var($dados['link'], FILTER_VALIDATE_URL)) {
                $this->send(Message::invalid_input('link'));
            } else {
                $state = $this->model->create($dados);
                $this->verify_state($state);
                if ($state > 0) {
                    $this->send(Message::save_success('/projetos/listar'));
                }
            }
        } else {
            $this->render_view('projetos/cadastrar');
        }
    }

    public function edit() : void {
        $id = $this->get_id();
        if (!empty($_POST)) {
            $dados = [
                'id' => $id,
                'link' => $_POST['link'] ?? '',
                'status' => $_POST['status'] ?? '',
                'descricao' => $_POST['descricao'] ?? '',
                'anotacoes' => $_POST['anotacoes'] ?? ''
            ];
            if ($dados['link'] != '' && !filter_var($dados['link'], FILTER_VALIDATE_URL)) {
                $this->send(Message::invalid_input('link'));
            } else {
                $state = $this->model->update($dados);
                $this->verify_state($state);
                if ($state > 0) {
                    $this->send(Message::save_success('/projetos/listar'));
                }
            }
        } else {
            $this->disable_cache();
            $result = $this->model->get($id);
            $this->render_view('projetos/editar', $result);
        }
    }

    public function list() : void {
        $this->disable_cache();
        $result = $this->model->get_all();
        $this->render_view('projetos/listar', $result);
    }
}
?>
