<?php
class InsertInDatabase
{
  public function insert($table, $data)
  {
    $columns = array_keys($data);
    $values = array_values($data);
    $columns = implode(', ', $columns);
    $values = implode(', ', $values);
    $sql = "INSERT INTO $table ($columns) VALUES ($values)";
    return $sql;
  }

  public function insertMultiple($table, $data)
  {
    $columns = array_keys($data[0]);
    $columns = implode(', ', $columns);
    $sql = "INSERT INTO $table ($columns) VALUES ";
    foreach ($data as $row) {
      $values = array_values($row);
      $values = implode(', ', $values);
      $sql .= "($values), ";
    }
    $sql = rtrim($sql, ', ');
    return $sql;
  }

  public function insertMultipleWithId($table, $data)
  {
    $columns = array_keys($data[0]);
    $columns = implode(', ', $columns);
    $sql = "INSERT INTO $table ($columns) VALUES ";
    foreach ($data as $row) {
      $values = array_values($row);
      $values = implode(', ', $values);
      $sql .= "($values), ";
    }
    $sql = rtrim($sql, ', ');
    $sql .= " ON DUPLICATE KEY UPDATE id=LAST_INSERT_ID(id)";
    return $sql;
  }
}

$insertInDatabase = new InsertInDatabase();
