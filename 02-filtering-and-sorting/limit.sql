--===============
-- LIMIT 
--==============

-- LIMIT is used to restrict the number of rows
-- returned by a query. 

-- It is commonlu used with ORDER BY to retrieve
-- the top or bottom records form a table. 

-- Syntax : 
-- SELECT coloumn_name
-- FROM table_name
-- LIMIT number; 

--========
--PRACTICE
--========

-- Display the first 5 customers
SELECT * 
FROM customers
LIMIT 5; 

-- Display the first 3 offices
SELECT * 
FROM offices
LIMIT 3; 

-- Display the top 10 customers wirh the highest credit limit
SELECT customerName,
       creditLimit
FROM customers
ORDER BY creditLimit DESC 
LIMIT 10; 

-- Display the first 5 customers in alphabetical order
SELECT customerName
FROM customers 
ORDER BY customerName ASC
LIMIT 5;
