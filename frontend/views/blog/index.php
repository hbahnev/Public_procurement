<?php

use yii\helpers\Html;
$this->title = 'Новини';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blog-index">

    <h1><?= Html::encode($this->title) ?></h1>
	
	<?php
		foreach($posts as $key=>$post)
		{
			
			?>
			<h3 style="font-style: italic;"><?=$post['title']?></h3>
			<p><?=$post['text']?></p>
	<?php
		}
	?>
</div>
