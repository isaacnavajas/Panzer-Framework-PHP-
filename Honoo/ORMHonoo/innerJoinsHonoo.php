<?php

class InnerJoinsHonoo extends DbHonoo{
    protected $leftTable;
    protected $leftId;

    public function __construct($leftTable, $leftId){
        $this->leftTable = $leftTable;
        $this->leftId = $leftId;
    }
    
    //SELECT * FROM Usuarios INNER JOIN Post ON usuarios_id = Post.Usuario_id
    //Diagrama de Venn: no | yes | no
    public function innerJoin($rightTable, $rightId){
        return "SELECT * FROM {$this->leftTable} INNER JOIN {$rightTable} ON {$this->leftTable}.{$this->leftId} = {$rightTable}.{$rightId}";
    }
    
    //SELECT * FROM Usuarios INNER JOIN Post ON usuarios_id = Post.Usuario_id WHERE post.usuario_id IS NULL
    //Diagrama de Venn: yes | no | no
    public function innerJoinNull($rightTable, $rightId){
        return "SELECT * FROM {$this->leftTable} INNER JOIN {$rightTable} ON {$this->leftTable}.{$this->leftId} = {$rightTable}.{$rightId} WHERE {$rightTable}.{$rightId} IS NULL";
    }
    
    //SELECT * FROM Usuarios LEFT JOIN Post ON usuarios_id = Post.Usuario_id
    //Diagrama de Venn: yes | yes | no
    public function leftJoinUnion($rightTable, $rightId){
        return "SELECT * FROM {$this->leftTable} LEFT JOIN {$rightTable} ON {$this->leftTable}.{$this->leftId} = {$rightTable}.{$rightId} UNION SELECT * FROM {$this->leftTable} RIGHT JOIN {$rightTable} ON {$this->leftTable}.{$this->leftId} = {$rightTable}.{$rightId}";
    }

    //SELECT * FROM Usuarios LEFT JOIN Post ON usuarios_id = Post.Usuario_id UNION SELECT * FROM Usuarios RIGHT JOIN Post ON usuarios_id = Post.Usuario_id
    //Diagrama de Venn: yes | yes | yes
    public function leftJoinNullUnion($rightTable, $rightId){
        return "SELECT * FROM {$this->leftTable} LEFT JOIN {$rightTable} ON {$this->leftTable}.{$this->leftId} = {$rightTable}.{$rightId} WHERE {$rightTable}.{$rightId} IS NULL UNION SELECT * FROM {$this->leftTable} RIGHT JOIN {$rightTable} ON {$this->leftTable}.{$this->leftId} = {$rightTable}.{$rightId} WHERE {$rightTable}.{$rightId} IS NULL";
    }
}


/*
* Ejemplo de innerJoinsHonoo con dbHonoo:
*
*
* tiene que devolver un array para executeQuery
*
* require_once './Lodge/ORMHonoo/DbBHonoo.php';
* require_once './Lodge/ORMHonoo/InnerJoinsHonoo.php';
* $db = new DbHonoo();
* $innerJoinsHonoo = new InnerJoinsHonoo('Usuarios', 'usuarios_id');
* $query = $innerJoinsHonoo->innerJoin('Post', 'Usuario_id');
* $result = $db->executeQuery($query);
* private function executeQuery($query) {
*     $result = $this->conn->query($query);
*     if (!$result) {
*         //Si ocurre un error, devolver un array con el mensaje de error
*         return ['error' => "Error al ejecutar la consulta: " . $this->conn->error];
*     }
*     $rows = [];
*     while ($row = $result->fetch_assoc()) {
*         //Guardar los valores de usuarios_id y nombre_post en el array $rows
*         $rows[] = [
*             'usuarios_id' => $row['usuarios_id'],
*             'nombre_post' => $row['nombre_post']
*         ];
*     }
*     return $rows;
* }
*/


/*
* Ejemplo de innerJoinsHonoo:
*
*
* $innerJoin = new InnerJoin('Usuarios', 'usuarios_id');
*
* Ejemplo: SELECT * FROM Usuarios INNER JOIN Post ON usuarios_id = Post.Usuario_id
* $query1 = $innerJoin->innerJoin('Post', 'Usuario_id');
* echo $query1 . "<br>";
*
* Ejemplo: SELECT * FROM Usuarios INNER JOIN Post ON usuarios_id = Post.Usuario_id WHERE post.usuario_id IS NULL
* $query2 = $innerJoin->innerJoinNull('Post', 'Usuario_id');
* echo $query2 . "<br>";
*
* Ejemplo: SELECT * FROM Usuarios LEFT JOIN Post ON usuarios_id = Post.Usuario_id
* $query3 = $innerJoin->leftJoinUnion('Post', 'Usuario_id');
* echo $query3 . "<br>";
*
* Ejemplo: SELECT * FROM Usuarios LEFT JOIN Post ON usuarios_id = Post.Usuario_id UNION SELECT * FROM Usuarios RIGHT JOIN Post ON usuarios_id = Post.Usuario_id
* $query4 = $innerJoin->leftJoinNullUnion('Post', 'Usuario_id');
* echo $query4 . "<br>";
*/






