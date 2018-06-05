<?php
/************************************************
 * registers new client into the database
 ************************************************/
function regClient($clientFirstname, $clientLastname, $clientEmail, $clientPassword)
{
    $db = connect();
    $sql = 'INSERT INTO usert VALUES (DEFAULT, :clientFirstname, :clientLastname, '
            . ':clientEmail, DEFAULT, :clientPassword)';
    
    $stmt = $db->prepare($sql);

    $stmt->bindValue(':clientFirstname', $clientFirstname, PDO::PARAM_STR);
    $stmt->bindValue(':clientLastname', $clientLastname, PDO::PARAM_STR);
    $stmt->bindValue(':clientEmail', $clientEmail, PDO::PARAM_STR);
    $stmt->bindValue(':clientPassword', $clientPassword, PDO::PARAM_STR);
    
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}

/****************************************
* checks for already existing email
*****************************************/
function checkExistingEmail($clientEmail){
    $db = connect();
    $sql = 'SELECT useremail FROM usert WHERE useremail = :email';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':email', $clientEmail, PDO::PARAM_STR);
    $stmt->execute();
    $matchEmail = $stmt->fetch(PDO::FETCH_NUM);
    $stmt->closeCursor();
    if(empty($matchEmail)){
        return 0;
    } else {
        return 1;
    }
}

/*********************************************
 * select client with email
 ********************************************/
function getClient($clientEmail)
{
  $db = connect();
  $sql = 'SELECT * FROM usert WHERE useremail = :email';
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':email', $clientEmail, PDO::PARAM_STR);
  $stmt->execute();
  $clientData = $stmt->fetch(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $clientData;
}