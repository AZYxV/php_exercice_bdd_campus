<?php

class games
{

    public function getGame($id = null)
    {
        $where = " WHERE 1=1";
        if ($id != null)
        {
            $where .= "AND id =".$id;
        }
        $i = 0;
        $data = [];
        foreach (bdd::getInstance()->query("SELECT * FROM games".$where) as $membre)
        {
            $data[$i] =  $membre;
            $i++;
        }
        return $data;
    }

    public function addGame($name, $max_players, $board_id, $min_age, $max_age)
    {
        bdd::getInstance()->query("INSERT INTO games (name, max_players, board_id, min_age, max_age) VALUES ('$name', '$max_players', '$board_id', '$min_age', '$max_age')");
            return true;
    }

    public function deleteGame($id)
    {
        bdd::getInstance()->query("DELETE FROM games WHERE id = ".$id);
        return true;
    }

    public function updateGame($id, $fields)
    {
        $sql = "UPDATE games SET ";
        $updates = array();

        foreach ($fields as $key => $value) {
            $updates[] = "$key = :$key";
        }

        $sql .= implode(", ", $updates);
        $sql .= " WHERE id = :id";

        bdd::getInstance()->query($sql);
        return true;
    }


}