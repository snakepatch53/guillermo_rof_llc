<?php
class SliderService
{
    public static function select($DATA)
    {
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        $adapter = $DATA['mysqlAdapter'];
        $sliderDao = new SliderDao($adapter);
        $sliders = $sliderDao->select();
        $result = [
            'status' => 'success',
            'message' => 'Slides obtenidos correctamente',
            'response' => true,
            'data' => $sliders
        ];
        echo json_encode($result);
    }

    public static function insert($DATA)
    {
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        $result = [
            'status' => 'error',
            'message' => 'Faltan datos para ingresar el slide',
            'response' => false,
            'data' => null
        ];
        if (isset(
            $_POST['slider_title'],
            $_FILES['slider_img']
        )) {
            $adapter = $DATA['mysqlAdapter'];
            $sliderDao = new SliderDao($adapter);
            $slider_title = $_POST['slider_title'];
            $slider_img = uploadFIle($_FILES['slider_img'], './public/img.slider/');
            $slider_id = $sliderDao->insert(
                $slider_title,
                $slider_img
            );
            $result['status'] = 'success';
            $result['message'] = 'Slide insertado correctamente';
            $result['response'] = true;
            $result['data'] = $slider_id;
        }
        echo json_encode($result);
    }

    public static function update($DATA)
    {
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        $result = [
            'status' => 'error',
            'message' => 'Faltan datos para actualizar el slide',
            'response' => false,
            'data' => null
        ];
        if (isset(
            $_POST['slider_id'],
            $_POST['slider_title'],
            $_FILES['slider_img']
        )) {
            $adapter = $DATA['mysqlAdapter'];
            $sliderDao = new SliderDao($adapter);
            $slider_id = $_POST['slider_id'];
            $current_slider = $sliderDao->selectById($slider_id);

            if (!$current_slider) {
                $result['message'] = 'No existe el slide';
                echo json_encode($result);
                return;
            }

            $slider_title = $_POST['slider_title'];
            $slider_img = $current_slider['slider_img'];

            if (isset($_FILES['slider_img'])) {
                deleteFile('./public/img.slider/' . $slider_img);
                $slider_img = uploadFIle($_FILES['slider_img'], './public/img.slider/');
            }

            $sliderDao->update(
                $slider_id,
                $slider_title,
                $slider_img
            );
            $result['status'] = 'success';
            $result['message'] = 'Slide actualizado correctamente';
            $result['response'] = true;
            $result['data'] = $slider_id;
        }
        echo json_encode($result);
    }

    public static function delete($DATA)
    {
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        $result = [
            'status' => 'error',
            'message' => 'Faltan datos para eliminar el slide',
            'response' => false,
            'data' => null
        ];
        if (isset($_POST['slider_id'])) {
            $adapter = $DATA['mysqlAdapter'];
            $sliderDao = new SliderDao($adapter);
            $slider_id = $_POST['slider_id'];
            $current_slider = $sliderDao->selectById($slider_id);
            if (!$current_slider) {
                $result['message'] = 'No existe el slide';
                echo json_encode($result);
                return;
            }

            $sliderDao->delete($slider_id);
            if ($current_slider['slider_img'] != '1.png' && $current_slider['slider_img'] != '2.png' && $current_slider['slider_img'] != '3.png') {
                deleteFile('./public/img.slider/' . $current_slider['slider_img']);
            }
            $result['status'] = 'success';
            $result['message'] = 'Slider eliminado correctamente';
            $result['response'] = true;
            $result['data'] = $slider_id;
        }
        echo json_encode($result);
    }
}
