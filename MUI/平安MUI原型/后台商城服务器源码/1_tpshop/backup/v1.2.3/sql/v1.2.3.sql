ALTER TABLE `__PREFIX__order` 
	CHANGE `discount` `discount` decimal(10,2)   NOT NULL DEFAULT 0.00 COMMENT '价格调整' after `order_prom_amount` ;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;