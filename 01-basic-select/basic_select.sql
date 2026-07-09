--==============================================================
---SQL PRACTICE Day 1
---Topic : Basic SELECT
--==============================================================

--Display all coloumns 
SELECT * 
FROM cutomers c; 

--Display only the FirstName coloumn
SELECT FirstName 
FROM customers c; 

--Display FirstName and LastName
SELECT FirstName, LastName
FROM customers c; 

--Display unique countries
SELECT DISTINCT Country 
FROM customers; 
