<?php
class MailboxService
{
    public static function select($DATA)
    {
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        $adapter = $DATA['mysqlAdapter'];
        $mailboxDao = new MailboxDao($adapter);
        $mails = $mailboxDao->select();
        echo json_encode([
            'status' => 'success',
            'message' => 'Mails obtained successfully',
            'response' => true,
            'data' => $mails
        ]);
    }

    public static function insert($DATA)
    {
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        $adapter = $DATA['mysqlAdapter'];
        $result = [
            'status' => 'error',
            'message' => 'Data not found',
            'response' => false,
            'data' => null
        ];

        // comprovate if the data is not empty
        if (!isset(
            $_POST['mail_name'],
            $_POST['mail_email'],
            $_POST['mail_phone'],
            $_POST['mail_subject'],
            $_POST['mail_location'],
            $_POST['mail_message']
        )) {
            echo json_encode($result);
            exit();
        }

        $mailboxDao = new MailboxDao($adapter);
        $mail_name = $_POST['mail_name'];
        $mail_email = $_POST['mail_email'];
        $mail_phone = $_POST['mail_phone'];
        $mail_subject = $_POST['mail_subject'];
        $mail_location = $_POST['mail_location'];
        $mail_message = $_POST['mail_message'];
        $mail_id = $mailboxDao->insert(
            $mail_name,
            $mail_email,
            $mail_phone,
            $mail_subject,
            $mail_location,
            $mail_message
        );

        // comprovate if the mail was created
        if (!$mail_id) {
            $result['message'] = 'Mail not created';
            echo json_encode($result);
            exit();
        }

        // return the data
        $result['status'] = 'success';
        $result['message'] = 'Mail created successfully';
        $result['response'] = true;
        $result['data'] = [
            'mail_id' => $mail_id,
            'mail_name' => $mail_name,
            'mail_email' => $mail_email,
            'mail_phone' => $mail_phone,
            'mail_subject' => $mail_subject,
            'mail_location' => $mail_location,
            'mail_message' => $mail_message
        ];
        echo json_encode($result);
        exit();
    }

    public static function update($DATA)
    {
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        $adapter = $DATA['mysqlAdapter'];
        $result = [
            'status' => 'error',
            'message' => 'Data not found',
            'response' => false,
            'data' => null
        ];
        if (isset(
            $_POST['mail_name'],
            $_POST['mail_email'],
            $_POST['mail_phone'],
            $_POST['mail_subject'],
            $_POST['mail_location'],
            $_POST['mail_message'],
            $_POST['mail_id']
        )) {
            $mailboxDao = new MailboxDao($adapter);
            $mail_id = $_POST['mail_id'];
            $current_mail = $mailboxDao->selectById($mail_id);
            if (!$current_mail) {
                $result['message'] = 'Mail not found';
                echo json_encode($result);
                exit();
            }
            $mail_name = $_POST['mail_name'];
            $mail_email = $_POST['mail_email'];
            $mail_phone = $_POST['mail_phone'];
            $mail_subject = $_POST['mail_subject'];
            $mail_location = $_POST['mail_location'];
            $mail_message = $_POST['mail_message'];
            $mail = $mailboxDao->update(
                $mail_name,
                $mail_email,
                $mail_phone,
                $mail_subject,
                $mail_location,
                $mail_message,
                $mail_id
            );
            $result['status'] = 'success';
            $result['message'] = 'Mail updated successfully';
            $result['response'] = true;
            $result['data'] = $mail;
        }
        echo json_encode($result);
    }

    public static function delete($DATA)
    {
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        $adapter = $DATA['mysqlAdapter'];
        $result = [
            'status' => 'error',
            'message' => 'Data not found',
            'response' => false,
            'data' => null
        ];
        if (isset($_POST['mail_id'])) {
            $mailboxDao = new MailboxDao($adapter);
            $mail_id = $_POST['mail_id'];
            $mail = $mailboxDao->selectById($mail_id);
            if (!$mail) {
                $result['message'] = 'Mail not found';
                echo json_encode($result);
                exit();
            }
            $mailboxDao->delete($mail_id);
            $result['status'] = 'success';
            $result['message'] = 'Mail deleted successfully';
            $result['response'] = true;
        }
        echo json_encode($result);
    }
}
