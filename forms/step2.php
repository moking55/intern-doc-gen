<?php
$studentCount = $_GET['std_count'] ?? 0;
if ($studentCount == 0) :
?>
    <form action="index.php" method="get">
        <!-- step -->
        <input type="hidden" name="step" value="2" />
        <div class="row">
            <div class="col-6">
                จำนวนที่ไป:
            </div>
            <div class="col-6">
                <div class="form-group">
                    <select class="form-control" id="std_count" name="std_count">
                        <option value="1">1 คน</option>
                        <option value="2">2 คน</option>
                        <option value="3">3 คน</option>
                        <option value="4">4 คน</option>
                        <option value="5">5 คน</option>
                    </select>
                </div>
            </div>
        </div>
        <button class="btn btn-primary" type="submit">ถัดไป</button>
    </form>
<?php else : ?>
    <div class="p-3 mb-4 bg-dark text-light">
        <h1>2. ข้อมูลของนักศึกษาที่จะไปฝึกงาน/สหกิจ</h1>
        <p>โปรดกรอกข้อมูลสถานประกอบการให้ครบถ้วน และถูกต้อง</p>
    </div>
    <form action="submit.php?step=2" method="post">
        <div class="card">
            <div class="card-body">
                <?php for ($person = 1; $person <= $studentCount; $person++) : ?>
                    <h3>นักศึกษาคนที่ <?= $person ?>.</h3>
                    <div class="row">
                        <div class="col-6 col-md-4">
                            <div class="form-group">
                                <label for="std_name_<?= $person ?>">ชื่อ - นามสกุล</label>
                                <input type="text" class="form-control" id="std_name_<?= $person ?>" name="std_name_<?= $person ?>" placeholder="ชื่อ - นามสกุล" />
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="form-group">
                                <label for="std_id_<?= $person ?>">รหัสนักศึกษา</label>
                                <input type="text" class="form-control" id="std_id_<?= $person ?>" name="std_id_<?= $person ?>" placeholder="รหัสนักศึกษา" />
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <!-- ชื่อเล่น -->
                            <div class="form-group">
                                <label for="std_nickname_<?= $person ?>">ชื่อเล่น</label>
                                <input type="text" class="form-control" id="std_nickname_<?= $person ?>" name="std_nickname_<?= $person ?>" placeholder="ชื่อเล่น" />
                            </div>

                        </div>
                        <div class="col-6 col-md-4">
                            <!-- เกรดเฉลี่ย -->
                            <div class="form-group">
                                <label for="std_gpa_<?= $person ?>">เกรดเฉลี่ย</label>
                                <input type="text" class="form-control" id="std_gpa_<?= $person ?>" name="std_gpa_<?= $person ?>" placeholder="เกรดเฉลี่ย" />
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <!-- โทรศัพท์ -->
                            <div class="form-group">
                                <label for="std_tel_<?= $person ?>">โทรศัพท์</label>
                                <input type="text" class="form-control" id="std_tel_<?= $person ?>" name="std_tel_<?= $person ?>" placeholder="โทรศัพท์" />
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <!-- อีเมล์ -->
                            <div class="form-group">
                                <label for="std_email_<?= $person ?>">อีเมล์</label>
                                <input type="text" class="form-control" id="std_email_<?= $person ?>" name="std_email_<?= $person ?>" placeholder="อีเมล์" />
                            </div>
                        </div>
                        <div class="col-6 col-md-4">

                            <!-- ชื่อ Facebook -->
                            <div class="form-group">
                                <label for="std_facebook_<?= $person ?>">ชื่อ Facebook</label>
                                <input type="text" class="form-control" id="std_facebook_<?= $person ?>" name="std_facebook_<?= $person ?>" placeholder="ชื่อ Facebook" />
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <!-- line id -->
                            <div class="form-group">
                                <label for="std_line_<?= $person ?>">Line ID</label>
                                <input type="text" class="form-control" id="std_line_<?= $person ?>" name="std_line_<?= $person ?>" placeholder="Line ID" />
                            </div>
                        </div>
                        <div class="col-12">
                            <h5>บุคคลที่ติดต่อได้ในกรณีฉุกเฉิน (ผู้ปกครอง)</h5>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="form-group">
                                <label for="std_parent_name_<?= $person ?>">ชื่อ - นามสกุล</label>
                                <input type="text" class="form-control" id="std_parent_name_<?= $person ?>" name="std_parent_name_<?= $person ?>" placeholder="ชื่อ - นามสกุล" />
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="form-group">
                                <label for="std_parent_relation_<?= $person ?>">ความสัมพันธ์</label>
                                <input type="text" class="form-control" id="std_parent_relation_<?= $person ?>" name="std_parent_relation_<?= $person ?>" placeholder="ความสัมพันธ์" />
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="form-group">
                                <label for="std_parent_address_<?= $person ?>">ที่อยู่</label>
                                <input class="form-control" id="std_parent_address_<?= $person ?>" name="std_parent_address_<?= $person ?>" placeholder="ที่อยู่" />
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="form-group">
                                <label for="std_parent_telhome_<?= $person ?>">หมายเลขโทรศัพท์ที่บ้าน</label>
                                <input type="text" class="form-control" id="std_parent_telhome_<?= $person ?>" name="std_parent_telhome_<?= $person ?>" placeholder="หมายเลขโทรศัพท์ที่บ้าน" />
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="form-group">
                                <label for="std_parent_telphone_<?= $person ?>">หมายเลขโทรศัพท์เคลื่อนที่</label>
                                <input type="text" class="form-control" id="std_parent_telphone_<?= $person ?>" name="std_parent_telphone_<?= $person ?>" placeholder="หมายเลขโทรศัพท์เคลื่อนที่" />
                            </div>
                        </div>
                    </div>
                <?php endfor; ?>
            </div>
        </div>
        <button class="btn btn-primary" type="submit">ถัดไป</button>
    </form>
<?php endif; ?>