CREATE TABLE IF NOT EXISTS `db-projeto2`.`funcionario`(
    `idFuncionario` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `nome` VARCHAR(255) NOT NULL,
    `usuario` VARCHAR(255) NOT NULL,
    `senha` VARCHAR(255) NOT NULL, 
    PRIMARY KEY(`idFuncionario`)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `db-projeto2`.`fornecedor`(
    `idFornecedor` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `nome` VARCHAR(255) NOT NULL,
    `endereco` VARCHAR(255) NOT NULL,
    PRIMARY KEY(`idFornecedor`)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `db-projeto2`.`estoque`(
    `idEstoque` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `idFornecedor` INT UNSIGNED NOT NULL,
    `nome` VARCHAR(255) NOT NULL,
    `preco` DOUBLE NOT NULL,
    `quantidade` DOUBLE NOT NULL,
    PRIMARY KEY(`idEstoque`),
    INDEX `fk_estoque_fornecedor1_idx`(`idFornecedor` ASC),
    CONSTRAINT `fk_estoque_fornecedor1` FOREIGN KEY(`idFornecedor`) REFERENCES `db-projeto2`.`fornecedor`(`idFornecedor`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `db-projeto2`.`produto`(
    `idEstoque` INT UNSIGNED NOT NULL,
    `idFuncionario` INT UNSIGNED NOT NULL,
    PRIMARY KEY(`idEstoque`),
    INDEX `fk_produto_estoque1_idx`(`idEstoque` ASC),
    INDEX `fk_produto_funcionario1_idx`(`idFuncionario` ASC),
    CONSTRAINT `fk_produto_estoque1` FOREIGN KEY(`idEstoque`) REFERENCES `db-projeto2`.`estoque`(`idEstoque`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    CONSTRAINT `fk_produto_funcionario1` FOREIGN KEY(`idFuncionario`) REFERENCES `db-projeto2`.`funcionario`(`idFuncionario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `db-projeto2`.`vendasDiarias`(
    `idVendasDiarias` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `idFuncionario` INT UNSIGNED NOT NULL,
    `data` DATE NOT NULL, 
    `valor` DOUBLE NOT NULL,
    PRIMARY KEY(`idVendasDiarias`),
    INDEX `fk_vendasDiarias_funcionario_idx`(`idFuncionario` ASC),
    CONSTRAINT `fk_vendasDiarias_funcionario` FOREIGN KEY(`idFuncionario`) REFERENCES `db-projeto2`.`funcionario`(`idFuncionario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `db-projeto2`.`notaPromissoria`(
    `idNotaPromissoria` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `idFornecedor` INT UNSIGNED NOT NULL,
    `preco` DOUBLE NOT NULL,
    `dataCompra` DATE NOT NULL, 
    `dataPagamento` DATE NOT NULL, 
    `ativa` TINYINT NOT NULL DEFAULT 1,
    PRIMARY KEY(`idNotaPromissoria`),
    INDEX `fk_notaPromissoria_fornecedor1_idx`(`idFornecedor` ASC),
    CONSTRAINT `fk_notaPromissoria_fornecedor1` FOREIGN KEY(`idFornecedor`) REFERENCES `db-projeto2`.`fornecedor`(`idFornecedor`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB;
