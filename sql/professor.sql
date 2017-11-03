﻿/**
 * Base de dados - EducaTech
 *
 * Script para criação da tabela PROFESSOR
 *
 * @author Nicholas Leite <nicklleite@gmail.com>
 * @see https://github.com/nicklleite/educatech
 * @date 29/08/2017
 * 
 */

-- SEQUENCE para a chave primária
CREATE SEQUENCE PROFESSOR_SEQ
START WITH 1
INCREMENT BY 1
NO MINVALUE
NO MAXVALUE
NO CYCLE;

-- Tabela PROFESSOR
DROP TABLE IF EXISTS PROFESSOR;
CREATE TABLE PROFESSOR (
    ID BIGINT NOT NULL DEFAULT NEXTVAL('PROFESSOR_SEQ'),
    PESSOA_ID BIGINT NOT NULL,
    MATRICULA VARCHAR(7) NOT NULL,
    DATA_CONTR DATE DEFAULT CURRENT_DATE,
    DM_SITUACAO VARCHAR(1) NOT NULL DEFAULT '0',

    CONSTRAINT PROFESSOR_PK PRIMARY KEY (ID)
);

ALTER SEQUENCE PROFESSOR_SEQ OWNED BY PROFESSOR.ID;

ALTER TABLE PROFESSOR
    ADD CONSTRAINT PROFESSOR_PESSOA_FK FOREIGN KEY (PESSOA_ID) REFERENCES PESSOA (ID);
CREATE INDEX PROFESSOR_PESSOA_FK_I
    ON PROFESSOR (PESSOA_ID);

ALTER TABLE PROFESSOR
    ADD CONSTRAINT PROFESSOR_DMSITUACAO_CK CHECK (DM_SITUACAO IN ('0', '1', '2'));

INSERT INTO DOMINIO
VALUES
    (NEXTVAL('DOMINIO_SEQ'), '0', 'PROFESSOR.DM_SITUACAO', 'Inativo'),
    (NEXTVAL('DOMINIO_SEQ'), '1', 'PROFESSOR.DM_SITUACAO', 'Ativo'),
    (NEXTVAL('DOMINIO_SEQ'), '2', 'PROFESSOR.DM_SITUACAO', 'Pendente');

ALTER TABLE PROFESSOR
    ADD CONSTRAINT PROFESSOR_UK UNIQUE (MATRICULA);