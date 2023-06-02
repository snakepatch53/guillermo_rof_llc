<?php
class CustomerDao
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
        $resultset = $this->mysqlAdapter->query("SELECT * FROM customers");
        $result = [];
        while ($row = mysqli_fetch_assoc($resultset)) {
            $result[] = $this->schematize($row);
        }
        return $result;
    }

    public function selectById($id)
    {
        $resultset = $this->mysqlAdapter->query("SELECT * FROM customers WHERE customer_id = $id");
        $row = mysqli_fetch_assoc($resultset);
        if (mysqli_num_rows($resultset) == 0) return [];
        return $this->schematize($row);
    }

    public function insert(
        $customer_name,
        $customer_link,
        $customer_logo
    ) {
        $customer_last = date('Y-m-d H:i:s');
        $customer_created = date('Y-m-d H:i:s');
        $result = $this->mysqlAdapter->query("
            INSERT INTO customers SET 
                customer_name='$customer_name', 
                customer_link='$customer_link',
                customer_logo='$customer_logo',
                customer_last='$customer_last',
                customer_created='$customer_created'
        ");
        if ($result) return $this->mysqlAdapter->getLastId();
        return false;
    }

    public function update(
        $customer_name,
        $customer_link,
        $customer_logo,
        $customer_id
    ) {
        $customer_last = date('Y-m-d H:i:s');
        return $this->mysqlAdapter->query("
            UPDATE customers SET 
                customer_name='$customer_name', 
                customer_link='$customer_link',
                customer_logo='$customer_logo',
                customer_last='$customer_last'
            WHERE customer_id = $customer_id 
        ");
    }

    public function delete($id)
    {
        return $this->mysqlAdapter->query("DELETE FROM customers WHERE customer_id = $id ");
    }

    private function schematize($row)
    {
        $row['customer_logo_url'] = $_ENV['HTTP_DOMAIN'] . "public/img.customers/" . ($row['customer_logo'] ? $row['customer_logo'] : 'default.png') . "?date=" . $row['customer_last'];
        return $row;
    }
}
