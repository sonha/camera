<?php
$header = $this->getHeader();
if (!empty($header)) {
    foreach ($header as $item) {
        echo $item->content_1;
    }
} else {
    ?>
    <h4>CÔNG TY TNHH THƯƠNG MẠI & DỊCH VỤ VNNET</h4>
    <h6> Địa chỉ: 04 Thái Thị Bôi - Q. Thanh Khê - TP. Đà Nẵng</h6>
    <h6>Điện thoai: 05113 645 769 - Fax: 05113 645 768</h6>
    <h6>MST:0401489980</h6>
    <?php
}
?>
