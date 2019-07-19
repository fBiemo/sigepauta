<?php
/**
 * Created by PhpStorm.
 * User: Raimundo Jose
 * Date: 6/30/2018
 * Time: 7:03 AM
 */

require_once './src/dbconf/getConection.php';

/**
 * Class MannagerController
 */
class MannagerController {

    /**
     * @var
     */
    private $conn;

    /**
     * MannagerController constructor.
     */
    function __construct(){}

    /**
     * @param $descricao
     * @return string
     */
    public function create($descricao){
        $this->conn = new mySQLConnection();

        $query = "INSERT INTO actividade (descricao) VALUE (?)";
//        $stmt = mysqli_prepare($this->conn->openConection(),$query);
//        $result = mysqli_stmt_bind_param($stmt,'s',$descricao);

        $query_new_create = mysqli_query($this->conn->openConection(),$query);
        if($query_new_create){
            echo 'Actividade Criada com sucesso.' ;
               
        }else{
            echo 'Encontramos problemas ao Criar a actividade';
        }
        
        $this->conn->closeDatabase();

    }

}