
CREATE TABLE mensagens(
  id_mensagem  int(11) NOT NULL auto_increment,
  nome varchar(50) NOT NULL,
  email varchar(50) NOT NULL,
  mensagem varchar(250) NOT NULL,
  nova varchar(1) NOT NULL,
  PRIMARY KEY  (id_mensagem));