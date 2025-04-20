<?php
require_once dirname(__DIR__).'/base/Controller.php';
require_once dirname(__DIR__).'/models/Filme.php';

class FilmesController extends Controller {
    public function __construct() {
        $this->model = new Filme();
        $this->verify_database();
    }

    public function create() : void {
        if (!empty($_POST)) {
            $dados = [
                'ano' => $_POST['ano'] ?? 0,
                'titulo' => $_POST['titulo'] ?? '',
                'duracao' => $_POST['duracao'] ?? 0
            ];
            if ((int)$dados['ano'] > (int)date("Y")) {
                $this->send(Message::invalid_input('ano'));
            } else {
                $state = $this->model->create($dados);
                $this->verify_state($state);
                if ($state > 0) {
                    $this->send(Message::save_success('/filmes/listar'));
                }
            }
        } else {
            $this->render_view('filmes/cadastrar');
        }
    }

    public function list() : void {
        $this->disable_cache();
        $result = $this->model->get_all();
        $this->render_view('filmes/listar', $result);
    }
}
?>
