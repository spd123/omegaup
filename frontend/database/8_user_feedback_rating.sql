CREATE TABLE IF NOT EXISTS `Entity_Feedback_Features` (
		`feature_id` int(11) NOT NULL AUTO_INCREMENT,
		`entity_type` ENUM ('Problem', 'Contest') NOT NULL,
		`name` varchar(45) NOT NULL,
		PRIMARY KEY (`feature_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Guarda los features que pueden ser votados en cierta entidad' AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `User_Feedback_Rating` (
		`user_id` int(11) NOT NULL,
		`entity_id` int(11) NOT NULL,
		`feature_id` int(11) NOT NULL,
		`create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
		`rating` float(2,2) NOT NULL,
		`comments` text, 
		PRIMARY KEY (`user_id`, `entity_id`, `feature_id`),
		FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
		FOREIGN KEY (`feature_id`) REFERENCES `Entity_Feedback_Features` (`feature_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Guarda ratings de usuarios a objetos de omegaUp' AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `Entity_Feedback_Rating` (
		`feature_id` int(11) NOT NULL,
		`entity_id` int(11) NOT NULL,
		`rating` float(2,2) NOT NULL,
		PRIMARY KEY (`feature_id`, `entity_id`),
		FOREIGN KEY (`feature_id`) REFERENCES `Entity_Feedback_Features` (`feature_id`) ON DELETE NO ACTION ON UPDATE NO ACTION 
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Guarda el rating calculado a cada entidad';




