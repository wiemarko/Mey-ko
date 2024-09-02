<?php
// Turn off all error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// If the request method is not POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('HTTP/1.1 405 Method Not Allowed');
    exit;
}

include_once('../../inc/db.php');

include_once('functions.php');

if ($_POST && $_POST['action'] === 'new-product') {
    $name = htmlspecialchars(trim(strip_tags($_POST['name'])));
    $price = htmlspecialchars(trim(strip_tags($_POST['price'])));
    $allowed = ['jpg', 'jpeg', 'png'];
    $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    if (!in_array($ext, $allowed)) {
        $response = [
            'status' => false,
            'message' => 'Lütfen geçerli bir resim dosyası seçin!'
        ];
        echo json_encode($response);
        exit;
    }
    // Check Image Size (max 7MB)
    if ($_FILES['image']['size'] > 7000000) {
        $response = [
            'status' => false,
            'message' => 'Lütfen 7MB\'dan küçük bir resim dosyası seçin!'
        ];
        echo json_encode($response);
        exit;
    }
    // Sha1 the image name
    $image = sha1($_FILES['image']['name']) . '.' . $ext;
    try {
        $upload = move_uploaded_file($_FILES['image']['tmp_name'], '../../images/' . $image);
        $db = db_connect();
        $stmt = $db->prepare('INSERT INTO urunler (urunadi, resim, urunfiyat) VALUES (:name, :image, :price)');
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':price', $price);
        try {
            $stmt->execute();
            $response = [
                'status' => true,
                'message' => 'Ürün başarıyla eklendi!'
            ];
            echo json_encode($response);
            exit;
        } catch (Exception $e) {
            $response = [
                'status' => false,
                'message' => 'Ürün eklenirken bir hata oluştu!'
            ];
            echo json_encode($response);
            exit;
        }
    } catch (Exception $e) {
        $response = [
            'status' => false,
            'message' => 'Resim yüklenirken bir hata oluştu!'
        ];
        echo json_encode($response);
        exit;
    }
}


$posts = json_decode(file_get_contents('php://input'), true);

switch ($posts['action']) {
    case 'login':
        $username = htmlspecialchars(trim(strip_tags($posts['username'])));
        $password = htmlspecialchars(trim(strip_tags(hash('sha256', $posts['password']))));
        $db = db_connect();
        $stmt = $db->prepare('SELECT * FROM admins WHERE username = :username AND password = :password');
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_OBJ);
        if ($user) {
            session_start();
            ob_start();
            $_SESSION['user'] = $user;
            echo json_encode(['status' => true, 'message' => 'Logged in successfully!']);
        } else {
            echo json_encode(['status' => false, 'message' => 'Invalid username or passwords']);
            exit;
        }
        break;
    case 'toggle':
        $state = (int)htmlspecialchars(trim(strip_tags($posts['state'])));
        $db = db_connect();
        $stmt = $db->prepare('UPDATE settings SET isActive = :state WHERE id = 1');
        $stmt->bindParam(':state', $state);
        try {
            $stmt->execute();
            echo json_encode(['status' => true, 'message' => 'Site durumu başarıyla değiştirildi']);
        } catch (Exception $e) {
            echo json_encode(['status' => false, 'message' => 'Site durumu değiştirilemedi']);
            exit;
        }
        break;
    case 'getAllStatistic':
        $db = db_connect();

        // Check all baskets time is 10 seconds ago
        $stmt = $db->prepare('SELECT * FROM basket WHERE is_warn = 1');
        $stmt->execute();
        $baskets = $stmt->fetchAll(PDO::FETCH_OBJ);

        foreach ($baskets as $basket) {
            $now = new DateTime();
            $created_at = new DateTime($basket->created_at);
            $diff = $now->getTimestamp() - $created_at->getTimestamp();
            if ($diff > 10) {
                $stmt = $db->prepare('UPDATE basket SET is_warn = 2 WHERE id = :id');
                $stmt->bindParam(':id', $basket->id);
                $stmt->execute();
            }
        }

        // Count all basket
        $stmt = $db->prepare('SELECT COUNT(*) AS count FROM basket');
        $stmt->execute();
        $basket = $stmt->fetch(PDO::FETCH_OBJ);
        $total_baskets = $basket->count;

        // Check if there are any baskets with is_warn = 1
        $stmt = $db->prepare('SELECT COUNT(*) AS count FROM basket WHERE is_warn = 1');
        $stmt->execute();
        $warning_basket = $stmt->fetch(PDO::FETCH_OBJ);
        $has_warning = $warning_basket->count > 0;

        // Count Logs
        $stmt = $db->prepare('SELECT COUNT(*) AS count FROM logs');
        $stmt->execute();
        $log = $stmt->fetch(PDO::FETCH_OBJ);
        $total_logs = $log->count;

        $response = [
            'status' => true,
            'basket' => $total_baskets,
            'logs' => $total_logs,
            'warning' => $has_warning
        ];
        echo json_encode($response);
        break;
    default:
        header('HTTP/1.1 404 Not Found');
        exit;
}