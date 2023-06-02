<?php
class ServiceService
{

    public static function select($DATA)
    {
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        $adapter = $DATA['mysqlAdapter'];
        $serviceDao = new ServiceDao($adapter);
        $services = $serviceDao->select();
        echo json_encode([
            'status' => 'success',
            'message' => 'Services obtained successfully',
            'response' => true,
            'data' => $services
        ]);
    }

    public static function select_join_projects($DATA)
    {
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        $adapter = $DATA['mysqlAdapter'];
        $serviceDao = new ServiceDao($adapter);
        $services = $serviceDao->select_join_projects();
        echo json_encode([
            'status' => 'success',
            'message' => 'Services obtained successfully',
            'response' => true,
            'data' => $services
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
            $_POST['service_title'],
            $_POST['service_desc'],
            $_POST['service_wtsp_msg'],
            $_FILES['service_img']
        )) {
            $serviceDao = new ServiceDao($adapter);

            $service_title = $_POST['service_title'];
            $service_desc = $_POST['service_desc'];
            $service_wtsp_msg = $_POST['service_wtsp_msg'];
            $service_img = "default.png";
            if (isset($_FILES['service_img'])) {
                if ($_FILES['service_img']['tmp_name'] != "" or $_FILES['service_img']['tmp_name'] != null) {
                    $service_img = uploadFIle($_FILES['service_img'], './public/img.services/');
                }
            };
            $service = $serviceDao->insert(
                $service_title,
                $service_desc,
                $service_img,
                $service_wtsp_msg
            );
            $result['status'] = 'success';
            $result['message'] = 'Service created successfully';
            $result['response'] = true;
            $result['data'] = $service;
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
            $_POST['service_title'],
            $_POST['service_desc'],
            $_POST['service_wtsp_msg'],
            $_POST['service_id']
        )) {
            $serviceDao = new ServiceDao($adapter);

            $service_id = $_POST['service_id'];
            $current_service = $serviceDao->selectById($service_id);
            if (!$current_service) {
                $result['message'] = 'Service not found';
                echo json_encode($result);
                exit();
            }

            $service_title = $_POST['service_title'];
            $service_desc = $_POST['service_desc'];
            $service_wtsp_msg = $_POST['service_wtsp_msg'];
            $service_img = $current_service['service_img'];
            if (isset($_FILES['service_img'])) {
                if ($_FILES['service_img']['tmp_name'] != "" or $_FILES['service_img']['tmp_name'] != null) {
                    if ($service_img != 'default.png' && $service_img != '') deleteFile('./public/img.services/' . $service_img);
                    $service_img = uploadFIle($_FILES['service_img'], './public/img.services/');
                }
            }
            $service = $serviceDao->update(
                $service_title,
                $service_desc,
                $service_img,
                $service_wtsp_msg,
                $service_id
            );
            $result['status'] = 'success';
            $result['message'] = 'Service updated successfully';
            $result['response'] = true;
            $result['data'] = $service;
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
        if (isset($_POST['service_id'])) {
            $serviceDao = new ServiceDao($adapter);
            $service_id = $_POST['service_id'];
            $service = $serviceDao->selectById($service_id);
            if (!$service) {
                $result['message'] = 'Service not found';
                echo json_encode($result);
                exit();
            }
            if ($service['service_img'] != 'default.png' && $service['service_img'] != '') {
                deleteFile('./public/img.services/' . $service['service_img']);
            }
            $serviceDao->delete($service_id);
            $result['status'] = 'success';
            $result['message'] = 'service deleted successfully';
            $result['response'] = true;
        }
        echo json_encode($result);
    }
}
