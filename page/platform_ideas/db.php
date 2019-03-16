<?php
class Database
{
    private $db_host = 'localhost';
    private $db_user = 'o9052991_socio35';
    private $db_pass = 'socio35';
    private $db_name = 'o9052991_socio35';
    // private $db_host = 'localhost';
    // private $db_user = 'root';
    // private $db_pass = '';
    // private $db_name = 'socio35';
    private $con = false;
    private $result0 = array();
    public function connect()
    {
        if(!$this->con)
        {
            $myconn = mysql_connect($this->db_host,$this->db_user,$this->db_pass);
            if($myconn)
            {
                $seldb = mysql_select_db($this->db_name,$myconn);
                if($seldb)
                {
                    $this->con = true;
                    mysql_set_charset('UTF8');
                    return true;
                }
                else
                {
                    return false;
                }
            }
            else
            {
                return false;
            }
        }
        else
        {
            return true;
        }
    }
    public function setDatabase($name)
    {
        if($this->con)
        {
            if(mysql_close())
            {
                $this->con = false;
                $this->results0 = null;
                $this->db_name = $name;
                $this->connect();
            }
        }
    }
    private function tableExists($table)
    {
        $tablesInDb = mysql_query('SHOW TABLES FROM '.$this->db_name.' LIKE "'.$table.'"');
        if($tablesInDb)
        {
            if(mysql_num_rows($tablesInDb)==1)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }
    public function select($table, $rows = '*', $where = null, $order = null)
    {
        $q = 'SELECT '.$rows.' FROM '.$table;
        if($where != null)
            $q .= ' WHERE '.$where;
        if($order != null)
            $q .= ' ORDER BY '.$order;
        $query = mysql_query($q);
        if($query)
        {

            $this->result0 = null; //изменение в коде, чтобы значения в одной ячейке не слипались

            $this->numResults = mysql_num_rows($query);
            for($i = 0; $i < $this->numResults; $i++)
            {
                $r = mysql_fetch_array($query);
                $key = array_keys($r);
                for($x = 0; $x < count($key); $x++)
                {
                    if(!is_int($key[$x]))
                    {
                        if(mysql_num_rows($query) > 1)
                            $this->result0[$i][$key[$x]] = $r[$key[$x]];
                        else if(mysql_num_rows($query) < 1)
                            $this->result0 = null;
                        else
                            $this->result0[$key[$x]] = $r[$key[$x]];
                    }
                }
            }
            return true;
        }
        else
        {
            return false;
        }
    }

    public function insert($table,$values,$rows = null)
    {
        if($this->tableExists($table))
        {
            $insert = 'INSERT INTO '.$table;
            if($rows != null)
            {
                $insert .= ' ('.$rows.')';
            }
            for($i = 0; $i < count($values); $i++)
            {
                if(is_string($values[$i]))
                    $values[$i] = '"'.$values[$i].'"';
            }
            $values = implode(',',$values);
            $insert .= ' VALUES ('.$values.')';
            $ins = mysql_query($insert);
            if($ins)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }
    public function delete($table,$where = null)
    {
        if($this->tableExists($table))
        {
            if($where == null)
            {
                $delete = 'DELETE '.$table;
            }
            else
            {
                $delete = 'DELETE FROM '.$table.' WHERE '.$where;
            }
            $del = mysql_query($delete);
            if($del)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        else
        {
            return false;
        }
    }
    public function update($table,$rows,$where,$condition)
    {
        if($this->tableExists($table))
        {
            for($i = 0; $i < count($where); $i++)
            {
                if($i%2 != 0)
                {
                    if(is_string($where[$i]))
                    {
                        if(($i+1) != null)
                            $where[$i] = '"'.$where[$i].'" AND ';
                        else
                            $where[$i] = '"'.$where[$i].'"';
                    }
                }
            }
            $where = implode($condition,$where);
            $update = 'UPDATE '.$table.' SET ';
            $keys = array_keys($rows);
            for($i = 0; $i < count($rows); $i++)
            {
                if(is_string($rows[$keys[$i]]))
                {
                    $update .= $keys[$i].'="'.$rows[$keys[$i]].'"';
                }
                else
                {
                    $update .= $keys[$i].'='.$rows[$keys[$i]];
                }
                // Parse to add commas
                if($i != count($rows)-1)
                {
                    $update .= ',';
                }
            }
            $update .= ' WHERE '.$where;
            // print $update ;
            $query = mysql_query($update);
            if($query)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        else
        {
            return false;
        }
    }
    /*
    * Returns the result set
    */
    public function getconn()
    {
        return $this->con;
    }
    public function getResult()
    {
        return $this->result0;
    }
}