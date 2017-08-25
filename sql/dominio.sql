﻿/*
* Base de dados
* NLLWS (a.k.a NICHOLAS LOPES LEITE WEB SERIVICE)
* 
* Script para criação da tabela DOMINIO
* 
* @author Nicholas Leite <nicklleite@gmail.com>
* @repo https://github.com/nicklleite/nllws
* @date 24/08/2017
*/

-- SEQUENCE para a chave primária
CREATE SEQUENCE DOMINIO_SEQ
START WITH 1
INCREMENT BY 1
NO MAXVALUE;

-- Tabela DOMINIO
CREATE TABLE DOMINIO (
	ID BIGINT NOT NULL CONSTRAINT DOMINIO_PK PRIMARY KEY DEFAULT NEXTVAL('DOMINIO_SEQ'),
	EMPRESA_ID BIGINT NOT NULL,
	VL SMALLINT NOT NULL CONSTRAINT DOMINIO_VL_CK CHECK (VL < 999),
	DESCR VARCHAR(150) NOT NULL,
	_ALTERADO_POR BIGINT NOT NULL,
	_DATA_INCLUSAO TIMESTAMP NOT NULL,
	_DATA_ALTERACAO TIMESTAMP NOT NULL
);
ALTER TABLE DOMINIO
ADD CONSTRAINT DOMINIO_ALTERADOPOR_FK FOREIGN KEY (_ALTERADO_POR) REFERENCES USUARIO(ID);
--  CONSTRAINT DOMINIO_ALTERADOPOR_FK FOREIGN KEY (_ALTERADO_POR) REFERENCES USUARIO(ID)
