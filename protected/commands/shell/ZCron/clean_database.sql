DELETE FROM intranet.user WHERE email IS NULL;
UPDATE intranet.user SET username = SPLIT_STRING(email,'@',1) WHERE username IS NULL;
DELETE FROM intranet.user WHERE email LIKE '\_%';
UPDATE intranet.user SET group_id=3 WHERE group_id != 3;

DELETE FROM intranet.user WHERE email IN ('uipc_tp@conabio.gob.mx', 'turnos_carb@conabio.gob.mx', 'list_conabio@conabio.gob.mx', 
'ecoinformatica@conabio.gob.mx', 'list_ac_conabio@conabio.gob.mx', 'fideicomiso_nomina@conabio.gob.mx', 'ssocialcontenidos@conabio.gob.mx', 
'usobiodiversidad@conabio.gob.mx', 'restoredm_rarreola@conabio.gob.mx', 'restored_adrian.flores@conabio.gob.mx', 'cop13mexico@conabio.gob.mx',
'bioacustica@conabio.gob.mx', 'soporte-si@conabio.gob.mx', 'recibo.nomina@conabio.gob.mx', 'coleccionesmx@conabio.gob.mx', 'timbrarcfdi@conabio.gob.mx',
'ssinvasoras@conabio.gob.mx', 'salapbanexo@conabio.gob.mx', 'candelilla@conabio.gob.mx', 'foro_emcv@conabio.gob.mx', 'salagral@conabio.gob.mx',
'redess@conabio.gob.mx', 'sssep@conabio.gob.mx', 'pspsb@conabio.gob.mx');

UPDATE intranet.user SET status=1;

DELETE FROM intranet_development.profile WHERE user_id NOT IN (SELECT id FROM intranet_development.user);