
-- This script will populate the db with the needed data

 SET NAMES utf8 ;
 

INSERT INTO `adm_roles` 
VALUES 
  ('ADMINISTRADOR','Administrador del sistema',1),
  ('SISTEMA','Sistema',1),
  ('USUARIO','Usuario general',1),
  ('LECTURA','Usuario general',1);


REPLACE INTO `adm_usuarios` VALUES 
  (1,'sistema','$2a$10$eL28kgjqiPVZ3yi8h.vTfOB42Re8OtrYr52fGDV6ucv2QMnMjCktu',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
  (2,'admin','$2a$10$o5vg4AGOAqpQg.d3YMcpj.UZy7fIVNFX0FyOPnMi/bMKkK7t5XYuy',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
  (3,'usuario','$2a$10$BMQ2A94K3rWc0MzZMmvPN.xKB2a3XjTM1Lh66SfwdehZZVDhZzfei',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
  (4,'lectura','$2a$10$BMQ2A94K3rWc0MzZMmvPN.xKB2a3XjTM1Lh66SfwdehZZVDhZzfei',NULL,NULL,NULL,NULL,NULL,NULL,NULL);

INSERT INTO adm_roles_usuario
(`usuario_id`, `rol`,`usuario_creacion_id`, `fecha_creacion`, `usuario_modificacion_id`, `fecha_modificacion`, `activo`)
VALUES 
  (2,'ADMINISTRADOR',1,current_timestamp,1,current_timestamp,1),
  (3,'USUARIO',1,current_timestamp,1,current_timestamp,1),
  (4,'LECTURA',1,current_timestamp,1,current_timestamp,1)
  ;





--
-- Dumping data for table `roles_usuario`
--

LOCK TABLES `adm_roles_usuario` WRITE;
/*!40000 ALTER TABLE `adm_roles_usuario` DISABLE KEYS */;
INSERT INTO `adm_roles_usuario` VALUES (9,11,'USUARIO',NULL,NULL,NULL,NULL,1),(11,10,'ADMINISTRADOR',NULL,NULL,NULL,NULL,1);
/*!40000 ALTER TABLE `adm_roles_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `adm_usuarios` WRITE;
/*!40000 ALTER TABLE `adm_usuarios` DISABLE KEYS */;
INSERT INTO `adm_usuarios` VALUES (9,'sistema','$2a$10$eL28kgjqiPVZ3yi8h.vTfOB42Re8OtrYr52fGDV6ucv2QMnMjCktu',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(10,'admin','$2a$10$o5vg4AGOAqpQg.d3YMcpj.UZy7fIVNFX0FyOPnMi/bMKkK7t5XYuy',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(11,'usuario','$2a$10$BMQ2A94K3rWc0MzZMmvPN.xKB2a3XjTM1Lh66SfwdehZZVDhZzfei',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `adm_usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-10-08 22:12:05
