/*==============================================================*/
/* DBMS name:      ORACLE Version 11g                           */
/* Created on:     25/05/2018 13:52:30                          */
/*==============================================================*/


alter table CITA
   drop constraint FK_CITA_RELATIONS_RECEPCIO;

alter table CITA
   drop constraint FK_CITA_RELATIONS_USUARIOS;

alter table CITA
   drop constraint FK_CITA_RELATIONS_MEDICOS;

alter table CITA
   drop constraint FK_CITA_RELATIONS_HABITACI;

alter table CIUDAD
   drop constraint FK_CIUDAD_RELATIONS_PAIS;

alter table HABITACION
   drop constraint FK_HABITACI_RELATIONS_HOSPITAL;

alter table HOSPITAL
   drop constraint FK_HOSPITAL_RELATIONS_CIUDAD;

drop index RELATIONSHIP_6_FK;

drop index RELATIONSHIP_3_FK;

drop index RELATIONSHIP_2_FK;

drop index RELATIONSHIP_1_FK;

drop table CITA cascade constraints;

drop index RELATIONSHIP_7_FK;

drop table CIUDAD cascade constraints;

drop index RELATIONSHIP_5_FK;

drop table HABITACION cascade constraints;

drop index RELATIONSHIP_4_FK;

drop table HOSPITAL cascade constraints;

drop table MEDICOS cascade constraints;

drop table PAIS cascade constraints;

drop table RECEPCIONISTA cascade constraints;

drop table USUARIOS cascade constraints;

/*==============================================================*/
/* Table: CITA                                                  */
/*==============================================================*/
create table CITA 
(
   ID_CITA              VARCHAR2(10)         not null,
   RES_CEDULA           VARCHAR2(50),
   US_CEDULA            VARCHAR2(50),
   ME_CEDULA            VARCHAR2(50),
   HAB_ID               VARCHAR2(50),
   CI_HORARIO           DATE                 not null,
   constraint PK_CITA primary key (ID_CITA)
);

/*==============================================================*/
/* Index: RELATIONSHIP_1_FK                                     */
/*==============================================================*/
create index RELATIONSHIP_1_FK on CITA (
   RES_CEDULA ASC
);

/*==============================================================*/
/* Index: RELATIONSHIP_2_FK                                     */
/*==============================================================*/
create index RELATIONSHIP_2_FK on CITA (
   US_CEDULA ASC
);

/*==============================================================*/
/* Index: RELATIONSHIP_3_FK                                     */
/*==============================================================*/
create index RELATIONSHIP_3_FK on CITA (
   ME_CEDULA ASC
);

/*==============================================================*/
/* Index: RELATIONSHIP_6_FK                                     */
/*==============================================================*/
create index RELATIONSHIP_6_FK on CITA (
   HAB_ID ASC
);

/*==============================================================*/
/* Table: CIUDAD                                                */
/*==============================================================*/
create table CIUDAD 
(
   CIU_ID               VARCHAR2(50)         not null,
   PA_ID                VARCHAR2(50),
   CIU_DESCRIPCION      VARCHAR2(100)        not null,
   constraint PK_CIUDAD primary key (CIU_ID)
);

/*==============================================================*/
/* Index: RELATIONSHIP_7_FK                                     */
/*==============================================================*/
create index RELATIONSHIP_7_FK on CIUDAD (
   PA_ID ASC
);

/*==============================================================*/
/* Table: HABITACION                                            */
/*==============================================================*/
create table HABITACION 
(
   HAB_ID               VARCHAR2(50)         not null,
   HOS_ID               VARCHAR2(50),
   HAB_DESCRIPCION      VARCHAR2(50)         not null,
   constraint PK_HABITACION primary key (HAB_ID)
);

/*==============================================================*/
/* Index: RELATIONSHIP_5_FK                                     */
/*==============================================================*/
create index RELATIONSHIP_5_FK on HABITACION (
   HOS_ID ASC
);

/*==============================================================*/
/* Table: HOSPITAL                                              */
/*==============================================================*/
create table HOSPITAL 
(
   HOS_ID               VARCHAR2(50)         not null,
   CIU_ID               VARCHAR2(50),
   HOS_PISOS            VARCHAR2(50)         not null,
   HOS_DIRECCION        VARCHAR2(50)         not null,
   constraint PK_HOSPITAL primary key (HOS_ID)
);

/*==============================================================*/
/* Index: RELATIONSHIP_4_FK                                     */
/*==============================================================*/
create index RELATIONSHIP_4_FK on HOSPITAL (
   CIU_ID ASC
);

/*==============================================================*/
/* Table: MEDICOS                                               */
/*==============================================================*/
create table MEDICOS 
(
   ME_CEDULA            VARCHAR2(50)         not null,
   ME_NOMBRE            VARCHAR2(50)         not null,
   ME_EDAD              VARCHAR2(50)         not null,
   ME_DIRECCION         VARCHAR2(50)         not null,
   constraint PK_MEDICOS primary key (ME_CEDULA)
);

/*==============================================================*/
/* Table: PAIS                                                  */
/*==============================================================*/
create table PAIS 
(
   PA_ID                VARCHAR2(50)         not null,
   PA_DESCRIPCION       VARCHAR2(50)         not null,
   constraint PK_PAIS primary key (PA_ID)
);

/*==============================================================*/
/* Table: RECEPCIONISTA                                         */
/*==============================================================*/
create table RECEPCIONISTA 
(
   RES_CEDULA           VARCHAR2(50)         not null,
   RES_NOMBRE           VARCHAR2(50)         not null,
   RES_EDAD             VARCHAR2(50)         not null,
   RES_DIRECCION        VARCHAR2(50)         not null,
   constraint PK_RECEPCIONISTA primary key (RES_CEDULA)
);

/*==============================================================*/
/* Table: USUARIOS                                              */
/*==============================================================*/
create table USUARIOS 
(
   US_CEDULA            VARCHAR2(50)         not null,
   US_NOMBRE            VARCHAR2(50)         not null,
   US_EDAD              VARCHAR2(50)         not null,
   US_DIRECCION         VARCHAR2(50)         not null,
   constraint PK_USUARIOS primary key (US_CEDULA)
);

alter table CITA
   add constraint FK_CITA_RELATIONS_RECEPCIO foreign key (RES_CEDULA)
      references RECEPCIONISTA (RES_CEDULA);

alter table CITA
   add constraint FK_CITA_RELATIONS_USUARIOS foreign key (US_CEDULA)
      references USUARIOS (US_CEDULA);

alter table CITA
   add constraint FK_CITA_RELATIONS_MEDICOS foreign key (ME_CEDULA)
      references MEDICOS (ME_CEDULA);

alter table CITA
   add constraint FK_CITA_RELATIONS_HABITACI foreign key (HAB_ID)
      references HABITACION (HAB_ID);

alter table CIUDAD
   add constraint FK_CIUDAD_RELATIONS_PAIS foreign key (PA_ID)
      references PAIS (PA_ID);

alter table HABITACION
   add constraint FK_HABITACI_RELATIONS_HOSPITAL foreign key (HOS_ID)
      references HOSPITAL (HOS_ID);

alter table HOSPITAL
   add constraint FK_HOSPITAL_RELATIONS_CIUDAD foreign key (CIU_ID)
      references CIUDAD (CIU_ID);

