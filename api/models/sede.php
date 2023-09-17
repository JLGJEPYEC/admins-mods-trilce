<?php
    class sedeModel extends  Conexion{
        //$pdo = new Conexion();
        

        public function getSede(){
            $pdo = new Conexion();
            $sql = $pdo->prepare("SELECT * FROM sede");
			$sql->execute();
			return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getSedeByID($id){
            $pdo = new Conexion();
            $sql = $pdo->prepare("SELECT * FROM sede WHERE id_sede=?");
			$sql->bindValue(1, $id);
			$sql->execute();
            $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

            if(!$resultado)
                throw new Exception("error");
            
			return $resultado;
        }


        public function insertSede($ns, $direccion, $distrito){
            $pdo = new Conexion();
            $sql = "INSERT INTO sede (nombre_sede,direccion, distrito)
                    VALUES(?,?,?)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $ns);
            $stmt->bindValue(2, $direccion);
            $stmt->bindValue(3, $distrito);
            $stmt->execute();
            $dniPost = $pdo->lastInsertId();
            return $dniPost; 
        }

        public function updateSede($id,$ns, $direccion, $distrito){
            
            $pdo = new Conexion();
            $sql = "UPDATE sede SET nombre_sede=?,direccion=?,distrito=?
                                WHERE id_sede=?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $ns);
            $stmt->bindValue(2, $direccion);
            $stmt->bindValue(3, $distrito);
            $stmt->bindValue(4, $id);
            $stmt->execute();


            $dniPost = 0;
            return $dniPost; 
            
        }

        public function deleteSede ($id){
            $pdo = new Conexion();

            if($this->getSedeByID($id)){
                
                $sql = "DELETE FROM sede WHERE id_sede=?";
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