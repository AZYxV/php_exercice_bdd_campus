<?php

class users
{

    public function getUser($id = null)
    {
        $where = " WHERE 1=1";
        if ($id != null)
        {
            $where .= "AND id =".$id;
        }
        $i = 0;
        $data = [];
        foreach (bdd::getInstance()->query("SELECT * FROM users".$where) as $membre)
        {
            $data[$i] =  $membre;
            $i++;
        }
        return $data;
    }

    public function addUsers($pseudo, $email, $password, $anniversaire)
    {
        bdd::getInstance()->query("INSERT INTO users (pseudo, email, password, birthday, avatar, jeton, paiementRef, parentalControl) VALUES ('$pseudo', '$email', '$password', '$anniversaire', 'avatar', 0, 0, 0)");
            return true;
    }

    public function deleteUsers($id)
    {
        bdd::getInstance()->query("DELETE FROM users WHERE id = ".$id);
        return true;
    }

    public function updateUsers($id, $fields)
    {
        $sql = "UPDATE users SET ";
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