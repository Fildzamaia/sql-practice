--===============
-- SUBQUERIES
--==============

-- A subquery is a query nested inside another query. 

-- Ir is used to retrieve data that will be 
-- used by the outer query. 

-- Subqueries can be used with SELECT,
-- WHERE, FROM, and HAVING clauses. 

-- Syntax: 
-- SELECT coloumn_name
-- FROM table_name 
-- WHERE coloumn_name operator(
--    SELECT coloumn_name
--    FROM table_name
-- );

--=============
-- SQL Practice
--=============

-- Q : Display customers who have placed at least one order. 
SELECT customerName
FROM customers 
WHERE customerNumber IN (
  SELECT customerNumber
  FROM orders
);

-- Q : Display customers who have never placed an order. 
SELECT customerName
FROM customers
WHERE customerNumber NOT IN (
  SELECT customerNumber
  FROM orders 
); 

-- Q : Display products with a buy price greater than the avarage buy price. 
SELECT productName,
       buyPrice
FROM products 
WHERE buyPrice >
(
  SELECT AVG(buyPrice)
  FROM products
); 

-- Q : Display customers whose credit limit is above the avarage credit limit
SELECT customerName, 
       creditLimit
FROM customers
WHERE creditLimit > 
(
  SELECT AVG(creditLimit) 
  FROM customers
); 
