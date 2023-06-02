<?php
class SliderDao
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

    public function select()
    {
        $resultset = $this->mysqlAdapter->query("SELECT * FROM slider");
        $result = [];
        while ($row = mysqli_fetch_assoc($resultset)) {
            $result[] = $row;
        }
        return $result;
    }

    public function selectById(int $slider_id)
    {
        $resultset = $this->mysqlAdapter->query("SELECT * FROM slider WHERE slider_id = $slider_id");
        $row = mysqli_fetch_assoc($resultset);
        return $row;
    }

    public function insert(
        string $slider_title,
        String $slider_img
    ) {
        return $this->mysqlAdapter->query("
            INSERT INTO slider SET 
                slider_title='$slider_title',
                slider_img='$slider_img'
        ");
    }

    public function update(
        string $slider_title,
        string $slider_img,
        int $slider_id
    ) {
        return $this->mysqlAdapter->query("
            UPDATE slider SET
                slider_title='$slider_title', 
                slider_img='$slider_img'
            WHERE slider_id=$slider_id
        ");
    }

    public function delete(string $slider_id)
    {
        return $this->mysqlAdapter->query("DELETE FROM slider WHERE slider_id = $slider_id ");
    }
}
