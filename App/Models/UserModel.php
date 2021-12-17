<?php

class UserModel extends BDD
{

    private $pdo;

    public function __construct() {
        $this->pdo = $this->connect();
    }

    public function exists($mail) {
        $sql = "select * from users
                    where mail = :email";

        $req = $this->pdo->prepare($sql);
        $req->bindParam(':email', $mail);
        $req->execute();

        $row = $req->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    /**
     * @param int $limit
     * @return array
     */
    public function findAll($limit = 1000) {
        $sql = "select * from users limit {$limit}";

        $req = $this->pdo->prepare($sql);
        $req->execute();

        while ($row = $req->fetch(PDO::FETCH_ASSOC)) {

            $user = new User();
            $user->setId($row['id_user']);
            $user->setNom($row['nom']);
            $user->setPrenom($row['prenom']);
            $user->setMail($row['mail']);
            $user->setType($row['type']);
            $user->setPassword($row['password']);

            $users[] = $user;
        }

        return $users;
    }

    public function find($mail) {
        $sql = "select * from users
                    where mail = :email";

        $req = $this->pdo->prepare($sql);
        $req->bindParam(':email', $mail);
        $req->execute();

        $row = $req->fetch(PDO::FETCH_ASSOC);
        $user = new User();

        $user->setId($row['id_user']);
        $user->setNom($row['nom']);
        $user->setPrenom($row['prenom']);
        $user->setMail($row['mail']);
        $user->setType($row['type']);
        $user->setPassword($row['password']);

        return $user;
    }

    public function create($nom, $prenom, $mail, $hash) {
        $sql = "insert into users (nom, prenom, mail, password, type) values (:nom, :prenom, :mail, :hash, 'user')";

        $req = $this->pdo->prepare($sql);
        $req->bindParam(':nom', $nom);
        $req->bindParam(':prenom', $prenom);
        $req->bindParam(':mail', $mail);
        $req->bindParam(':hash', $hash);
        return $req->execute();
    }
}