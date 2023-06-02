<?php
class QualityDao
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
        $resultset = $this->mysqlAdapter->query("SELECT * FROM qualities $str_limit");
        $result = [];
        while ($row = mysqli_fetch_assoc($resultset)) {
            $result[] = $this->schematize($row);
        }
        return $result;
    }

    public function selectById(int $id)
    {
        $resultset = $this->mysqlAdapter->query("SELECT * FROM qualities WHERE quality_id = $id");
        $row = mysqli_fetch_assoc($resultset);
        return $row;
    }

    public function insert(
        string $quality_title,
        string $quality_desc,
        string $quality_img
    ) {
        $quality_last = date('Y-m-d H:i:s');
        $quality_created = date('Y-m-d H:i:s');
        $resultset = $this->mysqlAdapter->query("
            INSERT INTO qualities SET 
                quality_title='$quality_title',
                quality_desc='$quality_desc',
                quality_img='$quality_img',
                quality_last='$quality_last',
                quality_created='$quality_created'
        ");
        if ($resultset) return $this->mysqlAdapter->getLastId();
        return false;
    }

    public function update(
        string $quality_title,
        string $quality_desc,
        string $quality_img,
        int $quality_id
    ) {
        $quality_last = date('Y-m-d H:i:s');
        return $this->mysqlAdapter->query("
            UPDATE qualities SET
                quality_title='$quality_title', 
                quality_desc='$quality_desc',
                quality_img='$quality_img',
                quality_last='$quality_last'
            WHERE quality_id=$quality_id
        ");
    }

    public function delete(string $quality_id)
    {
        return $this->mysqlAdapter->query("DELETE FROM qualities WHERE quality_id = $quality_id ");
    }

    private function schematize($row)
    {
        $row['quality_img_url'] = $_ENV['HTTP_DOMAIN'] . "public/img.qualities/" . $row['quality_img'] . "?date=" . $row['quality_last'];
        return $row;
    }
}
