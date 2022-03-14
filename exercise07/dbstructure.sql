CREATE TABLE users (
	id INT UNSIGNED AUTO_INCREMENT NOT NULL,
	name VARCHAR(50) NOT NULL,
	password VARCHAR (255) NOT NULL,
	email VARCHAR (255) NOT NULL,
	PRIMARY KEY (id)
);

CREATE TABLE posts (
	id INT UNSIGNED AUTO_INCREMENT NOT NULL,
	title VARCHAR(255) NOT NULL,
	body TEXT NOT NULL,
	PRIMARY KEY(id)
);

INSERT INTO users(name, password, email)
VALUES ('user01',SHA2('pass01',0),'user01@example.com'),
('user02',SHA2('pass02',0),'user02@example.com'),
('user03',SHA2('pass03',0),'user03@example.com');