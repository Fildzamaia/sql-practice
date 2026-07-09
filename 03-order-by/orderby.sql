--================
-- ORDER BY is used to sort the result of a query  
-- based on one or more coloumns. 

--ASC : Sorts data in ascending order
--      (A-Z or smallest to largest).
--DESC : Sorts data in descending order
--      (Z-A or largest to smallest).
--================

--ASC (Ascending)
SELECT customerName
FROM customers
ORDER BY customerName ASC; 

--DESC (Descending)
SELECT customerName
FROM customers
ORDER BY customerName DESC; 

-- Sorting By Numbers
SELECT customerName, creditLimit
FROM customers
ORDER BY creditLimit DESC; 

-- Sorting By Coloumn 
SELECT customerName, country
FROM customers 
ORDER BY country ASC,
         customerName ASC; 
