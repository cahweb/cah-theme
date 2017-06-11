<?php
/**
* Template Name: News Submission Page Template
*
* Description: A page template that provides a key component of WordPress as a CMS
* by meeting the need for a carefully crafted introductory page. The front page template
* in Twenty Twelve consists of a page content area for adding text, images, video --
* anything you'd like -- followed by front-page-only widgets in one or two columns.
*
*/

?>

<?php get_header(); 

	require 'phpmailer/PHPMailerAutoload.php';

	if(isset($_POST['submit'])){
		$mail = new PHPMailer;

		$mail->IsSMTP();
		$mail->IsHTML(true);
		$mail->Host = 'ucfsmtp1.mail.ucf.edu';
		$mail->SMTPAuth = false;

		$mail->setFrom('cah@ucf.edu', 'News Submission Page');
		$mail->addAddress('aleangel1212@gmail.com');
		$mail->Subject = 'CAH News Submission';
	
		$body = "<p><strong>Headline: </strong>".$_POST['headline']."</p><br/>";

		$body .= "<strong>Description:</strong><p>".$_POST['description']."</p><br/>";

		$body .= "<strong>Name(s) of student/faculty/alumni to be featured:</strong><p>".$_POST['names']."</p><br/>";

		$body .= "<strong>Area, program, and graduation year, if applicable:</strong><p>".$_POST['area']."</p><br/>";

		$body .= "<strong>Contact information of participant:</strong><p>".$_POST['contact-participant']."</p><br/>";

		$body .= "<strong>Contact information of person reporting:</strong><p>".$_POST['contact-reporting']."</p><br/>";		

		$body .= "<p><strong>Website relating to event: </strong>".$_POST['website']."</p><br/>";

		$body .= "<strong>Quotes from participant:</strong><p>".$_POST['quotes']."</p><br/>";

		$mail->Body = $body;

		if($mail->send()) {
			echo '<h3>Your news submission has been sent successfully, thank you for contributing!</h3>';
		} 

		else {
		    echo 'Message could not be sent.';
		    echo 'Mailer Error: ' . $mail->ErrorInfo;
		}	
	}

	else {

		?>

		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

				<header class="entry-header">
		                        <h1 class="entry-title"><? echo get_the_title(); ?></h1>
		                        <hr class="yellow-line">
		        </header><br>

		        <p>Please note that an asterisk (*) denotes a required field. Other fields are not required, but the more details you can share, the better.</p>

		        <form name="news-form" method="post" action="">
		        	<div class="form-group">
			        	<label for="headline">Headline*</label><br/>
			        	<input type="text" name="headline">
			        </div>

			        <div class="form-group">
			        	<label for="description">Description*</label><br/>
			        	<textarea name="description" rows="8" cols="75"></textarea>
			        </div>

			        <div class="form-group">
			        	<label for="names">Name(s) of student/faculty/alumni to be featured*</label><br/>
			        	<textarea name="names" rows="3" cols="35"></textarea>
			        </div>

			        <div class="form-group">
			        	<label for="area">Area, program, and graduation year, if applicable</label><br/>
			        	<textarea name="area" rows="2" cols="35"></textarea>
			        </div>

					<div class="form-group">
			        	<label for="contact-participant">Contact information of participant</label><br/>
			        	<textarea name="contact-participant" rows="2" cols="35"></textarea>
			        </div>

			        <div class="form-group">
			        	<label for="contact-reporting">Contact information of person reporting*</label><br/>
			        	<textarea name="contact-reporting" rows="2" cols="35"></textarea>
			        </div>

			        <div class="form-group">
			        	<label for="website">Website relating to event</label><br/>
			        	<input type="text" name="website">
			        </div>

			        <div class="form-group">
			        	<label for="dates">Any pertinent dates</label><br/>
			        	<textarea name="dates" rows="3" cols="35"></textarea>
			        </div>	        

			        <div class="form-group">
			        	<label for="quotes">Quotes from participant</label><br/>
			        	<textarea name="quotes" rows="8" cols="75"></textarea>
			        </div>

		        	<input type="submit" value="Submit" name="submit" id="sub">
		        </form>

			</main><!-- #main -->
		        
		</div>

		<?php
	}
?>




<?php

get_footer();
?>





