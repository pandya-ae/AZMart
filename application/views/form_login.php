
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-50 p-r-50 p-t-77 p-b-30">
				<form method="post" action="<?php echo base_url('auth/login') ?>" class="login100-form validate-form">
					<span class="login100-form-title p-b-55">
						<img width="220px" height="auto" src="<?php echo base_url('assets/img/AZMart_Logo.png') ?>">
					</span>

					<?php echo $this->session->flashdata('pesan') ?>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="username" placeholder="Masukkan Username..." autocomplete="off">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-user"></span>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
						<input class="input100" type="text" name="password" placeholder="Masukkan Password..." autocomplete="off">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-lock"></span>
						</span>
					</div>
					
					<div class="container-login100-form-btn p-t-25">
						<button type="submit" class="login100-form-btn">
							Login
						</button>
					</div>

					<div class="text-center w-full p-t-115">
						<span class="txt1">
							Not a member?
						</span>

						<a class="txt1 bo1 hov1" href="<?php echo base_url('registrasi/index'); ?>">
							Sign up now							
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
