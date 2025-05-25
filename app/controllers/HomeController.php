<?php
require_once dirname(__DIR__).'/base/Controller.php';

class HomeController extends Controller {
    public function __construct() {
        $this->model = null;
    }
    
    public function index() : void {
        $this->render_view('home');
    }

    public function development() : void {
        $this->send(Message::in_development());
    }

    public function backup() : void {
        $host = getenv('DB_HOST');
        $name = getenv('DB_NAME');
        $user = getenv('DB_USER');
        $pass = getenv('DB_PASS');

        $data = date('Y-m-d_H-i-s');
        $dir = dirname(dirname(__DIR__)).'/backups';
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }
        $file = "$dir/backup_$data.sql";

        $comando = "C:\Laragon\bin\mysql\mysql-8.0.30-winx64\bin\mysqldump.exe --skip-comments --host=$host --user=$user --password=$pass $name > $file";

        exec($comando, $output, $return);

        header("Location: /home?backup=$return");
        exit();
    }
}
?>
