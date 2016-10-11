ALTER TABLE
	Contests
ADD COLUMN
	`rating` float NOT NULL DEFAULT '3.0';

ALTER TABLE
	Problems
ADD COLUMN
	`rating` float NOT NULL DEFAULT '3.0';

