<?php
$connection = mysqli_connect("localhost", "root", "", "library");

if (!$connection) {
    die("No connection established");
}

function insert_func($table, $detail, $connection)
{
    $tableVal = array_keys($detail);
    $values  = array_values($detail);

    $tablecolumn = implode(",", $tableVal);
    $tablevalues = implode("', '", $values);
    $que = "INSERT INTO $table($tablecolumn) VALUES('$tablevalues')";
    if (!mysqli_query($connection, $que)) {
        return false;
    }
}
function delete_func($table, $del_id, $connection)
{
    $del_que = "DELETE FROM $table WHERE id = $del_id";
    if (!mysqli_query($connection, $del_que)) {
        die();
    }
}
function delete_where_fun($table, $del_col, $del_id, $connection){
    $del_where_que = "DELETE FROM $table WHERE $del_col = $del_id";
    if (!mysqli_query($connection, $del_where_que)) {
        die();
    }
}



function select_all($table, $connection)
{
    $select_que = "SELECT * FROM $table";
    $res = mysqli_query($connection, $select_que);
    if (mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
            $data[] = $row;
        }
        return $data;
    } else {
        return false;
    }
}
function select_where($table, $column, $select_id, $connection, $data_repeat)
{
    $selective = "SELECT * FROM $table WHERE $column = $select_id";

    $que_res = mysqli_query($connection, $selective);

    if (mysqli_num_rows($que_res) > 0) {
        while ($row = mysqli_fetch_assoc($que_res)) {
            $data[] = $row;
        }
        if ($data_repeat == 1) {
            $data = array_shift($data);
            return $data;
        } elseif ($data_repeat == 2) {
            return $data;
        }
    }
}

function select_where_string($table, $column, $select_id, $connection, $data_repeat)
{
    $selective = "SELECT * FROM $table WHERE $column = '$select_id'";

    $que_res = mysqli_query($connection, $selective);
    if (mysqli_num_rows($que_res) > 0) {
        while ($row = mysqli_fetch_assoc($que_res)) {
            $data[] = $row;
        }
        if ($data_repeat == 1) {
            $data = array_shift($data);
            return $data;
        } elseif ($data_repeat == 2) {
            return $data;
        }
    }
}


function update($table_name, $fields, $where_condition, $connection)
{
    $query = '';
    $condition = '';
    foreach ($fields as $key => $value) {
        $query .= $key . "='" . $value . "', ";
    }
    $query = substr($query, 0, -2);

    foreach ($where_condition as $key => $value) {
        $condition .= $key . "='" . $value . "' AND ";
    }
    $condition = substr($condition, 0, -5);

    $query = "UPDATE " . $table_name . " SET " . $query . " WHERE " . $condition . "";

    if (!mysqli_query($connection, $query)) {
        return false;
    } else {
        return true;
    }
}
function session_maker($name, $value)
{
    $_SESSION[$name] = $value;
}

function cookie_maker($name, $value)
{
    setcookie($name, $value, time() + (86400 * 30), "/");
}

function new_file_name($name)
{
    $temp = explode(".", $name);
    $newfilename = time() . rand(1,10000) . "." . end($temp);
    return $newfilename;
}