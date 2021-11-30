            <div class="copyright text-center text-dark ">
                 <p> Copyright by AZmart <i class="far fa-copyright"></i> 2021 </p>
            </div>
     

     <!-- Bundle JS Bootstrap -->

     <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="crossorigin="anonymous"></script>

     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

        <script>
             $(document).ready(function(){

               // data select provinsi
               $.ajax({
                    type:"POST",
                    url:"<?= base_url('home/provinsi') ?>",
                    success: function(hasil_provinsi){
                         //console.log(hasil_provinsi);
                         $("select[name=provinsi]").html(hasil_provinsi);
                    }
               });
               // data select kota
               $("select[name=provinsi]").on("change",function(){
                    var id_provinsi_terpilih = $("option:selected",this).attr("id_provinsi");
                    $.ajax({
                         type:"POST",
                         url: "<?= base_url('home/kota') ?>",
                         data: 'id_provinsi='+id_provinsi_terpilih,
                         success:function(hasil_kota){
                              //console.log(hasil_kota);
                              $("select[name=kota_asal]").html(hasil_kota);
                         }

                    });
               });
                $("select[name=kota_asal]").on("change",function(){
                    $.ajax({
                         type:"POST",
                         url: "<?= base_url('home/ekspedisi') ?>",
                         success:function(hasil_kurir){
                              //console.log(hasil_kota);
                              $("select[name=kurir]").html(hasil_kurir);
                         }
                    });
                });
                $("select[name=kurir]").on("change",function(){
                    // dapat kurir
                    var kurir_terpilih = $("select[name=kurir]").val()
                    var id_kota_asal_terpilih = $("option:selected","select[name=kota_asal]").attr('id_kota');

                    $.ajax({
                         type:"POST",
                         url: "<?= base_url('home/paket') ?>",
                         data:'kurir='+kurir_terpilih+'&id_kota='+id_kota_asal_terpilih,
                         success:function(hasil_paket){
                              //console.log(hasil_kota);
                              $("select[name=paket]").html(hasil_paket);
                         }
                    });
                });

                $("select[name=paket]").on("change",function(){

                    // tampil ongkir
                    var dataongkir = $("option:selected",this).attr('ongkir');
                    $("#ongkir").html("Rp. " + new Intl.NumberFormat('de-DE').format(dataongkir));

                    // total bayar
                    //var ongkir = $("option:selected",this).attr('ongkir');
                    var data_total_bayar = parseInt(dataongkir)+parseInt(<?= $this->cart->total() ?>);
                    $("#total_bayar").html("Rp. " + new Intl.NumberFormat('de-DE').format(data_total_bayar));
                });
             });
        </script>

     </script>
    </body>
    </html>