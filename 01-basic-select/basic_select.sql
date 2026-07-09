--==============================================================
---SQL PRACTICE Day 1
---Topic : Basic SELECT
--==============================================================

--Display all coloumns 
SELECT * 
FROM Cutomers; 

--Display only the FirstName coloumn
SELECT FirstName 
FROM Customers c; 

--Display FirstName and LastName
SELECT FirstName, LastName
FROM Customers c; 

--Display unique countries
SELECT DISTINCT Country 
FROM Customers; 


--!Notes 
-- SELECT * returns all coloumns 
-- DISTINCT removes duplicate values 
