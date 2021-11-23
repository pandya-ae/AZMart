            <div class="copyright text-center text-dark ">
                 <p> Copyright by AZMart <i class="far fa-copyright"></i> 2021 </p>
            </div>
        <!-- Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

        <script>
             document.getElementById('provinsi').addEventListener('change',function(){
               fetch("<?= base_url('home/kota/')?>"+this.value,{
                    method:'GET',
               }).then((response) => response.text()).then((data) => {
                    console.log(data)
                    document.getElementById('kota_asal').innerHTML = data
               });
             });
        </script>

    </body>
    </html>