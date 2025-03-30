<?php
require_once dirname(__DIR__).'/base/Controller.php';
require_once dirname(__DIR__).'/models/Tarefa.php';

class TarefasController extends Controller {
    public function __construct() {
        $this->model = new Tarefa();
        $this->verify_database();
    }

    public function create() : void {
        if (!empty($_POST)) {
            $dados = [
                'data' => $_POST['data'] ?? '',
                'grupo' => $_POST['grupo'] ?? '',
                'titulo' => $_POST['titulo'] ?? '',
                'anotacoes' => $_POST['anotacoes'] ?? ''
            ];
            $state = $this->model->create($dados);
            $this->verify_state($state);
            if ($state > 0) {
                $this->send(Message::save_success('/tarefas/calendario'));
            }
        } else {
            $this->render_view('tarefas/cadastrar');
        }
    }

    public function edit() : void {
        $id = $this->get_id();
        if (!empty($_POST)) {
            $dados = [
                'id' => $id,
                'data' => $_POST['data'] ?? '',
                'grupo' => $_POST['grupo'] ?? '',
                'titulo' => $_POST['titulo'] ?? '',
                'anotacoes' => $_POST['anotacoes'] ?? ''
            ];
            $state = $this->model->update($dados);
            $this->verify_state($state);
            if ($state > 0) {
                $this->send(Message::save_success('/tarefas/calendario'));
            }
        } else {
            $this->disable_cache();
            $result = $this->model->get($id);
            $this->render_view('tarefas/editar', $result);
        }
    }

    public function conclude() : void {
        $id = $this->get_id();
        $state = $this->model->conclude($id);
        $this->verify_state($state);
        if ($state > 0) {
            $this->send(Message::save_success('/tarefas/calendario'));
        }
    }

    public function calendar() : void {
        $this->disable_cache();
        $zone = new DateTimeZone('America/Sao_Paulo');
        $hoje = new DateTime('now', $zone);
        $mes = $this->get_param('mes');
        if ($mes === 0) {
            $mes = $hoje->format('m');
        }
        $ano = $this->get_param('ano');
        if ($ano === 0) {
            $ano = $hoje->format('Y');
        }
        $result = $this->model->get_all($mes, $ano);
        if (mysqli_num_rows($result) == 0) {
            $this->render_view('/tarefas/calendario');
        } else {
            $this->render_view('/tarefas/calendario', $result);
        }
    }
}
?>
