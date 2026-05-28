<?php
header("Content-Type: application/json");
$file = "users.json";
if (!file_exists($file)) {
    file_put_contents($file, json_encode([]));
}

$users = json_decode(file_get_contents($file), true);
$method = $_SERVER['REQUEST_METHOD'];
$request = trim($_SERVER['REQUEST_URI'], '/');
$requestParts = explode('/', $request);
$id = null;

if (isset($requestParts[1])) {
    $id = (int)$requestParts[1];
}
function saveUsers($file, $users) {
    file_put_contents($file, json_encode($users, JSON_PRETTY_PRINT));
}

switch ($method) {
    // GET
    case 'GET':
        // GET /users
        if ($id === null) {
            echo json_encode($users, JSON_PRETTY_PRINT);
        }
        // GET /users/{id}
        else {
            $found = false;
            foreach ($users as $user) {
                if ($user['id'] == $id) {
                    echo json_encode($user, JSON_PRETTY_PRINT);
                    $found = true;
                    break;
                }
            }
            if (!$found) {
                http_response_code(404);
                echo json_encode([
                    "message" => "Користувача не знайдено"
                ]);
            }
        }
        break;
    // POST
    case 'POST':
        $data = json_decode(file_get_contents("php://input"), true);
        if (!isset($data['name']) || !isset($data['email'])) {
            http_response_code(400);
            echo json_encode([
                "message" => "Потрібні name та email"
            ]);
            exit;
        }
        $newId = 1;
        if (!empty($users)) {
            $ids = array_column($users, 'id');
            $newId = max($ids) + 1;
        }
        $newUser = [
            "id" => $newId,
            "name" => $data['name'],
            "email" => $data['email']
        ];

        $users[] = $newUser;
        saveUsers($file, $users);
        echo json_encode([
            "message" => "Користувача додано",
            "user" => $newUser
        ]);

        break;

    // PUT
    case 'PUT':

        $data = json_decode(file_get_contents("php://input"), true);
        $found = false;
        foreach ($users as &$user) {
            if ($user['id'] == $id) {
                if (isset($data['name'])) {
                    $user['name'] = $data['name'];
                }
                if (isset($data['email'])) {
                    $user['email'] = $data['email'];
                }
                $found = true;
                saveUsers($file, $users);
                echo json_encode([
                    "message" => "Користувача оновлено",
                    "user" => $user
                ]);
                break;
            }
        }
        if (!$found) {
            http_response_code(404);
            echo json_encode([
                "message" => "Користувача не знайдено"
            ]);
        }
        break;
    // DELETE
    case 'DELETE':

        $found = false;
        foreach ($users as $key => $user) {
            if ($user['id'] == $id) {
                unset($users[$key]);
                $users = array_values($users);
                saveUsers($file, $users);
                $found = true;
                echo json_encode([
                    "message" => "Користувача видалено"
                ]);
                break;
            }
        }
        if (!$found) {
            http_response_code(404);
            echo json_encode([
                "message" => "Користувача не знайдено"
            ]);
        }
        break;
    default:
        http_response_code(405);
        echo json_encode([
            "message" => "Метод не підтримується"
        ]);
}
?>
