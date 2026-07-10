--============
-- LEFT JOIN
--===========

-- LEFT JOIN returns all rows from the left table
-- and the matching rows from the right table. 

-- If there is no matching record in the right table, 
-- NULL values will be returned.

-- Syntax: 
-- SELECT coloumn_name
-- FROM table1
-- LEFT JOIN table2
-- ON table1.common_value=table2.common_value;

--=============
-- SQL Practice
--=============

-- Display all customers along with their order numbers
SELECT c.customerName, 
       o.orderNumber
FROM customers c
LEFT JOIN orders o
ON c.customerNumber=o.customerNumber; 

-- Display all customers and their payments amounts
SELECT c.customerName, 
       p.amount
FROM customers c
LEFT JOIN payments p
ON c.customerNumber=p.customerNumber; 

-- Display all employees and the city where they work 
SELECT e.firstName, 
       e.lastName, 
       o.city
FROM employees e
LEFT JOIN offices o
ON e.officeCode=o.officeCode; 

-- Display all customers and their order dates
SELECT c.customerName, 
       o.orderDate
FROM customers c
LEFT JOIN orders o
ON c.customerNumber=o.customerNumber; 
