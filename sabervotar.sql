/*
 Navicat Premium Data Transfer

 Source Server         : Xampp
 Source Server Type    : MySQL
 Source Server Version : 100417
 Source Host           : localhost:3306
 Source Schema         : sabervotar

 Target Server Type    : MySQL
 Target Server Version : 100417
 File Encoding         : 65001

 Date: 17/12/2021 14:45:35
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for acta
-- ----------------------------
DROP TABLE IF EXISTS `acta`;
CREATE TABLE `acta`  (
  `IdAct` int(11) NOT NULL AUTO_INCREMENT,
  `UrlFotAct` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'URL de la imangen del acta ',
  `FechaAct` timestamp(0) NULL DEFAULT NULL COMMENT 'fecha en la que se subio el acta',
  `IdCas` int(11) NULL DEFAULT NULL COMMENT 'Id de casilla',
  `IdEle` int(11) NULL DEFAULT NULL COMMENT 'Id de tipo de eleccion',
  PRIMARY KEY (`IdAct`) USING BTREE,
  INDEX `IdCas`(`IdCas`) USING BTREE,
  INDEX `IdEle`(`IdEle`) USING BTREE,
  CONSTRAINT `acta_ibfk_3` FOREIGN KEY (`IdCas`) REFERENCES `casilla` (`IdCas`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `acta_ibfk_5` FOREIGN KEY (`IdEle`) REFERENCES `tipoeleccion` (`IdEle`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 97 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of acta
-- ----------------------------
INSERT INTO `acta` VALUES (1, 'sdsadsdasd7dasd5das5dasdsd', '2021-09-22 00:00:00', 3, 3);
INSERT INTO `acta` VALUES (2, 'sdasdasdasda12wwewqwq', '2021-11-11 20:59:14', 3, 6);
INSERT INTO `acta` VALUES (3, 'dasdasdasdas4a4448w4a88488aw8a888s8zf888e88', '2021-09-21 10:51:31', 3, 2);
INSERT INTO `acta` VALUES (5, 'werrwrwerewrwrwevwrerewvrewrwe43432', '2021-09-22 10:51:48', 5, 2);
INSERT INTO `acta` VALUES (6, 'dsadsdas8das8dsa8das8dsa8da8das8d8asas8das8da', '2021-11-11 14:21:21', 2, 4);
INSERT INTO `acta` VALUES (7, 'asdsasd8asd8asd7d7asd7sad6sad6asd7sad6as', '2021-09-23 12:04:27', 11, 4);
INSERT INTO `acta` VALUES (9, 'dsdasdsadasd6asdasdas78d6s8d6asd87asd8asda', '2021-09-08 12:05:08', 11, 5);
INSERT INTO `acta` VALUES (10, 'sadsadasdasd87asd6asd78as6d7asa7d8sa6d7as6v6dsa78d', '2021-11-12 15:01:39', 2, 1);
INSERT INTO `acta` VALUES (11, 'dsadsad8sa7d8as9sv7sdv7ad98d7va89ddas7adsd', '2021-09-20 12:05:53', 2, 3);
INSERT INTO `acta` VALUES (15, 'fdasd fd8fds7 8s9df7d9f7ds fds7f8ds9f7sdf98sd', '2021-09-22 12:07:21', 3, 6);
INSERT INTO `acta` VALUES (26, NULL, '2021-11-11 14:59:34', 11, 4);
INSERT INTO `acta` VALUES (27, NULL, NULL, 2, 2);
INSERT INTO `acta` VALUES (28, NULL, NULL, 3, 3);
INSERT INTO `acta` VALUES (29, NULL, '2021-11-11 14:22:16', 5, 5);
INSERT INTO `acta` VALUES (30, NULL, '2021-11-11 14:29:37', 3, 3);
INSERT INTO `acta` VALUES (32, NULL, '2021-11-11 15:02:06', 1, 5);
INSERT INTO `acta` VALUES (33, NULL, '2021-11-11 15:02:20', 1, 5);
INSERT INTO `acta` VALUES (34, NULL, '2021-11-23 10:15:41', 11, 4);
INSERT INTO `acta` VALUES (35, NULL, '2021-11-23 10:18:30', 2, 2);
INSERT INTO `acta` VALUES (36, NULL, '2021-11-23 10:20:24', 1, 2);
INSERT INTO `acta` VALUES (37, NULL, '2021-11-23 22:06:08', 1, 2);
INSERT INTO `acta` VALUES (38, NULL, '2021-11-23 22:13:26', 1, 2);
INSERT INTO `acta` VALUES (39, NULL, '2021-11-23 22:13:29', 1, 1);
INSERT INTO `acta` VALUES (41, NULL, '2021-11-23 22:21:06', 1, 5);
INSERT INTO `acta` VALUES (92, NULL, '2021-12-17 11:16:58', 4, 1);
INSERT INTO `acta` VALUES (93, NULL, '2021-12-17 14:26:53', 4, 2);
INSERT INTO `acta` VALUES (94, NULL, '2021-12-17 14:27:00', 4, 3);
INSERT INTO `acta` VALUES (95, NULL, '2021-12-17 14:27:10', 4, 4);

-- ----------------------------
-- Table structure for candidato
-- ----------------------------
DROP TABLE IF EXISTS `candidato`;
CREATE TABLE `candidato`  (
  `IdCan` int(11) NOT NULL AUTO_INCREMENT,
  `NombreCan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `PrimerApeCan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `SegundoApeCan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `IdPar` int(11) NULL DEFAULT NULL COMMENT 'Id de partido',
  `IdEle` int(11) NULL DEFAULT NULL COMMENT 'id de eleccion',
  `IdMun` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`IdCan`) USING BTREE,
  INDEX `IdPar`(`IdPar`) USING BTREE,
  INDEX `IdEle`(`IdEle`) USING BTREE,
  INDEX `IdMun`(`IdMun`) USING BTREE,
  CONSTRAINT `candidato_ibfk_1` FOREIGN KEY (`IdPar`) REFERENCES `partido` (`IdPar`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `candidato_ibfk_2` FOREIGN KEY (`IdEle`) REFERENCES `tipoeleccion` (`IdEle`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `candidato_ibfk_3` FOREIGN KEY (`IdMun`) REFERENCES `municipio` (`IdMun`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 71 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of candidato
-- ----------------------------
INSERT INTO `candidato` VALUES (2, 'Pedro', 'gomez', 'Lopez', 3, 5, 2);
INSERT INTO `candidato` VALUES (3, 'Adamacio', 'Rodriguez', 'Sanchez', 4, 6, 20);
INSERT INTO `candidato` VALUES (4, 'Adriana', 'Dominguez', 'Mendosa', 2, 2, 4);
INSERT INTO `candidato` VALUES (5, 'Agustin', 'cruz', 'Sosa', 2, 6, 5);
INSERT INTO `candidato` VALUES (6, 'Alondra', 'Guzman', 'Gomez', 4, 1, 24);
INSERT INTO `candidato` VALUES (7, 'Alexis', 'Muñoz', 'Acosta', 4, 2, NULL);
INSERT INTO `candidato` VALUES (8, 'Guadalupe', 'Barrios', 'Matinez', 2, NULL, NULL);
INSERT INTO `candidato` VALUES (9, 'Idelit', 'Contretas', 'Alanis', 3, NULL, NULL);
INSERT INTO `candidato` VALUES (10, 'Blanca', 'Cambrano', 'Olan', 7, NULL, NULL);
INSERT INTO `candidato` VALUES (11, 'Tomas', 'Silvan', 'perez', 6, NULL, NULL);
INSERT INTO `candidato` VALUES (12, 'Julio', 'Magaña', 'Guzman', 5, NULL, NULL);
INSERT INTO `candidato` VALUES (13, 'Aldo', 'Olivero', 'Acosta', 4, NULL, NULL);
INSERT INTO `candidato` VALUES (14, 'Dhanya', 'Reyes', 'Rangel', 6, NULL, NULL);
INSERT INTO `candidato` VALUES (15, 'Maximiliano', 'Rojas', 'Barrera', 5, NULL, NULL);
INSERT INTO `candidato` VALUES (20, 'DASDAS', 'SDADAS', 'ADASD', 4, NULL, NULL);
INSERT INTO `candidato` VALUES (21, 'DASDAS', 'SDADAS', 'ADASD', 5, NULL, NULL);
INSERT INTO `candidato` VALUES (24, 'asdasd', 'dadasd', 'dadasd', 4, NULL, NULL);
INSERT INTO `candidato` VALUES (25, 'dadas', 'dasdas', 'asdadas', 2, NULL, NULL);
INSERT INTO `candidato` VALUES (26, 'sadasda', 'sdasdasd', 'adasdasd', 7, NULL, NULL);
INSERT INTO `candidato` VALUES (28, 'luis', 'castellanos', 'lopez', 7, 2, NULL);
INSERT INTO `candidato` VALUES (29, 'asr', 'awet', 'aqw', 2, 2, NULL);
INSERT INTO `candidato` VALUES (36, '', '', '', 5, 1, 24);
INSERT INTO `candidato` VALUES (39, '', '', '', NULL, NULL, NULL);
INSERT INTO `candidato` VALUES (40, '', '', '', 2, 1, 1);
INSERT INTO `candidato` VALUES (43, 'dasdas', 'sdasda', 'dsasda', 3, 2, 3);
INSERT INTO `candidato` VALUES (44, 'dasdas', 'sdasd', 'sdasd', 2, 1, 1);
INSERT INTO `candidato` VALUES (46, 'dsaddasdas', 'adadas', 'ddsfsdf', 2, 1, NULL);
INSERT INTO `candidato` VALUES (47, '1', '1', '1', 2, 1, NULL);
INSERT INTO `candidato` VALUES (48, '1', '1', '1', 2, 1, NULL);
INSERT INTO `candidato` VALUES (49, 'sdsda', 'dsda', 'ddsa', 2, 1, NULL);
INSERT INTO `candidato` VALUES (50, '1', '1', '1', 2, 5, 1);
INSERT INTO `candidato` VALUES (51, '11', '11111', '1', 2, 2, 1);
INSERT INTO `candidato` VALUES (52, 'q', 'qqq', 'qqqq', 2, 3, 1);
INSERT INTO `candidato` VALUES (53, 'sadsad', 'sadasda', 'qqq', 2, 1, 1);
INSERT INTO `candidato` VALUES (54, '123', '11', '111', 2, 1, 1);
INSERT INTO `candidato` VALUES (59, '11', '11', '11', 2, 1, NULL);
INSERT INTO `candidato` VALUES (62, 'dddd', 'deeee', '', 2, 1, NULL);
INSERT INTO `candidato` VALUES (63, '000', '', '', 2, 1, NULL);
INSERT INTO `candidato` VALUES (65, 'asdsa', 'dasdas123', 'dsda', 7, 1, 1);
INSERT INTO `candidato` VALUES (66, 'asdsa', 'dsda', 'dasdas123', 2, 1, 20);
INSERT INTO `candidato` VALUES (67, '112222', '5', '', 2, 1, 20);
INSERT INTO `candidato` VALUES (68, 'centro', 'wwww', '', 2, 1, 1);
INSERT INTO `candidato` VALUES (70, 'eduardo', 'lopez', 'manzana', 7, 1, 20);

-- ----------------------------
-- Table structure for casilla
-- ----------------------------
DROP TABLE IF EXISTS `casilla`;
CREATE TABLE `casilla`  (
  `IdCas` int(11) NOT NULL AUTO_INCREMENT,
  `ColoniaCas` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `TipoCas` enum('BASICA','CONTIGUA 1','CONTIGUA 2','ESPECIAL') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `LongitudCas` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `LatitudCas` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CalleCas` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `NumeroCas` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CodigoPostCas` char(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `SeccionCas` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `HoraInc` time(0) NULL DEFAULT NULL COMMENT 'Hora de inicion de votacion',
  `HoraFin` time(0) NULL DEFAULT NULL COMMENT 'Hora de fin de votacion',
  `IdMun` int(11) NULL DEFAULT NULL COMMENT 'Id de municipio',
  PRIMARY KEY (`IdCas`) USING BTREE,
  INDEX `IdMun`(`IdMun`) USING BTREE,
  CONSTRAINT `casilla_ibfk_2` FOREIGN KEY (`IdMun`) REFERENCES `municipio` (`IdMun`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 27 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of casilla
-- ----------------------------
INSERT INTO `casilla` VALUES (1, 'Emiliano Zapata1', 'BASICA', '23,5666655656', '54,4543534534534', 'sauces', '03', '86280', '1', '08:00:00', '18:00:00', 1);
INSERT INTO `casilla` VALUES (2, 'Espejo II', 'CONTIGUA 1', '22,0000222', '34,44554545', 'tecolutla', '02', '86281', '234', '01:03:28', '01:03:31', 1);
INSERT INTO `casilla` VALUES (3, 'Espejo I', 'ESPECIAL', '023,232312', '2312312', 'rio nuevo', '06', '86281', '1', '08:26:06', '10:26:10', 20);
INSERT INTO `casilla` VALUES (4, 'nuevo calvillo', 'CONTIGUA 1', '034324211', '423432432,4324', 'textal', '03', '80231', '1234', '10:27:52', '10:27:54', 6);
INSERT INTO `casilla` VALUES (5, 'la paz', 'ESPECIAL', '05543222', '4343,34242', 'el sol', '02', '80801', '1', '10:31:03', '10:31:04', 20);
INSERT INTO `casilla` VALUES (11, 'sdasd', 'CONTIGUA 1', '1321', '222', 'das', '03', '39394', '1', '15:49:18', '15:49:21', 5);
INSERT INTO `casilla` VALUES (12, 'nueva', 'ESPECIAL', '1222', '111111', 'ww', '12', '87655', '1', '08:07:00', '20:00:00', 20);
INSERT INTO `casilla` VALUES (13, 'asdasd', 'CONTIGUA 1', '111', '111', 'dasd', '11', '2', NULL, '14:36:00', '16:35:00', NULL);
INSERT INTO `casilla` VALUES (14, 'dsasd', 'CONTIGUA 2', '111', '111', '1212', '111', '111', NULL, '14:37:00', '14:37:00', NULL);
INSERT INTO `casilla` VALUES (15, '12121', 'ESPECIAL', '121121', '1121212', '12121', '1121', '11121', '1', '23:50:00', '13:48:00', 20);
INSERT INTO `casilla` VALUES (16, NULL, NULL, NULL, NULL, 'assad', 'sdas', 'dsad', NULL, '00:00:00', '00:00:00', NULL);
INSERT INTO `casilla` VALUES (17, 'dasdsa', 'CONTIGUA 2', '2121|2', '21321312', 'sasdad', '1212', '1111', '1', '20:52:00', '22:50:00', 3);
INSERT INTO `casilla` VALUES (21, 'sadasd', 'CONTIGUA 1', '12121', '12121', 'dasdas', '1212', '23131', '1', '21:17:00', '12:16:00', 20);
INSERT INTO `casilla` VALUES (23, 'sadadas', 'ESPECIAL', '1231', '3123', 'dasd', '1231', '23123', '111', '00:00:00', '00:00:00', 20);
INSERT INTO `casilla` VALUES (24, 'dadsa', 'BASICA', '', '', '', '', '', '1', '00:00:00', '00:00:00', 1);
INSERT INTO `casilla` VALUES (25, 's', 'BASICA', '', '', '', '', '', '1', '00:00:00', '00:00:00', 1);

-- ----------------------------
-- Table structure for conteo
-- ----------------------------
DROP TABLE IF EXISTS `conteo`;
CREATE TABLE `conteo`  (
  `IdCont` int(11) NOT NULL AUTO_INCREMENT,
  `VotoCont` int(11) NULL DEFAULT NULL,
  `FechaCont` datetime(0) NULL DEFAULT NULL,
  `Idpar` int(11) NULL DEFAULT NULL,
  `IdEle` int(11) NULL DEFAULT NULL,
  `IdCas` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`IdCont`) USING BTREE,
  INDEX `Idpar`(`Idpar`) USING BTREE,
  INDEX `IdEle`(`IdEle`) USING BTREE,
  INDEX `IdCas`(`IdCas`) USING BTREE,
  CONSTRAINT `conteo_ibfk_7` FOREIGN KEY (`Idpar`) REFERENCES `partido` (`IdPar`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `conteo_ibfk_8` FOREIGN KEY (`IdEle`) REFERENCES `tipoeleccion` (`IdEle`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `conteo_ibfk_9` FOREIGN KEY (`IdCas`) REFERENCES `casilla` (`IdCas`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 73 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of conteo
-- ----------------------------
INSERT INTO `conteo` VALUES (1, 45, '2021-11-11 23:55:23', 2, 5, 1);
INSERT INTO `conteo` VALUES (2, 40, '2021-11-12 15:25:19', 2, 1, 2);
INSERT INTO `conteo` VALUES (3, 20, '2021-09-29 10:56:52', 4, 3, 2);
INSERT INTO `conteo` VALUES (4, 35, '2021-09-29 10:57:20', 3, 1, 2);
INSERT INTO `conteo` VALUES (5, 100, '2021-09-02 10:57:57', 3, 1, 1);
INSERT INTO `conteo` VALUES (6, 67, '2021-09-04 11:11:12', 6, 1, 1);
INSERT INTO `conteo` VALUES (7, 89, '2021-09-23 11:11:51', 5, 1, 1);
INSERT INTO `conteo` VALUES (8, 121, '2021-09-30 11:12:17', NULL, NULL, NULL);
INSERT INTO `conteo` VALUES (9, 53, '2021-09-17 11:12:44', NULL, NULL, NULL);
INSERT INTO `conteo` VALUES (10, 12, '2021-09-16 11:13:17', NULL, NULL, NULL);
INSERT INTO `conteo` VALUES (11, 56, '2021-10-09 11:13:51', NULL, NULL, NULL);
INSERT INTO `conteo` VALUES (12, 98, '2021-09-22 11:14:15', NULL, NULL, NULL);
INSERT INTO `conteo` VALUES (13, 76, '2021-09-29 11:14:39', NULL, NULL, NULL);
INSERT INTO `conteo` VALUES (14, 90, '2021-09-30 11:15:07', NULL, NULL, NULL);
INSERT INTO `conteo` VALUES (15, 93, '2021-09-16 11:15:41', NULL, NULL, NULL);
INSERT INTO `conteo` VALUES (16, 13, '2021-09-01 15:28:41', NULL, NULL, NULL);
INSERT INTO `conteo` VALUES (17, 46, '2021-09-29 15:35:00', NULL, NULL, NULL);
INSERT INTO `conteo` VALUES (18, 12, '2021-11-11 15:40:26', NULL, NULL, NULL);
INSERT INTO `conteo` VALUES (34, 21, '2021-11-11 15:41:02', NULL, NULL, NULL);
INSERT INTO `conteo` VALUES (35, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `conteo` VALUES (41, 33, '2021-11-12 11:18:44', 2, 1, NULL);
INSERT INTO `conteo` VALUES (42, 27, '2021-11-12 11:21:05', 5, 5, NULL);
INSERT INTO `conteo` VALUES (43, 35, '2021-11-12 11:21:32', 6, 3, NULL);
INSERT INTO `conteo` VALUES (44, 11, '2021-11-23 11:13:58', NULL, 2, 1);
INSERT INTO `conteo` VALUES (45, 11, '2021-11-23 11:14:28', NULL, 2, 1);
INSERT INTO `conteo` VALUES (47, 11, '2021-11-23 11:14:28', 2, 1, 1);
INSERT INTO `conteo` VALUES (48, 11, '2021-11-23 11:15:38', 2, 1, 1);
INSERT INTO `conteo` VALUES (49, 11, '2021-11-23 21:44:08', 2, 1, 1);
INSERT INTO `conteo` VALUES (50, 10000, '2021-11-23 22:07:43', 6, 6, 1);
INSERT INTO `conteo` VALUES (51, 10000, '2021-11-23 22:08:32', 6, 6, 1);
INSERT INTO `conteo` VALUES (52, 11, '2021-11-23 22:20:36', 2, 1, 1);
INSERT INTO `conteo` VALUES (53, 12, '2021-11-23 22:20:46', 2, 1, 1);
INSERT INTO `conteo` VALUES (63, 3, NULL, 4, 1, 2);
INSERT INTO `conteo` VALUES (65, 23, '2021-12-14 13:49:40', 2, 1, 4);
INSERT INTO `conteo` VALUES (67, 23, '2021-12-14 13:54:43', 3, 1, 4);
INSERT INTO `conteo` VALUES (68, 23, '2021-12-14 13:54:56', 5, 1, 4);
INSERT INTO `conteo` VALUES (69, 34, '2021-12-14 13:55:23', 6, 2, 4);
INSERT INTO `conteo` VALUES (70, 2, '2021-12-14 14:03:42', 7, 1, 4);
INSERT INTO `conteo` VALUES (71, 12, '2021-12-17 11:11:49', 4, 1, 4);
INSERT INTO `conteo` VALUES (72, 45, '2021-12-17 11:12:04', 6, 1, 4);

-- ----------------------------
-- Table structure for estado
-- ----------------------------
DROP TABLE IF EXISTS `estado`;
CREATE TABLE `estado`  (
  `IdEst` int(11) NOT NULL AUTO_INCREMENT,
  `NombreEst` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`IdEst`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 33 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of estado
-- ----------------------------
INSERT INTO `estado` VALUES (1, 'Aguas Calientes');
INSERT INTO `estado` VALUES (2, 'Baja California');
INSERT INTO `estado` VALUES (3, 'Baja Californa Sur');
INSERT INTO `estado` VALUES (4, 'Campeche');
INSERT INTO `estado` VALUES (5, 'Chiapas');
INSERT INTO `estado` VALUES (6, 'Chihuahua');
INSERT INTO `estado` VALUES (7, 'Coahuila');
INSERT INTO `estado` VALUES (8, 'Colima');
INSERT INTO `estado` VALUES (9, 'Cuidad de México');
INSERT INTO `estado` VALUES (10, '\r\n\r\nDurango');
INSERT INTO `estado` VALUES (11, 'Estado de México');
INSERT INTO `estado` VALUES (12, 'Guanajuato');
INSERT INTO `estado` VALUES (13, 'Guerrero');
INSERT INTO `estado` VALUES (14, 'Hidalgo');
INSERT INTO `estado` VALUES (15, 'Jalisco');
INSERT INTO `estado` VALUES (16, 'Michoacán de Ocampo');
INSERT INTO `estado` VALUES (17, 'Morelos');
INSERT INTO `estado` VALUES (18, 'Nayarit');
INSERT INTO `estado` VALUES (19, 'Nuevo León');
INSERT INTO `estado` VALUES (20, 'Oaxaca');
INSERT INTO `estado` VALUES (21, 'Puebla');
INSERT INTO `estado` VALUES (22, 'Querétaro');
INSERT INTO `estado` VALUES (23, 'Quintana Roo');
INSERT INTO `estado` VALUES (24, 'San Luis Potosí');
INSERT INTO `estado` VALUES (25, 'Sinaloa');
INSERT INTO `estado` VALUES (26, 'Sonora');
INSERT INTO `estado` VALUES (27, 'Tabasco');
INSERT INTO `estado` VALUES (28, 'Tamaulipas');
INSERT INTO `estado` VALUES (29, 'Tlaxcala');
INSERT INTO `estado` VALUES (30, 'Veracruz de Ignacio de la Lla');
INSERT INTO `estado` VALUES (31, 'Yucatán');
INSERT INTO `estado` VALUES (32, 'Zacatecas');

-- ----------------------------
-- Table structure for funcionario
-- ----------------------------
DROP TABLE IF EXISTS `funcionario`;
CREATE TABLE `funcionario`  (
  `IdFun` int(11) NOT NULL AUTO_INCREMENT,
  `NombreFun` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `PrimerApeFun` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `SegundoApeFun` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `PuestoFun` enum('PRESIDENTE','SECRETARIO','ESCRUTADOR') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `TelefonoFun` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `IdCas` int(11) NULL DEFAULT NULL COMMENT 'Id de la casilla',
  PRIMARY KEY (`IdFun`) USING BTREE,
  INDEX `IdCas`(`IdCas`) USING BTREE,
  CONSTRAINT `funcionario_ibfk_1` FOREIGN KEY (`IdCas`) REFERENCES `casilla` (`IdCas`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of funcionario
-- ----------------------------
INSERT INTO `funcionario` VALUES (8, 'pedros', 'lopez', 'santos', 'PRESIDENTE', '9934357874', 1);
INSERT INTO `funcionario` VALUES (9, 'sadasd', 'sdadasdas', 'dasdasd', 'ESCRUTADOR', '00000', 1);
INSERT INTO `funcionario` VALUES (13, 'SAsaS', 'AsASa', 'sASASasa', 'SECRETARIO', '888', 3);
INSERT INTO `funcionario` VALUES (14, 'pedro', 'castillo', 'López', 'SECRETARIO', '124445345354', 11);
INSERT INTO `funcionario` VALUES (15, 'pedro', 'perez', 'laaa', 'PRESIDENTE', '12345678', 5);
INSERT INTO `funcionario` VALUES (17, 'sdasd', 'dasdas', 'adasd', 'ESCRUTADOR', '0000', 3);
INSERT INTO `funcionario` VALUES (18, 'lola', 'perez', 'marzo', 'PRESIDENTE', '77890543355', 3);

-- ----------------------------
-- Table structure for municipio
-- ----------------------------
DROP TABLE IF EXISTS `municipio`;
CREATE TABLE `municipio`  (
  `IdMun` int(11) NOT NULL AUTO_INCREMENT,
  `NombreMun` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `IdEst` int(11) NOT NULL COMMENT 'Id del estado',
  PRIMARY KEY (`IdMun`) USING BTREE,
  INDEX `IdEst`(`IdEst`) USING BTREE,
  CONSTRAINT `municipio_ibfk_1` FOREIGN KEY (`IdEst`) REFERENCES `estado` (`IdEst`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 25 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of municipio
-- ----------------------------
INSERT INTO `municipio` VALUES (1, 'Centro', 27);
INSERT INTO `municipio` VALUES (2, 'Centla', 27);
INSERT INTO `municipio` VALUES (3, 'Emiliano Zapata', 27);
INSERT INTO `municipio` VALUES (4, 'Aguascalientes', 1);
INSERT INTO `municipio` VALUES (5, 'Asientos', 1);
INSERT INTO `municipio` VALUES (6, 'Calvillo', 1);
INSERT INTO `municipio` VALUES (7, '	Cosío', 1);
INSERT INTO `municipio` VALUES (8, 'Jesús María', 1);
INSERT INTO `municipio` VALUES (9, '	Pabellón de Arteaga', 1);
INSERT INTO `municipio` VALUES (10, 'Rincón de Romos', 1);
INSERT INTO `municipio` VALUES (11, 'San José de Gracia', 1);
INSERT INTO `municipio` VALUES (12, 'Tepezalá', 1);
INSERT INTO `municipio` VALUES (13, 'El Llano', 1);
INSERT INTO `municipio` VALUES (14, 'San Francisco de los Romo', 1);
INSERT INTO `municipio` VALUES (15, '	Ensenada', 2);
INSERT INTO `municipio` VALUES (16, 'Mexicali', 2);
INSERT INTO `municipio` VALUES (17, 'Tecate', 2);
INSERT INTO `municipio` VALUES (18, 'Tijuana', 2);
INSERT INTO `municipio` VALUES (19, 'Playas de Rosarito', 2);
INSERT INTO `municipio` VALUES (20, 'Comondú', 3);
INSERT INTO `municipio` VALUES (21, 'Mulegé', 3);
INSERT INTO `municipio` VALUES (22, 'La Paz', 3);
INSERT INTO `municipio` VALUES (23, 'Los Cabos', 3);
INSERT INTO `municipio` VALUES (24, 'Loreto', 3);

-- ----------------------------
-- Table structure for partido
-- ----------------------------
DROP TABLE IF EXISTS `partido`;
CREATE TABLE `partido`  (
  `IdPar` int(11) NOT NULL AUTO_INCREMENT,
  `NombrePar` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `UrlLogPar` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'URL imagen partido politico',
  PRIMARY KEY (`IdPar`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of partido
-- ----------------------------
INSERT INTO `partido` VALUES (2, 'PRI', 'Array');
INSERT INTO `partido` VALUES (3, 'PRD', 'asasdasdasdsadasdas');
INSERT INTO `partido` VALUES (4, 'PT', 'asafasdsadsdsadasdsada');
INSERT INTO `partido` VALUES (5, 'Verde', 'ssadsadasdsadasd');
INSERT INTO `partido` VALUES (6, 'Movimiento Ciudadano', 'sdasdadasd23123afasd');
INSERT INTO `partido` VALUES (7, 'Morena', 'sdasdsdadasd8as8ds8da8ds');

-- ----------------------------
-- Table structure for tipoeleccion
-- ----------------------------
DROP TABLE IF EXISTS `tipoeleccion`;
CREATE TABLE `tipoeleccion`  (
  `IdEle` int(11) NOT NULL AUTO_INCREMENT,
  `TipoEle` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'tipo de la eeccion',
  PRIMARY KEY (`IdEle`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tipoeleccion
-- ----------------------------
INSERT INTO `tipoeleccion` VALUES (1, 'FEDERALES');
INSERT INTO `tipoeleccion` VALUES (2, 'GUBERNATURA');
INSERT INTO `tipoeleccion` VALUES (3, 'PRESIDENCIA MUNICIPAL Y REGIDURAS');
INSERT INTO `tipoeleccion` VALUES (4, 'AYUNTAMINETO');
INSERT INTO `tipoeleccion` VALUES (5, 'LOCALES');
INSERT INTO `tipoeleccion` VALUES (6, 'PRESIDENCIA');

-- ----------------------------
-- Table structure for tipousuario
-- ----------------------------
DROP TABLE IF EXISTS `tipousuario`;
CREATE TABLE `tipousuario`  (
  `IdTipUsu` int(11) NOT NULL AUTO_INCREMENT,
  `UsuarioTip` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`IdTipUsu`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tipousuario
-- ----------------------------
INSERT INTO `tipousuario` VALUES (1, 'VISITANTE');
INSERT INTO `tipousuario` VALUES (2, 'SECRETARIO');
INSERT INTO `tipousuario` VALUES (3, 'OPERADOR');
INSERT INTO `tipousuario` VALUES (4, 'ADMINISTRADOR');

-- ----------------------------
-- Table structure for usuario
-- ----------------------------
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario`  (
  `IdUsu` int(11) NOT NULL AUTO_INCREMENT,
  `NombreUsu` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `PrimerApeUsu` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `SegundoApeUsu` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `GeneroUsu` enum('MASCULINO','FEMENINO') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'Valor 0 para masculino 1 para femenino',
  `TelefonoUsu` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CorreoUsu` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ContrasenaUsu` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'contraseña incriptada',
  `IdTipUsu` int(11) NULL DEFAULT NULL COMMENT 'Id tipo de usuario',
  `IdCas` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`IdUsu`) USING BTREE,
  INDEX `IdTipUsu`(`IdTipUsu`) USING BTREE,
  INDEX `IdCas`(`IdCas`) USING BTREE,
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`IdTipUsu`) REFERENCES `tipousuario` (`IdTipUsu`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`IdCas`) REFERENCES `casilla` (`IdCas`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 59 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of usuario
-- ----------------------------
INSERT INTO `usuario` VALUES (1, 'luis', 'castellanos', 'lópez', 'MASCULINO', '999999999', 'Luis123@gmail.com', '1234', 4, 1);
INSERT INTO `usuario` VALUES (2, 'pedro', 'castillo', 'Sanchez', 'MASCULINO', '0', 'pedro@gmail.com', '1234', 3, 3);
INSERT INTO `usuario` VALUES (3, 'maria', 'sanchéz', 'martinez', 'FEMENINO', '999', 'martinez@gmail.com', '1234', 2, 4);
INSERT INTO `usuario` VALUES (4, 'Luis', 'Jimenez', 'Morales', 'FEMENINO', '999', 'Morales@gmail.com', '1234', 1, 5);
INSERT INTO `usuario` VALUES (5, 'Katya', 'Martinez', 'Gutierrez', 'FEMENINO', '9999', 'Guti@gmail.com', 'zdsdasdasdas121asdasd', 2, 5);
INSERT INTO `usuario` VALUES (14, 'asdasd', 'asdad', 'dasdadasdsd', 'MASCULINO', '9999', 'casff@gmail.com', 'aaaaa', 3, 2);
INSERT INTO `usuario` VALUES (16, 'dasadasd', 'dadasd', 'dasdads', 'MASCULINO', 'dasdasd', 'casff@gmail.com', 'aaasdasd', 2, 2);
INSERT INTO `usuario` VALUES (17, 'sdadasda', 'dasdas', 'sadsda', 'MASCULINO', 'adsada', 'adasdas@sdsad', 'dadas', 1, NULL);
INSERT INTO `usuario` VALUES (53, 'Pedro', 'Pas', 'Per', 'MASCULINO', '09876', 'Pedrito3@gmail.com', '1234', 1, NULL);
INSERT INTO `usuario` VALUES (54, 'sasS', 'SASs', 'saSAS', 'FEMENINO', '111111', '1234@gmail.com', '1234', 1, NULL);
INSERT INTO `usuario` VALUES (55, 'sasS', 'SASs', 'saSAS', 'FEMENINO', '111111', '1234@gmail.com', 'dasdasdsa', 1, NULL);
INSERT INTO `usuario` VALUES (56, 'sasS', 'SASs', 'saSAS', 'FEMENINO', '111111', '1234@gmail.com', 'dasda', 1, NULL);
INSERT INTO `usuario` VALUES (58, '21323', 'sdasdd', 'dsadsa', 'FEMENINO', '1234', 'hoa@gmail.com', '1234', 1, NULL);

-- ----------------------------
-- View structure for vr
-- ----------------------------
DROP VIEW IF EXISTS `vr`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `vr` AS SELECT
	COUNT(*) conteo, 
	conteo.IdEle AS ide, 
	conteo.Idpar AS idp, 
	partido.NombrePar AS nombre, 
	tipoeleccion.TipoEle AS tipo, 
	sum(conteo.VotoCont) AS suma
FROM
	conteo
	INNER JOIN
	partido
	ON 
		conteo.Idpar = partido.IdPar
	INNER JOIN
	tipoeleccion
	ON 
		conteo.IdEle = tipoeleccion.IdEle
GROUP BY
	partido.NombrePar, 
	tipoeleccion.IdEle ;

-- ----------------------------
-- View structure for vw_acta
-- ----------------------------
DROP VIEW IF EXISTS `vw_acta`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `vw_acta` AS SELECT
	acta.UrlFotAct, 
	acta.FechaAct, 
	municipio.NombreMun, 
	casilla.ColoniaCas, 
	casilla.TipoCas, 
	estado.NombreEst, 
	tipoeleccion.TipoEle, 
	acta.IdCas, 
	acta.IdEle, 
	acta.IdAct, 
	casilla.SeccionCas
FROM
	acta
	INNER JOIN
	casilla
	ON 
		acta.IdCas = casilla.IdCas
	INNER JOIN
	municipio
	ON 
		casilla.IdMun = municipio.IdMun
	INNER JOIN
	estado
	ON 
		municipio.IdEst = estado.IdEst
	INNER JOIN
	tipoeleccion
	ON 
		acta.IdEle = tipoeleccion.IdEle ;

-- ----------------------------
-- View structure for vw_candidatos
-- ----------------------------
DROP VIEW IF EXISTS `vw_candidatos`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `vw_candidatos` AS SELECT
	candidato.IdCan AS IdCan, 
	partido.NombrePar AS NombrePar, 
	candidato.NombreCan AS NombreCan, 
	candidato.SegundoApeCan AS SegundoApeCan, 
	candidato.PrimerApeCan AS PrimerApeCan, 
	candidato.IdPar AS IdPar, 
	tipoeleccion.TipoEle, 
	candidato.IdEle, 
	municipio.NombreMun, 
	estado.NombreEst, 
	municipio.IdMun
FROM
	(
		partido
		join
		candidato
		ON 
			(
				partido.IdPar = candidato.IdPar
			)
	)
	INNER JOIN
	tipoeleccion
	ON 
		candidato.IdEle = tipoeleccion.IdEle
	INNER JOIN
	municipio
	ON 
		candidato.IdMun = municipio.IdMun
	INNER JOIN
	estado
	ON 
		municipio.IdEst = estado.IdEst ;

-- ----------------------------
-- View structure for vw_casilla
-- ----------------------------
DROP VIEW IF EXISTS `vw_casilla`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `vw_casilla` AS SELECT
	casilla.TipoCas AS TipoCas, 
	casilla.ColoniaCas AS ColoniaCas, 
	casilla.LongitudCas AS LongitudCas, 
	casilla.LatitudCas AS LatitudCas, 
	casilla.CalleCas AS CalleCas, 
	casilla.NumeroCas AS NumeroCas, 
	casilla.CodigoPostCas AS CodigoPostCas, 
	casilla.HoraInc AS HoraInc, 
	casilla.HoraFin AS HoraFin, 
	municipio.NombreMun AS NombreMun, 
	estado.NombreEst AS NombreEst, 
	casilla.IdCas, 
	municipio.IdMun, 
	casilla.SeccionCas
FROM
	(
		(
			casilla
			join
			municipio
			ON 
				(
					casilla.IdMun = municipio.IdMun
				)
		)
		join
		estado
		ON 
			(
				municipio.IdEst = estado.IdEst
			)
	) ;

-- ----------------------------
-- View structure for vw_conection
-- ----------------------------
DROP VIEW IF EXISTS `vw_conection`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `vw_conection` AS SELECT
	municipio.IdMun
FROM
	casilla
	INNER JOIN
	usuario
	ON 
		casilla.IdCas = usuario.IdCas
	INNER JOIN
	municipio
	ON 
		casilla.IdMun = municipio.IdMun
WHERE
	usuario.IdUsu = 3 ;

-- ----------------------------
-- View structure for vw_conteo
-- ----------------------------
DROP VIEW IF EXISTS `vw_conteo`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `vw_conteo` AS SELECT
	conteo.IdCont, 
	conteo.VotoCont, 
	conteo.FechaCont, 
	casilla.ColoniaCas, 
	casilla.TipoCas, 
	casilla.CalleCas, 
	casilla.NumeroCas, 
	casilla.CodigoPostCas, 
	casilla.HoraInc, 
	casilla.HoraFin, 
	municipio.NombreMun, 
	tipoeleccion.TipoEle, 
	estado.NombreEst, 
	casilla.IdCas, 
	partido.NombrePar, 
	tipoeleccion.IdEle, 
	usuario.IdUsu, 
	casilla.SeccionCas
FROM
	conteo
	INNER JOIN
	casilla
	ON 
		conteo.IdCas = casilla.IdCas
	INNER JOIN
	municipio
	ON 
		casilla.IdMun = municipio.IdMun
	INNER JOIN
	tipoeleccion
	ON 
		conteo.IdEle = tipoeleccion.IdEle
	INNER JOIN
	estado
	ON 
		municipio.IdEst = estado.IdEst
	INNER JOIN
	partido
	ON 
		conteo.Idpar = partido.IdPar
	INNER JOIN
	usuario
	ON 
		casilla.IdCas = usuario.IdCas ;

-- ----------------------------
-- View structure for vw_funcionario
-- ----------------------------
DROP VIEW IF EXISTS `vw_funcionario`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `vw_funcionario` AS SELECT
	estado.NombreEst, 
	municipio.NombreMun, 
	funcionario.IdFun, 
	funcionario.NombreFun, 
	funcionario.PrimerApeFun, 
	funcionario.SegundoApeFun, 
	funcionario.PuestoFun, 
	funcionario.TelefonoFun, 
	casilla.ColoniaCas, 
	casilla.IdCas
FROM
	estado
	INNER JOIN
	municipio
	ON 
		estado.IdEst = municipio.IdEst
	INNER JOIN
	funcionario
	INNER JOIN
	casilla
	ON 
		funcionario.IdCas = casilla.IdCas AND
		municipio.IdMun = casilla.IdMun ;

-- ----------------------------
-- View structure for vw_municipio
-- ----------------------------
DROP VIEW IF EXISTS `vw_municipio`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `vw_municipio` AS SELECT
	estado.NombreEst AS NombreEst, 
	municipio.NombreMun AS NombreMun, 
	municipio.IdMun
FROM
	(
		estado
		join
		municipio
		ON 
			(
				estado.IdEst = municipio.IdEst
			)
	) ;

-- ----------------------------
-- View structure for vw_resultadosfin
-- ----------------------------
DROP VIEW IF EXISTS `vw_resultadosfin`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `vw_resultadosfin` AS SELECT
	COUNT(*) as cont, 
	conteo.IdEle as ide, 
	conteo.Idpar as idp, 
	partido.NombrePar as nombre, 
	tipoeleccion.TipoEle as tipo, 
	sum(conteo.VotoCont) AS suma
FROM
	conteo
	INNER JOIN
	partido
	ON 
		conteo.Idpar = partido.IdPar
	INNER JOIN
	tipoeleccion
	ON 
		conteo.IdEle = tipoeleccion.IdEle

GROUP BY
	partido.IdPar ;

-- ----------------------------
-- View structure for vw_resultadosmun
-- ----------------------------
DROP VIEW IF EXISTS `vw_resultadosmun`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `vw_resultadosmun` AS SELECT
	conteo.VotoCont, 
	conteo.Idpar, 
	conteo.IdEle as ide, 
	casilla.IdMun, 
	municipio.NombreMun, 
	partido.NombrePar, 
	tipoeleccion.TipoEle
FROM
	conteo
	INNER JOIN
	casilla
	ON 
		conteo.IdCas = casilla.IdCas
	INNER JOIN
	municipio
	ON 
		casilla.IdMun = municipio.IdMun
	INNER JOIN
	partido
	ON 
		conteo.Idpar = partido.IdPar
	INNER JOIN
	tipoeleccion
	ON 
		conteo.IdEle = tipoeleccion.IdEle
GROUP BY
	municipio.IdMun, 
	partido.NombrePar ;

-- ----------------------------
-- View structure for vw_usuario
-- ----------------------------
DROP VIEW IF EXISTS `vw_usuario`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `vw_usuario` AS SELECT
	usuario.IdUsu, 
	usuario.NombreUsu, 
	usuario.PrimerApeUsu, 
	usuario.SegundoApeUsu, 
	usuario.GeneroUsu, 
	usuario.TelefonoUsu, 
	usuario.ContrasenaUsu, 
	tipousuario.UsuarioTip, 
	usuario.CorreoUsu, 
	usuario.IdTipUsu, 
	casilla.IdCas, 
	municipio.IdMun
FROM
	usuario
	INNER JOIN
	tipousuario
	ON 
		usuario.IdTipUsu = tipousuario.IdTipUsu
	INNER JOIN
	casilla
	ON 
		usuario.IdCas = casilla.IdCas
	INNER JOIN
	municipio
	ON 
		casilla.IdMun = municipio.IdMun ;

-- ----------------------------
-- View structure for vw_votoacta
-- ----------------------------
DROP VIEW IF EXISTS `vw_votoacta`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `vw_votoacta` AS SELECT
	sum(vw_conteo.VotoCont) as totalvotos
FROM
	vw_conteo
	WHERE
	vw_conteo.IdUsu = 14 ;

SET FOREIGN_KEY_CHECKS = 1;
