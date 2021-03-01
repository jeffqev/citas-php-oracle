<?php
require_once ('conexion.php');

class Methods{

    private $call_sql;

    function Methods($connector){
        $this->call_sql = $connector->connect();
    }

    function execute($command){

        try{
            $statement = $this->call_sql->prepare("$command");
            $statement->execute();
        }catch (Exception $e){

            echo ("<script>Alert('Error de ingreso de datos $e')</script>");
        }
        
              
    }
  
    function read($command){
        $statement = $this->call_sql->prepare("$command");
        $statement->execute();
                $row = $statement->fetchAll();
        return $row;
    }

     function read2($command){
        $statement = $this->call_sql->prepare("$command");
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);     
        return $row;
    }
    
    function general_list($command, $tablename, $class)
    {
        $table2 = $tablename;
        $table2 = str_replace('GMSTORE.', '', $table2);
        $statement = $this->call_sql->prepare("Select column_name from ALL_TAB_COLUMNS WHERE OWNER='GMSTORE' AND TABLE_NAME='$table2'");
        $statement->execute();
        $statement2 = $this->call_sql->prepare("$command");
        $statement2->execute();

        echo "<table class=$class>";
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            echo '<th>' .$row['COLUMN_NAME'].'</th>';        
        }

        while ($row2 = $statement2->fetch(PDO::FETCH_BOTH)) {
            echo '<tr>';
            for ($i=0; $i < (count($row2)/2); $i++) { 
                echo '<td>' . $row2[$i] . '</td> ';
            }
            echo '</tr>';
        }
        echo "</table>";
     
    }

    function Get_columns($tablename){
        $statement = $this->call_sql->prepare("Select column_name from ALL_TAB_COLUMNS WHERE OWNER='GMSTORE' AND TABLE_NAME='$tablename' order by column_name");
        $statement->execute();
        $columns;
        $counter = 0;
        while ($row = $statement->fetch(PDO::FETCH_BOTH)) {
            for ($i=0; $i < (count($row)/2); $i++) { 
                $columns[$counter] = $row[$i];
            }
            $counter += 1;
        }
        return $columns;
    }

    function Commit(){
        $statement = $this->call_sql->prepare("EXECUTE GMSTORE.COMM;");
        $statement->execute();
    }

    function Get_name($command){
        $statement = $this->call_sql->prepare("$command");
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_BOTH);
        return $row[0];
    }

    function Get_role($id){
        $statement = $this->call_sql->prepare("select USUARIO_ROLE from GMSTORE.USUARIO WHERE USUARIO_ID='".$id."'");
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_BOTH);
        return $row[0];
    }

    function Get_numcon(){
        $statement = $this->call_sql->prepare("select GMSTORE.numconec.nextval from dual");
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_BOTH);
        return (string)$row[0];
    }

}



?>