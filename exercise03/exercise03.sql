CREATE TABLE menu (
	itemName varchar(50) not null primary key,
	category varchar(50) not null,
	price decimal(5,2)
	);

INSERT INTO menu (itemName,category,price)
VALUES
('borsch','Soups',100.0),
('onion soup','Soups',150.0),
('roast chicken','Steaks',200.0),
('tuna salad','Salads',80.0),
('t-bone','Steaks',300.0),
('rib eye','Steaks',400.0),
('Cesar salad','Salads',110.0),
('tomato soup','Soups',140.0),
('baguette','Breads',90.0),
('white bread','Breads',10.0),
('veggie salad','Salads',110.0);


--SOLUTION:
UPDATE menu SET price = price*1.1
WHERE category = "Salads"
OR category = 'Soups' 
