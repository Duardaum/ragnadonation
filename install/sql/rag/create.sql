CREATE TABLE `ragdon_vip` (
    `codragdon_vip` SERIAL NOT NULL,
    `account_id` INT(11) NOT NULL,
    `diasvip` INT NOT NULL,
    `dia_modificacao` DATE NOT NULL,
    PRIMARY KEY(codragdon_vip),
    UNIQUE(account_id)
);

CREATE TABLE `ragdon` (
    `codragdon` SERIAL NOT NULL,
    `account_id` INT(11) NOT NULL,
    `coddoacao` INT4 NOT NULL,
    `codcliente` INT4 NOT NULL,
    `cod_ativacao` VARCHAR(50) NOT NULL,
    `valor_abono` INT NOT NULL,
    `tipo_doacao` CHAR(1) NOT NULL COMMENT 'caso 1 = vip, caso 2 = donante',
    `status` CHAR(1) NOT NULL DEFAULT 0 COMMENT 'caso 0 = nao aprovado, 1 = aprovado, 2 = usado, 3 = verificado pelo sistema',
    `dia_cadastro` DATE NOT NULL,
    PRIMARY KEY(codragdon),
    UNIQUE(coddoacao)
);