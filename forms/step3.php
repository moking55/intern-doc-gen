<h1>3. โปรดตรวจสอบข้อมูลให้ถูกต้อง</h1>
<?php
$company = $_SESSION['company_info'];
$students = $_SESSION['students_info'];
$sortedStudents = array();
$currentID = 0;
foreach ($students as $key => $value) {
    // std_nickname_1 extract 1 from std_nickname_1
    $std_id = explode("_", $key)[2];
    $std_id = intval($std_id);
    if ($currentID != $std_id) {
        $sortedStudents[$std_id]['std_name'] = $students['std_name_' . $std_id];
        $sortedStudents[$std_id]['std_id'] = $students['std_id_' . $std_id];
        $sortedStudents[$std_id]['std_nickname'] = $students['std_nickname_' . $std_id];
        $sortedStudents[$std_id]['std_gpa'] = $students['std_gpa_' . $std_id];
        $sortedStudents[$std_id]['std_tel'] = $students['std_tel_' . $std_id];
        $sortedStudents[$std_id]['std_email'] = $students['std_email_' . $std_id];
        $sortedStudents[$std_id]['std_facebook'] = $students['std_facebook_' . $std_id];
        $sortedStudents[$std_id]['std_line'] = $students['std_line_' . $std_id];
        $sortedStudents[$std_id]['std_parent_name'] = $students['std_parent_name_' . $std_id];
        $sortedStudents[$std_id]['std_parent_relation'] = $students['std_parent_relation_' . $std_id];
        $sortedStudents[$std_id]['std_parent_address'] = $students['std_parent_address_' . $std_id];
        $sortedStudents[$std_id]['std_parent_telhome'] = $students['std_parent_telhome_' . $std_id];
        $sortedStudents[$std_id]['std_parent_telphone'] = $students['std_parent_telphone_' . $std_id];
        /* $currentID++; */
    }
}
foreach ($sortedStudents as $key => $value) {
    echo "<div class='border border-dark p-3'>";
    echo "<h2>นักศึกษาที่ " . ($key) . "</h2>";
    echo "<p class='m-0'>ชื่อ: " . $value['std_name'] . "</p>";
    echo "<p class='m-0'>รหัสนักศึกษา: " . $value['std_id'] . "</p>";
    echo "<p class='m-0'>ชื่อเล่น: " . $value['std_nickname'] . "</p>";
    echo "<p class='m-0'>GPA: " . $value['std_gpa'] . "</p>";
    echo "<p class='m-0'>เบอร์โทรศัพท์: " . $value['std_tel'] . "</p>";
    echo "<p class='m-0'>อีเมล: " . $value['std_email'] . "</p>";
    echo "<p class='m-0'>Facebook: " . $value['std_facebook'] . "</p>";
    echo "<p class='m-0'>Line: " . $value['std_line'] . "</p>";
    echo "</div>";
}
$_SESSION['students_data'] = $sortedStudents;
?>
<div class="text-center mt-3">
    <h4>ขั้นตอนสุดท้ายเซ็นรับรองเอกสาร</h4>
    <p>ข้าพเจ้าขอรับรองว่าข้อมูลที่กรอกมีความถูกต้องทุกประการ</p>
    <canvas id="sketchpad" style="border: 2px solid grey;"></canvas>
    <form action="exporter.php" method="post">

        <input type="text" name="signature" id="signature" hidden>
        <hr>
        <a class="btn btn-success btn-lg text-center" onclick="confirmImage()">ยืนยันลายเซ็น</a>
        <button type="submit" class="btn btn-primary btn-lg text-center" id="createDoc" disabled>ข้อมูลครบถ้วน สร้างเอกสารเลย!</button>
    </form>
</div>