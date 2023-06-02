<?php
class ContactService
{
    public static function select($DATA)
    {
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        $adapter = $DATA['mysqlAdapter'];
        $contactDao = new ContactDao($adapter);
        $socials = [];
        if (isset($_POST['contact_type'])) {
            $socials = $contactDao->select($_POST['contact_type']);
        } else {
            $socials = $contactDao->select();
        }
        echo json_encode([
            'status' => 'success',
            'message' => 'Contacts obtained correctly',
            'response' => true,
            'data' => $socials
        ]);
    }

    public static function insert($DATA)
    {
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        $result = [
            'status' => 'error',
            'message' => 'Data not found',
            'response' => false,
            'data' => null
        ];
        if (isset(
            $_POST['contact_name'],
            $_POST['contact_value'],
            $_POST['contact_link'],
            $_POST['contact_icon'],
            $_POST['contact_color'],
            $_POST['contact_type']
        )) {
            $adapter = $DATA['mysqlAdapter'];
            $contactDao = new ContactDao($adapter);

            $contact_name = $_POST['contact_name'];
            $contact_value = $_POST['contact_value'];
            $contact_link = $_POST['contact_link'];
            $contact_icon = $_POST['contact_icon'];
            $contact_color = $_POST['contact_color'];
            $contact_type = $_POST['contact_type'];

            $contact_id = $contactDao->insert(
                $contact_name,
                $contact_value,
                $contact_link,
                $contact_icon,
                $contact_color,
                $contact_type
            );

            $result['status'] = 'success';
            $result['message'] = 'Contact inserted correctly';
            $result['response'] = true;
            $result['data'] = $contact_id;
        }
        echo json_encode($result);
    }

    public static function update($DATA)
    {
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        $result = [
            'status' => 'error',
            'message' => 'Data not found',
            'response' => false,
            'data' => null
        ];
        if (isset(
            $_POST['contact_name'],
            $_POST['contact_value'],
            $_POST['contact_link'],
            $_POST['contact_icon'],
            $_POST['contact_color'],
            $_POST['contact_type'],
            $_POST['contact_id']
        )) {
            $adapter = $DATA['mysqlAdapter'];
            $contactDao = new ContactDao($adapter);

            $contact_name = $_POST['contact_name'];
            $contact_value = $_POST['contact_value'];
            $contact_link = $_POST['contact_link'];
            $contact_icon = $_POST['contact_icon'];
            $contact_color = $_POST['contact_color'];
            $contact_type = $_POST['contact_type'];
            $contact_id = $_POST['contact_id'];

            $contactDao->update(
                $contact_name,
                $contact_value,
                $contact_link,
                $contact_icon,
                $contact_color,
                $contact_type,
                $contact_id
            );

            $result['status'] = 'success';
            $result['message'] = 'Contact updated correctly';
            $result['response'] = true;
            $result['data'] = $contact_id;
        }
        echo json_encode($result);
    }

    public static function delete($DATA)
    {
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        $result = [
            'status' => 'error',
            'message' => 'Data not found',
            'response' => false,
            'data' => null
        ];
        if (isset($_POST['contact_id'])) {
            $adapter = $DATA['mysqlAdapter'];
            $contactDao = new ContactDao($adapter);
            $contact_id = $_POST['contact_id'];
            $contactDao->delete($contact_id);
            $result['status'] = 'success';
            $result['message'] = 'Contact deleted correctly';
            $result['response'] = true;
            $result['data'] = $contact_id;
        }
        echo json_encode($result);
    }
}
