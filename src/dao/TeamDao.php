<?php
class TeamDao
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

    public function select($limit = 0)
    {
        $limit_sql = "";
        if ($limit) $limit_sql = "LIMIT $limit";
        $resultset = $this->mysqlAdapter->query("SELECT * FROM team $limit_sql");
        $result = [];
        while ($row = mysqli_fetch_assoc($resultset)) {
            $result[] = $this->schematize($row);
        }
        return $result;
    }

    public function selectById($team_id)
    {
        $resultset = $this->mysqlAdapter->query("SELECT * FROM team WHERE team_id = $team_id");
        $row = mysqli_fetch_assoc($resultset);
        if (mysqli_num_rows($resultset) == 0) return [];
        return $this->schematize($row);
    }

    public function insert(
        string $team_name,
        string $team_position,
        string $team_photo,
        string $team_link
    ) {
        $team_last = date('Y-m-d H:i:s');
        $team_created = date('Y-m-d H:i:s');
        $resultset = $this->mysqlAdapter->query("
            INSERT INTO team SET 
                team_name='$team_name', 
                team_position='$team_position',
                team_photo='$team_photo',
                team_link='$team_link',
                team_last='$team_last',
                team_created='$team_created'
        ");
        if ($resultset) return $this->mysqlAdapter->getLastId();
        return false;
    }

    public function update(
        string $team_name,
        string $team_position,
        string $team_photo,
        string $team_link,
        int $team_id
    ) {
        $team_last = date('Y-m-d H:i:s');
        return $this->mysqlAdapter->query("
            UPDATE team SET 
                team_name='$team_name', 
                team_position='$team_position',
                team_photo='$team_photo',
                team_link='$team_link',
                team_last='$team_last'
            WHERE team_id = $team_id 
        ");
    }

    public function delete($team_id)
    {
        return $this->mysqlAdapter->query("DELETE FROM team WHERE team_id = $team_id ");
    }

    private function schematize($row)
    {
        $row['team_photo_url'] = $_ENV['HTTP_DOMAIN'] . "public/img.team/" . ($row['team_photo'] ? $row['team_photo'] : 'default.png') . "?date=" . $row['team_last'];
        return $row;
    }
}
