ALTER TABLE
	Contests
ADD COLUMN
	`rating` tinyint NOT NULL DEFAULT 3;

ALTER TABLE
	Problems
ADD COLUMN
	`rating` tinyint NOT NULL DEFAULT 3;

