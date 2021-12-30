DELIMITER $$

CREATE PROCEDURE crieDatabaseUser()
READS SQL DATA
BEGIN
	SELECT
		count(*)
	INTO
		@existe
	FROM
		mysql.user
	WHERE
		mysql.user.host = 'localhost' AND
		mysql.user.user = 'usuario_confeccao'
	LIMIT 1;

	IF @existe THEN
		DROP USER 'usuario_confeccao'@'localhost';
	END IF;

	CREATE USER
		'usuario_confeccao'@'localhost'
	IDENTIFIED WITH
		mysql_native_password
	BY
		'tJ0hfzIImV4mhhJoQoF3oGL2EGctVrw5fJmdPghwRJ2AgOI1AtbWerOw1hqfcoGiR+R4J+21YqH9QTMd';

	GRANT
		ALL
	ON
		`confeccao`.*
	TO
		'usuario_confeccao'@'localhost';

	FLUSH PRIVILEGES;
END $$

CALL crieDatabaseUser() $$
DROP PROCEDURE crieDatabaseUser $$

DELIMITER ;
