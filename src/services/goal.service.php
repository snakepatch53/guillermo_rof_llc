<?php
class GoalService
{
    public static function select($DATA)
    {
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        $adapter = $DATA['mysqlAdapter'];
        $goalDao = new GoalDao($adapter);
        $goals = $goalDao->select();
        echo json_encode([
            'status' => 'success',
            'message' => 'Goals obtained correctly',
            'response' => true,
            'data' => $goals
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
            $_POST['goal_name'],
            $_POST['goal_icon']
        )) {
            $adapter = $DATA['mysqlAdapter'];
            $goalDao = new GoalDao($adapter);

            $goal_name = $_POST['goal_name'];
            $goal_icon = $_POST['goal_icon'];

            $goal_id = $goalDao->insert(
                $goal_name,
                $goal_icon
            );

            $result['status'] = 'success';
            $result['message'] = 'Goal inserted correctly';
            $result['response'] = true;
            $result['data'] = $goal_id;
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
            $_POST['goal_name'],
            $_POST['goal_icon'],
            $_POST['goal_id']
        )) {
            $adapter = $DATA['mysqlAdapter'];
            $goalDao = new GoalDao($adapter);

            $goal_name = $_POST['goal_name'];
            $goal_icon = $_POST['goal_icon'];
            $goal_id = $_POST['goal_id'];

            $goalDao->update(
                $goal_name,
                $goal_icon,
                $goal_id
            );

            $result['status'] = 'success';
            $result['message'] = 'Goal updated correctly';
            $result['response'] = true;
            $result['data'] = $goal_id;
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
        if (isset($_POST['goal_id'])) {
            $adapter = $DATA['mysqlAdapter'];
            $goalDao = new GoalDao($adapter);
            $goal_id = $_POST['goal_id'];
            $goalDao->delete($goal_id);
            $result['status'] = 'success';
            $result['message'] = 'Goal deleted correctly';
            $result['response'] = true;
            $result['data'] = $goal_id;
        }
        echo json_encode($result);
    }
}
