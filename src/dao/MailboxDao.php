<?php
class MailboxDao
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
        $resultset = $this->mysqlAdapter->query("SELECT * FROM mailbox");
        $result = [];
        while ($row = mysqli_fetch_assoc($resultset)) {
            $result[] = $this->schematize($row);
        }
        return $result;
    }

    public function selectById($id)
    {
        $resultset = $this->mysqlAdapter->query("SELECT * FROM mailbox WHERE mail_id = $id");
        $row = mysqli_fetch_assoc($resultset);
        if (mysqli_num_rows($resultset) == 0) return [];
        return $this->schematize($row);
    }

    public function insert(
        $mail_name,
        $mail_email,
        $mail_phone,
        $mail_subject,
        $mail_location,
        $mail_message
    ) {
        $mail_message = addslashes($mail_message);
        $mail_last = date('Y-m-d H:i:s');
        $mail_created = date('Y-m-d H:i:s');
        $resultset = $this->mysqlAdapter->query("
        INSERT INTO mailbox SET 
            mail_name = '$mail_name',
            mail_email = '$mail_email',
            mail_phone = '$mail_phone',
            mail_subject = '$mail_subject',
            mail_location = '$mail_location',
            mail_message = '$mail_message',
            mail_last = '$mail_last',
            mail_created = '$mail_created'
        ");
        if ($resultset) return $this->mysqlAdapter->getLastId();
        return false;
    }

    public function update(
        $mail_name,
        $mail_email,
        $mail_phone,
        $mail_subject,
        $mail_location,
        $mail_message,
        $mail_id
    ) {
        $mail_last = date('Y-m-d H:i:s');
        return $this->mysqlAdapter->query("
            UPDATE mailbox SET 
                mail_name='$mail_name',
                mail_email='$mail_email',
                mail_phone='$mail_phone',
                mail_subject='$mail_subject',
                mail_location='$mail_location',
                mail_message='$mail_message',
                mail_last='$mail_last',
            WHERE mail_id = $mail_id
        ");
    }

    public function delete($id)
    {
        return $this->mysqlAdapter->query("DELETE FROM mailbox WHERE mail_id = $id");
    }

    private function schematize($row)
    {
        return $row;
    }
}
