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