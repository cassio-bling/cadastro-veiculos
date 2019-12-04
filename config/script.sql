CREATE DATABASE treinamento DEFAULT CHARACTER SET utf8;
USE treinamento;

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(20) NOT NULL,  
  PRIMARY KEY (`id`)
);

INSERT INTO `usuario` (`nome`, `email`, `senha`) VALUES
('master', 'master@bling', '123');

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
  `idUsuario` int(11) NOT NULL,
  `dataCriacao` datetime DEFAULT CURRENT_TIMESTAMP,
  `dataAlteracao` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`idUsuario`) REFERENCES `usuario`(`id`)
);

INSERT INTO `veiculo` (`descricao`, `placa`, `codigoRenavam`, `anoModelo`, `anoFabricacao`, `cor`, `km`, `marca`, `preco`, `precoFipe`, `idUsuario`) VALUES
('Ka',          'ABC1234', '123456789', 2011, 2010, 'Branca', 0, 'Ford', 50000, 55000, 1),
('Fiesta',      'ABC1234', '123456789', 2011, 2010, 'Branca', 0, 'Ford', 50000, 55000, 1),
('Focus',       'ABC1234', '123456789', 2011, 2010, 'Branca', 0, 'Ford', 50000, 55000, 1),
('Fusion',      'ABC1234', '123456789', 2011, 2010, 'Branca', 0, 'Ford', 50000, 55000, 1),
('Mondeo',      'ABC1234', '123456789', 2011, 2010, 'Branca', 0, 'Ford', 50000, 55000, 1),
('Mustang',     'ABC1234', '123456789', 2011, 2010, 'Branca', 0, 'Ford', 50000, 55000, 1),
('Ranger',      'ABC1234', '123456789', 2011, 2010, 'Branca', 0, 'Ford', 50000, 55000, 1),
('GT',          'ABC1234', '123456789', 2011, 2010, 'Branca', 0, 'Ford', 50000, 55000, 1),
('S-Max',       'ABC1234', '123456789', 2011, 2010, 'Branca', 0, 'Ford', 50000, 55000, 1),
('Galaxy',      'ABC1234', '123456789', 2011, 2010, 'Branca', 0, 'Ford', 50000, 55000, 1),
('Ecosport',    'ABC1234', '123456789', 2011, 2010, 'Branca', 0, 'Ford', 50000, 55000, 1),
('Puma',        'ABC1234', '123456789', 2011, 2010, 'Branca', 0, 'Ford', 50000, 55000, 1),
('Escape',      'ABC1234', '123456789', 2011, 2010, 'Branca', 0, 'Ford', 50000, 55000, 1),
('Edge',        'ABC1234', '123456789', 2011, 2010, 'Branca', 0, 'Ford', 50000, 55000, 1),
('Explorer',    'ABC1234', '123456789', 2011, 2010, 'Branca', 0, 'Ford', 50000, 55000, 1),
('Transit',     'ABC1234', '123456789', 2011, 2010, 'Branca', 0, 'Ford', 50000, 55000, 1),
('F-150',       'ABC1234', '123456789', 2011, 2010, 'Branca', 0, 'Ford', 50000, 55000, 1),
('Super Duty',  'ABC1234', '123456789', 2011, 2010, 'Branca', 0, 'Ford', 50000, 55000, 1),
('Lazer',       'ABC1234', '123456789', 2011, 2010, 'Branca', 0, 'Ford', 50000, 55000, 1),
('Bronco',      'ABC1234', '123456789', 2011, 2010, 'Branca', 0, 'Ford', 50000, 55000, 1),
('Malibu',      'ABC1234', '123456789', 2011, 2010, 'Branca', 0, 'Ford', 50000, 55000, 1),
('Husky',       'ABC1234', '123456789', 2011, 2010, 'Branca', 0, 'Ford', 50000, 55000, 1),
('Aerostar',    'ABC1234', '123456789', 2011, 2010, 'Branca', 0, 'Ford', 50000, 55000, 1),
('Aurora',      'ABC1234', '123456789', 2011, 2010, 'Branca', 0, 'Ford', 50000, 55000, 1),
('Alpe',        'ABC1234', '123456789', 2011, 2010, 'Branca', 0, 'Ford', 50000, 55000, 1),
('427',         'ABC1234', '123456789', 2011, 2010, 'Branca', 0, 'Ford', 50000, 55000, 1),	
('Fairlane',    'ABC1234', '123456789', 2011, 2010, 'Branca', 0, 'Ford', 50000, 55000, 1),
('Maya',        'ABC1234', '123456789', 2011, 2010, 'Branca', 0, 'Ford', 50000, 55000, 1),
('Fusion',      'ABC1234', '123456789', 2011, 2010, 'Branca', 0, 'Ford', 50000, 55000, 1),
('Surf',        'ABC1234', '123456789', 2011, 2010, 'Branca', 0, 'Ford', 50000, 55000, 1),
('Nucleon',     'ABC1234', '123456789', 2011, 2010, 'Branca', 0, 'Ford', 50000, 55000, 1),
('Evos',        'ABC1234', '123456789', 2011, 2010, 'Branca', 0, 'Ford', 50000, 55000, 1),
('EX',          'ABC1234', '123456789', 2011, 2010, 'Branca', 0, 'Ford', 50000, 55000, 1);

CREATE TABLE `componente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(60) NOT NULL,
  `dataCriacao` datetime DEFAULT CURRENT_TIMESTAMP,
  `dataAlteracao` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
);

INSERT INTO `componente` (`descricao`) VALUES 
('Ar condicionado'),
('Air bag'),
('CD player'),
('Direção hidráulica'),
('Vidro elétrico'),
('Trava elétrica'),
('Câmbio automático'),
('Rodas de liga'),
('Alarme');

CREATE TABLE `veiculo_componente` (
  `idVeiculo` int(11) NOT NULL,
  `idComponente` int(11) NOT NULL,
  `dataCriacao` datetime DEFAULT CURRENT_TIMESTAMP,
  `dataAlteracao` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (`idVeiculo`) REFERENCES `veiculo`(`id`),
  FOREIGN KEY (`idComponente`) REFERENCES `componente`(`id`)
);
