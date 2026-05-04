-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.4.3 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Listage des données de la table essaiebdd.articles : ~20 rows (environ)
INSERT INTO `articles` (`id_articles`, `designation`, `prix`, `categorie`) VALUES
	(12135, 'Tomate', 2000, 'condiment'),
	(12136, 'Haricot', 100, 'céréale'),
	(12137, 'banane', 300, 'fruit'),
	(12138, 'ananas', 400, 'fruit'),
	(12139, 'mais', 50, 'céréale'),
	(12140, 'chaussure', 2000, 'vêtement'),
	(12141, 'chemise', 1500, 'vêtement'),
	(12143, 'maillot', 5000, 'vêtement'),
	(12144, 'casserole', 2500, 'électroménager'),
	(12145, 'marmite', 2000, 'électroménager'),
	(12146, 'cuillère', 2000, 'cuisine'),
	(12147, 'tecno', 60000, 'téléphone'),
	(12148, 'DELL ', 160000, 'électronique'),
	(12149, 'chargeur', 1000, 'électronique'),
	(12150, 'écouteur', 1000, 'électronique'),
	(12151, 'crayon', 100, 'école'),
	(12152, 'bic', 100, 'école'),
	(12153, 'cahier', 200, 'école'),
	(121344, 'Tomate', 1000, 'fruit'),
	(123946, 'Gourde', 2000, 'Objet');

-- Listage des données de la table essaiebdd.client : ~2 rows (environ)
INSERT INTO `client` (`id_client`, `nom`, `prenom`, `age`, `adresse`, `ville`, `mail`) VALUES
	(1, 'assogba@gmail.com', 'Emmanuel', 25, 'Bidosseessi', 'calavi', 'toto@gmail.com'),
	(2, 'HOUNTONDJI', 'Béni', 25, 'Bidosseessi', 'calavi', 'etondji79@gmail.com');

-- Listage des données de la table essaiebdd.commande : ~2 rows (environ)
INSERT INTO `commande` (`id_comm`, `id_client`, `date`, `montant`) VALUES
	(1, 1, NULL, 10000),
	(2, 2, NULL, 8000);

-- Listage des données de la table essaiebdd.contenir : ~1 rows (environ)
INSERT INTO `contenir` (`id_comm`, `id_articles`, `qte_comm`) VALUES
	(1, 12140, 5);

-- Listage des données de la table essaiebdd.user : ~3 rows (environ)
INSERT INTO `user` (`id`, `prenom`, `nom`, `contact`, `login`, `password`) VALUES
	(1, 'Ben', 'HOUNDJI', '63384801', 'alba@gmail.com', '$2y$10$PdjcYOM.UeJJ444HgYNy2e.OEBqo7oZHn.wi7UbnR366FFrUoGnEG');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
