<?php
    class UserModel extends  Conexion{
        //$pdo = new Conexion();
        

        public function getUsers(){
            $pdo = new Conexion();
            $sql = $pdo->prepare("SELECT * FROM user");
			$sql->execute();
			return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getUsersByDNI($id){
            $pdo = new Conexion();
            $sql = $pdo->prepare("SELECT * FROM user WHERE id=?");
			$sql->bindValue(1, $id);
			$sql->execute();
            $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

            if(!$resultado)
                throw new Exception("error");
            
			return $resultado;
        }


        public function insertUser($pdni, $pass, $eg, $pam){
            $pdo = new Conexion();
            $sql = "INSERT INTO user (personal_dni,pass, email_generado,personal_admin_mod)
                    VALUES(?,?,?,?)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $pdni);
            $stmt->bindValue(2, $pass);
            $stmt->bindValue(3, $eg);
            $stmt->bindValue(4, $pam);
            $stmt->execute();
            $dniPost = $pdo->lastInsertId();
            return $dniPost; 
        }

        public function updateUser($id,$pdni, $pass, $eg, $pam){
            
            $pdo = new Conexion();
            $sql = "UPDATE user SET personal_dni=?,pass=?,email_generado=?, 
                                    personal_admin_mod=?
                                WHERE id=?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $pdni);
            $stmt->bindValue(2, $pass);
            $stmt->bindValue(3, $eg);
            $stmt->bindValue(4, $pam);
            $stmt->bindValue(5, $id);
            $stmt->execute();


            $dniPost = 0;
            return $dniPost; 
            
        }

        public function deleteUser ($id){
            $pdo = new Conexion();

            if($this->getUsersByDNI($id)){
                
                $sql = "DELETE FROM user WHERE dni=?";
                $stmt = $pdo->prepare($sql);
                $stmt->bindValue(1,$id );
                $stmt->execute();
                $dniPost = 0;
                
            }else{
                $dniPost = -1;
                throw new Exception("error");
            }
            
            return $dniPost;
        }

    }
?>