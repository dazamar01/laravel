
-- This script will create the db

Drop database if exists test_laravel;

CREATE DATABASE `test_laravel` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci */;

use test_laravel;

CREATE TABLE `adm_roles` (
  `rol` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'El rol del usuario',
  `descripcion` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'La descripcion del rol',
  `activo` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`rol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Catalogo de roles';

CREATE TABLE `adm_usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id autonumerico',
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'nombre del usuario unico',
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Contraseña',
  `session_id` varchar(70) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL COMMENT 'Referencia a usuario.id',
  `fecha_creacion` bigint(20) DEFAULT NULL COMMENT 'new Date().toISOString();',
  `usuario_modificacion_id` int(11) DEFAULT NULL COMMENT 'Referencia a usuario.id',
  `fecha_modificacion` bigint(20) DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL COMMENT '1 activo, 0 inactivo',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uk_email` (`email`),
  UNIQUE KEY `uk_usuario` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE `adm_roles_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id autonumerico',
  `usuario_id` int(11) NOT NULL COMMENT 'Referencia a usuario.id',
  `rol` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `usuario_creacion_id` int(11) DEFAULT NULL COMMENT 'Referencia a usuarios.id',
  `fecha_creacion` bigint(20) DEFAULT NULL,
  `usuario_modificacion_id` int(11) DEFAULT NULL COMMENT 'Referencia a usuarios.id',
  `fecha_modificacion` bigint(20) DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IXFK_roles_usuario_usuarios` (`usuario_id`),
  KEY `fk_roles_usuario_roles1_idx` (`rol`),
  CONSTRAINT `FK_roles_usuario_usuarios` FOREIGN KEY (`usuario_id`) REFERENCES `adm_usuarios` (`id`),
  CONSTRAINT `fk_roles_usuario_roles1` FOREIGN KEY (`rol`) REFERENCES `adm_roles` (`rol`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Asociacion entre roles y usuarios';
