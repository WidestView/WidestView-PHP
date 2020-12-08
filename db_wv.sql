-- db: database
-- wv: widest view
drop database if exists DB_WV;

create database if not exists DB_WV;

use DB_WV;

create table if not exists FUNCIONARIO
(
    FUN_CODIGO      INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    FUN_NOME        VARCHAR (255) NOT NULL,
    FUN_NOME_SOCIAL VARCHAR (255),
    FUN_SEXO     	CHAR NOT NULL,
    FUN_RG          VARCHAR(12) NOT NULL,
    FUN_CPF         CHAR(11) NOT NULL,
    FUN_NASCIMENTO  DATE NOT NULL,
    FUN_TELEFONE    VARCHAR(15),
    FUN_CEL         VARCHAR(15),
    FUN_EMAIL       VARCHAR (255) NOT NULL,
    FUN_NIVELACESSO INT NOT NULL,
    FUN_SENHA       VARCHAR(10),
    FUN_CARGO 		VARCHAR(255),
    FUN_ATIVO       BOOLEAN NOT NULL DEFAULT TRUE
);

create table if not exists SERVICO
(
    SER_CODIGO      INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    SER_NOME        VARCHAR (255) NOT NULL,
    SER_DESCRICAO   TEXT NOT NULL,
    SER_ATIVO       BOOLEAN NOT NULL DEFAULT TRUE
);

-- REP_CLIENTE: Representante do cliente
create table if not exists REP_CLIENTE
(
    REP_CODIGO          INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    REP_NOME            VARCHAR (255) NOT NULL,
    REP_NOME_SOCIAL     VARCHAR (255),
    REP_CPF             CHAR(11) NOT NULL,
    REP_SEXO          	VARCHAR(2) NOT NULL,
    REP_TELEFONE        VARCHAR(15) NOT NULL,
    REP_CEL             VARCHAR(15) NOT NULL,
    REP_EMAIL           VARCHAR(255) NOT NULL
);

create table if not exists CLIENTE
(
    CLI_CODIGO                  INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    CLI_NOME                    VARCHAR (255) NOT NULL,
    CLI_CNPJ                    VARCHAR(14) NOT NULL,
    CLI_CODIGO_REPRESENTANTE    INT NOT NULL
);

create table if not exists PROJETO
(
    PRO_CODIGO          INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    PRO_NOME            VARCHAR(255) NOT NULL,
    PRO_DESCRICAO       TEXT NOT NULL,
    PRO_ATIVO           BOOLEAN NOT NULL DEFAULT TRUE,
    PRO_CODIGO_CLIENTE  INT NOT NULL,
    PRO_PRAZO 			DATETIME NOT NULL
);

create table if not exists RELATORIO
(
    CODIGO          INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    DIA             DATE NOT NULL,
    DESCRICAO       TEXT NOT NULL,
    CODIGO_PROJETO  INT NOT NULL
);

-- AGRE_ESP_FUNC: Agragação entre serviço e funcionário
create table if not exists AGRE_SERV_FUNC
(
    CODIGO                  INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    CODIGO_SERVICO    		INT NOT NULL,
    CODIGO_FUNCIONARIO      INT NOT NULL
);

create table if not exists DEMISSAO
(
    CODIGO              INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    DIA                 DATE NOT NULL,
    JUSTIFICATIVA       TEXT NOT NULL,
    CODIGO_FUNCIONARIO  INT NOT NULL,
    CODIGO_RELATORIO    INT NOT NULL
);

-- ANOTACAO_PROJ: Anotação/comentário em um projeto
-- CÓDIGO_FUNC_PROJ: Código derivado da tabela de agregação entre funcionário e projeto
create table if not exists ANOTACAO_PROJ
(
    CODIGO              INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    TITULO              VARCHAR (255) NOT NULL,
    ANOTACAO            TEXT NOT NULL,
    HORARIO             DATETIME NOT NULL,
    CODIGO_FUNC_PROJ    INT,
    CODIGO_PROJETO      INT NOT NULL,
    CODIGO_FUNCIONARIO  INT NOT NULL
);

-- RESPOSTA_ANOT: Resposta para uma anotação/comentário
create table if not exists RESPOSTA_ANOT
(
	CODIGO				INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    RESPOSTA			TEXT NOT NULL,
    HORARIO				DATETIME NOT NULL,
    CODIGO_FUNCIONARIO	INT NOT NULL,
    CODIGO_ANOTACAO		INT NOT NULL
);

