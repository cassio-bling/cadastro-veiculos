CREATE DATABASE treinamento DEFAULT CHARACTER SET utf8;
USE treinamento;

CREATE TABLE `veiculo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(60) NOT NULL,
  `placa` varchar(7) NOT NULL,
  `codigoRenavam` varchar(11) NOT NULL,
  `anoModelo` int(4) NOT NULL,
  `anoFabricacao` int(4) NOT NULL,
  `cor` varchar(20) NOT NULL,
  `km` int(6) NOT NULL,
  `marca` varchar(20) NOT NULL,
  `preco` decimal(8,2) NOT NULL,
  `precoFipe` decimal(8,2) NOT NULL,
  `dataCriacao` datetime DEFAULT CURRENT_TIMESTAMP,
  `dataAlteracao` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
);

CREATE TABLE `componente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(60) NOT NULL,
  `dataCriacao` datetime DEFAULT CURRENT_TIMESTAMP,
  `dataAlteracao` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
);

CREATE TABLE `veiculo_componente` (
  `id_veiculo` int(11) NOT NULL,
  `id_componente` int(11) NOT NULL,
  `dataCriacao` datetime DEFAULT CURRENT_TIMESTAMP,
  `dataAlteracao` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_veiculo`, `id_componente`),
  FOREIGN KEY (`id_veiculo`) REFERENCES `veiculo`(`id`),
  FOREIGN KEY (`id_componente`) REFERENCES `componente`(`id`)
);

INSERT INTO `componente` (descricao) VALUES 
('Ar condicionado'),
('Air bag'),
('CD player'),
('Direção hidráulica'),
('Vidro elétrico'),
('Trava elétrica'),
('Câmbio automático'),
('Rodas de liga'),
('Alarme');