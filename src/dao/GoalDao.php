<?php
class GoalDao
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
        $limit_sql = "";
        if ($limit) $limit_sql = "LIMIT $limit";
        $resultset = $this->mysqlAdapter->query("SELECT * FROM goals $limit_sql");
        $result = [];
        while ($row = mysqli_fetch_assoc($resultset)) {
            $result[] = $this->schematize($row);
        }
        return $result;
    }

    public function selectById(int $id)
    {
        $resultset = $this->mysqlAdapter->query("SELECT * FROM goals WHERE goal_id = $id");
        $row = mysqli_fetch_assoc($resultset);
        return $this->schematize($row);
    }

    public function insert(
        string $goal_name,
        string $goal_icon,
    ) {
        $goal_last = date('Y-m-d H:i:s');
        $goal_created = date('Y-m-d H:i:s');
        $resultset = $this->mysqlAdapter->query("
            INSERT INTO goals SET 
                goal_name = '$goal_name',
                goal_icon = '$goal_icon',
                goal_last = '$goal_last',
                goal_created = '$goal_created'
        ");
        if ($resultset) return $this->mysqlAdapter->getLastId();
        return false;
    }

    public function update(
        string $goal_name,
        string $goal_icon,
        int $goal_id
    ) {
        $goal_last = date('Y-m-d H:i:s');
        return $this->mysqlAdapter->query("
            UPDATE goals SET
                goal_name = '$goal_name',
                goal_icon = '$goal_icon',
                goal_last = '$goal_last'
            WHERE goal_id=$goal_id
        ");
    }

    public function delete(string $id)
    {
        $resultset = $this->mysqlAdapter->query("DELETE FROM goals WHERE goal_id = $id ");
        if ($resultset) return true;
        return false;
    }

    private function schematize($row)
    {
        if (strpos($row['goal_icon'], '<i') === false) {
            $row['goal_icon_html'] = '<i class="' . $row['goal_icon'] . '" i></i>';
        } else {
            $row['goal_icon_html'] = $row['goal_icon'];
        }
        return $row;
    }
}
