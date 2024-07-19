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