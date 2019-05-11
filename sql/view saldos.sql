 

SELECT c.id,CONCAT(c.nombre,' ',c.appaterno,' ',c.apmaterno) nombre,d.capital,   
	CASE 
		WHEN d.tipo_id=3 THEN   (SELECT saldo  FROM corridas_tipo_c WHERE desembolso_id = d.id AND estatus_id=5) 
		WHEN d.tipo_id<>3 THEN  (SELECT SUM(saldo)  FROM corridas   WHERE  desembolso_id = d.id )
	END   saldo ,
	CASE 
		WHEN d.tipo_id=3 THEN   (SELECT capital- pago_capital  FROM corridas_tipo_c WHERE desembolso_id = d.id AND  estatus_id=5) 
		WHEN d.tipo_id<>3 THEN  (SELECT SUM(capital)- SUM(pago_capital)  FROM corridas   WHERE  desembolso_id = d.id )
	END   saldo_capital,
	CASE 
		WHEN d.tipo_id=3 THEN   (SELECT interes-pago_interes  FROM corridas_tipo_c   WHERE desembolso_id = d.id AND estatus_id=5) 
		WHEN d.tipo_id<>3 THEN  (SELECT SUM(interes)-SUM(pago_interes)  FROM corridas   WHERE  desembolso_id = d.id )
	END   saldo_interes,
	CASE 
		WHEN d.tipo_id=3 THEN   0 
		WHEN d.tipo_id<>3 THEN  (SELECT SUM(seguro)-SUM(pago_seguro)  FROM corridas   WHERE  desembolso_id = d.id )
	END   saldo_seguro ,
	c.cartera_id
  
FROM  desembolsos d
JOIN clientes c ON c.id=d.cliente_id  
WHERE d.estatus_id=5
 