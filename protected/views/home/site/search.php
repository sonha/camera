<div class="row-fluid">
    <div class="span9">
        <div id="product" >
            <?php
            $this->widget('zii.widgets.CListView', array(
                'dataProvider' => $dataProvider,
                'itemView' => '_view',
                'template' => '{items} {pager}',
                    )
            );
            ?>
        </div>
    </div>
    <div class="span3">
         <?php $this->widget('Right'); ?>
    </div>
</div>
