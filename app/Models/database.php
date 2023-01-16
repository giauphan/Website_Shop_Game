<?php
namespace App\Models; 

use App\Models\Model;
use PDO;
use PDOException;
class database extends Model
{
    protected  $host = DB_HOST;
    protected  $user = DB_USER;
    protected  $password = DB_PASSWORD;
    protected  $dbname = DB_NAME;
    public $erro;
    
    public function __construct()
    {
        $this->pdo_get_connection();
 
    }
    // public function connect()
    // {
    //     $conn = new mysqli($this->host, $this->user, $this->password, $this->dbname);

    //     mysqli_set_charset($conn, 'UTF8');

    //     // Check connection

    //     if ($conn->connect_errno) {
    //         $this->erro =  "Failed to connect to MySQL: " . $conn->connect_error;

    //         exit();
    //     } else {

    //         $this->erro  = "";
    //     }

    //     return $conn;
    // }
    /**

     * Mở kết nối đến CSDL sử dụng PDO

     */

    public function pdo_get_connection()
    {
        $conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbname . ';charset=utf8', $this->user, $this->password);

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $conn;
    }

    /**

     * Thực thi câu lệnh sql thao tác dữ liệu (INSERT, UPDATE, DELETE)

     * @param string $sql câu lệnh sql

     * @param array $args mảng giá trị cung cấp cho các tham số của $sql

     * @throws PDOException lỗi thực thi câu lệnh

     */
    public function pdo_execute($sql)
    {

        $sql_args = array_slice(func_get_args(), 1);

        try {

            $conn = $this->pdo_get_connection();

            $stmt = $conn->prepare($sql);

            $stmt->execute($sql_args);
        } catch (PDOException $e) {

            throw $e;
        } finally {

            unset($conn);
        }
    }
    public function pdo_execute_return_lastinsert($sql)
    {

        $sql_args = array_slice(func_get_args(), 1);

        try {

            $conn = $this->pdo_get_connection();

            $stmt = $conn->prepare($sql);

            $stmt->execute($sql_args);

            return $conn->lastInsertId();
        } catch (PDOException $e) {

            throw $e;
        } finally {

            unset($conn);
        }
    }

    /**

     * Thực thi câu lệnh sql truy vấn dữ liệu (SELECT)

     * @param string $sql câu lệnh sql

     * @param array $args mảng giá trị cung cấp cho các tham số của $sql

     * @return array mảng các bản ghi

     * @throws PDOException lỗi thực thi câu lệnh

     */

    public function pdo_query($sql)
    {

        $sql_args = array_slice(func_get_args(), 1);

        try {

            $conn = $this->pdo_get_connection();

            $stmt = $conn->prepare($sql);

            $stmt->execute($sql_args);

            $rows = $stmt->fetchAll();

            return $rows;
        } catch (PDOException $e) {

            throw $e;
        } finally {

            unset($conn);
        }
    }

    /**

     * Thực thi câu lệnh sql truy vấn một bản ghi

     * @param string $sql câu lệnh sql

     * @param array $args mảng giá trị cung cấp cho các tham số của $sql

     * @return array mảng chứa bản ghi

     * @throws PDOException lỗi thực thi câu lệnh

     */

    public function pdo_query_one($sql)
    {

        $sql_args = array_slice(func_get_args(), 1);

        try {

            $conn = $this->pdo_get_connection();

            $stmt = $conn->prepare($sql);

            $stmt->execute($sql_args);

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            return $row;
        } catch (PDOException $e) {

            throw $e;
        } finally {

            unset($conn);
        }
    }



    /**

     * Thực thi câu lệnh sql truy vấn một giá trị

     * @param string $sql câu lệnh sql

     * @param array $args mảng giá trị cung cấp cho các tham số của $sql

     * @return giá trị

     * @throws PDOException lỗi thực thi câu lệnh

     */

    public function pdo_query_value($sql)
    {

        $sql_args = array_slice(func_get_args(), 1);

        try {

            $conn = $this->pdo_get_connection();

            $stmt = $conn->prepare($sql);

            $stmt->execute($sql_args);

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            return array_values($row)[0];
        } catch (PDOException $e) {

            throw $e;
        } finally {

            unset($conn);
        }
    }
    public function __destruct()
    {
        $this->pdo_get_connection();
     
    }
}
