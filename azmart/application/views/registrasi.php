
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-50 p-r-50 p-t-77 p-b-30">
				<form method="post" action="<?php echo base_url('registrasi/index') ?>" class="login100-form validate-form">
					<span class="login100-form-title p-b-55">
						<img width="220px" height="auto" src="<?php echo base_url('assets/img/AZMart_Logo.png') ?>">
					</span>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="nama" placeholder="Masukkan Nama..." autocomplete="off">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-user"></span>
						</span>
					</div>					

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="username" placeholder="Masukkan Username..." autocomplete="off">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-user"></span>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
						<input class="input100" type="text" name="password_1" placeholder="Masukkan Password..." autocomplete="off">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-lock"></span>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
						<input class="input100" type="text" name="password_2" placeholder="Masukkan Password..." autocomplete="off">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-lock"></span>
						</span>
					</div>			

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
						<input class="input100" type="text" name="role_id" placeholder="Masukkan Role..." autocomplete="off">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-pushpin"></span>
						</span>
					</div>			
					
					<div class="container-login100-form-btn p-t-25">
						<button type="submit" class="login100-form-btn">
							Register
						</button>
					</div>

					<div class="text-center w-full p-t-115">
						<span class="txt1">
							Already have an account?
						</span>

						<a class="txt1 bo1 hov1" href="<?php echo base_url('auth/login') ?>">
							Login Now						
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
