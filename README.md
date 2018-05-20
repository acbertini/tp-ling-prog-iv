"# tp-ling-prog-iv" 
<<<<<<< HEAD
=======

>>>>>>> d605a9ca0a9ce564079f6563939782016f426f92
Para iniciar o projeto, rodar as queries abaixo:

DATABASE: loja

CREATE TABLE `usuario` {
   `ID_USUARIO` INT(10) NOT NULL,
   `NOME` VARCHAR(200) NOT NULL,
   `EMAIL` VARCHAR(100) NOT NULL,
   `SENHA` VARCHAR(10) NOT NULL
}

CREATE TABLE `markers` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
  `name` VARCHAR( 60 ) NOT NULL ,
  `address` VARCHAR( 80 ) NOT NULL ,
  `lat` FLOAT( 10, 6 ) NOT NULL ,
  `lng` FLOAT( 10, 6 ) NOT NULL ,
  `type` VARCHAR( 30 ) NOT NULL
) ENGINE = MYISAM ;
