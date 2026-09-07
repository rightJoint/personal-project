<?php

namespace Src\LangFiles\Views\Blog\Articles\FiftySqlQuestions;


class LangFiles_En_Views_B_A_FiftySqlQuestions
{
    const P='Sql cheat sheet. Downloaded from linkedin to keep in touch '.
    '(<a href="/downloads/SqlCheatSheet.pdf" title="download SqlCheatSheet.pdf" download>Download pdf in english</a>).';
    const Q1='What is SQL?';
    const A1='SQL stands for Structured Query Language. It is a programming language used for managing and '.
    'manipulating relational databases.';
    const Q2='What is a database?';
    const A2='A database is an organized collection of data stored and accessed electronically. It provides a way '.
    'to store, organize, and retrieve large amounts of data efficiently';
    const Q3='What is a primary key?';
    const A3='A primary key is a column or combination of columns that uniquely identifies each row in a table. '.
    'It enforces the entity integrity rule in a relational database';
    const Q4='What is a foreign key?';
    const A4='A foreign key is a column or combination of columns that establishes a link between data in two tables. '.
    'It ensures referential integrity by enforcing relationships between tables';
    const Q5='What is the difference between a primary key and a unique key?';
    const A5='A primary key is used to uniquely identify a row in a table and must have a unique value. On the '.
    'other hand, a unique key ensures that a column or combination of columns has a unique value but does not '.
    'necessarily identify the row';
    const Q6='What is normalization?';
    const A6='Normalization is the process of organizing data in a database to minimize redundancy and dependency. '.
    'It involves breaking down a table into smaller tables and establishing relationships between them';
    const Q7='What are the different types of normalization?';
    const A7='The different types of normalization are:';
    const A71='First Normal Form (1NF)';
    const A72='Second Normal Form (2NF)';
    const A73='Third Normal Form (3NF)';
    const A74='Boyce-Codd Normal Form (BCNF)';
    const A75='Fourth Normal Form (4NF)';
    const A76='Fifth Normal Form (5NF) or Project-Join Normal Form (PJNF)';
    const Q8='What is a join in SQL?';
    const A8='A join is an operation used to combine rows from two or more tables based on related columns. '.
    'It allows you to retrieve data from multiple tables simultaneously';
    const Q9='What is the difference between DELETE and TRUNCATE in SQL?';
    const A9='The DELETE statement is used to remove specific rows from a table based on a condition. '.
    'It can be rolled back and generates individual delete operations for each row. TRUNCATE, on the other '.
    'hand, is used to remove all rows from a table. It cannot be rolled back, and it is faster than DELETE as '.
    'it deallocates the data pages instead of logging individual row deletions';
    const Q10='What is the difference between UNION and UNION ALL?';
    const A10='UNION and UNION ALL are used to combine the result sets of two or more SELECT statements. '.
    'UNION removes duplicate rows from the combined result set. whereas UNION ALL includes all rows, including duplicates';
    const Q11='What is the difference between the HAVING clause and the WHERE clause?';
    const A11='The WHERE clause is used to filter rows based on a condition before the data is grouped or aggregated. '.
    'It operates on individual rows. The HAVING clause, on the other hand, is used to filter grouped rows '.
    'based on a condition after the data is grouped or aggregated using the GROUP BY clause';
    const Q12='What is a transaction in SQL?';
    const A12='A transaction is a sequence of SQL statements that are executed as a single logical unit of work. '.
    'It ensures data consistency and integrity by either committing all changes or rolling them back if '.
    'an error occurs';
    const Q13='What is the difference between a clustered and a non-clustered index?';
    const A13='A clustered index determines the physical order of data in a table. It changes the way the data is '.
    'stored on disk and can be created on only one column. A table can have only one clustered index. '.
    'A non-clustered index does not affect the physical order of data in a table. It is stored separately and '.
    'contains a pointer to the actual data. A table can have multiple non-clustered indexes.';
    const Q14='What is ACID in the context of database transactions?';
    const A14='ACID stands for Atomicity, Consistency, Isolation, and Durability. It is a set of properties that '.
    'guarantee reliable processing of database transactions.';
    const A141='Atomicity ensures that a transaction is treated as a single unit of work, either all or none of the changes are applied';
    const A142='Consistency ensures that a transaction brings the database from one valid state to another';
    const A143='Isolation ensures that concurrent transactions do not interfere with each other';
    const A144='Durability ensures that once a transaction is committed, its changes are permanent and survive system failures';
    const Q15='What is a deadlock?';
    const A15='A deadlock occurs when two or more transactions are waiting for each other to release resources, '.
    'resulting in a circular dependency. As a result, none of the transactions can proceed, and the system may '.
    'become unresponsive';
    const Q16='What is the difference between a database and a schema?';
    const A16='A database is a container that holds multiple objects, such as tables, views, indexes, and procedures. '.
    'It represents a logical grouping of related data. A schema, on the other hand, is a container within a database '.
    'that holds objects and defines their ownership. It provides a way to organize and manage database objects.';
    const Q17='What is the difference between a temporary table and table variable?';
    const A17='A temporary table is a table that is created and exists only for the duration of a session or a '.
    'transaction. It can be explicitly dropped or is automatically dropped when the session or '.
    'transaction ends. A table variable is a variable that can store a tablelike structure in memory. It has a '.
    'limited scope within a batch, stored procedure, or function. It is automatically deallocated when the '.
    'scope ends';
    const Q18='What is the purpose of the GROUP BY clause?';
    const A18='The GROUP BY clause is used to group rows based on one or more columns in a table. It is typically '.
    'used in conjunction with aggregate functions, such as SUM, AVG, COUNT, etc., to perform calculations on grouped data';
    const Q19='What is the difference between CHAR and VARCHAR data types?';
    const A19='CHAR is a fixed-length string data type, while VARCHAR is a variable-length string data type';
    const Q20='What is a stored procedure?';
    const A20='A stored procedure is a set of SQL statements that are stored in the database and can be executed '.
    'repeatedly. It provides code reusability and better performance';
    const Q21='What is a subquery?';
    const A21='A subquery is a query nested inside another query. It is used to retrieve data based on the result of an inner query';
    const Q22='What is a view?';
    const A22='A view is a virtual table based on the result of an SQL statement. It allows users to retrieve and manipulate data';
    const Q23='What is the difference between a cross join and an inner join?';
    const A23='A cross join (Cartesian product) returns the combination of all rows from two or more tables. '.
    'An inner join returns only the matching rows based on a join condition';
    const Q24='What is the purpose of the COMMIT statement?';
    const A24='The COMMIT statement is used to save changes made in a transaction permanently. It ends the transaction '.
    'and makes the changes visible to other users';
    const Q25='What is the purpose of the ROLLBACK statement?';
    const A25='The ROLLBACK statement is used to undo changes made in a transaction. It reverts the database to its '.
    'previous state before the transaction started';
    const Q26='What is the purpose of the NULL value in SQL?';
    const A26='NULL represents the absence of a value or unknown value. It is different from zero or an empty string '.
    'and requires special handling in SQL queries';
    const Q27='What is the difference between a view and a materialized view?';
    const A27='A materialized view is a physical copy of the view s result set stored in the database, which is '.
    'updated periodically. It improves query performance at the cost of data freshness';
    const Q28='What is a correlated subquery?';
    const A28='A correlated subquery is a subquery that refers to a column from the outer query. It executes once '.
    'for each row processed by the outer query';
    const Q29='What is the purpose of the DISTINCT keyword?';
    const A29='The DISTINCT keyword is used to retrieve unique values from a column or combination of columns in a SELECT statement';
    const Q30='What is the difference between the CHAR and VARCHAR data types?';
    const A30='CHAR stores fixed-length character strings, while VARCHAR stores variable-length character strings. '.
    'The storage size of CHAR is constant, while VARCHAR adjusts dynamically';
    const Q31='What is the difference between the IN and EXISTS operators?';
    const A31='The IN operator checks for a value within a set of values or the result of a subquery. The EXISTS '.
    'operator checks for the existence of rows returned by a subquery';
    const Q32='What is the purpose of the TRIGGER statement?';
    const A32='The TRIGGER statement is used to associate a set of SQL statements with a specific event in the '.
    'database. It is executed automatically when the event occurs';
    const Q33='What is the difference between a unique constraint and a unique index?';
    const A33='A unique constraint ensures the uniqueness of values in one or more columns, while a unique index '.
    'enforces the uniqueness and also improves query performance';
    const Q34='What is the purpose of the TOP or LIMIT clause?';
    const A34='The TOP (in SQL Server) or LIMIT (in MySQL) clause is used to limit the number of rows returned by '.
    'a query. It is often used with an ORDER BY clause';
    const Q35='What is the difference between the UNION and JOIN operators?';
    const A35='UNION combines the result sets of two or more SELECT statements vertically, while JOIN combines '.
    'columns from two or more tables horizontally based on a join condition';
    const Q36='What is a data warehouse?';
    const A36='A data warehouse is a large, centralized repository that stores and manages data from various sources. '.
    'It is designed for efficient reporting, analysis, and business intelligence purposes';
    const Q37='What is the difference between a primary key and a candidate key?';
    const A37='A primary key is a chosen candidate key that uniquely identifies a row in a table. '.
    'A candidate key is a set of one or more columns that could potentially become the primary key';
    const Q38='What is the purpose of the GRANT statement?';
    const A38='The GRANT statement is used to grant specific permissions or privileges to users or roles in a database';
    const Q39='What is a correlated update?';
    const A39='A correlated update is an update statement that refers to a column from the same table in a subquery. '.
    'It updates values based on the result of the subquery for each row';
    const Q40='What is the purpose of the CASE statement?';
    const A40='The CASE statement is used to perform conditional logic in SQL queries. It allows you to return '.
    'different values based on specified conditions';
    const Q41='What is the purpose of the COALESCE function?';
    const A41='The COALESCE function returns the first non-null expression from a list of expressions. It is often '.
    'used to handle null values effectively';
    const Q42='What is the purpose of the ROW_NUMBER() function?';
    const A42='The ROW_NUMBER() function assigns a unique incremental number to each row in the result set. '.
    'It is commonly used for pagination or ranking purposes.ll values effectively';
    const Q43='What is the difference between a natural join and an inner join?';
    const A43='A natural join is an inner join that matches rows based on columns with the same name in the joined '.
    'tables. It is automatically determined by the database';
    const Q44='What is the purpose of the CASCADE DELETE constraint?';
    const A44='The CASCADE DELETE constraint is used to automatically delete related rows in child tables when a row '.
    'in the parent table is deleted';
    const Q45='What is the purpose of the ALL keyword in SQL?';
    const A45='The ALL keyword in SQL is used in conjunction with comparison operators (like =, >, <, >=, <=, !=) to '.
    'compare a value against all values in a subquery';
    const Q46='What is the difference between the EXISTS and NOT EXISTS operators?';
    const A46='The EXISTS operator returns true if a subquery returns any rows, while the NOT EXISTS operator returns '.
    'true if a subquery returns no rows';
    const Q47='What is the purpose of the CROSS APPLY operator?';
    const A47='The CROSS APPLY operator is used to invoke a tablevalued function for each row of a table expression. '.
    'It returns the combined result set';
    const Q48='What is a self-join?';
    const A48='A self-join is a join operation where a table is joined with itself. It is useful when you want to '.
    'compare rows within the same table based on related columns. It requiresbined result set';
    const Q49='What is an ALIAS command?';
    const A49='ALIAS command in SQL is the name that can be given to any table or a column. This alias name can be '.
    'referred in WHERE clause to identify a particular table or a column';
    const Q50='Why are SQL functions used?';
    const A50='SQL functions are used for the following purposes:';
    const A501='To perform some calculations on the data';
    const A502='To modify individual data items';
    const A503='To manipulate the output';
    const A504='To format dates and numbers';
    const A505='To convert the data types';
}
