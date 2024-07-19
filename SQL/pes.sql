--TABLAS
CREATE TABLE `usuarios` (
  `idusuario` char(20) collate latin1_spanish_ci NOT NULL,
  `clave` varchar(32) collate latin1_spanish_ci NOT NULL,
  `nombres` varchar(40) collate latin1_spanish_ci default NULL,
  `primer_apellido` varchar(20) collate latin1_spanish_ci default NULL,
  `segundo_apellido` varchar(20) collate latin1_spanish_ci default NULL,
  `pais` varchar(2) collate latin1_spanish_ci NOT NULL,
  `email` varchar(40) collate latin1_spanish_ci default NULL,
  `fecha_inicio` datetime NOT NULL,
  PRIMARY KEY  (`idusuario`),
  UNIQUE KEY `usuario` (`idusuario`,`clave`),
  UNIQUE KEY `idusuario` (`idusuario`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci COMMENT='se graban los datos del usuario';

CREATE TABLE `paises` (
  `idpais` varchar(2) collate latin1_spanish_ci NOT NULL,
  `nombre_pais` varchar(100) collate latin1_spanish_ci NOT NULL,
  `idioma` int(11) default NULL,
  PRIMARY KEY  (`idpais`),
  UNIQUE KEY `idpais` (`idpais`)
) ENGINE=MyISAM AUTO_INCREMENT=947 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

CREATE TABLE `valorflexible` (
  `id` bigint(20) NOT NULL auto_increment,
  `tipo` varchar(200) collate latin1_spanish_ci NOT NULL,
  `valor` varchar(50) collate latin1_spanish_ci default NULL,
  `texto` varchar(1000) collate latin1_spanish_ci default NULL,
  `orden` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `idvalorflexible` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--VISTAS
CREATE VIEW vw_datos_usuario AS
	SELECT
		 idusuario
		,nombres
		,primer_apellido
		,segundo_apellido
		,pais
		,email
		,fecha_inicio
	FROM usuarios
;

--FUNCIONES
CREATE FUNCTION `fn_verificar_usuario`(usuario CHAR(30), pass CHAR(15)) RETURNS BOOLEAN
	BEGIN
	    DECLARE _pass CHAR(15);
	    
	    SET _pass = (SELECT clave FROM usuarios WHERE idusuario = usuario);
		
	    IF(_pass IS NOT NULL) THEN
	        IF(pass = _pass) THEN
	            RETURN TRUE;
	        ELSE
	            RETURN FALSE;
	        END IF;
		ELSE
		    RETURN FALSE;
		END IF;
	END
;

CREATE FUNCTION `fn_crear_usuario`(v_idusuario VARCHAR(20),v_pass VARCHAR(32),v_nombres VARCHAR(40),v_apellidouno VARCHAR(20),v_apellidodos VARCHAR(20),i_pais VARCHAR(2),v_email VARCHAR(40)) RETURNS BOOLEAN
	BEGIN
		INSERT INTO usuarios(
			 idusuario
			,clave
			,nombres
			,primer_apellido
			,segundo_apellido
			,pais
			,email
			,fecha_inicio
		)VALUES(
			 v_idusuario
			,v_pass
			,v_nombres
			,v_apellidouno
			,v_apellidodos
			,i_pais
			,v_email
			,now()
		);
		
		RETURN TRUE;
	END
;

CREATE FUNCTION `fn_guarda_video`(v_idusuario VARCHAR(20),i_version_juego INTEGER,i_tipo_partido INTEGER,i_dificultad INTEGER,v_equipo VARCHAR(200),v_equipo_contrario VARCHAR(200),v_jugador VARCHAR(200),i_seccion INTEGER,v_link VARCHAR(400)) RETURNS BOOLEAN
	BEGIN
		INSERT INTO videos(
			 idusuario
			,version_juego
			,tipo_partido
			,dificultad
			,equipo
			,equipo_contrario
			,jugador
			,seccion
			,link
			,fecha
		)VALUES(
			 v_idusuario
			,i_version_juego
			,i_tipo_partido
			,i_dificultad
			,v_equipo
			,v_equipo_contrario
			,v_jugador
			,i_seccion
			,v_link
			,now()
		);
		
		RETURN TRUE;
	END
;