-- ORCAMENTO_PROJ: Orçamento do projeto 
create table if not exists ORCAMENTO_PROJ
(
    CODIGO      	INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    NOME            VARCHAR (255) NOT NULL,
    VALOR           NUMERIC (18, 2) NOT NULL,
    CODIGO_SERVICO  INT NOT NULL,
    CODIGO_PROJETO  INT NOT NULL
);

-- AGRE_FUNC_PROJ: Agregação entre funcionário e projeto
create table if not exists AGRE_FUNC_PROJ
(
    CODIGO              INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    CODIGO_FUNCIONARIO  INT NOT NULL,
    CODIGO_PROJETO      INT NOT NULL,
    CODIGO_SERVICO      INT NOT NULL
);

-- CONTRATO_MANU: Contrato de manutenção
create table if not exists CONTRATO_MANU
(
    CODIGO          INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    DATA_INICIO     DATE NOT NULL,
    DATA_FINAL      DATE NOT NULL,
    ATIVO           BOOLEAN NOT NULL DEFAULT TRUE,
    CODIGO_CLIENTE  INT NOT NULL
);

ALTER TABLE AGRE_SERV_FUNC ADD FOREIGN KEY (CODIGO_FUNCIONARIO) REFERENCES FUNCIONARIO(FUN_CODIGO);
ALTER TABLE AGRE_SERV_FUNC ADD FOREIGN KEY (CODIGO_SERVICO) REFERENCES SERVICO(SER_CODIGO);

ALTER TABLE CLIENTE ADD FOREIGN KEY (CLI_CODIGO_REPRESENTANTE) REFERENCES REP_CLIENTE(REP_CODIGO);

ALTER TABLE CONTRATO_MANU ADD FOREIGN KEY (CODIGO_CLIENTE) REFERENCES CLIENTE(CLI_CODIGO);

ALTER TABLE PROJETO ADD FOREIGN KEY (PRO_CODIGO_CLIENTE) REFERENCES CLIENTE(CLI_CODIGO);

ALTER TABLE AGRE_FUNC_PROJ ADD FOREIGN KEY (CODIGO_FUNCIONARIO) REFERENCES FUNCIONARIO(FUN_CODIGO);
ALTER TABLE AGRE_FUNC_PROJ ADD FOREIGN KEY (CODIGO_PROJETO) REFERENCES PROJETO(PRO_CODIGO);
ALTER TABLE AGRE_FUNC_PROJ ADD FOREIGN KEY (CODIGO_SERVICO) REFERENCES SERVICO(SER_CODIGO);

ALTER TABLE ORCAMENTO_PROJ ADD FOREIGN KEY (CODIGO_SERVICO) REFERENCES SERVICO(SER_CODIGO);
ALTER TABLE ORCAMENTO_PROJ ADD FOREIGN KEY (CODIGO_PROJETO) REFERENCES PROJETO(PRO_CODIGO);

ALTER TABLE RELATORIO ADD FOREIGN KEY (CODIGO_PROJETO) REFERENCES PROJETO(PRO_CODIGO);

ALTER TABLE DEMISSAO ADD FOREIGN KEY (CODIGO_FUNCIONARIO) REFERENCES FUNCIONARIO(FUN_CODIGO);
ALTER TABLE DEMISSAO ADD FOREIGN KEY (CODIGO_RELATORIO) REFERENCES RELATORIO(CODIGO);

ALTER TABLE ANOTACAO_PROJ ADD FOREIGN KEY (CODIGO_FUNC_PROJ) REFERENCES AGRE_FUNC_PROJ(CODIGO);
ALTER TABLE ANOTACAO_PROJ ADD FOREIGN KEY (CODIGO_FUNCIONARIO) REFERENCES FUNCIONARIO(FUN_CODIGO);
ALTER TABLE ANOTACAO_PROJ ADD FOREIGN KEY (CODIGO_PROJETO) REFERENCES PROJETO(PRO_CODIGO);

ALTER TABLE RESPOSTA_ANOT ADD FOREIGN KEY (CODIGO_FUNCIONARIO) REFERENCES FUNCIONARIO(FUN_CODIGO);
ALTER TABLE RESPOSTA_ANOT ADD FOREIGN KEY (CODIGO_ANOTACAO) REFERENCES ANOTACAO_PROJ(CODIGO);

/* TESTS */

