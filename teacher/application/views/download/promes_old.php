<?php foreach($promes_data as $cm){ ?>
						<div class="col-md-12 col-12">
							<p class="label month"  style="margin-top:30px;"><?=strtoupper($cm["month"])?></p>
						</div>
						<div class="col-md-12 col-12">
							<div class="table-responsive">
								<table class="table table-bordered">
									<thead>
										<tr class="bg_ivory">
											<th scope="col">Topic</th>
											<th scope="col">Time Allocation</th>
										</tr>
									</thead>
									<tbody>
										<tr class="align-top">
											<td>
											<p><?=$cm["title"]?></p>
											</td>
											<td>
											<p><?=$cm["time_allocation"]?></p>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
							<?php if($detail[0]->curicullum_id == 1){ ?>
							<!-- learning objectives -->
							<div class="table-responsive">
								<table class="table table-bordered">
									<thead>
										<tr class="bg_ivory">
											<th scope="col">Learning Objectives</th>
										</tr>
									</thead>
									<tbody>
										<tr class="align-top">
											<td>
											<?php if (! empty($cm->class_mission_learning_objectives)) { ?>
												<br>
												<ul class="ul_sdg">
													<?php foreach ($cm->class_mission_learning_objectives as $cmlo) {
														if($cmlo->name != ""){
													?>
														<li><?=$cmlo->name?></li>
													<?php }
													}
													?>
												</ul>
											<?php } ?>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
							<?php } ?>
							<!-- competencies / capaian pembelajaran -->
							<div class="table-responsive">
								<table class="table table-bordered">
									<thead>
										<tr class="bg_ivory">
											<th scope="col">
												<?php if($detail[0]->curicullum_id == 1){ ?>
													Competencies
												<?php }else if($detail[0]->curicullum_id == 2){ ?>
													Learning Achievement
												<?php } ?>
											</th>
										</tr>
									</thead>
									<tbody>
										<tr class="align-top">
											<td>
												<div class="boc">
													<?php foreach($cm["comp"] as $c){ ?>
														<?=$c?>
													<?php } ?>
												</div>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					<?php } ?>