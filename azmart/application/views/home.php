            <div class="container">
                <!-- Caraousel -->
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  </ol>
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img src="<?php echo base_url('assets/img/slide1.jpg')?>" class="d-block w-100" alt="slider1">
                    </div>
                    <div class="carousel-item">
                      <img src="<?php echo base_url('assets/img/slide2.jpg')?>" class="d-block w-100" alt="slider2">
                    </div>
                    <div class="carousel-item">
                      <img src="<?php echo base_url('assets/img/slide3.jpg')?>" class="d-block w-100" alt="slider2">
                    </div>                    
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>

                 <div class="arrival">
                   <img src="<?php echo base_url('assets/img/newarrival.png') ?>">
                </div>
                    <div class="container">
                        <div class="row text-center mt-3">
                        <?php foreach($barang as $brg) : ?>
                        <div class="col-md-4 mb-4">
                            <div class="card" style="width: 18rem;">
                                <img src="<?php echo base_url().'uploads/'.$brg->gambar?>" class="card-img-top" alt="produk">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $brg->nama_brg ?></h5>
                                    <span class="badge badge-pill badge-success mb-3">Rp. <?php echo number_format($brg->harga, 0,',','.') ?></span>
                                    <br>
                                    <small><i class="fas fa-map-marker-alt mr-2"></i><?php echo $brg->kota_brg ?></small>
                                    <br><br>
                                    <?php echo anchor('home/tambah_ke_keranjang/' .$brg->id_brg, '<div class="btn btn-sm btn-dark"> Tambah ke Keranjang </div>') ?>
                                    <?php echo anchor('home/detail/' .$brg->id_brg, '<div class="btn btn-sm btn-success"> Detail </div>') ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                     </div>
                 </div>