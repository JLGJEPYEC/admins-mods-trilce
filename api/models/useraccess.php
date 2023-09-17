<?php
    class UserAccessModel extends Conexion{
        //$pdo = new Conexion();


        public function getUsers()
        {
            $pdo = new Conexion();
            $innerjoin = "SELECT user.personal_dni, personal.nombre,".
                            "personal.appaterno, personal.apmaterno,".
                            "user.email_generado, user.pass,".
                            "user.personal_admin_mod ".
                            "from user inner join personal ".
                            "on user.personal_dni = personal.dni";
            $sql = $pdo->prepare($innerjoin);
            $sql->execute();

            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getUsersByDNI($dni)
        {
            $pdo = new Conexion();
            $innerjoin = "SELECT user.personal_dni, personal.nombre,".
                            "personal.appaterno, personal.apmaterno,".
                            "user.email_generado, user.pass,".
                            "user.personal_admin_mod ".
                            "from user inner join personal ".
                            "on user.personal_dni = personal.dni ";
            $wheredni = "where personal.dni = ?";
            $sql = $pdo->prepare($innerjoin.$wheredni);
            $sql->bindValue(1, $dni);
            $sql->execute();
            $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

            if (!$resultado)
                throw new Exception("error");

            return $resultado;
        }
    }

?>