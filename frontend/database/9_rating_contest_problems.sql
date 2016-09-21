ALTER TABLE
	Contests
ADD COLUMN
	`rating` float(2,2) NOT NULL DEFAULT '3.0';

ALTER TABLE
	Problems
ADD COLUMN
	`rating` float(2,2) NOT NULL DEFAULT '3.0';

