<?php
/**
 * @Author: lpx
 * @Date:   2016-02-01 16:31:40
 * @Last Modified time: 2016-03-14 17:49:55
 */
$data = array(
    'id'=>1,
    'title'=>'123',
    'start'=>date('Y-m-d H:i',strtotime('10:38am April 11 2016')),
    'end'=>date('Y-m-d H:i',strtotime('11:38pm April 15 2016')),
    'allDay'=>true,
    'color'=>'green'
);
echo json_encode($data);
?>
