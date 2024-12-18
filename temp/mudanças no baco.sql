ALTER TABLE `cadastro` DROP FOREIGN KEY `cadastro_ibfk_1`;
ALTER TABLE `cadastro`
MODIFY COLUMN `curso` int(11) NULL;
ALTER TABLE `cadastro`
ADD CONSTRAINT `cadastro_ibfk_1` FOREIGN KEY (`curso`) REFERENCES `curso` (`cod_curso`) ON DELETE SET NULL ON UPDATE CASCADE;
