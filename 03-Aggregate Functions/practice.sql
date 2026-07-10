--=======================
-- AGGREGATE FUNCITONS
--=======================

--Aggregate Functions are used to perform 
--calculations on a set of rows and return 
--a single summarized value. 

--The most common aggregate functions are: 
-- COUNT() : Counts the number of rows. 
-- SUM()   : Calculates the total value.
-- AVG()   : Calculates the average value. 
-- MIN()   : Returns the smallest value. 
-- MAX()   : Return the largest value. 

--These functions are commonly used for
--data analysis and reporting. 

--Syntax:
--SELECT AGGREGATE_FUNCTION(coloumn_name)
--FROM table_name;

--==================
-- SQL Practice
--==================

-- Count the total number of customers
SELECT COUNT(*)
FROM customers; 

-- Calculate the average credit limit
SELECT AVG(creditLimit)
FROM customers; 

-- Find the highest credit limit
SELECT MAX(creditLimit)
FROM customers; 

-- Find the lowest credit limit
SELECT MIN(creditLimit)
FROM customers; 

-- Calculate the total credit limit
SELECT SUM(creditLimit) 
FROM customers; 
