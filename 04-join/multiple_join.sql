--==============
-- MULTIPLE JOIN
--==============

-- Multiple JOIN is used to combine data 
-- from more than two related tables. 

-- Each tables is connected through its
-- corresponding primary key and foreign key. 

-- This techinque is commonly used to
-- retrieve complete information stored 
-- acros multiple tables. 

-- Syntax: 
-- SELECT coloumn_name
-- FROM table1
-- INNER JOIN table2
--     ON table1.coloumn=table2.coloumn
-- INNER JOIN 
--     ON table2.coloumn-table3.coloumn;

--=============
-- SQL Practice
--=============

-- Q : Display the customer name and their order number
SELECT c.customerName, 
       o.orderNumber
FROM customers c
INNER JOIN orders o
ON c.customerNumber=o.customerNumber; 


-- Q : Display the customer name, order number, and product code
SELECT c.customerName, 
       o.orderNumber, 
       od.productCode
FROM customers c
INNER JOIN orders o
    ON c.customerNumber=o.customerNumber
INNER JOIN orderdetails od
    ON o.orderNumber=od.orderNumber; 

-- Q : Display the customer name, order number, product name, and quantity ordered
SELECT c.customerName, 
       o.orderNumber, 
       p.productName, 
      od.quantityOrdered
FROM customers c
INNER JOIN orders o
    ON c.customerNumber=o.customerNumber
INNER JOIN orderdetails od
    ON o.orderNumber=od.orderNumber
INNER JOIN products p
    ON od.productCode=p.productCode; 

-- Q : Display the customer name, product name, quantity ordered, and price of each product
SELECT c.customerName, 
       p.productCode, 
      od.quantityOrdered,
      od.priceEach 
FROM customers c
INNER JOIN orders o
    ON c.customerNumber=o.customerNumber
INNER JOIN orderdetails od
    ON o.orderNumber=od.orderNumber
INNER JOIN products p
    ON od.productCode=p.productCode; 
