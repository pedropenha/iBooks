-- MySQL dump 10.13  Distrib 8.0.30, for macos12 (x86_64)
--
-- Host: 127.0.0.1    Database: ibooks
-- ------------------------------------------------------
-- Server version	8.0.31

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `administrador`
--

DROP TABLE IF EXISTS `administrador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `administrador` (
  `idadministrador` int NOT NULL,
  `PessoaFisica_idPessoaFisica` int NOT NULL,
  PRIMARY KEY (`idadministrador`),
  KEY `fk_administrador_PessoaFisica_idx` (`PessoaFisica_idPessoaFisica`),
  CONSTRAINT `fk_administrador_PessoaFisica` FOREIGN KEY (`PessoaFisica_idPessoaFisica`) REFERENCES `PessoaFisica` (`idPessoaFisica`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `autores`
--

DROP TABLE IF EXISTS `autores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `autores` (
  `idautores` int NOT NULL,
  `nome_autor` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idautores`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `autores_titulos`
--

DROP TABLE IF EXISTS `autores_titulos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `autores_titulos` (
  `autores_idautores` int NOT NULL,
  `titulo_idtitulo` int NOT NULL,
  PRIMARY KEY (`autores_idautores`,`titulo_idtitulo`),
  KEY `fk_autores_titulos_titulo1_idx` (`titulo_idtitulo`),
  CONSTRAINT `fk_autores_titulos_autores1` FOREIGN KEY (`autores_idautores`) REFERENCES `autores` (`idautores`),
  CONSTRAINT `fk_autores_titulos_titulo1` FOREIGN KEY (`titulo_idtitulo`) REFERENCES `titulo` (`idtitulo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cliente` (
  `idcliente` int NOT NULL,
  `PessoaFisica_idPessoaFisica` int NOT NULL,
  `convenios_idconvenios` int NOT NULL,
  PRIMARY KEY (`idcliente`),
  KEY `fk_cliente_PessoaFisica1_idx` (`PessoaFisica_idPessoaFisica`),
  KEY `fk_cliente_convenios1_idx` (`convenios_idconvenios`),
  CONSTRAINT `fk_cliente_convenios1` FOREIGN KEY (`convenios_idconvenios`) REFERENCES `convenios` (`idconvenios`),
  CONSTRAINT `fk_cliente_PessoaFisica1` FOREIGN KEY (`PessoaFisica_idPessoaFisica`) REFERENCES `PessoaFisica` (`idPessoaFisica`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `colaborador`
--

DROP TABLE IF EXISTS `colaborador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `colaborador` (
  `idcolaborador` int NOT NULL,
  `PessoaFisica_idPessoaFisica` int NOT NULL,
  PRIMARY KEY (`idcolaborador`),
  KEY `fk_colaborador_PessoaFisica1_idx` (`PessoaFisica_idPessoaFisica`),
  CONSTRAINT `fk_colaborador_PessoaFisica1` FOREIGN KEY (`PessoaFisica_idPessoaFisica`) REFERENCES `PessoaFisica` (`idPessoaFisica`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `configuracoes`
--

DROP TABLE IF EXISTS `configuracoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `configuracoes` (
  `idconfiguracoes` int NOT NULL,
  `dias_emprestimo` int DEFAULT NULL,
  `total_livros` int DEFAULT NULL,
  `administrador_idadministrador` int NOT NULL,
  PRIMARY KEY (`idconfiguracoes`),
  KEY `fk_configuracoes_administrador1_idx` (`administrador_idadministrador`),
  CONSTRAINT `fk_configuracoes_administrador1` FOREIGN KEY (`administrador_idadministrador`) REFERENCES `administrador` (`idadministrador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `convenios`
--

DROP TABLE IF EXISTS `convenios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `convenios` (
  `idconvenios` int NOT NULL,
  `nome_convenio` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idconvenios`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `convenios_exemplar`
--

DROP TABLE IF EXISTS `convenios_exemplar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `convenios_exemplar` (
  `convenios_idconvenios` int NOT NULL,
  `exemplar_idexemplar` int NOT NULL,
  PRIMARY KEY (`convenios_idconvenios`,`exemplar_idexemplar`),
  KEY `fk_convenios_exemplar_exemplar1_idx` (`exemplar_idexemplar`),
  CONSTRAINT `fk_convenios_exemplar_convenios1` FOREIGN KEY (`convenios_idconvenios`) REFERENCES `convenios` (`idconvenios`),
  CONSTRAINT `fk_convenios_exemplar_exemplar1` FOREIGN KEY (`exemplar_idexemplar`) REFERENCES `exemplar` (`idexemplar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `creditos`
--

DROP TABLE IF EXISTS `creditos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `creditos` (
  `idcreditos` int NOT NULL,
  `total_creditos` decimal(10,2) DEFAULT NULL,
  `cliente_idcliente` int NOT NULL,
  `colaborador_idcolaborador` int NOT NULL,
  PRIMARY KEY (`idcreditos`),
  KEY `fk_creditos_cliente1_idx` (`cliente_idcliente`),
  KEY `fk_creditos_colaborador1_idx` (`colaborador_idcolaborador`),
  CONSTRAINT `fk_creditos_cliente1` FOREIGN KEY (`cliente_idcliente`) REFERENCES `cliente` (`idcliente`),
  CONSTRAINT `fk_creditos_colaborador1` FOREIGN KEY (`colaborador_idcolaborador`) REFERENCES `colaborador` (`idcolaborador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `editoras`
--

DROP TABLE IF EXISTS `editoras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `editoras` (
  `ideditoras` int NOT NULL,
  `nome_editora` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ideditoras`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `emprestar_livro`
--

DROP TABLE IF EXISTS `emprestar_livro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `emprestar_livro` (
  `idemprestar_livro` int NOT NULL,
  `cliente_idcliente` int NOT NULL,
  `data_emprestimo` datetime NOT NULL,
  `prev_devolucao` date NOT NULL,
  `dt_envio_email` date DEFAULT NULL,
  PRIMARY KEY (`idemprestar_livro`),
  KEY `fk_emprestar_livro_cliente1_idx` (`cliente_idcliente`),
  CONSTRAINT `fk_emprestar_livro_cliente1` FOREIGN KEY (`cliente_idcliente`) REFERENCES `cliente` (`idcliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `emprestimo_livro`
--

DROP TABLE IF EXISTS `emprestimo_livro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `emprestimo_livro` (
  `idemprestimo_livro` int NOT NULL,
  `dt_devolucao` datetime DEFAULT NULL,
  `emprestar_livro_idemprestar_livro` int NOT NULL,
  `exemplar_idexemplar` int NOT NULL,
  PRIMARY KEY (`idemprestimo_livro`,`emprestar_livro_idemprestar_livro`,`exemplar_idexemplar`),
  KEY `fk_emprestimo_livro_emprestar_livro1_idx` (`emprestar_livro_idemprestar_livro`),
  KEY `fk_emprestimo_livro_exemplar1_idx` (`exemplar_idexemplar`),
  CONSTRAINT `fk_emprestimo_livro_emprestar_livro1` FOREIGN KEY (`emprestar_livro_idemprestar_livro`) REFERENCES `emprestar_livro` (`idemprestar_livro`),
  CONSTRAINT `fk_emprestimo_livro_exemplar1` FOREIGN KEY (`exemplar_idexemplar`) REFERENCES `exemplar` (`idexemplar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `entrada_saida_livros`
--

DROP TABLE IF EXISTS `entrada_saida_livros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `entrada_saida_livros` (
  `identrada_saida_livros` int NOT NULL,
  `patrimonio_idpatrimonio` int NOT NULL,
  `cliente_idcliente` int NOT NULL,
  `exemplar_idexemplar` int NOT NULL,
  `creditos_idcreditos` int NOT NULL,
  `colaborador_idcolaborador` int NOT NULL,
  PRIMARY KEY (`identrada_saida_livros`),
  KEY `fk_entrada_saida_livros_patrimonio1_idx` (`patrimonio_idpatrimonio`),
  KEY `fk_entrada_saida_livros_cliente1_idx` (`cliente_idcliente`),
  KEY `fk_entrada_saida_livros_exemplar1_idx` (`exemplar_idexemplar`),
  KEY `fk_entrada_saida_livros_creditos1_idx` (`creditos_idcreditos`),
  KEY `fk_entrada_saida_livros_colaborador1_idx` (`colaborador_idcolaborador`),
  CONSTRAINT `fk_entrada_saida_livros_cliente1` FOREIGN KEY (`cliente_idcliente`) REFERENCES `cliente` (`idcliente`),
  CONSTRAINT `fk_entrada_saida_livros_colaborador1` FOREIGN KEY (`colaborador_idcolaborador`) REFERENCES `colaborador` (`idcolaborador`),
  CONSTRAINT `fk_entrada_saida_livros_creditos1` FOREIGN KEY (`creditos_idcreditos`) REFERENCES `creditos` (`idcreditos`),
  CONSTRAINT `fk_entrada_saida_livros_exemplar1` FOREIGN KEY (`exemplar_idexemplar`) REFERENCES `exemplar` (`idexemplar`),
  CONSTRAINT `fk_entrada_saida_livros_patrimonio1` FOREIGN KEY (`patrimonio_idpatrimonio`) REFERENCES `patrimonio` (`idpatrimonio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `exemplar`
--

DROP TABLE IF EXISTS `exemplar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `exemplar` (
  `idexemplar` int NOT NULL,
  `numero_de_serie` int NOT NULL,
  `ISBN-10` varchar(45) DEFAULT NULL,
  `ISBN-13` varchar(45) DEFAULT NULL,
  `editoras_ideditoras` int NOT NULL,
  `titulo_idtitulo` int NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`idexemplar`),
  KEY `fk_exemplar_editoras1_idx` (`editoras_ideditoras`),
  KEY `fk_exemplar_titulo1_idx` (`titulo_idtitulo`),
  CONSTRAINT `fk_exemplar_editoras1` FOREIGN KEY (`editoras_ideditoras`) REFERENCES `editoras` (`ideditoras`),
  CONSTRAINT `fk_exemplar_titulo1` FOREIGN KEY (`titulo_idtitulo`) REFERENCES `titulo` (`idtitulo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `idiomas`
--

DROP TABLE IF EXISTS `idiomas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `idiomas` (
  `ididiomas` int NOT NULL,
  `idioma_nome` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ididiomas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `lista_de_espera`
--

DROP TABLE IF EXISTS `lista_de_espera`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lista_de_espera` (
  `idlista_de_espera` int NOT NULL,
  `cliente_idcliente` int NOT NULL,
  `titulo_idtitulo` int NOT NULL,
  PRIMARY KEY (`idlista_de_espera`),
  KEY `fk_lista_de_espera_cliente1_idx` (`cliente_idcliente`),
  KEY `fk_lista_de_espera_titulo1_idx` (`titulo_idtitulo`),
  CONSTRAINT `fk_lista_de_espera_cliente1` FOREIGN KEY (`cliente_idcliente`) REFERENCES `cliente` (`idcliente`),
  CONSTRAINT `fk_lista_de_espera_titulo1` FOREIGN KEY (`titulo_idtitulo`) REFERENCES `titulo` (`idtitulo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Parametrizacao`
--

DROP TABLE IF EXISTS `Parametrizacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Parametrizacao` (
  `idParametrizacao` int NOT NULL,
  `nome_empresa` varchar(45) NOT NULL,
  `nome_fantasia` varchar(45) NOT NULL,
  `endereco_empresa` varchar(45) NOT NULL,
  `telefone_empresa` varchar(45) NOT NULL,
  `cnpj` varchar(45) NOT NULL,
  PRIMARY KEY (`idParametrizacao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `patrimonio`
--

DROP TABLE IF EXISTS `patrimonio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `patrimonio` (
  `idpatrimonio` int NOT NULL,
  `numero_serie` int NOT NULL,
  `tipo` int DEFAULT NULL,
  `colaborador_idcolaborador` int NOT NULL,
  `valor_compra` decimal(10,2) DEFAULT NULL,
  `quantidade_patrimonio` int DEFAULT NULL,
  PRIMARY KEY (`idpatrimonio`),
  KEY `fk_patrimonio_colaborador1_idx` (`colaborador_idcolaborador`),
  CONSTRAINT `fk_patrimonio_colaborador1` FOREIGN KEY (`colaborador_idcolaborador`) REFERENCES `colaborador` (`idcolaborador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `PessoaFisica`
--

DROP TABLE IF EXISTS `PessoaFisica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `PessoaFisica` (
  `idPessoaFisica` int NOT NULL,
  `nome` varchar(80) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `dtNasc` varchar(10) DEFAULT NULL,
  `senha` varchar(45) NOT NULL,
  PRIMARY KEY (`idPessoaFisica`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `restituicao_de_patrimonio`
--

DROP TABLE IF EXISTS `restituicao_de_patrimonio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `restituicao_de_patrimonio` (
  `idrestituicao_de_patrimonio` int NOT NULL,
  `valor_restituicao` decimal(10,2) DEFAULT NULL,
  `cliente_idcliente` int NOT NULL,
  `patrimonio_idpatrimonio` int NOT NULL,
  `colaborador_idcolaborador` int NOT NULL,
  PRIMARY KEY (`idrestituicao_de_patrimonio`),
  KEY `fk_restituicao_de_patrimonio_cliente1_idx` (`cliente_idcliente`),
  KEY `fk_restituicao_de_patrimonio_patrimonio1_idx` (`patrimonio_idpatrimonio`),
  KEY `fk_restituicao_de_patrimonio_colaborador1_idx` (`colaborador_idcolaborador`),
  CONSTRAINT `fk_restituicao_de_patrimonio_cliente1` FOREIGN KEY (`cliente_idcliente`) REFERENCES `cliente` (`idcliente`),
  CONSTRAINT `fk_restituicao_de_patrimonio_colaborador1` FOREIGN KEY (`colaborador_idcolaborador`) REFERENCES `colaborador` (`idcolaborador`),
  CONSTRAINT `fk_restituicao_de_patrimonio_patrimonio1` FOREIGN KEY (`patrimonio_idpatrimonio`) REFERENCES `patrimonio` (`idpatrimonio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `titulo`
--

DROP TABLE IF EXISTS `titulo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `titulo` (
  `idtitulo` int NOT NULL,
  `nome_titulo` varchar(45) DEFAULT NULL,
  `qtde_paginas_titulo` int DEFAULT NULL,
  `idiomas_ididiomas` int NOT NULL,
  PRIMARY KEY (`idtitulo`),
  KEY `fk_titulo_idiomas1_idx` (`idiomas_ididiomas`),
  CONSTRAINT `fk_titulo_idiomas1` FOREIGN KEY (`idiomas_ididiomas`) REFERENCES `idiomas` (`ididiomas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-11-10 22:01:17
