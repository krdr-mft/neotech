CREATE TABLE recepies (
	id INT UNSIGNED auto_increment NOT NULL,
	name varchar(50) NOT NULL,
	cost DECIMAL(5,2) NOT NULL,
	PRIMARY KEY (id)
);

CREATE TABLE ingredients (
	id INT unsigned auto_increment NOT NULL,
	name VARCHAR(50) NOT NULL,
	recipeId INT unsigned NOT NULL,
	PRIMARY KEY (id),
	FOREIGN KEY (recipeId) REFERENCES recepies(id)
);

INSERT INTO recepies (name,cost) 
VALUES
	 ('Tuna salad',100.00),
	 ('Tuna sandwich',80.00),
	 ('Chicken sandwich',90.00),
	 ('Chicken salad',95.00),
	 ('Tuna steak',200.00);

INSERT INTO ingredients (name, recipeId)
    VALUES('tuna', 1),
    ('salad', 1),
    ('bread', 1),
    ('tuna', 2),
    ('salad', 2),
    ('tomato', 2),
    ('sauce', 2),
    ('chicken', 3),
    ('salad', 3),
    ('bread', 3),
    ('chicken', 4),
    ('salad', 4),
    ('tomato', 4),
    ('sauce', 4),
    ('tuna',5),
    ('side dish',5);

--SOLUTION:
UPDATE recepies
SET	cost = (cost + 2)
Where
	recepies.id IN (
	select
		r.id
	from
		recepies r
	left join ingredients i on
		r.id = i.recipeId
	where
		i.name = 'tuna')