insert into funcionario(fun_nome,fun_nome_social,fun_sexo,fun_rg,fun_cpf,fun_nascimento,fun_telefone,fun_cel,fun_email,fun_nivelacesso,fun_senha,fun_cargo)
values ('ADMININISTRO', 'admBrabo', 'M', '5', '2','2004-02-08', '2', '2', 'adm@gmail.com', 1, 'adm', 'ANALISTA BACKEND'),
	   ('nao_adm', 'nao_adm', 'M', '5', '2','2004-02-08', '2', '2', 'nao_adm@gmail.com', 0, 'adm', 'ANALISTA FRONTEND'),
       ('Yasmin Francisquetti', null, 'F', '256469647', '44204213049','2004-02-26', '36085737', '965465682', 'francisquetti.yasmin@gmail.com', 0, 'yasmin123', 'ANALISTA DE BANCO DE DADOS'),
       ('Júlia Souza Braz', null, 'F', '224767471', '82154348009', '2004-05-21', '52419876', '961400283', 'juhsb21@gmail.com', 0, 'jujubs', 'ANALISTA MOBILE'),
       ('Roberto Christian', null, 'M', '458752479', '45879632104', '1997-06-17', '78562178', '985741236', 'robertochristian@gmail.com', 0, 'robertos', 'INFRAESTRUTURA');

insert into servico(ser_nome, ser_descricao)
values ('PROGRAMAÇÃO BACK-END', 'Programação de operações em sistemas'),
       ('PROGRAMAÇÃO FRONT-END', 'Programação de design e interface'),
       ('INFRAESTRUTURA', 'Planejamento de localidades e orçamentos'),
       ('BANCO DE DADOS', 'Criação e manutentção de banco de dados'),
       ('ANÁLISE', 'Análise de casos e levantamentod de requisitos para sistemas');

insert into agre_serv_func(codigo_servico, codigo_funcionario)
values (1, 1),
       (1, 2),
       (3, 4),
       (4, 5),
       (2, 2);


insert into rep_cliente(rep_nome, rep_nome_social, rep_cpf, rep_sexo, rep_telefone, rep_cel, rep_email)
values ('Maria Vieira', null, '41527896321', 'F', '85749632', '985471258', 'maria.vi@gmail.com'),
       ('Vitor Barros', null, '12456396341', 'M', '74575698', '124521896', 'vitor.baros@gmail.com'),
       ('Caio Mathios', null, '58475245681', 'M', '65478214', '458752365', 'caio.mathios@gmail.com'),
       ('Junior Carlo', null, '52412511514', 'M', '45856325', '451355615', 'junior.carlo@gmail.com'),
       ('Zooey Guiert', null, '75842145895', 'M', '47586526', '758452362', 'zooey.guiert@gmail.com');
       
insert into cliente(cli_nome, cli_cnpj, cli_codigo_representante)
values ('ZAOO ZOOLÓGICO', '54125485428', 1),
       ('SWER RESTAURANTE', '55483351354', 3),
       ('POLR HABITAÇÕES', '56416416414', 2),
       ('WATW EDIFICAÇÕES', '45845666524', 4),
       ('OUT OF LENS FOTOGRAFIA', '45213352741', 5);
       
insert into projeto(pro_nome, pro_descricao, pro_codigo_cliente, pro_prazo)
values ('SITE ZAOO', 'CRIAÇÃO DE SITE PARA ADMINISTRAÇÃO DOS ANIMAIS E HABITATS DE UM ZOOLÓGICO', 1, '2020-12-20'),
	   ('DISPENSA DE RESTAURANTE', 'CRIAÇÃO DE SISTEMA PARA ADMINISTRAÇÃO DE DISPENSA DE UM RESTAURANTE', 2, '2021-01-20'),
       ('MANUTENÇÃO DE SISTEMA DE HABITAÇÕES', 'MANUTENÇÃO DE ERROS E IMPLEMENTAÇÃO NO BANCO DE DADOS', 3, '2021-02-10'),
       ('SISTEMA DE MONITORAMENTO', 'CRIAÇÃO DE MAPEAMENTO E SISTEMA DE MONITORAMENTO PARA EDIFÍCIO', 4, '2021-03-05'),
       ('SISTEMA DE GERENCIAMENTO COMPLETO', 'CRIAÇÃO DE SISTEMA PARA ADMINISTRAÇÃO DE UMA EMPRESA FOTOGRÁFICA', 5, '2020-08-12');