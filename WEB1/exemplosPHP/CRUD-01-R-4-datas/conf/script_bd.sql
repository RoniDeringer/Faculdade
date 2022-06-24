CREATE TABLE `produto` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(45) NULL,
  `valor` DOUBLE NULL,
  `dataCompra` DATETIME NULL,
  `vencimento` DATE NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

insert into produto(
descricao,valor,dataCompra,vencimento) VALUES
("Bata","6.50","2019-02-09 15:54:49","2021-02-01");