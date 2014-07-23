<?php
$baseUrl = Yii::app()->request->baseUrl;
$lr = $this->getLeftright();
foreach ($lr as $value) {
    if ($value->rank == 1) 
        $class = 'left';
    else 
        $class = 'right';
    if (!empty($value->image))
        $img = $baseUrl.'/'.$value->image;
    else 
        $img = $value->inkImg;
    ?> 
    <div class="<?php echo $class ?>">
        <a href="<?php echo $baseUrl.'/quang-cao/'.$value->alias.'.html'?>"><img src="<?php echo $img ?>"></a></div>
<?php
}?>
