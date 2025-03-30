<?php
require_once dirname(__DIR__).'/base/Controller.php';
require_once dirname(__DIR__).'/models/Anime.php';

class AnimesController extends Controller {
    public function __construct() {
        $this->model = new Anime();
        $this->verify_database();
    }

    public function create() : void {
        if (!empty($_POST)) {
            $dados = [
                'nome' => $_POST['nome'] ?? '',
                'total' => $_POST['total'] ?? 0,
                'status' => $_POST['status'] ?? '',
                'concluidos' => $_POST['concluidos'] ?? 0,
                'lancamento' => $_POST['lancamento'] ?? '',
                'atuais' => $_POST['atuais'] ?? 0,
                'link' => $_POST['link'] ?? '',
            ];
            if ($dados['link'] != '' && !filter_var($dados['link'], FILTER_VALIDATE_URL)) {
                $this->send(Message::invalid_input('link'));
            } else {
                $state = $this->model->create($dados);
                $this->verify_state($state);
                if ($state > 0) {
                    $this->send(Message::save_success('/animes/atuais'));
                }
            }
        } else {
            $this->render_view('animes/cadastrar');
        }
    }

    public function list_concluded() : void {
        $this->disable_cache();
        $result = $this->model->get_concluded();
        $this->render_view('animes/concluidos', $result);
    }

    public function list_current() : void {
        $this->disable_cache();
        $result = $this->model->get_current();
        $this->render_view('animes/atuais', $result);
    }

    public function list_pending() : void {
        $this->disable_cache();
        $result = $this->model->get_pending();
        $this->render_view('animes/pendentes', $result);
    }

    public function list_hidden() : void {
        $this->disable_cache();
        $result = $this->model->get_hidden();
        $this->render_view('animes/ocultos', $result);
    }

    public function renew() : void {
        $id = $this->get_id();
        if (!empty($_POST)) {
            $dados = [
                'id' => $id,
                'link' => $_POST['link'] ?? null,
                'atuais' => $_POST['atuais'] ?? 12,
                'lancamento' => $_POST['lancamento'] ?? null
            ];
            if ($dados['link'] != '' && !filter_var($dados['link'], FILTER_VALIDATE_URL)) {
                $this->send(Message::invalid_input('link'));
            } else {
                $state = $this->model->renew($dados);
                $this->verify_state($state);
                if ($state > 0) {
                    $this->send(Message::save_success('/animes/atuais'));
                }
            }
        } else {
            $this->disable_cache();
            $result = $this->model->get($id);
            $this->render_view('animes/renovar', $result);
        }
    }

    public function conclude() : void {
        $id = $this->get_id();
        $state = $this->model->conclude($id);
        $this->verify_state($state);
        if ($state > 0) {
            $this->send(Message::save_success('/animes/concluidos'));
        }
    }

    public function set_pending() : void {
        $id = $this->get_id();
        $state = $this->model->set_pending($id);
        $this->verify_state($state);
        if ($state > 0) {
            $this->send(Message::save_success('/animes/pendentes'));
        }
    }

    public function set_hidden() : void {
        $id = $this->get_id();
        $state = $this->model->set_hidden($id);
        $this->verify_state($state);
        if ($state > 0) {
            $this->send(Message::save_success('/animes/concluidos'));
        }
    }
}
?>
