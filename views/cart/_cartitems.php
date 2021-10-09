<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\dialog\Dialog;

echo Dialog::widget(['overrideYiiConfirm' => true]);

?>

<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header"> 
				<h3 class="box-title">
					<i class="glyphicon glyphicon-shopping-cart"></i>
					<?=Yii::t('app','Shop')?>
				</h3>			
			</div>
			<div class="box-body table-responsive no padding">
				<table class="table table-hover">
				<thead>
					<tr class="active">
					
						<th><?=Yii::t('app', 'Name')?></th>
						<th><?=Yii::t('app', 'Quantity')?></th>
						<th>
							<span class="label label-info">
								<i class="fa fa-plus"></i>
							</span>						
						</th>
						<th>
							<span class="label label-info">
								<i class="glyphicon glyphicon-minus"></i>
							</span>						
						</th>
						<th><?=Yii::t('app', 'Price')?></th>
						<th><?=Yii::t('app', 'Subtotal')?></th>
						<th><i aria-hidden='true'>&times;</i></th>
					</tr>
					</thead>
					<tbody>
						<?php foreach($cartItems as $item){ ?>
						<tr>
						
							<td>
							<?= Html::a($item->getProduct()->name,
							['view', 'id' => $item->getProduct()->code]
							)?>
							</td>
							<td>
							<?=$item->getQuantity()?>
							</td>
							<td>
								<a href="<?=Url::to(['/cart/add',
								'code' => $item->getProduct()->code,])?>"
								title="<?=Yii::t('app', 'Add{0}',
											$item->getProduct()->name)?>"
								/>
								<i class="fa fa-plus"></i>																
								</a>
							</td>
							<td>
							<a href="<?=Url::to(['/cart/subtract',
								'code' => $item->getProduct()->code,])?>"
								title="<?=Yii::t('app', 'Subtract {0}',
											$item->getProduct()->name)?>"
								/>
								<i class="fa fa-minus"></i>			
								</a>
							</td>
							<td>
							<?=number_format($item->getPrice(), 2)?>
							</td>
							<td>
								<?=number_format($item->getCost(), 2)?>
							</td>
							<td>
						<a href="<?=Url::to(['/cart/remove',
								'code' => $item->getProduct()->code,])?>"
								title="<?=Yii::t('app', 'Remove {0}',
											$item->getProduct()->name)?>"
								/>
								<i class="fa fa-trash-o"></i>			
								</a>	
							</td>						
						</tr>
						<?php }?>
						<tr class="active">
							<td colspan="1"><?=Yii::t('app', 'Total qty')?>:</td>
							<td colspan="7"><?=$cart->getTotalCount()?></td>
						</tr>
						<tr class="active">
							<td colspan="1"><?=Yii::t('app', 'Total')?>:</td>
							<td colspan="7"><?=number_format($cart->getTotalCost(),2)?></td>
						</tr>
					</tbody>				
				</table>
			<div class="box-footer">
			<?=Html::a(Yii::t('app', 'Clear'),
					['/cart/clear'],
					['class'=>'btn btn-default',
					'data'=>[
						'confirm' =>Yii::t('app','Are you sure you want to delete this cart'),
						'method' => 'post'
					],	
				]		
			)?>
			
			<?php $finish = 0; ?>
			<a href="<?=Url::to(['/cart/finish'])?>"
			class='btn btn-info pull-right' />
			<?=Yii::t('app', 'Order')?>
			</a>
			
			<?php if($finish != 0) {
				echo $this->render('_finalizar',['cost' => $item->getCost(),	'qty' => $item->getQuantity(),]);
				}
				?>
				
			
				</div>
			</div>		
		</div>
	</div>
</div>
