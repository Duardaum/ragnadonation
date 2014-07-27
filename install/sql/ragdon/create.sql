CREATE TABLE clientes (
    codcliente INT4 AUTO_INCREMENT NOT NULL,
    codcidade INT4 NOT NULL,
    nome VARCHAR(100) NOT NULL,
    endereco VARCHAR(255) NOT NULL,
    bairro VARCHAR(50) NOT NULL,
    numero VARCHAR(10) NOT NULL,
    fone01ddd CHAR(2) NULL,
    fone01num CHAR(8) NULL,
    fone02ddd CHAR(2) NULL,
    fone02num CHAR(8) NULL,
    email VARCHAR(100) NOT NULL,
    datanascimento DATE NOT NULL,
    datacadastro DATE NOT NULL,
    PRIMARY KEY(codcliente),
    UNIQUE(email)
);

CREATE TABLE login (
    codlogin INT4 AUTO_INCREMENT NOT NULL,
    codcliente INT4 NOT NULL,
    login VARCHAR(20) NOT NULL,
    senha VARCHAR(12) NOT NULL,
    cryplogin VARCHAR(40) NOT NULL,
    crypsenha VARCHAR(40) NOT NULL,
    tipo CHAR(1) NOT NULL, -- Se é usuario comum, ou administrador
    contador_log INT4 NOT NULL,
    ultimo_log DATETIME NOT NULL,
    ip VARCHAR(30) NOT NULL,
    PRIMARY KEY(codlogin),
    UNIQUE(login, cryplogin)
);

CREATE TABLE doacao (
    coddoacao INT4 AUTO_INCREMENT NOT NULL,
    codcliente INT4 NOT NULL,
    dia_doacao DATE NOT NULL,
    hora_doacao TIME NOT NULL,
    tipo CHAR(1) NOT NULL COMMENT ' cas0 1 = doacao vip, caso 2 = doacao rops',
    valor FLOAT NOT NULL COMMENT 'valor em dinheiro feito pelo usuário',
    mensagem TEXT NULL,
    cod_ativacao VARCHAR(50) NOT NULL,
    status CHAR(1) NOT NULL COMMENT 'caso 0 = nao aprovado, 1 = aprovado, 2 = usado',
    dia DATE NOT NULL,
    hora TIME NOT NULL,
    ip VARCHAR(30) NOT NULL,
    PRIMARY KEY(coddoacao)
);

CREATE TABLE conta (
    codconta INT4 AUTO_INCREMENT NOT NULL,
    coddoacao INT4 NOT NULL,
    char_doador VARCHAR(50) NULL,
    char_receptor VARCHAR(50) NOT NULL,
    char_receptor_login VARCHAR(50) NOT NULL,
    PRIMARY KEY(codconta)
);

CREATE TABLE estados (
    codestado INT4 AUTO_INCREMENT NOT NULL,
    uf CHAR(2) NOT NULL,
    nome VARCHAR(30) NOT NULL,
    PRIMARY KEY(codestado),
    UNIQUE(uf, nome)
);

CREATE TABLE cidades (
    codcidade INT4 NOT NULL,
    nome VARCHAR(200) NOT NULL,
    uf CHAR(2) NOT NULL
);

CREATE VIEW vw_usuarios AS
SELECT c.codcliente, c.nome, c.email, l.cryplogin, l.crypsenha, l.tipo, l.contador_log, l.ultimo_log, l.ip FROM clientes c
INNER JOIN login l
ON c.codcliente = l.codcliente
ORDER BY nome ASC;

CREATE VIEW vw_doacoes AS
SELECT d.coddoacao, d.codcliente, d.dia_doacao, d.hora_doacao, d.tipo, d.valor, d.mensagem, d.cod_ativacao as codigo, d.status, d.dia, d.hora, d.ip, c.char_doador, c.char_receptor, c.char_receptor_login FROM doacao d
INNER JOIN conta c
ON d.coddoacao = c.coddoacao
ORDER BY dia, dia_doacao, hora_doacao ASC;

CREATE VIEW vw_relatorio AS
SELECT coddoacao, dia, hora, tipo, valor FROM doacao
ORDER BY dia, hora, valor ASC;

CREATE VIEW vw_clientes AS
SELECT c.codcliente, c.codcidade, c.nome, c.endereco, c.bairro, c.numero, c.fone01ddd, c.fone01num, c.fone02ddd, c.fone02num, c.email, c.datanascimento, l.login, l.senha, ct.uf FROM clientes c
INNER JOIN login l
ON c.codcliente = l.codcliente
INNER JOIN cidades ct
ON c.codcidade = ct.codcidade
ORDER BY nome ASC;