<section class="plans-container row" id="plans">
                          <article class="col s12 m6 l4">
                            <div class="card z-depth-1">
                              <div class="card-image light-blue waves-effect">
                                <div class="card-title">BASIC</div>
                                <div class="price">
                                  <sup>INR</sup><?= $this->Memplan_model->getIndMemDet('free','cost') ?>
                                  <sub>/<?= $this->Memplan_model->getIndMemDet('free','days') ?></sub>
                                </div>
                                <div class="price-desc"><?= $this->Memplan_model->getIndMemDet('free','desc') ?></div>
                              </div>
                              <div class="card-content">
                                <ul class="center">
                                  <li class="row"><?= $this->Memplan_model->getIndMemDet('free','validity') ?></li>                    
                                  <li class="row">Max <?= $this->Memplan_model->getIndMemDet('free','photos') ?> Photos</li>

                                  <?php $data =$this->Memplan_model->getAttrMemDet('free','attr'); foreach ($data->result() as $row): ?>
                                    <li class="row"><?= $row->desp ?></li>
                                  <?php endforeach; ?>

                                </ul>
                              </div>
                              <div class="card-action center-align">                      
                                <button class="waves-effect waves-light light-blue btn-basic btn">Select Plan</button>
                              </div>
                            </div>
                          </article>

                            <article class="col s12 m6 l4 ">
                              <div class="card z-depth-2">
                                <div class="card-image light-blue darken-1 waves-effect">
                                  <div class="card-title">PROFESSIONAL</div>
                                  <div class="price">
                                  <sup>INR</sup><?= $this->Memplan_model->getIndMemDet('professional','cost') ?>
                                  <sub>/<?= $this->Memplan_model->getIndMemDet('professional','days') ?></sub>
                                </div>
                                <div class="price-desc"><?= $this->Memplan_model->getIndMemDet('professional','desc') ?></div>
                              </div>
                              <div class="card-content">
                                <ul class="center">
                                  <li class="row"><?= $this->Memplan_model->getIndMemDet('professional','validity') ?></li>             
                                  <li class="row">Max <?= $this->Memplan_model->getIndMemDet('professional','photos') ?> Photos</li>

                                  <?php $data =$this->Memplan_model->getAttrMemDet('professional','attr'); foreach ($data->result() as $row): ?>
                                    <li class="row"><?= $row->desp ?></li>
                                  <?php endforeach; ?>
                                  </ul>
                                </div>
                                <div class="card-action center-align">                      
                                  <button class="waves-effect waves-light light-blue btn btn-professional">Select Plan</button>
                                </div>
                              </div>
                            </article>

                            <article class="col s12 m6 l4">
                              <div class="card z-depth-3">
                                <div class="card-image light-blue darken-2 waves-effect">
                                  <div class="card-title">PREMIUM</div>
                                  <div class="price">
                                  <sup>INR</sup><?= $this->Memplan_model->getIndMemDet('premium','cost') ?>
                                  <sub>/<?= $this->Memplan_model->getIndMemDet('premium','days') ?></sub>
                                </div>
                                <div class="price-desc"><?= $this->Memplan_model->getIndMemDet('premium','desc') ?></div>
                              </div>
                              <div class="card-content">
                                <ul class="center">
                                  <li class="row"><?= $this->Memplan_model->getIndMemDet('premium','validity') ?></li>
                                  <li class="row">Unlimited Photos</li>

                                  <?php $data =$this->Memplan_model->getAttrMemDet('premium','attr'); foreach ($data->result() as $row): ?>
                                    <li class="row"><?= $row->desp ?></li>
                                  <?php endforeach; ?>
                                  </ul>
                                </div>
                                <div class="card-action center-align">                      
                                  <button class="waves-effect waves-light light-blue btn btn-premium">Select Plan</button>
                                </div>
                              </div>
                            </article>
              </section>

              <script>
                $('.btn-basic').click(function (){
                  location.href= '<?php echo base_url('index.php/advts/payment/free/');?>'+'<?= $id ?>';
                });

                $('.btn-professional').click(function (){
                  location.href= '<?php echo base_url('index.php/advts/payment/professional/');?>'+'<?= $id ?>';
                })

                $('.btn-premium').click(function (){
                  location.href= '<?php echo base_url('index.php/advts/payment/premium/');?>'+'<?= $id ?>';
                })
              </script>