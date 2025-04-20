--
-- DataBase HOME
--

CREATE DATABASE IF NOT EXISTS home DEFAULT CHARACTER SET utf16 COLLATE utf16_general_ci;

USE home;

--
-- Tabela de Animes
--

DROP TABLE IF EXISTS `animes`;

CREATE TABLE `animes` (
    `id` smallint unsigned NOT NULL AUTO_INCREMENT,
    `nome` varchar(64) COLLATE utf8mb4_general_ci NOT NULL,
    `status` enum('atual','concluido','pendente','oculto') COLLATE utf8mb4_general_ci NOT NULL,
    `concluidos` tinyint unsigned NOT NULL,
    `atuais` tinyint unsigned NOT NULL,
    `total` smallint unsigned NOT NULL,
    `lancamento` char(8) COLLATE utf8mb4_general_ci NOT NULL,
    `link` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `nome` (`nome`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tabela de Projetos
--

DROP TABLE IF EXISTS `projetos`;

CREATE TABLE `projetos` (
    `id` smallint unsigned NOT NULL AUTO_INCREMENT,
    `titulo` varchar(32) COLLATE utf8mb4_general_ci NOT NULL,
    `status` enum('Em Criação','Em Produção','Em Revisão','Em Correção','Concluído') COLLATE utf8mb4_general_ci NOT NULL,
    `grupo` enum('Mídia','Minecraft','Disciplina','Pessoal','Pesquisa','Verso','Outro') COLLATE utf8mb4_general_ci NOT NULL,
    `descricao` varchar(512) COLLATE utf8mb4_general_ci NOT NULL,
    `link` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
    `anotacoes` text COLLATE utf8mb4_general_ci NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `titulo` (`titulo`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tabela de Tarefas
--

DROP TABLE IF EXISTS `tarefas`;

CREATE TABLE `tarefas` (
    `id` smallint unsigned NOT NULL AUTO_INCREMENT,
    `titulo` varchar(32) COLLATE utf8mb4_general_ci NOT NULL,
    `tipo` enum('Entrega','Semanal','Mensal') COLLATE utf8mb4_general_ci NOT NULL,
    `data` date COLLATE utf8mb4_general_ci NOT NULL,
    `grupo` enum('Mídia','Minecraft','Disciplina','Pessoal','Pesquisa','Outro') COLLATE utf8mb4_general_ci NOT NULL,
    `anotacoes` text COLLATE utf8mb4_general_ci NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `titulo` (`titulo`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tabela de Filmes
--

DROP TABLE IF EXISTS `filmes`;

CREATE TABLE `filmes` (
    `id` smallint unsigned NOT NULL AUTO_INCREMENT,
    `titulo` varchar(32) COLLATE utf8mb4_general_ci NOT NULL,
    `duracao` smallint unsigned NOT NULL,
    `ano` smallint unsigned NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `titulo` (`titulo`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
