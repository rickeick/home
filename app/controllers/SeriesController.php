<?php
require_once dirname(__DIR__).'/base/Controller.php';
require_once dirname(__DIR__).'/models/Serie.php';

class SeriesController extends Controller {
    public function __construct() {
        $this->model = new Serie();
        $this->verify_database();
    }

    public function create() : void {
        if (!empty($_POST)) {
            $dados = [
                'titulo' => $_POST['titulo'] ?? '',
                'duracao' => $_POST['duracao'] ?? 0,
                'episodios' => $_POST['episodios'] ?? 0,
                'temporadas' => $_POST['temporadas'] ?? 0
            ];
            $state = $this->model->create($dados);
            $this->verify_state($state);
            if ($state > 0) {
                $this->send(Message::save_success('/series/listar'));
            }
        } else {
            $this->render_view('series/cadastrar');
        }
    }

    public function edit() : void {
        $id = $this->get_id();
        if (!empty($_POST)) {
            $dados = [
                'id' => $id,
                'titulo' => $_POST['titulo'] ?? '',
                'duracao' => $_POST['duracao'] ?? 0,
                'episodios' => $_POST['episodios'] ?? 0,
                'temporadas' => $_POST['temporadas'] ?? 0
            ];
            $state = $this->model->update($dados);
            $this->verify_state($state);
            if ($state > 0) {
                $this->send(Message::save_success('/series/listar'));
            }
        } else {
            $this->disable_cache();
            $result = $this->model->get($id);
            $this->render_view('series/editar', $result);
        }
    }

    public function list() : void {
        $this->disable_cache();
        $result = $this->model->get_all();
        $this->render_view('series/listar', $result);
    }
}
?>
