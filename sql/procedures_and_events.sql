-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-11-2017 a las 18:46:14
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pv`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `Generator` ()  BEGIN
  DECLARE R DOUBLE;
  DECLARE Z1 DOUBLE;
  DECLARE Z2 DOUBLE;
  DECLARE Average DOUBLE;
  DECLARE Desviation DOUBLE;
  SET @V1=RAND(), @V2=RAND();
  SET R=@V1*@V1+@V2*@V2;
  WHILE(R>1) DO
  	SET @V1=RAND(), @V2=RAND();
  	SET R=@V1*@V1+@V2*@V2;
  END WHILE;
  SET R= SQRT(R);
  SET Z1=SQRT(-2*LOG10(R))*(@V1/R);
  SET Z2=SQRT(-2*LOG10(R))*(@V2/R);
  SET Average := (SELECT avg(production) FROM panels);
  SET Desviation:= (SELECT STD(production) FROM panels);
  SET @V1=Z1*Desviation+Average;
  SET @V2=Z2*Desviation+Average;
  SELECT @V1, @V2;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `MyCursor` ()  NO SQL
BEGIN
DECLARE done INT DEFAULT FALSE;
DECLARE id bigint;
DECLARE cur CURSOR FOR SELECT inversor_id FROM panels GROUP BY inversor_id;
DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;
OPEN cur;
  read_loop: LOOP
    FETCH cur INTO id;
    IF done THEN
      LEAVE read_loop;
    END IF;
    CALL generator();
    SELECT @V1,@V2;
    INSERT INTO panels (timestamp,inversor_id,production,created_at,updated_at) VALUES (NOW(),id,@V1,NOW(),NOW());
  END LOOP;
  CLOSE cur;
END$$

DELIMITER ;

DELIMITER $$
--
-- Eventos
--
CREATE DEFINER=`root`@`localhost` EVENT `Event` ON SCHEDULE EVERY 1 DAY STARTS '2017-11-20 13:35:00' ON COMPLETION NOT PRESERVE ENABLE DO CALL MyCursor()$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
