<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
	<head>
		<title>Ask a Librarian</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="shortcut icon" href="http://library.marist.edu/images/jac.png" />
		<link rel="stylesheet" type="text/css" href="http://library.marist.edu/css/library.css" />
		<link rel="stylesheet" type="text/css" href="http://library.marist.edu/css/library_child.css" />
		<link rel="stylesheet" type="text/css" href="http://library.marist.edu/css/menuStyle.css" />
		<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="js/validate.js"></script>
		<script src="http://library.marist.edu/js/libraryMenu.js" type="text/javascript" charset="utf-8"></script>
		<script src="http://library.marist.edu/js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
		<link rel="stylesheet" href="http://library.marist.edu/css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
		<script type="text/javascript">
			$(document).ready(function() {
				$(".expand").click(function() {
					$(".ref_box").slideToggle("normal");
				});
				$("a[rel^='prettyPhoto']").prettyPhoto();
			});
		</script>
		<link rel="stylesheet" href="styles/captcha.css" type="text/css" />
		<script type="text/javascript" src="js/jquery.simpleCaptcha-0.2.js"></script>
		<script type="text/javascript" src="js/ask.js"></script>
		
		<script type='text/javascript'>
			$(document).ready(function() {
				$('#captcha1').simpleCaptcha();
			});
		</script>
		
		<style type="text/css">
			label { width: 10em; float: left; }
			label.error, .submitError { float: none; color: red; padding-left: .5em; font-style: italic; }
			.submit { margin-left: 12em; }
			
			.formLabel {
				width: 200px;
				vertical-align: top;
			}
			.formLabel1 {
				width: 10px;
				padding-left: 25px;
				font-weight: bold;
				font-size: 16px;
				vertical-align: top;
			}
			
		</style>
		
		<script type="text/javascript">
			var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
			document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));

		</script>
		<script type="text/javascript">
			var pageTracker = _gat._getTracker("UA-3375146-1");
			pageTracker._initData();
			pageTracker._trackPageview();

		</script>
		<!--------------COPY------------------------------------------------------------------------->
	</head>

	<body>
		<div id="headerContainer">
			<a href="http://library.marist.edu/" target="_self"> <div id="header"></div> </a>
		</div>

		<div id="menu">
			<div id="menuItems">

				<form method="GET" action="http://marist.summon.serialssolutions.com/search" class = "summon_search_child">
					<img src="http://library.marist.edu/images/foxhunt.png" class ="menu_foxhunt fox2"/>
					<input type="text" placeholder = "Search Full Text Databases..." name="s.q" class="summon_search_bar_child" size="20"/>
					<input type="submit" value="" class="search_button_child fox2"/>
					<a href="#" class="expand"> <img src="http://library.marist.edu/images/plus.png" class ="expand_img fox2"/></a>
				</form>
			</div>
		</div>

		<div class= "content_container">
			<div class = "container_home_child" >
				<div class = "ref_box">
					<table>
						<th class = "search_drop_header" colspan="4">Library Resources</th>
						<tr>

							<td  class = "search_drop"><a href="http://voyager.marist.edu/vwebv/searchBasic"><img src ="http://library.marist.edu/images/library_catalog_red.png" title="Library Catalog"></a></td>
							<td class = "search_drop"><a href="http://libguides.marist.edu/"><img src ="http://library.marist.edu/images/library_pathfinders_red.png" title="Pathfinders"></a></td>
							<td  class = "search_drop"><a href="http://library.marist.edu/forms/ask.php"> <img src ="http://library.marist.edu/images/ask_a_librarian_red.png" title="Ask A Librarian"></a></td>
							<td  class = "search_drop_last"><a href="http://site.ebrary.com.online.library.marist.edu/lib/marist/home.action"><img src ="http://library.marist.edu/images/ebrary_small.png" title ="ebrary"></a></td>
						</tr>
					</table>

				</div>
				<div class="side_bar">
					<ul>
						<li>
							<a class="side_link_current" href="#">Ask a Librarian</a>
						</li>
						<li>
							<a class="side_link" href="http://library.marist.edu.online.library.marist.edu/forms/acqbr.html">Acquisitions Request</a>
						</li>
						<li>
							<a class="side_link" href="http://library.marist.edu/forms/copyright.php">Copyright Clearance</a>
						</li>
						<li>
							<a class="side_link" href="http://marist.illiad.oclc.org/illiad/logon.html">Inter-Library Loan</a>
						</li>
						<li>
							<a class="side_link" href="http://library.marist.edu/forms/reserve_forms.html">Reserve Form</a>
						</li>
					</ul>
				</div>
				<div class= "content">
					<p class="breadcrumb">
						<a href="http://library.marist.edu" class="map_link"><img src="http://library.marist.edu/images/home.png" class="fox2"/></a>
						> Forms > Ask a Librarian

					</p>

					<h1 class="page_head">Ask a Librarian</h1>

					<br>
					<br>

						<table style="height: 100%; width:100%;">
							<tr>
								<TD width="15%">&nbsp; </TD>
							</tr>
							<tr>
								<td width="75%" align="left">
									<FORM NAME="theForm" ID="theForm" ACTION="#" METHOD="POST">
										<TABLE width="700px">
											<TR>
												<TD class="formLabel">Name:</TD>
												<td class ="ask_input" colspan="3">
													<INPUT TYPE="text" NAME="Name" SIZE="60" class="ask_text_input" />
												</TD>
											</TR>
											<TR>
												<TD class="formLabel">Email Address:</TD>
												<td class ="ask_input" colspan="3">
												<INPUT TYPE="text" NAME="Email" SIZE="60" class="ask_text_input" />
												</TD>

											</TR>
											<TR>
												<TD class="formLabel">Telephone Number:</TD>
												<td class ="ask_input" style="width: 200px;">
													<INPUT TYPE="text" NAME="Phone_Num" SIZE="60" class="ask_text_input" />
												</TD>
											</TR>
											<TR>	
												<TD class="formLabel1">Address:</TD>
												<td class="ask_input">
													<INPUT TYPE="text" NAME="Address" SIZE="100" />
												</TD>
											</TR>
											<TR>	
												<TD class="formLabel1">City/State:</TD>
												<td class="ask_input">
													<INPUT TYPE="text" NAME="Cityor_State" SIZE="100" />
												</TD>
											</TR>
											<TR>
											<TD class="formLabel">Zip Code:</TD>
												<td class ="ask_input" style="width: 200px;">
													<INPUT TYPE="text" NAME="Zip_Code" SIZE="60" class="ask_text_input" />
												</TD>
											</TR>
											</TR>	
												<TD class="formLabel1">Institute Affiliations(if any):</TD>
												<td class="ask_input">
													<INPUT TYPE="text" NAME="Inst_Affil" SIZE="100" />
												</TD>
											</TR>
											<!--<TD class="formLabel">Marist Status:</TD>
											<td class ="ask_input">
												<select name="Marist_Status" size="1">
													<option value="Marist Undergraduate Student">Marist Undergraduate Student</option>
													<option value="Marist Graduate Student">Marist Graduate Student</option>
													<option value="Student-Athlete">Student-Athlete</option>
													<option value="Marist Faculty" selected>Marist Faculty</option>
													<option value="Marist Staff">Marist Staff</option>
													<option value="No Current Marist Affliation">No Current Marist Affliation</option>
												</select>
											</TD>
											</TR>
											<TR>
												<TD class="formLabel">Marist Campus:</TD>
												<td class ="ask_input">
													<select name="Campus" size="1">
														<option value="Poughkeepsie" selected>Poughkeepsie</option>
														<option value="Online">Online</option>
														<option value="Marist Abroad">Marist Abroad</option>
														<option value="Fishkill">Fishkill</option>
													</select>
												</TD>
											</TR>
											<TR>
												<TD>
													<p class="formLabel">
														Enter your question:
														<br />(20 characters minimum)<br />
													</p>
													
													<p>
														<em>Include course name if relevant.</em>
													</p> 
													<p>
														<em>If requesting research appointment or phone conference, indicate best times and research&nbsp;subject.</em>
													</p>
												</TD>
												<td class ="ask_input" colspan="3"><textarea NAME="Question" ROWS="10" COLS="43" ></textarea></TD>
											</TR>-->
										</TABLE>
										
										<table width="600px">
											<tr>
												<td>
													<center>
														<!------------------COPY--------------------------------------------------------------------->
														<div id='captcha1'></div>
					
														<p style="width: 150px; position:relative; left:50%; margin-left:-77px;">
					
															<INPUT name="submit" value="Submit" id="submit" TYPE="submit">
															<INPUT name="reset" TYPE="reset" id="reset">
														</p>
					
														<!--------------COPY------------------------------------------------------------------------->
													</center>
												</td>
											</tr>
										</table>
									</FORM>
								</td>
								<td width="15%">&nbsp; </td>
							</tr>

						</table>

						
				</div>
			</div>
			<div class="bottom_container">
				<p class = "foot">
					James A. Cannavino Library, 3399 North Road, Poughkeepsie, NY 12601; 845.575.3199
					<br />
					&#169; Copyright 2007-2012 Marist College. All Rights Reserved.

					<a href="http://www.marist.edu/disclaimers.html" target="_blank" >Disclaimers</a> | <a href="http://www.marist.edu/privacy.html" target="_blank" >Privacy Policy</a> | <a href="http://library.marist.edu/ack.html?iframe=true&width=50%&height=62%" rel="prettyphoto[iframes]">Acknowledgements</a>
				</p>
			</div>
		</div>
	</body>

</html>
