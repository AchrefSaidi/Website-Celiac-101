<?php
include_once 'autoload.php';

class Repository
{
    public $bd;
    public $tableName;
    public function __construct($tableName)
    {
        $this->tableName = $tableName;
        $this->bd = ConnexionBD::getInstance();
    }

    public function findBy($criterias)
    {
        reset($criterias);
        $first_key = key($criterias);
        $request = "select * from " . $this->tableName . " Where " . $first_key . "= ?  ";

        foreach (array_slice($criterias, 1) as $key => $value) {
            $request = $request . " and  " . $key . " = ?";
        }
        $response = $this->bd->prepare($request);
        $i = 1;
        foreach ($criterias as $criteria) {
            $response->bindValue($i, $criteria);
            $i++;
        }
        $response->execute();

        return $response->fetchAll(PDO::FETCH_ASSOC);
    }
    public function findOneBy($criterias)
    {
        reset($criterias);
        $first_key = key($criterias);
        $request = "select * from " . $this->tableName . " Where " . $first_key . "= ?  ";

        foreach (array_slice($criterias, 1) as $key => $value) {
            $request = $request . " and  " . $key . " = ?";
        }
        $response = $this->bd->prepare($request);
        $i = 1;
        foreach ($criterias as $criteria) {
            $response->bindValue($i, $criteria);
            $i++;
        }
        $response->execute();

        return $response->fetch(PDO::FETCH_ASSOC);
    }
    public function findByNumbered($criterias, $limit, $offset)
    {
        $result = $this->findBy($criterias);
        $start = $offset;
        if ($limit >= count($result)) {
            $limit = count($result);
        }

        $end = $offset + $limit - 1;
        if ($offset > count($result)) {
            return null;
        }

        for ($i = 0; $i <= $end - $start; $i++) {
            $final[$i] = $result[$i + $start];
        }
        return $final;
    }
    public function findAll()
    {
        $request = "select * from " . $this->tableName;
        $response = $this->bd->prepare($request);
        $response->execute();
        return $response->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findOne()
    {
        $request = "select * from " . $this->tableName;
        $response = $this->bd->prepare($request);
        $response->execute();
        return $response->fetch(PDO::FETCH_ASSOC);
    }

    public function getRandomId()
    {
        $random = random_int(1, 2147483647);
        $result = $this->findOneBy('id', $random);
        if ($result) {
            $random = random_int(1, 2147483647);
        }
        return $random;
    }
    public function insert($criterias)
    {
        reset($criterias);
        $first_key = key($criterias);
        $list = $first_key;
        $values = '?';
        foreach (array_slice($criterias, 1) as $key => $value) {
            $list = $list . ',' . $key;
            $values = $values . ',' . '?';
        }
        $request = "insert into  " . $this->tableName . " (" . $list . ") values (" . $values . ")";
        $response = $this->bd->prepare($request);
        $i = 1;
        foreach ($criterias as $key => $criteria) {
            if ($key == 'id') {
                $response->bindValue($i, $this->getRandomId());
                $i++;
            } else {
                $response->bindValue($i, $criteria);
                $i++;
            }
        }
        $response->execute();
        return $this->bd->lastInsertId();
    }
    public function update($criterias)
    {
        $request = "update " . $this->tableName . " set " . array_key_first($criterias['value']) . "=?";
        foreach (array_slice($criterias['value'], 1) as $keyValue => $criteriaValue) {
            $request = $request . " , " . $keyValue . " = ?";
        }
        $request = $request . " where " . array_key_first($criterias['where']) . "=?";
        foreach (array_slice($criterias['where'], 1) as $keyWhere => $criteriaWhere) {
            $request = $request . " and where  " . $keyWhere . " = ?";
        }
        $response = $this->bd->prepare($request);
        $i = 1;
        foreach ($criterias['value'] as $keyValue => $criteriaValue) {
            $response->bindValue($i, $criteriaValue);
            $i++;
        }
        foreach ($criterias['where'] as $keyValue => $criteriaWhere) {
            $response->bindValue($i, $criteriaWhere);
            $i++;
        }
        $response->execute();
    }
    public function max($criteria)
    {
        $request = 'SELECT MAX(' . $criteria . ') FROM ' . $this->tableName;
        $response = $this->bd->prepare($request);
        $response->execute();
        return $response->fetchColumn();
    }
    public function min($criteria)
    {
        $request = 'SELECT MIN(' . $criteria . ') FROM ' . $this->tableName;
        $response = $this->bd->prepare($request);
        $response->execute();
        return $response->fetchColumn();
    }
    public function latest()
    {
        $request = 'SELECT * FROM '.$this->tableName.' ORDER BY date DESC LIMIT 0,3';
        $response = $this->bd->prepare($request);
        $response->execute();
        return $response->fetchAll(PDO::FETCH_ASSOC);
    }
   public function delete($criteria){
       $request='DELETE FROM '.$this->tableName.' WHERE '.array_key_first($criteria) .' = ?';
       $response = $this->bd->prepare($request);
       $response->bindValue(1,$criteria[array_key_first($criteria)]);
       $response->execute();
   }
  
}
