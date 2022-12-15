<?php
// 設置資料類型 json，編碼格式 utf-8
header('Content-Type: application/json; charset=UTF-8');

// 定義一個二維陣列來儲存員工資料，每筆員工資料為一個陣列
$staff = array(
            array('number' => '1020501', 'name' => "王一傑", 'sex' => '男'),
            array('number' => '1020502', 'name' => "王二傑", 'sex' => '男'),
            array('number' => '1020503', 'name' => "王三傑", 'sex' => '男'));

// 判斷如果是 GET 請求，則進行搜尋；如果是 POST 請求，則進行新建
// $_SERVER['REQUEST_METHOD'] 返回訪問頁面使用的請求方法
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    search($staff);
} else if ($_SERVER['REQUEST_METHOD'] == "POST") {
    create();
}

// 通過員工編號搜尋
function search($staff) {
    // 檢查是否有員工編號的參數
    // isset() 方法檢測變數是否設置；empty() 方法判斷值是否為空
    // 超全域變數 $_GET 和 $_POST 用於收集表單資料
    if (!isset($_GET['number']) || empty($_GET['number'])) {
        echo json_encode(array('msg' => '沒有輸入員工編號！'));

        return;
    }

    // 搜尋員工編號
    for ($i = 0, $len = count($staff); $i < $len; $i++) {
        // 如果存在，儲存對應的陣列
        if ($staff[$i]['number'] == $_GET['number']) {
            $result = $staff[$i];
        }
    }

    // 將陣列編碼成 JSON 字串
    echo isset($result) ? json_encode($result) : json_encode(array('msg' => '沒有該員工！'));
}

// 新建員工
function create() {
    // 如果員工資料未填寫完全
    if (!isset($_POST['number']) || empty($_POST['number']) ||
        !isset($_POST['name']) || empty($_POST['name']) ||
        !isset($_POST['sex']) || empty($_POST['sex'])) {
        echo json_encode(array('msg' => '員工資料未填寫完全！'));

        return;
    }

    // 可將獲取的 POST 表單資料，儲存到資料庫（該部分未實作）

    // 儲存成功，返回員工姓名
    echo json_encode(array('name' => $_POST['name']));
}
