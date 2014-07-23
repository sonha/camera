<div class="row-fluid">
    <div class="span9">
        <h4 class="title"><?php echo $category ?></h4>
            <?php
            $this->widget('zii.widgets.CListView', array(
                'dataProvider' => $dataProvider,
                'itemView' => '_view2',
                'template' => '{items} {pager}',
                    )
            );
            ?>
    </div>
    <div class="span3">
        <?php $this->widget('Right'); ?>
    </div>
</div>
       