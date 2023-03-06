<?php

class Config
{
    public $Host = "localhost";
    public $USERNAME = "root";
    public $PASS = "";
    public $DB_NAME = "movie";
    public $PRODUCT_TABLE = "booking";
    

    public $conn;

    public function Connect()
    {
        $this->conn = mysqli_connect($this->Host, $this->USERNAME, $this->PASS, $this->DB_NAME);
    }

    public function insert($Movie_Name, $Seat_No,$Movie_language,$price)
    {
        $this->Connect();

        $query = "INSERT INTO $this->PRODUCT_TABLE(Movie_Name, Seat_No,Movie_language,price) VALUES('$Movie_Name', $Seat_No,'$Movie_language',$price);";

        $res = mysqli_query($this->conn, $query);

        return $res; // bool return 
    }

    public function fetchAllRecord()
    {
        $this->Connect();

        $query = "SELECT * FROM $this->PRODUCT_TABLE";

        $res = mysqli_query($this->conn, $query);

        return $res;
    }
    public function fetch_single_record($id)
    {
        $this->Connect();

        $query = "SELECT * FROM $this->PRODUCT_TABLE WHERE id=$id;";

        $res = mysqli_query($this->conn, $query);

        return $res;
    }
    public function delete($id)
    {
        $this->Connect();

        $query = "DELETE FROM $this->PRODUCT_TABLE WHERE id=$id;";

        $res = mysqli_query($this->conn, $query);

        return $res;
    }

    public function update($Movie_Name, $Seat_No, $Movie_language, $price, $id)
    {
        $this->Connect();

        $fetch_res = $this->fetch_single_record($id);

        $record = mysqli_fetch_array($fetch_res);

        if ($record) {
            $query = "UPDATE $this->PRODUCT_TABLE SET Movie_Name='$Movie_Name', Seat_No=$Seat_No, Movie_language='$Movie_language',price=$price WHERE id=$id;";

            $res = mysqli_query($this->conn, $query);

            return $res; // bool return 
        } else {
            return false;
        }

    }


}

?>