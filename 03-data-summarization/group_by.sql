--================
-- GROUP BY
--================

-- GROUP BY is used to group rows that have
-- the same values in one or more coloumns. 

-- It is commonly used with Aggregate Functions
-- such as COUNT(), SUM(), AVG(), MIN(), and MAX()
-- to summarize data for each group. 

-- Each unique value in the grouped coloumn
-- becomes one result. 

-- Syntax: 
-- SELECT coloumn_name,
--        AGGREGATE_FUNCTION(coloumn_name)
-- FROM table_name
-- GROUP BY coloumn_name;

--=============
-- SQL Practice
--=============

-- Q : How many customers are there in each country? 
SELECT country, 
       COUNTRY(*) AS total_customers
FROM customers
GROUP BY country;


-- Q : What is the average credit limit for each country?
SELECT country,
       AVG(creditLimit) AS avg_credit_limit
FROM customers 
GROUP BY country; 

-- Q : What is the highest credit limit in each country? 
SELECT country,
       MAX(creditLimit) AS highest_credit_limit
FROM customers
GROUP BY country; 

-- Q : How many employees are there for each job title? 
SELECT jobTitle,
       COUNT(*) AS total_employees
FROM employees
GROUP BY jobTitle; 

-- Q : What is the total credit limit for each country?
SELECT country,
       SUM(creditLimit) AS total_credit_limit
FROM customers
GROUP BY country; 
