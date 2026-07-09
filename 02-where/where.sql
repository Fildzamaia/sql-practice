--==========================
-- WHERE is used to filter rows based on conditions. 
--
-- Common comparison operators: 
-- = Equal to
-- > Greater than
-- < Less than
-- >= Greater than or equal to
-- <= Less than or equal to 
-- <> Not equal to 
--
--===========================

-- Display all customers from USA
SELECT * 
FROM customers
WHERE country = 'USA'; 

-- Display customers name form France
SELECT customerName
FROM customers
WHERE country = 'France'; 

-- Customers with credit limit greater than 100000
SELECT customerName
FROM customers 
WHERE creditLimit > 100000; 

-- Office located in USA
SELECT officeCode, city, country
FROM offices
WHERE country = 'USA'; 

-- Employees wirh Sales Rep position
SELECT firstName, lastName, jobTitle
FROM employees
WHERE jobTitle = 'Sales Rep'; 



