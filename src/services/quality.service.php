<?php
class QualityService
{
    public static function select($DATA)
    {
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        $adapter = $DATA['mysqlAdapter'];
        $qualityDao = new qualityDao($adapter);
        $qualities = $qualityDao->select();
        $result = [
            'status' => 'success',
            'message' => 'Qualities obtained successfully',
            'response' => true,
            'data' => $qualities
        ];
        echo json_encode($result);
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
            $_POST['quality_title'],
            $_POST['quality_desc'],
            $_FILES['quality_img']
        )) {
            $adapter = $DATA['mysqlAdapter'];
            $qualityDao = new qualityDao($adapter);
            $quality_title = $_POST['quality_title'];
            $quality_desc = $_POST['quality_desc'];

            $quality_img = uploadFIle($_FILES['quality_img'], './public/img.qualities/');
            $quality_id = $qualityDao->insert(
                $quality_title,
                $quality_desc,
                $quality_img
            );
            $result['status'] = 'success';
            $result['message'] = 'Quality inserted correctly';
            $result['response'] = true;
            $result['data'] = $quality_id;
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
            $_POST['quality_id'],
            $_POST['quality_title'],
            $_POST['quality_desc']
        )) {
            $adapter = $DATA['mysqlAdapter'];
            $qualityDao = new qualityDao($adapter);
            $quality_id = $_POST['quality_id'];
            $current_quality = $qualityDao->selectById($quality_id);

            if (!$current_quality) {
                $result['message'] = 'No exist the quality';
                echo json_encode($result);
                return;
            }

            $quality_title = $_POST['quality_title'];
            $quality_desc = $_POST['quality_desc'];
            $quality_img = $current_quality['quality_img'];

            if (isset($_FILES['quality_img'])) {
                if ($_FILES['quality_img']['tmp_name'] != "" or $_FILES['quality_img']['tmp_name'] != null) {
                    if ($quality_img != '1.jpg' && $quality_img != '2.jpg' && $quality_img != '3.jpg') deleteFile('./public/img.qualities/' . $quality_img);
                    $quality_img = uploadFIle($_FILES['quality_img'], './public/img.qualities/');
                }
            }

            $qualityDao->update(
                $quality_title,
                $quality_desc,
                $quality_img,
                $quality_id
            );

            $result['status'] = 'success';
            $result['message'] = 'Quality updated correctly';
            $result['response'] = true;
            $result['data'] = $quality_id;
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
        if (isset($_POST['quality_id'])) {
            $adapter = $DATA['mysqlAdapter'];
            $qualityDao = new qualityDao($adapter);
            $quality_id = $_POST['quality_id'];
            $current_quality = $qualityDao->selectById($quality_id);
            if (!$current_quality) {
                $result['message'] = 'No exist the quality';
                echo json_encode($result);
                return;
            }

            $qualityDao->delete($quality_id);
            if ($current_quality['quality_img'] != '1.jpg' && $current_quality['quality_img'] != '2.jpg' && $current_quality['quality_img'] != '3.jpg') {
                deleteFile('./public/img.qualities/' . $current_quality['quality_img']);
            }
            $result['status'] = 'success';
            $result['message'] = 'Quality deleted correctly';
            $result['response'] = true;
            $result['data'] = $quality_id;
        }
        echo json_encode($result);
    }
}
