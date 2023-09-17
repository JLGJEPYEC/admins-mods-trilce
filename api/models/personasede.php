<?php
class PersonaSedeModel extends Conexion
{
    //$pdo = new Conexion();




    public function getPersonaSede()
    {
        $pdo = new Conexion();
        $innerjoin = "select id_rps, personal.dni, personal.nombre," .
            "personal.appaterno, personal.apmaterno, personal.tipo_personal," .
            "sede.nombre_sede,sede.direccion,sede.distrito " .
            "from relacion_personal_sede " .
            "inner join personal " .
            "on personal.dni=relacion_personal_sede.personal_id " .
            "inner join sede " .
            "on sede.id_sede=relacion_personal_sede.local_id";
        $sql = $pdo->prepare($innerjoin);
        $sql->execute();

        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPersonaSedebyId($dni)
    {
        $pdo = new Conexion();
        $innerjoin = "select id_rps, personal.dni, personal.nombre," .
            "personal.appaterno, personal.apmaterno, personal.tipo_personal," .
            "sede.nombre_sede,sede.direccion,sede.distrito " .
            "from relacion_personal_sede " .
            "inner join personal " .
            "on personal.dni=relacion_personal_sede.personal_id " .
            "inner join sede " .
            "on sede.id_sede=relacion_personal_sede.local_id";
        $wheredni = " where personal.dni = ?";
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