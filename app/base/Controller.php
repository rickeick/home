<?php
require_once 'Message.php';

abstract class Controller {
    protected $model;

    protected final function get_id() : int {
        $value = $_GET['id'] ?? 0;
        if ($value <= 0) {
            $this->send(Message::bad_request());
        }
        return $value;
    }

    protected final function get_param($name) : int {
        return $_GET[$name] ?? 0;
    }

    protected final function disable_cache() : void {
        header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
        header('Cache-Control: post-check=0, pre-check=0', false);
        header('Pragma: no-cache');
        header('Expires: 0');
    }

    protected final function verify_database() : void {
        if ($this->model->database_error) {
            $this->send(Message::database_error());
        }
    }

    protected final function verify_state($state) : void {
        switch ($state) {
            case -1: $this->send(Message::sql_error()); break;
            case 0: $this->send(Message::sql_empty()); break;
        }
    }

    protected final function render_view($view, $result = null) : void {
        if ($result !== null) {
            if ($result === false) {
                $this->send(Message::sql_error());
            } else if (mysqli_num_rows($result) == 0) {
                $this->send(Message::sql_empty());
            }
        }
        require dirname(__DIR__)."/views/$view.php";
    }

    protected final function send($message) : void {
        extract($message);
        require dirname(__DIR__).'/views/message.php';
        exit();
    }
}
?>
