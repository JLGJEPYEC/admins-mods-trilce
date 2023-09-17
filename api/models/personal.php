<?php
    class PersonalModel extends  Conexion{
        //$pdo = new Conexion();
        

        public function getPersonal(){
            $pdo = new Conexion();
            $sql = $pdo->prepare("SELECT * FROM personal");
			$sql->execute();
			return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getPersonalByDNI($dni){
            $pdo = new Conexion();
            $sql = $pdo->prepare("SELECT * FROM personal WHERE dni=?");
			$sql->bindValue(1, $dni);
			$sql->execute();
            $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

            if(!$resultado)
                throw new Exception("error");
            
			return $resultado;
        }


        public function insertPersonalWithAM($dni, $nombre, $app, 
                                        $apm, $ep, $tlf, $tipo, 
                                        $iam, $s, $b, $dist)
                                        {
            $pdo = new Conexion();
            $sql = "INSERT INTO personal VALUES(?,?,?,?,?,?,?,?,?,?,?)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $dni);
            $stmt->bindValue(2, $nombre);
            $stmt->bindValue(3, $app);
            $stmt->bindValue(4, $apm);
            $stmt->bindValue(5, $ep);
            $stmt->bindValue(6, $tlf);
            $stmt->bindValue(7, $tipo);
            $stmt->bindValue(8, $iam);
            $stmt->bindValue(9, $s);
            $stmt->bindValue(10, $b);
            $stmt->bindValue(11, $dist);
            $stmt->execute();
            $dniPost = $pdo->lastInsertId();
            return $dniPost; 
        }


        public function insertPersonalWithoutAM($dni, $nombre, $app, 
                                        $apm, $ep, $tlf, $tipo, 
                                        $s, $b, $dist)
                                        {
            $pdo = new Conexion();
            $sql = "INSERT INTO personal (dni,nombre,appaterno,apmaterno,
            email_personal,telefono,tipo_personal,sueldo,
            banco,distrito_res)
            VALUES(?,?,?,?,?,?,?,?,?,?)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $dni);
            $stmt->bindValue(2, $nombre);
            $stmt->bindValue(3, $app);
            $stmt->bindValue(4, $apm);
            $stmt->bindValue(5, $ep);
            $stmt->bindValue(6, $tlf);
            $stmt->bindValue(7, $tipo);
            $stmt->bindValue(8, $s);
            $stmt->bindValue(9, $b);
            $stmt->bindValue(10, $dist);
            $stmt->execute();
            $dniPost = $pdo->lastInsertId();
            return $dniPost; 
        }

        public function updatePersonalwithAM($dni, $nombre, $app, 
                                            $apm, $ep, $tlf, $tipo, 
                                            $iam, $s, $b, $dist){
            
            $pdo = new Conexion();
            $sql = "UPDATE personal SET nombre=?,appaterno=?, 
                                    apmaterno=?,email_personal=?,
                                    telefono=?,tipo_personal=?, 
                                    admin_mod=?,sueldo=?,
                                    banco=?,distrito_res=?
                                WHERE dni=?";
            $stmt = $pdo->prepare($sql);
            
            $stmt->bindValue(1, $nombre);
            $stmt->bindValue(2, $app);
            $stmt->bindValue(3, $apm);
            $stmt->bindValue(4, $ep);
            $stmt->bindValue(5, $tlf);
            $stmt->bindValue(6, $tipo);
            $stmt->bindValue(7, $iam);
            $stmt->bindValue(8, $s);
            $stmt->bindValue(9, $b);
            $stmt->bindValue(10, $dist);
            $stmt->bindValue(11, $dni);
            $stmt->execute();


            $dniPost = 0;
            return $dniPost; 
            
        }

        public function updatePersonalwithoutAM($dni, $nombre, $app, 
                                                $apm, $ep, $tlf, $tipo, 
                                                $s, $b, $dist){
            
            $pdo = new Conexion();
            $sql = "UPDATE personal SET nombre=?,appaterno=?, 
                                    apmaterno=?,email_personal=?,
                                    telefono=?,tipo_personal=?, 
                                    sueldo=?,
                                    banco=?,distrito_res=?
                                WHERE dni=?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $nombre);
            $stmt->bindValue(2, $app);
            $stmt->bindValue(3, $apm);
            $stmt->bindValue(4, $ep);
            $stmt->bindValue(5, $tlf);
            $stmt->bindValue(6, $tipo);
            $stmt->bindValue(7, $s);
            $stmt->bindValue(8, $b);
            $stmt->bindValue(9, $dist);
            $stmt->bindValue(10, $dni);
            $stmt->execute();


            $dniPost = 0;
            return $dniPost; 
            
        }


        public function deletePersonal ($dni){
            $pdo = new Conexion();

            if($this->getPersonalByDNI($dni)){
                
                $sql = "DELETE FROM personal WHERE dni=?";
                $stmt = $pdo->prepare($sql);
                $stmt->bindValue(1,$dni );
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