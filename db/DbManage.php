<?php
class DbManage{
    private  $conn;
    public function executeSqlTxt($sqlTxt){
        $this->conn = mysqli_connect("127.0.0.1","root","671183","TPP")
        or die("失败".mysqli_error());
        $result = mysqli_query($this->conn,$sqlTxt);
        return $result;
    }
    public function closeConnection($result){
        mysqli_free_result($result);
        mysqli_close($this->conn);
    }
}