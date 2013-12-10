<?php
require_once dirname(__FILE__) . '/../utils//Common.php';
require_once dirname(__FILE__) . '/../class/menuStub.php';

$menuData = array(
	'button'=>array(
				'name' => '服务',
				'sub_button' => array(
					array(
						'name' => '关于我们',
						'type' => 'click',
						'key' => ABOUT_US
					),
					array(
						'name' => '常见问题',
						'type' => 'click',
						'key' => FAQ
					),
					array(
						'name' => '在线预约',
						'type' => 'click',
						'key' => ORDER
					),
					array(
						'name' => '在线支付',
						'type' => 'click',
						'key' => PAY
					),
					array(
						'name' => '我的信息',
						'type' => 'click',
						'key' => MYINFO
					),
					
			),
			array(
				'name' => '案例展示',
				'sub_button' => array(
					array(
						'name' => '时光记',
						'type' => 'click',
						'key' => DEMO_TIMETALES
					)
				),
			),
			array(
				'name' => '今日资讯',
				'sub_button' => array(
					array(
						'name' => '同行资讯',
						'type' => 'click',
						'key' => INFO_OPPONENTS
					),
					array(
						'name' => '小故事',
						'type' => 'click',
						'key' => INFO_STORY
					),
					array(
						'name' => '语音',
						'type' => 'click',
						'key' => INFO_VOICE
					),
					array(
						'name' => '图片',
						'type' => 'click',
						'key' => INFO_PIC
					)
				)
			)
	)
);

?>