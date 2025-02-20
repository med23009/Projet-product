<?php

class Search_modele extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function getSearchResult($tables, $db_columns, $grid_columns, $join_keys, $action, $id_action, $where = '', $result_columns = '',$more_than_one_id = '') {
        $query = "Select distinct ";

        
        if($id_action != '')
        if (!in_array($id_action, $db_columns))
            $query.= $id_action . ", ";

        foreach ($db_columns as $column)
            $query .= $column . ",";
        $query = substr($query, 0, strlen($query) - 1);
        $query .= " from ";
        $index = 0;
        foreach ($tables as $table) {
            $index++;
            $query .= $table . " join ";
            if ($index % 2 == 0) {
                $query = substr($query, 0, strlen($query) - 5);
                $query .= " on " . $join_keys[($index / 2) - 1] . " join ";
                $index++;
            }
        }
        $query = substr($query, 0, strlen($query) - 5);
        $query .= $where;
//        echo $query;
        $res = $this->db->query($query);

        $result = " <table id='table1' class='table table-striped table-bordred table-hover' > <tr>";
        foreach ($grid_columns as $col)
            $result .= "<th>" . $col . "</th>";
        $result . "</tr><tbody id='table1_tbody'>";
      
        if ($result_columns == '')
            $result_columns = $db_columns;
        if ($res->num_rows() >0) {
            $count = 0;
            foreach ($res->result() as $row) {
                $flag = false;
                if($more_than_one_id != null && is_array($more_than_one_id))
                {
                    $flag = true;
                    $id = '';
                    foreach ($more_than_one_id as $one_more_id)
                        $id .= $row->$one_more_id."/";
                }
                elseif($id_action == '')
                {
                    $id_action = $result_columns[0];
                    $id = $row->$id_action;
                }
                else
                    $id = $row->$id_action;
                
                $name = "form" . $count;

                $result .= "<form id=$name method='post' action='$action/$id'  >";
                $result .= "<tr onClick = if(controle())document.forms['$name'].submit(); >";

                for ($i = 0; $i < count($result_columns); $i++) {
                    $colonne=$result_columns[$i]; // add by Med Bakar 22-09-2021
                    $result .= "<td >" . $row->$colonne . " </td>";
                }
                $result .= "</form> </tr>";
                $count++;
            }
        }
        $result .= "</tbody></table>";

        return $result;
    }
    
    function getSearchResult_v2($tables, $db_columns, $grid_columns, $join_keys, $action, $id_action, $where = '', $result_columns = '',$more_than_one_id = '') {
        $query = "Select distinct ";

        
        if($id_action != '')
        if (!in_array($id_action, $db_columns))
            $query.= $id_action . ", ";

        foreach ($db_columns as $column)
            $query .= $column . ",";
        $query = substr($query, 0, strlen($query) - 1);
        $query .= " from ";
        $index = 0;
        foreach ($tables as $table) {
            $index++;
            $query .= $table . " left join ";
            if ($index % 2 == 0) {
                $query = substr($query, 0, strlen($query) - 5);
                $query .= " on " . $join_keys[($index / 2) - 1] . " join ";
                $index++;
            }
        }
        $query = substr($query, 0, strlen($query) - 5);
        $query .= $where;
     return $query;
        $res = $this->db->query($query);

        $result = " <table id='table1' class='table table-striped table-bordred table-hover' > <tr>";
        foreach ($grid_columns as $col)
            $result .= "<th>" . $col . "</th>";
        $result . "</tr><tbody id='table1_tbody'>";
      
        if ($result_columns == '')
            $result_columns = $db_columns;
        if ($res->num_rows() > 0) {
            $count = 0;
            foreach ($res->result() as $row) {
                $flag = false;
                if($more_than_one_id != null && is_array($more_than_one_id))
                {
                    $flag = true;
                    $id = '';
                    foreach ($more_than_one_id as $one_more_id)
                        $id .= $row->$one_more_id."/";
                }
                elseif($id_action == '')
                {
                    $id_action = $result_columns[0];
                    $id = $row->$id_action;
                }
                else
                    $id = $row->$id_action;
                
                $name = "form" . $count;

                $result .= "<form id=$name method='post' action='$action/$id'  >";
                $result .= "<tr onClick = if(controle())document.forms['$name'].submit(); >";

                for ($i = 0; $i < count($result_columns); $i++) {

                    $result .= "<td >" . $row->$result_columns[$i] . " </td>";
                }
                $result .= "</form> </tr>";
                $count++;
            }
        }
        $result .= "</tbody></table>";

        return $result;
    }
}
