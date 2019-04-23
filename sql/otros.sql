SELECT  p.cliente_id,
	p.fecha,
	p.np,
	p.pago_completo,
	CONCAT(nombre,' ',appaterno,' ',apmaterno) capturista,
	
	CASE
		WHEN d.tipo_id=3 THEN IFNULL(DATEDIFF(p.fecha,  (SELECT fecha_pago FROM corridas_tipo_c WHERE fecha_pago<=p.fecha AND desembolso_id=d.id LIMIT 1)),0 )
		ELSE IFNULL(DATEDIFF(p.fecha,  (SELECT fecha_pago FROM corridas WHERE fecha_pago<=p.fecha AND desembolso_id=d.id LIMIT 1)),0 )
	END
	mora
 FROM pagos p
JOIN desembolsos  d ON d.id=p.desembolso_id AND d.estatus_id=5
JOIN usuarios ON usuarios.id=p.capturista_id
WHERE p.cliente_id=284


SELECT fecha_pago FROM corridas_tipo_c WHERE fecha_pago<='2019-04-22' AND desembolso_id=342 LIMIT 1



SELECT * FROM corridas WHERE cliente_id=251


04-07