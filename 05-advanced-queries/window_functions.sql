--=================
-- WINDOW FUNCTIONS
--=================

-- Window Functions perform calculations 
-- across a set of rows without collapsing
-- the result into a single row. 

-- Common Window Functions: 
-- ROW_NUMBER() #It doesn't matter the value is the same.
-- RANK() #There is a jump ranking.
-- DENSE_RANK() #No ranking is missing.

-- Syntax: 
-- SELECT coloumn_name, 
--        ROW_NUMBER() OVER (ORDER BY coloumn_name) 
-- FROM table_name; 

--=============
-- SQL PRACTICE
--=============

-- Q : Display the customer name, credit limit, and assign a row number based on the highest credit limit
SELECT customerName, 
       creditLimit, 
       ROW_NUMBER() OVER(ORDER BY creditLimit DESC) as row_num
FROM customers; 

-- Q : Give customer ranking based on credit limit.
SELECT customerName,
       creditLimit,
       RANK() OVER (ORDER BY creditLimit DESC) as ranking
FROM customers; 

-- Q : Give dense customer ranking based on credit limit.
SELECT customerName, 
       creditLimit, 
       DENSE_RANK() OVER(ORDER BY creditLimit DESC) as dense_rank 
FROM customers; 

