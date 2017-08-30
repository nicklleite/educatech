/*
*	Base de dados
*	NLLWS (a.k.a NICHOLAS LOPES LEITE WEB SERIVICE)
* 
*	Script para criação da tabela DISCIPLINA
* 
*	@author Nicholas Leite <nicklleite@gmail.com>
*	@repo https://github.com/nicklleite/nllws
*	@date 29/08/2017
*
*/

-- SEQUENCE para a chave primária
CREATE SEQUENCE DISCIPLINA_SEQ
START WITH 1
INCREMENT BY 1
NO MINVALUE
NO MAXVALUE
NO CYCLE;

-- Tabela DISCIPLINA
CREATE TABLE DISCIPLINA (
    ID BIGINT NOT NULL,
    