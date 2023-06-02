<?php
class ProjectService
{

    public static function select($DATA)
    {
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        $adapter = $DATA['mysqlAdapter'];
        $projectDao = new ProjectDao($adapter);
        $projects = $projectDao->select();
        echo json_encode([
            'status' => 'success',
            'message' => 'Projects obtained successfully',
            'response' => true,
            'data' => $projects
        ]);
    }

    public static function update_from_facebook($DATA, $app_token, $token_renew_threshold)
    {
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        $result = [
            'status' => 'error',
            'message' => "You're not authorized to access this resource",
            'response' => false,
            'data' => null,
            'fb_token_expire' => null,
            'inserts' => null
        ];
        if ($_ENV['APP_ACCESS_TOKEN'] != $app_token) {
            echo json_encode($result);
            exit();
        }
        $adapter = $DATA['mysqlAdapter'];
        $infoDao = new InfoDao($adapter);
        $serviceDao = new ServiceDao($adapter);
        $projectDao = new ProjectDao($adapter);
        $info = $infoDao->select();


        $facebook_result = null;
        // TODO: descomentar en produccion
        $fbSDKAdapter = new FacebookSDKAdapter(
            $info['info_fb_app_id'],
            $info['info_fb_app_secret'],
            $info['info_fb_access_token'],
            $info['info_fb_page_id']
        );
        $facebook_result = $fbSDKAdapter->getPosts($token_renew_threshold, fn ($v) => $infoDao->updateFacebookAccessToken($v));
        // $facebook_result = json_decode(file_get_contents('./src/mooks/facebook_posts.json'), true); // ! TESTS


        if ($facebook_result == null) {
            $result['message'] = 'could not get posts';
            echo json_encode($result);
            exit();
        }
        // Extraemos los servicios para hacer match con los posts y asi guardar las fk correspondiente de cada project
        $services = $serviceDao->select();
        // borramos todas las publicaciones en la base de datos de projects
        $projectDao->deleteFacebookPosts();
        // insertamos las nuevas publicaciones en la base de datos de projects
        $values = [];
        $posts_filtered = [];
        foreach ($facebook_result['posts'] as $post) {
            $desc = $post['desc'];
            $img = $post['img'];
            $url = $post['url'];
            $title = '';
            $service_id = 0;
            foreach ($services as $service) {
                $compare1 = strToLower($desc);
                $compare2 = strToLower("#" . str_replace(' ', '', $service['service_title']));
                if (strpos($compare1, $compare2) !== false) {
                    $title = "Project of '" . trim($service['service_title']) . "'";
                    $service_id = $service['service_id'];
                    break;
                }
            }
            if ($service_id == 0) continue;
            $value = [$title, $desc, $img, $url, 'facebook', $service_id];
            $posts_filtered[] = $value;
            $values[] = $value;
        }

        $response_inserts = $projectDao->inserts(
            [
                'project_title',
                'project_desc',
                'project_img',
                'project_link',
                'project_origin',
                'service_id'
            ],
            $values
        );

        $result['status'] = 'success';
        $result['message'] = 'Posts obtained successfully';
        $result['response'] = true;
        $result['data'] = $posts_filtered;
        $result['inserts'] = $response_inserts;
        $result['fb_token_expire'] = $facebook_result['expire_in'];
        echo json_encode($result);
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
            $_POST['project_title'],
            $_POST['project_desc'],
            $_FILES['project_img'],
            $_POST['project_link'],
            $_POST['service_id']
        )) {
            $projectDao = new ProjectDao($adapter);
            $project_title = $_POST['project_title'];
            $project_desc = $_POST['project_desc'];
            $project_link = $_POST['project_link'];
            $project_origin = 'website';
            $service_id = $_POST['service_id'];
            $project_img = '';

            if (isset($_FILES['project_img'])) {
                if ($_FILES['project_img']['tmp_name'] != "" or $_FILES['project_img']['tmp_name'] != null) {
                    $project_img = uploadFIle($_FILES['project_img'], './public/img.projects/');
                }
            };
            $project = $projectDao->insert(
                $project_title,
                $project_desc,
                $project_img,
                $project_link,
                $project_origin,
                $service_id
            );
            $result['status'] = 'success';
            $result['message'] = 'Project created successfully';
            $result['response'] = true;
            $result['data'] = $project;
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
            $_POST['project_title'],
            $_POST['project_desc'],
            $_POST['project_link'],
            $_POST['service_id'],
            $_POST['project_id']
        )) {
            $projectDao = new ProjectDao($adapter);

            $project_id = $_POST['project_id'];
            $current_project = $projectDao->selectById($project_id);
            if (!$current_project) {
                $result['message'] = 'project not found';
                echo json_encode($result);
                exit();
            }

            $project_title = $_POST['project_title'];
            $project_desc = $_POST['project_desc'];
            $project_link = $_POST['project_link'];
            // $project_origin = 'website';
            $project_origin = $current_project['project_origin'];
            $service_id = $_POST['service_id'];
            $project_img = $current_project['project_img'];
            if (isset($_FILES['project_img'])) {
                if ($_FILES['project_img']['tmp_name'] != "" or $_FILES['project_img']['tmp_name'] != null) {
                    if ($project_img != 'default.png' && $project_img != '') deleteFile('./public/img.projects/' . $project_img);
                    $project_img = uploadFIle($_FILES['project_img'], './public/img.projects/');
                }
            }
            $project = $projectDao->update(
                $project_title,
                $project_desc,
                $project_img,
                $project_link,
                $project_origin,
                $service_id,
                $project_id
            );
            $result['status'] = 'success';
            $result['message'] = 'project updated successfully';
            $result['response'] = true;
            $result['data'] = $project;
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
        if (isset($_POST['project_id'])) {
            $projectDao = new ProjectDao($adapter);
            $project_id = $_POST['project_id'];
            $project = $projectDao->selectById($project_id);
            if (!$project) {
                $result['message'] = 'project not found';
                echo json_encode($result);
                exit();
            }
            if ($project['project_img'] != 'default.png' && $project['project_img'] != '') {
                deleteFile('./public/img.projects/' . $project['project_img']);
            }
            $projectDao->delete($project_id);
            $result['status'] = 'success';
            $result['message'] = 'Project deleted successfully';
            $result['response'] = true;
        }
        echo json_encode($result);
    }
}
