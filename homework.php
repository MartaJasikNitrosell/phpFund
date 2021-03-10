<?php

/*Lab: Prepared Statements
 Complete the following:
1. Create a prepared statement script.
2. Add a try/catch construct.
3. Add a new customer record binding the customer parameters.*/

try {
  $pdo = new PDO('mysql:host=localhost;dbname=phpcourse','vagrant','vagrant',  [PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION]);
  $statement = $pdo->prepare( 'INSERT INTO customers (firstname,lastname,credit,loyaltyCard) VALUES (:first, :last, :credit, :loyalty)');

  $fName = 'John';
  $lName = 'Doe';
  $credit = 3000;
  $loyaltyCard = true;

  $statement->execute([':first' => $fName, ':last' => $lName, ':credit' => $credit, ':loyalty' => $loyaltyCard]);

} catch (PDOException $e){
  echo $e->getMessage();
}

/*Lab: Stored Procedure
 Complete the following:
1. Create a stored procedure script.
2. Add the SQL to the database.
3. Call the stored procedure with parameters.*/
try {
  $pdo = new PDO('mysql:host=localhost;dbname=phpcourse','vagrant','vagrant', [PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION]);
  $pdo->exec('DROP PROCEDURE IF EXISTS course.newCustomer');

  $pdo->exec('CREATE PROCEDURE course.newCustomer(firstn varchar(20), lastn varchar(20)) 
        BEGIN INSERT INTO customers (firstname,lastname) VALUES (firstn, lastn) END');

  $statement = $pdo->prepare( 'CALL newCustomer(?, ?)' );
  $statement->execute(['John', 'Doe']);

} catch (PDOException $e){
  echo $e->getMessage();
}

/*Lab: Transaction
 Complete the following:
1. Create a transaction script.
2. Execute two SQL statements.
3. Handle any exceptions.*/
try {
  $pdo = new PDO('mysql:host=localhost;dbname=phpcourse','vagrant','vagrant',
    [PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION]);

  $pdo->beginTransaction();

  $statement = $pdo->prepare( 'INSERT INTO customers (firstname,lastname,credit,loyaltyCard) VALUES (:first, :last, :credit, :loyalty)');

  $statement->execute( [':first' => 'John', ':last' => 'Doe', ':credit' => 333, ':loyalty' => true]);
  $statement->execute( [':first' => 'Jane', ':last' => 'Doe', ':credit' => 654, ':loyalty' => false]);
  
  $pdo->commit();
} catch (PDOException $e ) {
  $pdo->rollBack();
  echo $e->getMessage();
}