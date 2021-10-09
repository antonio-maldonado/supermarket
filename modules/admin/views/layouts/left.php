<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?=Yii::$app->user->identity->profile->getAvatarUrl(96)?>" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?=Yii::$app->user->identity->profile->name?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

       
<?php
	$items = [];
	$levels = [
                                'label' => 'Level One',
                                'icon' => 'circle-o',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
                                    [
                                        'label' => 'Level Two',
                                        'icon' => 'circle-o',
                                        'url' => '#',
                                        'items' => [
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                        ],
                                    ],
                                ],
              ];
              
if(Yii::$app->user->can('technicalSupport')){
$items = [
	['label' => Yii::t('app', 'Empleados'), 'icon' => 'users', 'url' => ['/admin/filteremployee']],
    ];
}elseif(Yii::$app->user->can('seller')) {
$items = [
    ['label' => Yii::t('app', 'Tienda'), 'icon' => 'cutlery', 'url' => ['/admin/cart']],
	['label' => Yii::t('app', 'Productos'), 'icon' => 'apple', 'url' => ['/admin/filterproduct']],		
];
}elseif(Yii::$app->user->can('manager')) {
$items = [
    ['label' => Yii::t('app', 'Empleados'), 'icon' => 'users', 'url' => ['/admin/employee']],
    ['label' => Yii::t('app', 'Productos'), 'icon' => 'apple', 'url' => ['/admin/product']],
    ['label' => Yii::t('app', 'Pagos'), 'icon' => 'usd', 'url' => ['/admin/payment']],
    ['label' => Yii::t('app', 'Ordenes'), 'icon' => 'shopping-cart', 'url' => ['/admin/order']],

];
}
?>
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Pendientes', 'options' => ['class' => 'header']],                    
                    [
                        'label' => Yii::t('app', 'Tareas'),
                        'icon' => 'tasks',
                        'url' => '#',
                        'items' => $items,
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
