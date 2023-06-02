<?php
class TeamService
{

    public static function select($DATA)
    {
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        $adapter = $DATA['mysqlAdapter'];
        $teamDao = new teamDao($adapter);
        $members = $teamDao->select();
        echo json_encode([
            'status' => 'success',
            'message' => 'Team members obtained successfully',
            'response' => true,
            'data' => $members
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
            $_POST['team_name'],
            $_POST['team_position'],
            $_POST['team_link']
        )) {
            $teamDao = new teamDao($adapter);
            $team_name = $_POST['team_name'];
            $team_position = $_POST['team_position'];
            $team_link = $_POST['team_link'];
            $team_photo = "default.png";
            if (isset($_FILES['team_photo'])) {
                if ($_FILES['team_photo']['tmp_name'] != "" or $_FILES['team_photo']['tmp_name'] != null) {
                    $team_photo = uploadFIle($_FILES['team_photo'], './public/img.team/');
                }
            };
            $member = $teamDao->insert(
                $team_name,
                $team_position,
                $team_photo,
                $team_link
            );
            $result['status'] = 'success';
            $result['message'] = 'Team member created successfully';
            $result['response'] = true;
            $result['data'] = $member;
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
            $_POST['team_name'],
            $_POST['team_position'],
            $_POST['team_link'],
            $_POST['team_id']
        )) {
            $teamDao = new teamDao($adapter);

            $team_id = $_POST['team_id'];
            $current_member = $teamDao->selectById($team_id);
            if (!$current_member) {
                $result['message'] = 'Team member not found';
                echo json_encode($result);
                exit();
            }

            $team_name = $_POST['team_name'];
            $team_position = $_POST['team_position'];
            $team_link = $_POST['team_link'];
            $team_photo = $current_member['team_photo'];
            if (isset($_FILES['team_photo'])) {
                if ($_FILES['team_photo']['tmp_name'] != "" or $_FILES['team_photo']['tmp_name'] != null) {
                    echo './public/img.team/' . $team_photo;
                    if ($team_photo != 'default.png' && $team_photo != '') deleteFile('./public/img.team/' . $team_photo);
                    $team_photo = uploadFIle($_FILES['team_photo'], './public/img.team/');
                }
            }
            $member = $teamDao->update(
                $team_name,
                $team_position,
                $team_photo,
                $team_link,
                $team_id
            );
            $result['status'] = 'success';
            $result['message'] = 'Team member updated successfully';
            $result['response'] = true;
            $result['data'] = $member;
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
        if (isset($_POST['team_id'])) {
            $teamDao = new teamDao($adapter);
            $team_id = $_POST['team_id'];
            $team = $teamDao->selectById($team_id);
            if (!$team) {
                $result['message'] = 'Team member not found';
                echo json_encode($result);
                exit();
            }
            if ($team['team_photo'] != 'default.png' && $team['team_photo'] != '') {
                deleteFile('./public/img.team/' . $team['team_photo']);
            }
            $teamDao->delete($team_id);
            $result['status'] = 'success';
            $result['message'] = 'Team member deleted successfully';
            $result['response'] = true;
        }
        echo json_encode($result);
    }
}
