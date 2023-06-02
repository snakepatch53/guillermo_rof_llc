<?php
class ServiceDao
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
        $resultset = $this->mysqlAdapter->query("SELECT * FROM services $str_limit");
        $result = [];
        while ($row = mysqli_fetch_assoc($resultset)) {
            $result[] = $this->schematize($row);
        }
        return $result;
    }

    public function select_join_projects(int $limit = 0)
    {
        $str_limit = "";
        if ($limit) {
            $str_limit = " LIMIT $limit";
        }

        $services_rs = $this->mysqlAdapter->query("SELECT * FROM services $str_limit");
        $projects_rs = $this->mysqlAdapter->query("SELECT * FROM projects");

        $services = [];

        while ($row = mysqli_fetch_assoc($services_rs)) {
            $row['projects'] = [];

            mysqli_data_seek($projects_rs, 0);
            while ($project = mysqli_fetch_assoc($projects_rs)) {
                if ($project['service_id'] == $row['service_id']) $row['projects'][] = $this->schematize_project($project);
            }
            $services[] = $this->schematize($row);
        }

        return $services ?? [];
    }

    public function selectById(int $id)
    {
        $resultset = $this->mysqlAdapter->query("SELECT * FROM services WHERE service_id = $id");
        $row = mysqli_fetch_assoc($resultset);
        return $row;
    }

    public function insert(
        string $service_title,
        string $service_desc,
        string $service_img,
        string $service_wtsp_msg
    ) {
        $service_last = date('Y-m-d H:i:s');
        $service_created = date('Y-m-d H:i:s');
        $resultset = $this->mysqlAdapter->query("
            INSERT INTO services SET 
                service_title='$service_title', 
                service_desc='$service_desc',
                service_img='$service_img',
                service_wtsp_msg='$service_wtsp_msg',
                service_last='$service_last',
                service_created='$service_created'
        ");
        if ($resultset) return $this->mysqlAdapter->getLastId();
        return false;
    }

    public function update(
        string $service_title,
        string $service_desc,
        string $service_img,
        string $service_wtsp_msg,
        int $service_id
    ) {
        $service_last = date('Y-m-d H:i:s');
        return $this->mysqlAdapter->query("
            UPDATE services SET
                service_title='$service_title', 
                service_desc='$service_desc',
                service_img='$service_img',
                service_wtsp_msg='$service_wtsp_msg',
                service_last='$service_last'
            WHERE service_id=$service_id
        ");
    }

    public function delete(string $id)
    {
        return $this->mysqlAdapter->query("DELETE FROM services WHERE service_id = $id ");
    }

    private function schematize($row)
    {
        $row['service_img_url'] = $_ENV['HTTP_DOMAIN'] . "public/img.services/" . $row['service_img'] . "?date=" . $row['service_last'];
        return $row;
    }

    private function schematize_project($row)
    {
        if (strpos($row['project_img'], 'http') !== false) {
            $row['project_img_url'] = $row['project_img'];
        } else {
            $row['project_img_url'] = $_ENV['HTTP_DOMAIN'] . "public/img.projects/" . $row['project_img'] . "?date=" . $row['project_last'];
        }
        return $row;
    }
}
