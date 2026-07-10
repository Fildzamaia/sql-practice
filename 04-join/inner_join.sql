--=============
-- INNER JOIN
--=============

-- INNER JOIN is used to combine rows 
-- from two or more tables based on 
-- a related coloumn. 

-- It return only the matching records
-- that exist in both tables. 

-- Syntax: 
-- SELECT coloumn_name
-- FROM tabel1
-- INNER JOIN table2
-- ON table1.common_value=table2.common_value; 

--============
-- SQL Pratice
--============

-- Q : Display every order along with the customers name
SELECT c.customerName, 
       o.orderNumber
FROM customers c
INNER JOIN orders o
ON c.customerNumber=o.customerNumber; 

-- Q : Display each order with its order date and customer name
SELECT c.customerName, 
       o.orderNumber, 
       o.orderDate
FROM customers c
INNER JOIN orders o
ON c.customerNumber=o.customerNumber; 

-- Q : Display all employees along with the city where they work 
SELECT e.firstName,
       e.lastName, 
       o.city
FROM employees
INNER JOIN offices 
ON e.officeCode=o.officeCode; 

-- Q : Display each payment along with the customer's name
SELECT c.customerName, 
       p.checkNumber, 
       p.amount
FROM customers
INNER JOIN payments
ON c.customerNumber=p.customerNumber; 

