CREATE TABLE IF NOT EXISTS `UserFeedbackRating` (
		`rating_id` int(11) NOT NULL AUTO_INCREMENT,
		`user_id` int(11) NOT NULL,
		`problem_id` int(11) NULL,
		`contest_id` int(11) NULL,
		`create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
		`rating` tinyint UNSIGNED NOT NULL,
		PRIMARY KEY (`rating_id`),
		KEY idx_rating_problem (`user_id`, `problem_id`),
		KEY idx_rating_contest (`user_id`, `contest_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Guarda raitings de usuarios a objetos de omegaUp' AUTO_INCREMENT=1 ;

ALTER TABLE `UserFeedbackRating`
  ADD CONSTRAINT `fk_ufr_user_id` FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `UserFeedbackRating`
	ADD CONSTRAINT `fk_ufr_problem_id` FOREIGN KEY (`problem_id`) REFERENCES `Problems` (`problem_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `UserFeedbackRating`
	ADD CONSTRAINT `fk_ufr_contest_id` FOREIGN KEY (`contest_id`) REFERENCES `Contests` (`contest_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

