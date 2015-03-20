<!DOCTYPE HTML> 
<html lang="en-EN">
	<head>
		<title>Better - Social Betting Game</title>
		<link rel="stylesheet" type="text/css" href="assets/css/style.css">
		<link rel="shortcut icon" href="assets/img/better-icon.png">


		<link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
		<meta charset="UTF-8">
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script type="text/javascript" src="assets/js/jquery.simple-text-rotator.js"></script>
		<link rel="stylesheet" type="text/css" href="assets/css/simpletextrotator.css" />
		<style type="text/css">
			#FormData{
				display: block;
			}
			#SuccessData{
				display: none;

			}

		</style>
	</head>
	<body>
		<header>
			<a href="http://www.betterthegame.com">
				<img src="assets/img/logo.png">
			</a>
		</header>

		<section id="step1">
			<h2>Test</h2>	
			<h1>PLACE A BET ON <span class="rotate">FOOTBALL, FRIENDS, YOURSELF, STUFF</span></h1>
			<a class="btn" id="btn1">SEE HOW IT WORKS!</a>
		</section>

		<section id="step2">
			<span class="info">You have <strong>1000</strong> coins to play. Give it a try!</span>	
			<h1>
				When will the best social
				<br>
				betting app launch
			</h1>
			<a id="btn2" class="btn">This Month <span>1.20</span></a>
			<a class="btn btn-form">Within 2 Months <span>1.50</span></a>
			<br>
			<a class="btn btn-form">2 to 4 Months <span>2.10</span></a>
			<a class="btn btn-form">In 2015 <span>5.00</span></a>
		</section>

		<section id="step3">
			<div id="FormData">
			<h1>You can bet &amp; win on everything!</h1>
			<p>Leave your email now and get notified as soon as we launch</p>
				<form id="subscribe-form">
			    	<input id="fieldEmail"  autofocus />
			    	<button type="submit" class="btn">SUBMIT</button>
				</form>	
			</div>
			<div id="SuccessData">
				<p id="successPara"></p>
			</div>
		</section>



		<footer>coming soon to apple store</footer>
		<script type="text/javascript">
		    $(".rotate").textrotator({
		      animation: "flipUp",
		      speed: 2000
		    });
			</script>
				<script type="text/javascript">
		$(document).ready(function() {
			
		   $('#btn1').click(function(){
			 $('section.showhide,#step2').delay(300).fadeIn(300);
			 $('section.showhide,#step1,#step3').fadeOut(300);
		   });

			 $('#btn2,a.btn-form').click(function(){
			 $('section.showhide,#step3').delay(300).fadeIn(300);
			 $('section.showhide,#step1,#step2').fadeOut(300);
		   });


			 $('#btn3').click(function(){
			 $('section.showhide,#step1').delay(300).fadeIn(300);
			 $('section.showhide,#step2,#step3').fadeOut(300);
		   });
		 });
		</script>

		<script src="http://code.jquery.com/jquery.js"></script>
		<script>
			$(document).ready(function(){
				// alert("hello world");
				function validateEmail(emailField){
				  var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
				  return reg.test(emailField);
				}

				function errorForm(message){
					event.preventDefault();
					if($("#subscribe-form .error").length == 0){
						$("#subscribe-form").append("<div class='error'>" + message + "</div>");

						$("#subscribe-form input#fieldEmail").css({
							"border-color" : "red"
						});

						setTimeout(function(){
							$("#subscribe-form div.error").fadeOut("slow");
							$("#subscribe-form input#fieldEmail").css({
								"border-color" : "#809bb2"
							});
							$("#subscribe-form div.error").remove();
						},3000);
					}
					return false;
				}

				$("form#subscribe-form").submit(function(event){
					event.preventDefault;
					var email = $("#subscribe-form input#fieldEmail").val()  ; 
					var validated = validateEmail(email);
					var successMessage = "<b>We'll be in touch!</b> We will email you as soon as 	betterthegame is publicly available,</br>"+email+"! </br> In the meantime, stay tuned @betterthegame";
						if(email)
						{
							if(validated)
							{
								$.ajax({type:"POST",
										url:"formSubmit.php",
										data:{email:email},
										success:function(data){
											 console.log(data);

											$("#FormData").css('display','none');
											$("#successPara").html(successMessage);
											$("#SuccessData").css('display','block');
										}
									});			
							}
							else
							{
								errorForm("invalid email id. Please make sure you type correctly.");
							}
						}
						else
						{
							errorForm("Please enter your email id.");	
						}
						return false ;
				});

			});
		</script>
	</body> 
</html>