<!DOCTYPE html>
<html lang="en" class="h">
<head>
    <meta charset="UTF-8" />
    <title>多格测试2</title>
    <!-- css -->
    <link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl; ?>/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl; ?>/css/base.css" />
    <link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl; ?>/css/common.css" />
    <link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl; ?>/css/page.css" />
    <!-- js -->
    <script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl; ?>/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl; ?>/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl; ?>/js/Sortable.js"></script>
    <script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl; ?>/js/base.js"></script>
    <script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl; ?>/js/common.js"></script>
    <script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl; ?>/js/page.js"></script>

    <style>
    	.tile__list{ background-color: #000; height: 180px; position: relative; }
    </style>
</head>

<body id="main-body">

<!-- <div id="multi">
	<div id="items2" class="tile__list">
		<div class="tile__name">Group A</div>
		<div class="task">1</div>
		<div class="task">2</div>
		<div class="task">3</div>
	</div>

	<div id="items3" class="tile__list">
		<div class="tile__name">Group B</div>
		<div class="task">4</div>
		<div class="task">5</div>
		<div class="task">6</div>
	</div>
</div> -->

<div id="myTask" style="margin-left: 30px">
	<div><div data-force="5" class="layer title title_xl">Multi</div></div>

	<div class="layer tile" data-force="30">
		<div class="tile__name">Group A</div>
		<div class="tile__list">
		<!-- <img style="visibility:hidden" src="<?php echo Yii::$app->request->baseUrl; ?>/js/2.png"/> -->
		<!-- <img style="visibility:hidden" src="<?php echo Yii::$app->request->baseUrl; ?>/js/2.png"/> -->
			 <div draggable="true" style="width:100px;height:100px;background-color: red;">
				1
			</div> --><!--
			<img src="<?php echo Yii::$app->request->baseUrl; ?>/js/2.png"/><!--
			--><img src="<?php echo Yii::$app->request->baseUrl; ?>/js/3.png"/><!--
			--><img src="<?php echo Yii::$app->request->baseUrl; ?>/js/1.png"/>
		</div>
	</div>

	<div class="layer tile" data-force="25">
		<div class="tile__name">Group B</div>
		<div class="tile__list">
			<img src="<?php echo Yii::$app->request->baseUrl; ?>/js/1.png"/><!--
			--><img src="<?php echo Yii::$app->request->baseUrl; ?>/js/2.png"/><!--
			--><img src="<?php echo Yii::$app->request->baseUrl; ?>/js/3.png"/>
		</div>
	</div>

	<div class="layer tile" data-force="20">
		<div class="tile__name">Group C</div>
		<div class="tile__list">
			<img src="<?php echo Yii::$app->request->baseUrl; ?>/js/1.png"/><!--
			--><img src="<?php echo Yii::$app->request->baseUrl; ?>/js/2.png"/>
			<!-- <img style="visibility:hidden" src="<?php echo Yii::$app->request->baseUrl; ?>/js/2.png"/> -->
		</div>
	</div>

</div>

<script>
	(function (){
		var console = window.console;
		if( !console.log ){
			console.log = function (){
				alert([].join.apply(arguments, ' '));
			};
		}
		// new Sortable(multi, {
		// 	draggable: '.tile',
		// 	handle: '.tile__name'
		// });
		[].forEach.call(myTask.getElementsByClassName('tile__list'), function (el){
			new Sortable(el, { group: '123' });
		});
	})();
	// Background
	document.addEventListener( "DOMContentLoaded", function (){
		function setNoiseBackground(el, width, height, opacity){
			var canvas = document.createElement("canvas");
			var context = canvas.getContext("2d");

			canvas.width = width;
			canvas.height = height;

			for( var i = 0; i < width; i++ ){
				for( var j = 0; j < height; j++ ){
					var val = Math.floor(Math.random() * 255);
					context.fillStyle = "rgba(" + val + "," + val + "," + val + "," + opacity + ")";
					context.fillRect(i, j, 1, 1);
				}
			}

			el.style.background = "url(" + canvas.toDataURL("image/png") + ")";
		}

		setNoiseBackground(document.getElementsByTagName('body')[0], 50, 50, 0.02);
	}, false );
</script>
</body>