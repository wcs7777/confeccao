DROP DATABASE IF EXISTS `confeccao`;

CREATE DATABASE
	`confeccao`
CHARACTER SET
	utf8
COLLATE
	utf8_general_ci;

USE `confeccao`;

CREATE TABLE `usuario` (
	`id` INT PRIMARY KEY AUTO_INCREMENT,
	`nomeUsuario` VARCHAR(50) UNIQUE,
	`senha` VARCHAR(255)
);

CREATE TABLE `cliente` (
	`id` INT PRIMARY KEY AUTO_INCREMENT,
	`nome` VARCHAR(50),
	`telefone` VARCHAR(11)
);

CREATE TABLE `modelo` (
	`id` INT PRIMARY KEY AUTO_INCREMENT,
	`tipo` VARCHAR(20) UNIQUE,
	`preco` DOUBLE(5, 2)
);

CREATE TABLE `tamanho` (
	`id` INT PRIMARY KEY AUTO_INCREMENT,
	`valor` VARCHAR(5) UNIQUE
);

CREATE TABLE `pedido` (
	`id` INT PRIMARY KEY AUTO_INCREMENT,
	`idCliente` INT NOT NULL,
	`previsaoEntrega` DATE,
	`foiEntregue` BOOLEAN DEFAULT FALSE
);

CREATE TABLE `item` (
	`idPedido` INT NOT NULL,
	`idModelo` INT NOT NULL,
	`idTamanho` INT NOT NULL,
	`quantia` INT
);

ALTER TABLE
	`pedido`
ADD CONSTRAINT
	`fk_idCliente`
FOREIGN KEY
	(`idCliente`)
REFERENCES
	`cliente` (`id`);

ALTER TABLE
	`item`
ADD CONSTRAINT
	`fk_idPedido`
FOREIGN KEY
	(`idPedido`)
REFERENCES
	`pedido` (`id`);

ALTER TABLE
	`item`
ADD CONSTRAINT
	`fk_idModelo`
FOREIGN KEY
	(`idModelo`)
REFERENCES
	`modelo` (`id`);

ALTER TABLE
	`item`
ADD CONSTRAINT
	`fk_idItem`
FOREIGN KEY
	(`idTamanho`)
REFERENCES
	`tamanho` (`id`);
