<?php
/**
 * @author     Martin Høgh <mh@mapcentia.com>
 * @copyright  2013-2019 MapCentia ApS
 * @license    http://www.gnu.org/licenses/#AGPL  GNU AFFERO GENERAL PUBLIC LICENSE 3
 *
 */

namespace app\models;

use app\inc\Model;

class Keyvalue extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function get($key): array
    {
        $response = [];
        $sql = "SELECT * FROM settings.key_value WHERE key=:key";
        try {
            $res = $this->prepare($sql);
            $res->execute(["key" => $key]);
        } catch (\PDOException $e) {
            $response['success'] = false;
            $response['message'] = $e->getMessage();
            $response['code'] = 401;
            return $response;
        }
        $response["data"] = $this->fetchRow($res, "assoc");;
        $response["success"] = true;
        return $response;
    }

    public function insert($key, $json): array
    {
        $response = [];
        $sql = "INSERT INTO settings.key_value(key, value) VALUES (:key, :value) RETURNING *";
        try {
            $res = $this->prepare($sql);
            $res->execute(["key" => $key, "value" => $json]);
        } catch (\PDOException $e) {
            $response['success'] = false;
            $response['message'] = $e->getMessage();
            $response['code'] = 401;
            return $response;
        }
        $response["data"] = $this->fetchRow($res, "assoc");
        $response["success"] = true;
        return $response;
    }

    public function update($key, $json): array
    {
        $response = [];
        $sql = "UPDATE settings.key_value SET value=:value WHERE key=:key RETURNING *";
        try {
            $res = $this->prepare($sql);
            $res->execute(["key" => $key, "value" => $json]);
        } catch (\PDOException $e) {
            $response['success'] = false;
            $response['message'] = $e->getMessage();
            $response['code'] = 401;
            return $response;
        }
        $response["data"] = $this->fetchRow($res, "assoc");
        $response["success"] = true;
        return $response;
    }

    public function delete($key): array
    {
        $response = [];
        $sql = "DELETE FROM settings.key_value WHERE key=:key";
        try {
            $res = $this->prepare($sql);
            $res->execute(["key" => $key]);
        } catch (\PDOException $e) {
            $response['success'] = false;
            $response['message'] = $e->getMessage();
            $response['code'] = 401;
            return $response;
        }
        $response["success"] = true;
        $response["data"] = $key;
        return $response;
    }
}