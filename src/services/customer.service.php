<?php
class CustomerService
{
    public static function select($DATA)
    {
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        $adapter = $DATA['mysqlAdapter'];
        $customerDao = new CustomerDao($adapter);
        $customers = $customerDao->select();
        echo json_encode([
            'status' => 'success',
            'message' => 'Customers obtained successfully',
            'response' => true,
            'data' => $customers
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
        if (isset(
            $_POST['customer_name'],
            $_POST['customer_link']
        )) {
            $customerDao = new CustomerDao($adapter);
            $customer_name = $_POST['customer_name'];
            $customer_link = $_POST['customer_link'];
            $customer_logo = "default.png";
            if (isset($_FILES['customer_logo'])) {
                if ($_FILES['customer_logo']['tmp_name'] != "" or $_FILES['customer_logo']['tmp_name'] != null) {
                    $customer_logo = uploadFIle($_FILES['customer_logo'], './public/img.customers/');
                }
            };
            $customer_id = $customerDao->insert(
                $customer_name,
                $customer_link,
                $customer_logo
            );
            $result['status'] = 'success';
            $result['message'] = 'Customer created successfully';
            $result['response'] = true;
            $result['data'] = $customer_id;
        }
        echo json_encode($result);
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
            $_POST['customer_name'],
            $_POST['customer_link'],
            $_POST['customer_id']
        )) {
            $customerDao = new CustomerDao($adapter);

            $customer_id = $_POST['customer_id'];
            $current_customer = $customerDao->selectById($customer_id);
            if (!$current_customer) {
                $result['message'] = 'Customer not found';
                echo json_encode($result);
                exit();
            }

            $customer_name = $_POST['customer_name'];
            $customer_link = $_POST['customer_link'];
            $customer_logo = $current_customer['customer_logo'];
            if (isset($_FILES['customer_logo'])) {
                if ($_FILES['customer_logo']['tmp_name'] != "" or $_FILES['customer_logo']['tmp_name'] != null) {
                    if ($customer_logo != 'default.png' && $customer_logo != '') deleteFile('./public/img.customers/' . $customer_logo);
                    $customer_logo = uploadFIle($_FILES['customer_logo'], './public/img.customers/');
                }
            }
            $customer = $customerDao->update(
                $customer_name,
                $customer_link,
                $customer_logo,
                $customer_id
            );

            $result['status'] = 'success';
            $result['message'] = 'Customer updated successfully';
            $result['response'] = true;
            $result['data'] = $customer;
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
        if (isset($_POST['customer_id'])) {
            $customerDao = new CustomerDao($adapter);
            $customer_id = $_POST['customer_id'];
            $customer = $customerDao->selectById($customer_id);
            if (!$customer) {
                $result['message'] = 'Customer not found';
                echo json_encode($result);
                exit();
            }
            if ($customer['customer_logo'] != 'default.png' && $customer['customer_logo'] != '') {
                deleteFile('./public/img.customers/' . $customer['customer_logo']);
            }
            $customerDao->delete($customer_id);
            $result['status'] = 'success';
            $result['message'] = 'Customer deleted successfully';
            $result['response'] = true;
        }
        echo json_encode($result);
    }
}
