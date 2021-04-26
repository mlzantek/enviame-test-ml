CREATE TABLE IF NOT EXISTS `envios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data_identifier` varchar(256) NOT NULL,
	`data_imported_id` varchar(256) NOT NULL,
	`data_tracking_number` varchar(256) NOT NULL,
	`status_id` int(11) NOT NULL,
	`status_name` varchar(256) NOT NULL,
	`status_code` varchar(256) NOT NULL,
	`status_info` varchar(256) NOT NULL,
	`status_created_at` datetime NOT NULL,
	`customer_full_name` varchar(256) NOT NULL,
	`customer_phone` int(15) NOT NULL,
	`customer_email` varchar(256) NOT NULL,
	`shipping_address_full_address` varchar(256) NOT NULL,
	`shipping_address_place` varchar(256) NOT NULL,
	`shipping_address_type` varchar(256) NOT NULL,
	`country` varchar(256) NOT NULL,
	`carrier` varchar(256) NOT NULL,
	`service` varchar(256) NOT NULL,
	`label_PDF` varchar(256) NOT NULL,
	`label_ZPL` varchar(256) NOT NULL,
	`label_PNG` varchar(256) NOT NULL,
	`barcodes` varchar(256) NOT NULL,
	`deadline_at` varchar(256) NOT NULL,
	`created_at` datetime NOT NULL,
	`updated_at` datetime NOT NULL,
	`links_rel1` varchar(256) NOT NULL,
	`links_href1` varchar(256) NOT NULL,
	`links_rel2` varchar(256) NOT NULL,
	`links_href2` varchar(256) NOT NULL,
	`links_rel3` varchar(256) NOT NULL,
	`links_href3` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
)ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

