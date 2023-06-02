<?php
class ThemeService
{
    public static function select($DATA)
    {
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        $adapter = $DATA['mysqlAdapter'];
        $themeDao = new ThemeDao($adapter);
        $themes = $themeDao->select();
        echo json_encode([
            'status' => 'success',
            'message' => 'Themes obtained successfully',
            'response' => true,
            'data' => $themes
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
            $_POST['theme_name'],
            $_POST['theme_color_danger'],
            $_POST['theme_color_info'],
            $_POST['theme_color_warn'],
            $_POST['theme_color_success'],
            $_POST['theme_color1'],
            $_POST['theme_color1_translucent'],
            $_POST['theme_color1_text'],
            $_POST['theme_color1_text2'],
            $_POST['theme_color1_logo_s1'],
            $_POST['theme_color1_logo_s2'],
            $_POST['theme_color1_logo_s3'],
            $_POST['theme_color1_logo_text'],
            $_POST['theme_color1_btn'],
            $_POST['theme_color1_btn_text'],
            $_POST['theme_color2'],
            $_POST['theme_color2_text'],
            $_POST['theme_color2_text2'],
            $_POST['theme_color4'],
            $_POST['theme_color4_text'],
            $_POST['theme_color4_text2'],
            $_POST['theme_color4_text3'],
            $_POST['theme_color4_logo_s1'],
            $_POST['theme_color4_logo_s2'],
            $_POST['theme_color4_logo_s3'],
            $_POST['theme_color4_logo_text'],
            $_POST['theme_color5'],
            $_POST['theme_color5_text'],
            $_POST['theme_color5_text2'],
            $_POST['theme_color5_logo_s1'],
            $_POST['theme_color5_logo_s2'],
            $_POST['theme_color5_logo_s3'],
            $_POST['theme_color5_logo_text'],
            $_POST['theme_color5_btn'],
            $_POST['theme_color5_btn_text'],
            $_POST['theme_color6'],
            $_POST['theme_color6_text'],
            $_POST['theme_color6_text2'],
            $_POST['theme_dark_color_danger'],
            $_POST['theme_dark_color_info'],
            $_POST['theme_dark_color_warn'],
            $_POST['theme_dark_color_success'],
            $_POST['theme_dark_color1'],
            $_POST['theme_dark_color1_translucent'],
            $_POST['theme_dark_color1_text'],
            $_POST['theme_dark_color1_text2'],
            $_POST['theme_dark_color1_logo_s1'],
            $_POST['theme_dark_color1_logo_s2'],
            $_POST['theme_dark_color1_logo_s3'],
            $_POST['theme_dark_color1_logo_text'],
            $_POST['theme_dark_color1_btn'],
            $_POST['theme_dark_color1_btn_text'],
            $_POST['theme_dark_color2'],
            $_POST['theme_dark_color2_text'],
            $_POST['theme_dark_color2_text2'],
            $_POST['theme_dark_color4'],
            $_POST['theme_dark_color4_text'],
            $_POST['theme_dark_color4_text2'],
            $_POST['theme_dark_color4_text3'],
            $_POST['theme_dark_color4_logo_s1'],
            $_POST['theme_dark_color4_logo_s2'],
            $_POST['theme_dark_color4_logo_s3'],
            $_POST['theme_dark_color4_logo_text'],
            $_POST['theme_dark_color5'],
            $_POST['theme_dark_color5_text'],
            $_POST['theme_dark_color5_text2'],
            $_POST['theme_dark_color5_logo_s1'],
            $_POST['theme_dark_color5_logo_s2'],
            $_POST['theme_dark_color5_logo_s3'],
            $_POST['theme_dark_color5_logo_text'],
            $_POST['theme_dark_color5_btn'],
            $_POST['theme_dark_color5_btn_text'],
            $_POST['theme_dark_color6'],
            $_POST['theme_dark_color6_text'],
            $_POST['theme_dark_color6_text2']
        )) {
            $themeDao = new ThemeDao($adapter);

            $theme_name = $_POST['theme_name'];
            $theme_color_danger = $_POST['theme_color_danger'];
            $theme_color_info = $_POST['theme_color_info'];
            $theme_color_warn = $_POST['theme_color_warn'];
            $theme_color_success = $_POST['theme_color_success'];
            $theme_color1 = $_POST['theme_color1'];
            $theme_color1_translucent = $_POST['theme_color1_translucent'];
            $theme_color1_text = $_POST['theme_color1_text'];
            $theme_color1_text2 = $_POST['theme_color1_text2'];
            $theme_color1_logo_s1 = $_POST['theme_color1_logo_s1'];
            $theme_color1_logo_s2 = $_POST['theme_color1_logo_s2'];
            $theme_color1_logo_s3 = $_POST['theme_color1_logo_s3'];
            $theme_color1_logo_text = $_POST['theme_color1_logo_text'];
            $theme_color1_btn = $_POST['theme_color1_btn'];
            $theme_color1_btn_text = $_POST['theme_color1_btn_text'];
            $theme_color2 = $_POST['theme_color2'];
            $theme_color2_text = $_POST['theme_color2_text'];
            $theme_color2_text2 = $_POST['theme_color2_text2'];
            $theme_color4 = $_POST['theme_color4'];
            $theme_color4_text = $_POST['theme_color4_text'];
            $theme_color4_text2 = $_POST['theme_color4_text2'];
            $theme_color4_text3 = $_POST['theme_color4_text3'];
            $theme_color4_logo_s1 = $_POST['theme_color4_logo_s1'];
            $theme_color4_logo_s2 = $_POST['theme_color4_logo_s2'];
            $theme_color4_logo_s3 = $_POST['theme_color4_logo_s3'];
            $theme_color4_logo_text = $_POST['theme_color4_logo_text'];
            $theme_color5 = $_POST['theme_color5'];
            $theme_color5_text = $_POST['theme_color5_text'];
            $theme_color5_text2 = $_POST['theme_color5_text2'];
            $theme_color5_logo_s1 = $_POST['theme_color5_logo_s1'];
            $theme_color5_logo_s2 = $_POST['theme_color5_logo_s2'];
            $theme_color5_logo_s3 = $_POST['theme_color5_logo_s3'];
            $theme_color5_logo_text = $_POST['theme_color5_logo_text'];
            $theme_color5_btn = $_POST['theme_color5_btn'];
            $theme_color5_btn_text = $_POST['theme_color5_btn_text'];
            $theme_color6 = $_POST['theme_color6'];
            $theme_color6_text = $_POST['theme_color6_text'];
            $theme_color6_text2 = $_POST['theme_color6_text2'];
            $theme_dark_color_danger = $_POST['theme_dark_color_danger'];
            $theme_dark_color_info = $_POST['theme_dark_color_info'];
            $theme_dark_color_warn = $_POST['theme_dark_color_warn'];
            $theme_dark_color_success = $_POST['theme_dark_color_success'];
            $theme_dark_color1 = $_POST['theme_dark_color1'];
            $theme_dark_color1_translucent = $_POST['theme_dark_color1_translucent'];
            $theme_dark_color1_text = $_POST['theme_dark_color1_text'];
            $theme_dark_color1_text2 = $_POST['theme_dark_color1_text2'];
            $theme_dark_color1_logo_s1 = $_POST['theme_dark_color1_logo_s1'];
            $theme_dark_color1_logo_s2 = $_POST['theme_dark_color1_logo_s2'];
            $theme_dark_color1_logo_s3 = $_POST['theme_dark_color1_logo_s3'];
            $theme_dark_color1_logo_text = $_POST['theme_dark_color1_logo_text'];
            $theme_dark_color1_btn = $_POST['theme_dark_color1_btn'];
            $theme_dark_color1_btn_text = $_POST['theme_dark_color1_btn_text'];
            $theme_dark_color2 = $_POST['theme_dark_color2'];
            $theme_dark_color2_text = $_POST['theme_dark_color2_text'];
            $theme_dark_color2_text2 = $_POST['theme_dark_color2_text2'];
            $theme_dark_color4 = $_POST['theme_dark_color4'];
            $theme_dark_color4_text = $_POST['theme_dark_color4_text'];
            $theme_dark_color4_text2 = $_POST['theme_dark_color4_text2'];
            $theme_dark_color4_text3 = $_POST['theme_dark_color4_text3'];
            $theme_dark_color4_logo_s1 = $_POST['theme_dark_color4_logo_s1'];
            $theme_dark_color4_logo_s2 = $_POST['theme_dark_color4_logo_s2'];
            $theme_dark_color4_logo_s3 = $_POST['theme_dark_color4_logo_s3'];
            $theme_dark_color4_logo_text = $_POST['theme_dark_color4_logo_text'];
            $theme_dark_color5 = $_POST['theme_dark_color5'];
            $theme_dark_color5_text = $_POST['theme_dark_color5_text'];
            $theme_dark_color5_text2 = $_POST['theme_dark_color5_text2'];
            $theme_dark_color5_logo_s1 = $_POST['theme_dark_color5_logo_s1'];
            $theme_dark_color5_logo_s2 = $_POST['theme_dark_color5_logo_s2'];
            $theme_dark_color5_logo_s3 = $_POST['theme_dark_color5_logo_s3'];
            $theme_dark_color5_logo_text = $_POST['theme_dark_color5_logo_text'];
            $theme_dark_color5_btn = $_POST['theme_dark_color5_btn'];
            $theme_dark_color5_btn_text = $_POST['theme_dark_color5_btn_text'];
            $theme_dark_color6 = $_POST['theme_dark_color6'];
            $theme_dark_color6_text = $_POST['theme_dark_color6_text'];
            $theme_dark_color6_text2 = $_POST['theme_dark_color6_text2'];

            $theme = $themeDao->insert(
                $theme_name,
                $theme_color_danger,
                $theme_color_info,
                $theme_color_warn,
                $theme_color_success,
                $theme_color1,
                $theme_color1_translucent,
                $theme_color1_text,
                $theme_color1_text2,
                $theme_color1_logo_s1,
                $theme_color1_logo_s2,
                $theme_color1_logo_s3,
                $theme_color1_logo_text,
                $theme_color1_btn,
                $theme_color1_btn_text,
                $theme_color2,
                $theme_color2_text,
                $theme_color2_text2,
                $theme_color4,
                $theme_color4_text,
                $theme_color4_text2,
                $theme_color4_text3,
                $theme_color4_logo_s1,
                $theme_color4_logo_s2,
                $theme_color4_logo_s3,
                $theme_color4_logo_text,
                $theme_color5,
                $theme_color5_text,
                $theme_color5_text2,
                $theme_color5_logo_s1,
                $theme_color5_logo_s2,
                $theme_color5_logo_s3,
                $theme_color5_logo_text,
                $theme_color5_btn,
                $theme_color5_btn_text,
                $theme_color6,
                $theme_color6_text,
                $theme_color6_text2,
                $theme_dark_color_danger,
                $theme_dark_color_info,
                $theme_dark_color_warn,
                $theme_dark_color_success,
                $theme_dark_color1,
                $theme_dark_color1_translucent,
                $theme_dark_color1_text,
                $theme_dark_color1_text2,
                $theme_dark_color1_logo_s1,
                $theme_dark_color1_logo_s2,
                $theme_dark_color1_logo_s3,
                $theme_dark_color1_logo_text,
                $theme_dark_color1_btn,
                $theme_dark_color1_btn_text,
                $theme_dark_color2,
                $theme_dark_color2_text,
                $theme_dark_color2_text2,
                $theme_dark_color4,
                $theme_dark_color4_text,
                $theme_dark_color4_text2,
                $theme_dark_color4_text3,
                $theme_dark_color4_logo_s1,
                $theme_dark_color4_logo_s2,
                $theme_dark_color4_logo_s3,
                $theme_dark_color4_logo_text,
                $theme_dark_color5,
                $theme_dark_color5_text,
                $theme_dark_color5_text2,
                $theme_dark_color5_logo_s1,
                $theme_dark_color5_logo_s2,
                $theme_dark_color5_logo_s3,
                $theme_dark_color5_logo_text,
                $theme_dark_color5_btn,
                $theme_dark_color5_btn_text,
                $theme_dark_color6,
                $theme_dark_color6_text,
                $theme_dark_color6_text2
            );
            $result['status'] = 'success';
            $result['message'] = 'Theme created successfully';
            $result['response'] = true;
            $result['data'] = $theme;
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
            $_POST['theme_name'],
            $_POST['theme_color_danger'],
            $_POST['theme_color_info'],
            $_POST['theme_color_warn'],
            $_POST['theme_color_success'],
            $_POST['theme_color1'],
            $_POST['theme_color1_translucent'],
            $_POST['theme_color1_text'],
            $_POST['theme_color1_text2'],
            $_POST['theme_color1_logo_s1'],
            $_POST['theme_color1_logo_s2'],
            $_POST['theme_color1_logo_s3'],
            $_POST['theme_color1_logo_text'],
            $_POST['theme_color1_btn'],
            $_POST['theme_color1_btn_text'],
            $_POST['theme_color2'],
            $_POST['theme_color2_text'],
            $_POST['theme_color2_text2'],
            $_POST['theme_color4'],
            $_POST['theme_color4_text'],
            $_POST['theme_color4_text2'],
            $_POST['theme_color4_text3'],
            $_POST['theme_color4_logo_s1'],
            $_POST['theme_color4_logo_s2'],
            $_POST['theme_color4_logo_s3'],
            $_POST['theme_color4_logo_text'],
            $_POST['theme_color5'],
            $_POST['theme_color5_text'],
            $_POST['theme_color5_text2'],
            $_POST['theme_color5_logo_s1'],
            $_POST['theme_color5_logo_s2'],
            $_POST['theme_color5_logo_s3'],
            $_POST['theme_color5_logo_text'],
            $_POST['theme_color5_btn'],
            $_POST['theme_color5_btn_text'],
            $_POST['theme_color6'],
            $_POST['theme_color6_text'],
            $_POST['theme_color6_text2'],
            $_POST['theme_dark_color_danger'],
            $_POST['theme_dark_color_info'],
            $_POST['theme_dark_color_warn'],
            $_POST['theme_dark_color_success'],
            $_POST['theme_dark_color1'],
            $_POST['theme_dark_color1_translucent'],
            $_POST['theme_dark_color1_text'],
            $_POST['theme_dark_color1_text2'],
            $_POST['theme_dark_color1_logo_s1'],
            $_POST['theme_dark_color1_logo_s2'],
            $_POST['theme_dark_color1_logo_s3'],
            $_POST['theme_dark_color1_logo_text'],
            $_POST['theme_dark_color1_btn'],
            $_POST['theme_dark_color1_btn_text'],
            $_POST['theme_dark_color2'],
            $_POST['theme_dark_color2_text'],
            $_POST['theme_dark_color2_text2'],
            $_POST['theme_dark_color4'],
            $_POST['theme_dark_color4_text'],
            $_POST['theme_dark_color4_text2'],
            $_POST['theme_dark_color4_text3'],
            $_POST['theme_dark_color4_logo_s1'],
            $_POST['theme_dark_color4_logo_s2'],
            $_POST['theme_dark_color4_logo_s3'],
            $_POST['theme_dark_color4_logo_text'],
            $_POST['theme_dark_color5'],
            $_POST['theme_dark_color5_text'],
            $_POST['theme_dark_color5_text2'],
            $_POST['theme_dark_color5_logo_s1'],
            $_POST['theme_dark_color5_logo_s2'],
            $_POST['theme_dark_color5_logo_s3'],
            $_POST['theme_dark_color5_logo_text'],
            $_POST['theme_dark_color5_btn'],
            $_POST['theme_dark_color5_btn_text'],
            $_POST['theme_dark_color6'],
            $_POST['theme_dark_color6_text'],
            $_POST['theme_dark_color6_text2'],
            $_POST['theme_id']
        )) {
            $themeDao = new ThemeDao($adapter);

            $theme_id = $_POST['theme_id'];
            $current_theme = $themeDao->selectById($theme_id);
            if (!$current_theme) {
                $result['message'] = 'Theme not found';
                echo json_encode($result);
                exit();
            }

            $theme_name = $_POST['theme_name'];
            $theme_color_danger = $_POST['theme_color_danger'];
            $theme_color_info = $_POST['theme_color_info'];
            $theme_color_warn = $_POST['theme_color_warn'];
            $theme_color_success = $_POST['theme_color_success'];
            $theme_color1 = $_POST['theme_color1'];
            $theme_color1_translucent = $_POST['theme_color1_translucent'];
            $theme_color1_text = $_POST['theme_color1_text'];
            $theme_color1_text2 = $_POST['theme_color1_text2'];
            $theme_color1_logo_s1 = $_POST['theme_color1_logo_s1'];
            $theme_color1_logo_s2 = $_POST['theme_color1_logo_s2'];
            $theme_color1_logo_s3 = $_POST['theme_color1_logo_s3'];
            $theme_color1_logo_text = $_POST['theme_color1_logo_text'];
            $theme_color1_btn = $_POST['theme_color1_btn'];
            $theme_color1_btn_text = $_POST['theme_color1_btn_text'];
            $theme_color2 = $_POST['theme_color2'];
            $theme_color2_text = $_POST['theme_color2_text'];
            $theme_color2_text2 = $_POST['theme_color2_text2'];
            $theme_color4 = $_POST['theme_color4'];
            $theme_color4_text = $_POST['theme_color4_text'];
            $theme_color4_text2 = $_POST['theme_color4_text2'];
            $theme_color4_text3 = $_POST['theme_color4_text3'];
            $theme_color4_logo_s1 = $_POST['theme_color4_logo_s1'];
            $theme_color4_logo_s2 = $_POST['theme_color4_logo_s2'];
            $theme_color4_logo_s3 = $_POST['theme_color4_logo_s3'];
            $theme_color4_logo_text = $_POST['theme_color4_logo_text'];
            $theme_color5 = $_POST['theme_color5'];
            $theme_color5_text = $_POST['theme_color5_text'];
            $theme_color5_text2 = $_POST['theme_color5_text2'];
            $theme_color5_logo_s1 = $_POST['theme_color5_logo_s1'];
            $theme_color5_logo_s2 = $_POST['theme_color5_logo_s2'];
            $theme_color5_logo_s3 = $_POST['theme_color5_logo_s3'];
            $theme_color5_logo_text = $_POST['theme_color5_logo_text'];
            $theme_color5_btn = $_POST['theme_color5_btn'];
            $theme_color5_btn_text = $_POST['theme_color5_btn_text'];
            $theme_color6 = $_POST['theme_color6'];
            $theme_color6_text = $_POST['theme_color6_text'];
            $theme_color6_text2 = $_POST['theme_color6_text2'];
            $theme_dark_color_danger = $_POST['theme_dark_color_danger'];
            $theme_dark_color_info = $_POST['theme_dark_color_info'];
            $theme_dark_color_warn = $_POST['theme_dark_color_warn'];
            $theme_dark_color_success = $_POST['theme_dark_color_success'];
            $theme_dark_color1 = $_POST['theme_dark_color1'];
            $theme_dark_color1_translucent = $_POST['theme_dark_color1_translucent'];
            $theme_dark_color1_text = $_POST['theme_dark_color1_text'];
            $theme_dark_color1_text2 = $_POST['theme_dark_color1_text2'];
            $theme_dark_color1_logo_s1 = $_POST['theme_dark_color1_logo_s1'];
            $theme_dark_color1_logo_s2 = $_POST['theme_dark_color1_logo_s2'];
            $theme_dark_color1_logo_s3 = $_POST['theme_dark_color1_logo_s3'];
            $theme_dark_color1_logo_text = $_POST['theme_dark_color1_logo_text'];
            $theme_dark_color1_btn = $_POST['theme_dark_color1_btn'];
            $theme_dark_color1_btn_text = $_POST['theme_dark_color1_btn_text'];
            $theme_dark_color2 = $_POST['theme_dark_color2'];
            $theme_dark_color2_text = $_POST['theme_dark_color2_text'];
            $theme_dark_color2_text2 = $_POST['theme_dark_color2_text2'];
            $theme_dark_color4 = $_POST['theme_dark_color4'];
            $theme_dark_color4_text = $_POST['theme_dark_color4_text'];
            $theme_dark_color4_text2 = $_POST['theme_dark_color4_text2'];
            $theme_dark_color4_text3 = $_POST['theme_dark_color4_text3'];
            $theme_dark_color4_logo_s1 = $_POST['theme_dark_color4_logo_s1'];
            $theme_dark_color4_logo_s2 = $_POST['theme_dark_color4_logo_s2'];
            $theme_dark_color4_logo_s3 = $_POST['theme_dark_color4_logo_s3'];
            $theme_dark_color4_logo_text = $_POST['theme_dark_color4_logo_text'];
            $theme_dark_color5 = $_POST['theme_dark_color5'];
            $theme_dark_color5_text = $_POST['theme_dark_color5_text'];
            $theme_dark_color5_text2 = $_POST['theme_dark_color5_text2'];
            $theme_dark_color5_logo_s1 = $_POST['theme_dark_color5_logo_s1'];
            $theme_dark_color5_logo_s2 = $_POST['theme_dark_color5_logo_s2'];
            $theme_dark_color5_logo_s3 = $_POST['theme_dark_color5_logo_s3'];
            $theme_dark_color5_logo_text = $_POST['theme_dark_color5_logo_text'];
            $theme_dark_color5_btn = $_POST['theme_dark_color5_btn'];
            $theme_dark_color5_btn_text = $_POST['theme_dark_color5_btn_text'];
            $theme_dark_color6 = $_POST['theme_dark_color6'];
            $theme_dark_color6_text = $_POST['theme_dark_color6_text'];
            $theme_dark_color6_text2 = $_POST['theme_dark_color6_text2'];
            $theme_id = $_POST['theme_id'];


            $theme = $themeDao->update(
                $theme_name,
                $theme_color_danger,
                $theme_color_info,
                $theme_color_warn,
                $theme_color_success,
                $theme_color1,
                $theme_color1_translucent,
                $theme_color1_text,
                $theme_color1_text2,
                $theme_color1_logo_s1,
                $theme_color1_logo_s2,
                $theme_color1_logo_s3,
                $theme_color1_logo_text,
                $theme_color1_btn,
                $theme_color1_btn_text,
                $theme_color2,
                $theme_color2_text,
                $theme_color2_text2,
                $theme_color4,
                $theme_color4_text,
                $theme_color4_text2,
                $theme_color4_text3,
                $theme_color4_logo_s1,
                $theme_color4_logo_s2,
                $theme_color4_logo_s3,
                $theme_color4_logo_text,
                $theme_color5,
                $theme_color5_text,
                $theme_color5_text2,
                $theme_color5_logo_s1,
                $theme_color5_logo_s2,
                $theme_color5_logo_s3,
                $theme_color5_logo_text,
                $theme_color5_btn,
                $theme_color5_btn_text,
                $theme_color6,
                $theme_color6_text,
                $theme_color6_text2,
                $theme_dark_color_danger,
                $theme_dark_color_info,
                $theme_dark_color_warn,
                $theme_dark_color_success,
                $theme_dark_color1,
                $theme_dark_color1_translucent,
                $theme_dark_color1_text,
                $theme_dark_color1_text2,
                $theme_dark_color1_logo_s1,
                $theme_dark_color1_logo_s2,
                $theme_dark_color1_logo_s3,
                $theme_dark_color1_logo_text,
                $theme_dark_color1_btn,
                $theme_dark_color1_btn_text,
                $theme_dark_color2,
                $theme_dark_color2_text,
                $theme_dark_color2_text2,
                $theme_dark_color4,
                $theme_dark_color4_text,
                $theme_dark_color4_text2,
                $theme_dark_color4_text3,
                $theme_dark_color4_logo_s1,
                $theme_dark_color4_logo_s2,
                $theme_dark_color4_logo_s3,
                $theme_dark_color4_logo_text,
                $theme_dark_color5,
                $theme_dark_color5_text,
                $theme_dark_color5_text2,
                $theme_dark_color5_logo_s1,
                $theme_dark_color5_logo_s2,
                $theme_dark_color5_logo_s3,
                $theme_dark_color5_logo_text,
                $theme_dark_color5_btn,
                $theme_dark_color5_btn_text,
                $theme_dark_color6,
                $theme_dark_color6_text,
                $theme_dark_color6_text2,
                $theme_id
            );
            $result['status'] = 'success';
            $result['message'] = 'Theme updated successfully';
            $result['response'] = true;
            $result['data'] = $theme;
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
        if (isset($_POST['theme_id'])) {
            $themeDao = new ThemeDao($adapter);
            $theme_id = $_POST['theme_id'];
            $theme = $themeDao->selectById($theme_id);
            if (!$theme) {
                $result['message'] = 'Theme not found';
                echo json_encode($result);
                exit();
            }

            $themeDao->delete($theme_id);
            $result['status'] = 'success';
            $result['message'] = 'Theme deleted successfully';
            $result['response'] = true;
        }
        echo json_encode($result);
    }
}
