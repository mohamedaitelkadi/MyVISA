<?php
require (MODELS."/connexion.php");
class User extends connection{
    public $id_user;
    public $nom;
    public $prenom;


    public function read(){
        $sql = "SELECT * FROM user";
        $req = mysqli_query($this->connect(),$sql);
        return $req;
    }


    public function readOne($id_user)
    {
        $sql = "SELECT * FROM user WHERE id_user = '$id_user'";
        $req = mysqli_query($this->connect(),$sql);

        $row  = mysqli_fetch_assoc($req);

            $this->id_user = $row['id_user'];
            $this->nom = $row['nom'];
            $this->prenom = $row['prenom']; 
    }


    public function insert()
    {

        $sql = "INSERT INTO user (id_user,nom,prenom) VALUES ('$this->id_user','$this->nom','$this->prenom')";
        $req = mysqli_query($this->connect(),$sql);
        return true;
    }

    public function remove($id_user)
    {
        $sql = "DELETE FROM user WHERE id_user = $id_user";
        $req = mysqli_query($this->connect(),$sql);
        return true;
    }

}

?>