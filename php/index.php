<?php

require ('./DBI.php');
require ('./DAO_USERS.php');
require ('./DAO_GAMES.php');

$dao_users = new users();
$dao_games = new games();

print_r( $dao_users->addUsers("nathanlethug", "nathdfdfdan@test.fr", "password", "2000-08-18"));
print_r( $dao_games->addGame("Tic Tac Toe", 2, 1, 7, 99));


