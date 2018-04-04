<?php echo $header; ?>
	<div id="content">
		<div class="breadcrumb">
			<?php foreach ($breadcrumbs as $breadcrumb) { ?>
				<?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
			<?php } ?>
		</div>
		<?php if ($error_warning) { ?>
			<div class="warning"><?php echo $error_warning; ?></div>
		<?php } ?>
		<div class="box">
			<div class="heading">
				<h1><img src="view/image/module.png" alt="" /> <?php echo $heading_title; ?></h1>
			</div>
			<div class="content">
			<div id="tabs" class="htabs">
				<a href="#connect-b24-tab">Соединение</a>
				<a href="#customer-b24-tab">Заказы</a>
			</div>
				<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-html" class="form-horizontal">
						<!--<ul class="nav nav-tabs" id="language">
							<?php //foreach ($languages as $language) { ?>
							<!--<li><a href="#language--><?php //echo $language['language_id']; ?><!--" data-toggle="tab"><img src="view/image/flags/--><?php //echo $language['image']; ?><!--" title="--><?php //echo $language['name']; ?><!--" /> --><?php //echo $language['name']; ?><!--</a></li>
							<li><a href="#connect-b24-tab" data-toggle="tab">Соединение</a></li>
							<li><a href="#customer-b24-tab" data-toggle="tab">Заказы</a></li>
							<?php //} ?>
						</ul>-->
							<?php //foreach ($languages as $language) { ?>
							<!--<div class="tab-pane" id="language--><?php //echo $language['language_id']; ?><!--">-->
							<div id="connect-b24-tab">

							<table class="form">
								<tr>
									<td>
										<span class="required">*</span>
										Код приложения
										</td>
									<td>
										<input type="text" name="client_id" maxlength="255" size="100" required value="<?= $saved_config['CLIENT_ID']?>">
									</td>
								</tr>
								<tr>
									<td>
										<span class="required">*</span>
										Ключ приложения
									</td>
									<td>
										<input type="text" name="client_secret" maxlength="255" size="100" value="<?= $saved_config['CLIENT_SECRET']?>" required>
									</td>
								</tr>
								<tr>
									<td>
										<span class="required">*</span>
										Домен сайта
									</td>
									<td>
									<input type="text" name="domain" maxlength="255" size="100" value="<?= $saved_config['DOMAIN']?>" required>
									</td>
								</tr>
								<tr>
									<td>
										<span class="required">*</span>
										Путь после домена
									</td>
									<td>
									<input type="text" name="path" maxlength="255" size="100" value="<?= $saved_config['PATH']?>" required>
									</td>
								</tr>
								<tr>
									<td>
										<span class="required">*</span>
										Разрешения
									</td>
									<td>
										<?
										if ( !empty($scope_list) )
										{
											foreach ( $scope_list as $scope )
											{
												$selected = in_array($scope, $saved_config['SCOPE']) ? 'checked="checked"' : '';
												?>

												<div>
													<input type="checkbox" name="scope[]" value="<?= $scope?>" <?= $selected?> >
													<label for=""><?=$scope?></label>
												</div>

											<?}
										}
										?>
									</td>
								</tr>
								<tr>
									<td>
										<span class="required">*</span>
										Домен Битрикс24
									</td>
									<td>
									<input type="text" name="b24_domain"  maxlength="255" size="100"  value="<?= $saved_config['B24_DOMAIN']?>" required>
									</td>
								</tr>
								<tr>
									<td>
									<?if ($access_token){?>
						<span class="bg-success">Ключ установлен</span>
					<?}else{?>
						<span class="bg-danger">Ключ не установлен</span>
					<?}?>
									</td>
									<td>
										<input type="submit" class="btn btn-success" name="save-config" value="Сохранить">
										<input type="submit" class="btn btn-success" name="connect" value="Соединиться">
									</td>
								</tr>
							</table>


								<!--select MAnager-->

								<!--<div class="form-group">-->
								<!--  <div class="col-sm-12 col-lg-6">-->
								<!--    <label for="manager">Выберите менеджера</label>-->
								<!--    <select name="manager" id="manager" class="form-control">-->
								<!--      --><?php
								//    // print_r($user_list);
								//    foreach($user_list as $manager)
								//    {
								//      $name = $manager['LAST_NAME'] .' '. $manager['NAME'];
								//      $managerId = $manager['ID'];
								//      $selected = $managerId == $manager_id ? 'selected' : '';
								//      echo "<option value='$managerId' $selected>$name</option>";
								//      }
								//      ?>
								<!--    </select>-->
								<!--  </div>-->
								<!--</div>-->

								<!-- Refresh user LIST-->

								<!--<div class="form-group">-->
								<!--  <div class="col-sm-12">-->
								<!--    <p>Список добавленных событии:</p>-->
								<!--    <table class="table">-->
								<!--      <tr>-->
								<!--        <th>Name(event)</th>-->
								<!--        <th>Url(handler)</th>-->
								<!--        <th>User id(auth_type)</th>-->
								<!--      </tr>-->
								<!--      --><?//
								//  foreach($result['result'] as $event)
								//  {
								//  echo '<tr>';
								//
								//      echo "<td>{$event['event']}</td>";
								//      echo "<td>{$event['handler']}</td>";
								//      echo "<td>{$event['auth_type']}</td>";
								//
								//      echo '</tr>';
								//      }
								//      ?>
								<!--    </table>-->
								<!--  </div>-->
								<!--</div>-->
							</div>

							<div id="customer-b24-tab">
							<table class="form">
								<!--select MAnager-->
								<tr>
									<td>Выберите менеджера</td>
									<td>
										<select name="manager" id="manager" class="form-control">
											<?php
											// print_r($user_list);
											foreach($user_list as $manager)
											{
												$name = $manager['LAST_NAME'] .' '. $manager['NAME'];
												$managerId = $manager['ID'];
												$selected = $managerId == $manager_id ? 'selected' : '';
												echo "<option value='$managerId' $selected>$name</option>";
											}
											?>
										</select>
									</td>
								</tr>
								<tr>
									<td></td>
									<td>
										<button type="submit" class="btn btn-success" name="refresh-user-list" value="refresh">Обновить список пользователей</button>
										<button type="submit" class="btn btn-success" name="set-manager" value="set-manager">Назначить менеджера</button>
									</td>
								</tr>
							</table>
							</div>
							<?php //} ?>

				</form>

				<style>
					.bg-danger{
						padding: 5px;
						margin-top: 10px;
						border-radius: 5px;
						background-color: #ee2653;
						color: #fff;
						}
					.bg-success{
						padding: 5px;
						margin-top: 10px;
						border-radius: 5px;
						background-color: #6bcb37;
						color: #fff;
					}
				</style>
			</div>
		</div>
	</div>

<script type="text/javascript"><!--
$('#tabs a').tabs();  
//--></script> 

<?php echo $footer; ?>


