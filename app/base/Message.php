<?php
final class Message {
    public static function in_development() : array {
        return [
            'title' => 'Em Desenvolvimento',
            'content' => 'O recurso/funcionalidade está em construção!',
            'redirect' => 'back',
        ];
    }

    public static function bad_request() : array {
        return [
            'title' => 'Requisição Inválida',
            'content' => 'Verifique o valor dos parâmentros da URL!',
            'redirect' => 'back',
        ];
    }

    public static function database_error() : array {
        return [
            'title' => 'Erro no Servidor',
            'content' => 'Falha na conexão com o banco de dados!',
            'redirect' => 'back',
        ];
    }

    public static function sql_empty() : array {
        return [
            'title' => 'Operação Vazia',
            'content' => 'A operação não encontrou/alterou dados!',
            'redirect' => 'back',
        ];
    }
    
    public static function sql_error() : array {
        return [
            'title' => 'Erro no Servidor',
            'content' => 'Falha na operação do banco de dados!',
            'redirect' => 'back',
        ];
    }

    public static function invalid_input($input) : array {
        return [
            'title' => 'Entrada Inválida',
            'content' => "Verifique o $input inserido no formulário!",
            'redirect' => 'back',
        ];
    }

    public static function save_success($link) : array {
        return [
            'title' => 'Operação Concluída',
            'content' => 'Os dados foram salvos com sucesso!',
            'redirect' => $link,
        ];
    }
}
?>
