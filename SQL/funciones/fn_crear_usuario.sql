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