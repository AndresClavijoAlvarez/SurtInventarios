# Estructura SQL de la tabla Usuarios para Autentificator by Cluster.
#
# Recuerde configurar $sql_tabla en aut_config.inc.php
# si instala manualmente la Tabla de Gestion de Usuarios con el nombre que le de
# (por defecto nombre "usuarios").

#
# Estructura de tabla para tabla `usuarios`
#

CREATE TABLE usuarios (
  ID smallint(6) unsigned NOT NULL auto_increment,
  usuario tinytext NOT NULL,
  pass tinytext NOT NULL,
  nivel_acceso smallint(4) unsigned NOT NULL default '0',
  PRIMARY KEY  (ID),
  UNIQUE KEY ID (ID)
) TYPE=MyISAM PACK_KEYS=1;

#
# Volcar la base de datos para la tabla `usuarios`
#

INSERT INTO usuarios VALUES (1, 'Admin', '21232f297a57a5a743894a0e4a801fc3', 0);


