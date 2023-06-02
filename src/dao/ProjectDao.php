<?php
class ProjectDao
{
    private MysqlAdapter $mysqlAdapter;
    public function __construct(MysqlAdapter $mysqlAdapter)
    {
        $this->mysqlAdapter = $mysqlAdapter;
    }

    public function getLastId()
    {
        return $this->mysqlAdapter->getLastId();
    }

    public function select(int $limit = 0)
    {
        $str_limit = "";
        if ($limit) {
            $str_limit = " LIMIT $limit";
        }
        $resultset = $this->mysqlAdapter->query("SELECT * FROM projects $str_limit INNER JOIN services ON projects.service_id = services.service_id");
        $result = [];
        while ($row = mysqli_fetch_assoc($resultset)) {
            $result[] = $this->schematize($row);
        }
        return $result;
    }

    public function selectById(int $id)
    {
        $resultset = $this->mysqlAdapter->query("SELECT * FROM projects WHERE project_id = $id");
        $row = mysqli_fetch_assoc($resultset);
        return $row;
    }

    public function inserts(array $fields, array $values)
    {
        if (count($fields) == 0) return false;
        if (count($values) == 0) return false;
        $fields_sql = implode(',', $fields);
        $fields_sql .= ',project_last,project_created';

        $project_last = date('Y-m-d H:i:s');
        $project_created = date('Y-m-d H:i:s');

        $values_sql = '';
        if (is_array($values[0])) {
            foreach ($values as $value) {
                $values_sql .= "(";
                foreach ($value as $v) {
                    $val_tmp = addslashes($v);
                    $values_sql .= "'$val_tmp',";
                }
                $values_sql .= "'" . $project_last . "','" . $project_created . "'),";
            }
            $values_sql = substr($values_sql, 0, -1);
        } else {
            $values_sql .= "(";
            foreach ($values as $v) {
                $val_tmp = addslashes($v);
                $values_sql .= "'$val_tmp',";
            }
            $values_sql .= "'" . $project_last . "','" . $project_created . "')";
        }
        // return "INSERT INTO projects ($fields_sql) VALUES $values_sql";
        return $this->mysqlAdapter->query("INSERT INTO projects ($fields_sql) VALUES $values_sql");
    }

    public function deleteByOrigin($origin = 'facebook')
    {
        return $this->mysqlAdapter->query("DELETE FROM projects WHERE project_origin = '$origin'");
    }

    public function insert(
        string $project_title,
        string $project_desc,
        string $project_img,
        string $project_link,
        string $project_origin,
        int $service_id
    ) {
        $project_last = date('Y-m-d H:i:s');
        $project_created = date('Y-m-d H:i:s');
        $resultset = $this->mysqlAdapter->query("
            INSERT INTO projects SET 
                project_title='$project_title', 
                project_desc='$project_desc',
                project_img='$project_img',
                project_link='$project_link',
                project_origin='$project_origin',
                service_id='$service_id',
                project_last='$project_last',
                project_created='$project_created'
        ");
        if ($resultset) return $this->mysqlAdapter->getLastId();
        return false;
    }

    public function update(
        string $project_title,
        string $project_desc,
        string $project_img,
        string $project_link,
        string $project_origin,
        int $service_id,
        int $project_id
    ) {
        $project_last = date('Y-m-d H:i:s');
        return $this->mysqlAdapter->query("
            UPDATE projects SET
                project_title='$project_title', 
                project_desc='$project_desc',
                project_img='$project_img',
                project_link='$project_link',
                project_origin='$project_origin',
                service_id='$service_id',
                project_last='$project_last'
            WHERE project_id=$project_id
        ");
    }

    public function delete(string $id)
    {
        return $this->mysqlAdapter->query("DELETE FROM projects WHERE project_id = $id ");
    }

    public function deleteFacebookPosts()
    {
        return $this->mysqlAdapter->query("DELETE FROM projects WHERE project_origin = 'facebook'");
    }

    private function schematize($row)
    {
        if (strpos($row['project_img'], 'http') !== false) {
            $row['project_img_url'] = $row['project_img'];
        } else {
            $row['project_img_url'] = $_ENV['HTTP_DOMAIN'] . "public/img.projects/" . $row['project_img'] . "?date=" . $row['project_last'];
        }
        return $row;
    }
}
