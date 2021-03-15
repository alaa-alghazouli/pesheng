@extends ('layouts.layout')
@section ('contents')

	<div id="colorlib-page">
		<div id="colorlib-contact">
			<div class="container">
				<div class="row text-center">
					<h2 class="bold">Contact</h2>
				</div>
				<div class="row">
					<div class="col-md-12 col-md-offset-0">
						<div class="row">
							<div class="col-md-4 animate-box">
								<h3>My Address</h3>
								<ul class="contact-info">
									<li><span><i class="icon-map5"></i></span>88 West 21th Street, Suite 721 New York NY 10016</li>
									<li><span><i class="icon-phone4"></i></span>+ 1235 2355 98</li>
									<li><span><i class="icon-envelope2"></i></span><a href="#">info@yoursite.com</a></li>
									<li><span><i class="icon-globe3"></i></span><a href="#">www.yoursite.com</a></li>
								</ul>
							</div>
							<div class="col-md-7 col-md-push-1 animate-box">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Name">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Email">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<textarea name="" class="form-control" id="" cols="30" rows="7" placeholder="Message"></textarea>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<input type="submit" value="Send Message" class="btn btn-primary btn-submit">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div id="colorlib-subscribe">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center colorlib-heading animate-box">
						<h2>Subscribe Newsletter</h2>
						<p>Subscribe our newsletter and get latest update</p>
					</div>
				</div>
				<div class="row animate-box">
					<div class="col-md-6 col-md-offset-3">
						<div class="row">
							<div class="col-md-12">
							<form class="form-inline qbstp-header-subscribe">
								<div class="col-three-forth">
									<div class="form-group">
										<input type="text" class="form-control" id="email" placeholder="Enter your email">
									</div>
								</div>
								<div class="col-one-third">
									<div class="form-group">
										<button type="submit" class="btn btn-primary">Subscribe Now</button>
									</div>
								</div>
							</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<footer>
			<div id="footer">
				<div class="container">
					<div class="row">
						<div class="col-md-4 col-pb-sm text-center">
							<div class="row">
								<div class="col-md-10">
									<h2>Office</h2>
									<p>291 South 21th Street, <br> Suite 721 New York NY 10016</p>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-pb-sm text-center">
							<h2>Get in Touch</h2>
							<p><a href="#">noah@info.com</a></p>
						</div>
						<div class="col-md-4 col-pb-sm text-center">
							<h2>Social</h2>
							<p class="colorlib-social-icons">
								<a href="#"><i class="icon-facebook4"></i></a>
								<a href="#"><i class="icon-twitter3"></i></a>
								<a href="#"><i class="icon-googleplus"></i></a>
								<a href="#"><i class="icon-dribbble2"></i></a>
							</p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 text-center">
							<p>
								<span class="block"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --> Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> &amp; distributed by <a href="https://themewagon.com" target="_blank">ThemeWagon</a> <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --><br></span>
								<span class="block">Demo Images: <a href="http://unsplash.co/" target="_blank">Unsplash</a></span>
							</p>
						</div>
					</div>
				</div>
			</div>
		</footer>
	</div>

@endsection
