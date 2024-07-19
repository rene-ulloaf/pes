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