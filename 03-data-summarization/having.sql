--===============
-- HAVING
--===============

-- HAVING is used to filter grouped data
-- after the GROUP BY clause. 

-- Unlike WHERE, which filters individual rows, 
-- HAVING filters groups based on aggregate
-- functions such as COUNT(), SUM(), AVG(),
-- MIN(), MAX(). 

-- Syntax: 
-- SELECT coloumn_name, 
--        AGGREGATE_FUNCTIONS(coloumn_name), 
-- FROM table_name
-- GROUP BY coloumn_name
-- HAVING condition; 

--===============
-- SQL Practice 
--===============

-- Q : Which country have more than 5 customers? 
SELECT country,
       COUNT(*) AS total_customers
FROM customers
GROUP country
HAVING COUNT(*) > 5; 

-- Q : Which country have an average credit limit greater than 80.000? 
SELECT country,
       AVG(creditLimit) AS avg_creditLimit
FROM customers
GROUP BY country
HAVING AVG(creditLimit) > 800000; 

-- Q : Which job title have more than one employee? 
SELECT jobTitle, 
       COUNT(*) AS total_employees
FROM employees
GROUP jobTitle
HAVING COUNT(*) > 1; 

-- Q : Which countries have total credit limit greater than 500.0000? 
SELECT country,
       SUM(creditLimit) AS total_credit_limit
FROM customers
GROUP BY country
HAVING SUM(creditLimit) > 5000000; 

