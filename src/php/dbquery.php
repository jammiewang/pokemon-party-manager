<?php

function getAllBoats()
{
	global $db;
	$query = "SELECT * FROM boats";
	$statement = $db->prepare($query);
	$statement->execute();

	// fetchAll() returns an array for all of the rows in the result set
	$results = $statement->fetchAll();

	// closes the cursor and frees the connection to the server so other SQL statements may be issued
	$statement->closecursor();

	return $results;
}

function getThisBoat()
{
	global $db;

	$query = "SELECT * FROM boats WHERE bid=101";
	$statement = $db->prepare($query);
	$statement->execute();

	$results = $statement->fetch();
	$statement->closeCursor();

	return $results;
}

function addBoat($bid, $bname, $color)
{
	global $db;

	$query = "INSERT INTO boats VALUES(:bid, :bname, :color)";
	$statement = $db->prepare($query);
	$statement->bindValue(':bid', $bid);
	$statement->bindValue(':bname', $bname);
	$statement->bindValue(':color', $color);
	$statement->execute();        // run query, if the statement is successfully executed, execute() returns true
	// false otherwise

	$statement->closeCursor();    // release hold on this connection
}

function getBasePokemon($pokedexNumber)
{
	global $db;

	$query = "SELECT * FROM base_pokemon WHERE pokedex_number=:pokedex";
	$statement = $db->prepare($query);
	$statement->bindValue(':pokedex', $pokedexNumber);
	$statement->execute();

	$results = $statement->fetch();
	$statement->closeCursor();

	return $results;
}

function getItem($itemName)
{
	global $db;

	$query = "SELECT * FROM item WHERE item_name=:itemName";
	$statement = $db->prepare($query);
	$statement->bindValue(':itemName', $itemName);
	$statement->execute();

	$results = $statement->fetch();
	$statement->closeCursor();

	return $results;
}

function deleteParty($partyID)
{
	global $db;

	$q1 = "SELECT * FROM party WHERE party_id = :partyID;";
	$statement1 = $db->prepare($q1);
	$statement1->bindValue(':partyID', $partyID);
	$statement1->execute();
	$ret = $statement1->fetch();
	$statement1->closeCursor();
	$query = "CALL clearParty(:partyID);";
	$statement = $db->prepare($query);
	$statement->bindValue(':partyID', $partyID);
	$statement->execute();

	$results = $statement->fetch();
	$statement->closeCursor();

	return $ret;
}

function getParty($partyID)
{
	global $db;

	$query = "SELECT * FROM party WHERE party_id = :partyID;";
	$statement = $db->prepare($query);
	$statement->bindValue(':partyID', $partyID);
	$statement->execute();

	$results = $statement->fetch();
	$statement->closeCursor();

	return $results;
}

function getUser($userID)
{
	global $db;

	$query = "CALL getUser(:userID)";
	$statement = $db->prepare($query);
	$statement->bindValue(':userID', $userID);
	$statement->execute();

	$results = $statement->fetch();
	$statement->closeCursor();

	return $results;
}

function getUserID($username)
{
	global $db;

	$query = "SELECT * FROM user WHERE username = :username;";
	$statement = $db->prepare($query);
	$statement->bindValue(':username', $username);
	$statement->execute();

	$results = $statement->fetch();
	$statement->closeCursor();

	return $results;
}

function getMove($moveName)
{
	global $db;

	$query = "SELECT * FROM move WHERE move_name = :moveName";
	$statement = $db->prepare($query);
	$statement->bindValue(':moveName', $moveName);
	$statement->execute();

	$results = $statement->fetch();
	$statement->closeCursor();

	return $results;
}
