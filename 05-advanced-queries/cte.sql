--==============================
-- COMMON TABLE EXPRESSION (CTE)
--==============================

-- A Common Table Expression (CTE) is a
-- temprorary named result set that can be
-- referenced within a query.

-- CTEs help make complex queries easier
-- to read, write, and maintain. 

-- Syntax : 
-- WITH cte_name as (
--   SELECT ...
-- )
-- SELECT * 
-- FROM cte_name; 

--=============
-- SQL PRACTICE
--=============

-- Q : Show customers with a credit limit above the average
WITH average_credit as 
(
  SELECT AVG(creditLimit) as avg_credit
  FROM customers 
)

SELECT customerName,
       creditLimit
FROM customers 
WHERE creditLimit > 
( 
  SELECT avg_credit
  FROM average_credit
);

-- Q : Show products that are more expensive than the average product price. 
WITH average_price as
(
  SELECT AVG(buyPrice) as avg_price
  FROM products
)
SELECT productName, 
       buyPrice
FROM products 
WHERE buyPrice >
(
  SELECT avg_price
  FROM average_price
); 




