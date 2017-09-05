/*
*	Base de dados
*	NLLWS (a.k.a NICHOLAS LOPES LEITE WEB SERIVICE)
* 
*	Script para criação da tabela INSTITUICAO
* 
*	@author Nicholas Leite <nicklleite@gmail.com>
*	@repo https://github.com/nicklleite/nllws
*	@date 04/09/2017
*
*/

-- SEQUENCE para a chave primária
CREATE SEQUENCE ESTADO_SEQ
START WITH 1
INCREMENT BY 1
NO MINVALUE
NO MAXVALUE
NO CYCLE;

-- Tabela ESTADO
DROP TABLE IF EXISTS ESTADO;
CREATE TABLE ESTADO (
	ID BIGINT NOT NULL DEFAULT NEXTVAL('ESTADO_SEQ'),
	COD_IBGE INTEGER NOT NULL,
	SIGLA VARCHAR(2) NOT NULL,
	ESTADO VARCHAR(50) NOT NULL,

	CONSTRAINT ESTADO_PK PRIMARY KEY (ID)
);

ALTER SEQUENCE ESTADO_SEQ OWNED BY ESTADO.ID;

INSERT INTO ESTADO (ID, COD_IBGE, SIGLA, ESTADO) VALUES
(NEXTVAL('ESTADO_SEQ'), 12, 'AC', 'Acre'),
(NEXTVAL('ESTADO_SEQ'), 27, 'AL', 'Alagoas'),
(NEXTVAL('ESTADO_SEQ'), 16, 'AP', 'Amapá'),
(NEXTVAL('ESTADO_SEQ'), 13, 'AM', 'Amazonas'),
(NEXTVAL('ESTADO_SEQ'), 29, 'BA', 'Bahia'),
(NEXTVAL('ESTADO_SEQ'), 23, 'CE', 'Ceará'),
(NEXTVAL('ESTADO_SEQ'), 53, 'DF', 'Distrito Federal'),
(NEXTVAL('ESTADO_SEQ'), 32, 'ES', 'Espírito Santo'),
(NEXTVAL('ESTADO_SEQ'), 52, 'GO', 'Goiás'),
(NEXTVAL('ESTADO_SEQ'), 21, 'MA', 'Maranhão'),
(NEXTVAL('ESTADO_SEQ'), 51, 'MT', 'Mato Grosso'),
(NEXTVAL('ESTADO_SEQ'), 50, 'MS', 'Mato Grosso do Sul'),
(NEXTVAL('ESTADO_SEQ'), 31, 'MG', 'Minas Gerais'),
(NEXTVAL('ESTADO_SEQ'), 15, 'PA', 'Pará'),
(NEXTVAL('ESTADO_SEQ'), 25, 'PB', 'Paraíba'),
(NEXTVAL('ESTADO_SEQ'), 41, 'PR', 'Paraná'),
(NEXTVAL('ESTADO_SEQ'), 26, 'PE', 'Pernambuco'),
(NEXTVAL('ESTADO_SEQ'), 22, 'PI', 'Piauí'),
(NEXTVAL('ESTADO_SEQ'), 33, 'RJ', 'Rio de Janeiro'),
(NEXTVAL('ESTADO_SEQ'), 24, 'RN', 'Rio Grande do Norte'),
(NEXTVAL('ESTADO_SEQ'), 43, 'RS', 'Rio Grande do Sul'),
(NEXTVAL('ESTADO_SEQ'), 11, 'RO', 'Rondônia'),
(NEXTVAL('ESTADO_SEQ'), 14, 'RR', 'Roraima'),
(NEXTVAL('ESTADO_SEQ'), 42, 'SC', 'Santa Catarina'),
(NEXTVAL('ESTADO_SEQ'), 35, 'SP', 'São Paulo'),
(NEXTVAL('ESTADO_SEQ'), 28, 'SE', 'Sergipe'),
(NEXTVAL('ESTADO_SEQ'), 17, 'TO', 'Tocantins');
