<?php
/**
* Template Name: Staff Page Template
*
* Description: A page template that provides a key component of WordPress as a CMS
* by meeting the need for a carefully crafted introductory page. The front page template
* in Twenty Twelve consists of a page content area for adding text, images, video --
* anything you'd like -- followed by front-page-only widgets in one or two columns.
*
*/
?>


<?php get_header(); 
//$css_uri = get_stylesheet_directory_uri(); 
//$css_link1 = $css_uri .'/includes/bootstrap_fctable.css'; 
include(getcwd() . "\\wp-content\\themes\\tbone\\common_newfunctions.php");
?>

<!--- <link rel="stylesheet" type="text/css" href="<?php //echo $css_link1; ?>" media='all'> --->



<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
        
        <header class="entry-header">
                            <h1 class="entry-title"><? echo get_the_title(); ?></h1>
                            <hr class="yellow-line">
                        </header>

<? 
	define("DEPT", 11);
	$outHTML = "";
	$id = intval($_GET['id']);
	if($id < 0) $id = 0;
	$filename = "";
	
	$sql = sql_showstaff(DEPT,0,$id);
	if (!empty($sql)) {
		$result = mysqli_query(get_dbconnection(),$sql);
		check_result($result,$sql);
		if (!empty($id)) {
			if (mysqli_num_rows($result) == 1) {
				$row = mysqli_fetch_assoc($result);
				mysqli_free_result($result);			
			}
			else {
				$outHTML = "<em>Click <a href=\"/about/administration/deans-office/\">Faculty and Staff</a> for listing.</em>";
			}
		}
	}

					if (empty($outHTML) && !empty($id)) {
						$filename = COMMON_PATH . $row['photo_path'];
						$filename = str_replace("/","\\",$filename);
						$outHTMLEd = "";
						$outHTMLTitle = "";
						$outHTMLPub = "";
						$outHTMLLoc = "";
						$outHTML = "<div class=\"media\">";
						if (!empty($row['photo_path']) && file_exists($filename)) $outHTML .= '<div class="media-left"><img src="http://www.cah.ucf.edu/common/resize.php?filename=' . $row['photo_path'] . '&amp;sz=4' . $row['photo_extra'] . '" alt="' . $row['fullname'] . '" /></div>';
						$outHTML .= "<div class=\"media-body\" style=\"padding-left:10px;\">";
						$outHTMLfn = "<h3>" . $row['fullname'];
						if (!empty($row['degree'])) $outHTMLfn .= ", " . $row['degree'];
						$outHTMLfn .= "</h3>";
						$outHTML .= $outHTMLfn;
				
						// Titles requires another query....
						$sql = sql_showtitles(DEPT,SDEPT,$id);
						$result = mysqli_query(get_dbconnection(),$sql);
						check_result($result,$sql);
						
						$outHTMLDir = "<ul style='list-style-type:none'>";
						$outlen = strlen($outHTMLDir);
						// construct Titles output
						while ($row2 = mysqli_fetch_assoc($result)) {
							$affilliationHTML = (!strcmp($row2['affiliation'],"active")) ? "" : ucfirst($row2['affiliation']) . " ";
							$outHTMLDir .= "<li><strong>" . $affilliationHTML . $row2['description'] . (!empty($row2['sdeptname']) ? " of " . $row2['sdeptname'] : "") . "</strong></li>\n";		
						}		
					
						mysqli_free_result($result);		
							
						if (!empty($row['email'])) {
							$outHTMLDir .= "<li><a href=\"mailto:" . $row['email'] . "\">" . $row['email'] . "</a></li>";
						}
						if (!empty($row['phone'])) {
							$outHTMLDir .= "<li>" . $row['phone'] . "</li>";
						}
						if (!empty($row['office'])) {
							$outHTMLDir .= "<li>Office Hours: " . $row['office'] . "</li>";
						}
						
						if (!empty($row['room_id'])) {
							$sql = "select room_number, buildings.short_description,building_number from rooms left join buildings on (building_id=buildings.id) where rooms.id=" . $row['room_id'];
							$result = mysqli_query(get_dbconnection(),$sql);
							check_result($result,$sql);
							$row2 = mysqli_fetch_assoc($result);
							$outHTMLLoc = "<li>Campus Location: ";
							if (!empty($row2['building_number'])) {
								$outHTMLLoc .= "<a rel=\"external\" href=\"http://map.ucf.edu/locations/" . $row2['building_number'] . "\">";
							}
							$outHTMLLoc .= $row2['short_description'] . $row2['room_number'];
							if (!empty($row2['building_number'])) {
								$outHTMLLoc .= "</a>";
							}
							$outHTMLLoc .= "</li>\r\n";
							mysqli_free_result($result);
						}
						else if (!empty($row['location'])) {
							$outHTMLLoc = "<li>Campus Location: " . $row['location'] . "</li>\r\n";;
						}		
						$outHTMLDir .= $outHTMLLoc;
						if (!empty($row['has_cv'])) {
							$outHTMLDir .= "<li><a href=\"http://www.cah.ucf.edu/common/files/cv/" . $id . ".pdf\" rel=\"external\">View CV</a></li>\r\n";
						}
						else if (!empty($row['resume_path'])) {
							$external = "";
							if (stripos($row['homepage'],"ucf.edu") === false) $external = ' rel="external" ';
							$outHTMLDir .= "<li><a href=\"" . $row['resume_path'] . "\"" . $external . ">View CV</a></li>\r\n";
						}
						if (!empty($row['homepage'])) {
							$external = "";
							if (stripos($row['homepage'],"ucf.edu") === false) $external = ' rel="external" ';
							$outHTMLDir .= "<li><a href=\"" . $row['homepage'] . "\"" . $external . ">View personal website</a></li>\r\n";
						}	
				
						if (strlen($outHTMLDir) != $outlen) {
							$outHTMLDir .= "</ul>\r\n";
						}
						$outHTML .= $outHTMLDir . "</div></div>\r\n";
							
						if (!empty($row['biography']) || !empty($row['prog_biography'])) {
							if(!empty($row['prog_biography']))
							$biography = html_entity_decode($row['prog_biography'],ENT_QUOTES,"utf-8");
							else
							$biography = html_entity_decode($row['biography'],ENT_QUOTES,"utf-8");
							if (stripos($biography,"<p>") === false  && stripos($biography,"<ul>") !== 0) {
								$biography = "<p>" . $biography . "</p>";
							}
								$outHTML .=  $biography . "\r\n";
						}
						
						$outHTMLEd = show_education($id);
						if (!empty($outHTMLEd)) $outHTML .= "<h2>Education</h2>" .$outHTMLEd; 
						if (!empty($row['interests']) || !empty($row['prog_interests'])) {
							if(!empty($row['prog_interests']))
							$interests = html_entity_decode($row['prog_interests'],ENT_QUOTES,"utf-8");
							else
							$interests = html_entity_decode($row['interests'],ENT_QUOTES,"utf-8");
							if (stripos($interests,"<p>") === false && stripos($interests,"<ul>") !== 0) {
								$interests = "<p>" . $interests . "</p>";
							}
							$outHTML .= "<h2>Research Interests</h2>\r\n" . $interests . "\r\n";
						}
						
						if (!empty($row['duties']) || !empty($row['prog_duties']) ) {
							if(!empty($row['prog_duties']))
							$duties = html_entity_decode($row['prog_duties'],ENT_QUOTES,"utf-8");
							else
							$duties = html_entity_decode($row['duties'],ENT_QUOTES,"utf-8");
							$outHTML .= "<h2>Duties</h2>";
							if (stripos($duties,"<p>") === false && stripos($duties,"<ul>") !== 0) {
								$duties = "<p>" . $duties . "</p>\r\n";
							} 
							$outHTML .=  $duties . "\r\n";
						} 
						
						if (!empty($row['research']) ||!empty($row['prog_research']) ) {
							if(!empty($row['prog_research']))
							$research = html_entity_decode($row['prog_research'],ENT_QUOTES,"utf-8");
							else
							$research = html_entity_decode($row['research'],ENT_QUOTES,"utf-8");
							if (stripos($research,"<p>") === false && stripos($research,"<ul>") !== 0) {
								$research = "<p>" . $research . "</p>";
							}
								$outHTML .=  "<h2>Recent Research Activities</h2>" . $research . "\r\n";
						}
				
						// Publications requires another query....
						$sql = "select publications.id,forthcoming,DATE_FORMAT(publish_date,'%M %Y') as pubdate, citation, plural_description as pubtype from publications left join publications_categories on (publication_id=publications_categories.id) where user_id=" .$id . " order by level, pubtype, publish_date desc,citation";
						$result = mysqli_query(get_dbconnection(),$sql);
						check_result($result,$sql);
						
						// construct Publication output
						$publications = "";
						while ($row2 = mysqli_fetch_assoc($result)) {
							if (strcmp($publications,$row2['pubtype'])) {
								$publications = $row2['pubtype'];
								if (!empty($outHTMLPub)) $outHTMLPub .= "</ul>";
								$outHTMLPub .= "<h3>" . $publications . "</h3><ul>";
							}
							$outHTMLPub .= "<li   style=\"padding-left: 2em;
text-indent: -2em;\">" . (($row2['forthcoming']) ? "<em>Forthcoming</em> " : " ") . $row2['publish_date'] . " " . html_entity_decode($row2['citation'],ENT_QUOTES,"utf-8");
							$outHTMLPub .= "</li>\n";
						}
						if (!empty($outHTMLPub)) {
							$outHTMLPub .= "</ul>";
						}
						
						if (!empty($outHTMLPub)) $outHTML .= "<h2>Selected Publications</h2>" .$outHTMLPub; 			
						mysqli_free_result($result);		
				
						if (!empty($row['awards']) || !empty($row['prog_awards'])) {
							if(!empty($row['prog_awards']))
							$awards = html_entity_decode($row['prog_awards'],ENT_QUOTES,"utf-8");
							else
							$awards = html_entity_decode($row['awards'],ENT_QUOTES,"utf-8");
							$outHTML .= "<h2>Awards</h2>";
							if (stripos($awards,"<p>") === false && stripos($awards,"<ul>") !== 0) {
								$awards = "<p>" . $awards . "</p>\r\n";
							}
							$outHTML .=  $awards . "\r\n";
						}		
						
						if (!empty($row['activities']) || !empty($row['prog_activities'])) {
							if(!empty($row['prog_activities']))
							$activities = html_entity_decode($row['prog_activities'],ENT_QUOTES,"utf-8");
							else
							$activities = html_entity_decode($row['activities'],ENT_QUOTES,"utf-8");
							$outHTML .= "<h2>Activities</h2>";
							if (stripos($activities,"<p>") === false && stripos($activities,"<ul>") !== 0) {
								$activities = "<p>" . $activities . "</p>\r\n";
							}
							$outHTML .=  $activities . "\r\n";
						}
						
						if (!empty($row['last_updated'])) {
							$outHTML .= "<p style=\"margin-top:1em;text-align:right;font-size:77%;\">Updated: " . 	date("M j, Y",strtotime($row['last_updated'])) . "</p>\r\n";
						}			
					} // individual
					
          else if (empty($outHTML) && empty($id)) {
						
						$positionholder = "";
						$displaycount = mysqli_num_rows($result);
						$c = 1;
						$deangroup = array('Dean', 'Deanlet');
						$belowdean = false;
						$deancount = 0;
						
						//$outHTML .= "<div class=\"yui-g\">";
						while ($row = mysqli_fetch_assoc($result)) {
							if(in_array($row['title_group'], $deangroup)){
								$outHTML .= "<div class=\"media\" style=\"border-bottom:1px dotted rgb(180, 180, 180)\">";
								$filename = COMMON_PATH . $photo_path;
								$filename = str_replace("/","\\",$filename);
							
								if (!empty($row['photo_path']) && file_exists($filename)) $outHTML .= '<div class="media-left"><a href="?id=' . $row['id'] . '"><img src="http://www.cah.ucf.edu/common/resize.php?filename=' . $row['photo_path'] . '&amp;sz=1' . $row['photo_extra'] . '" alt="' . $row['fullname'] . '" /></a></div>';
								$outHTML .= "<div class=\"media-body\"><h4><a href=\"?id=" . $row['id'] . "\">" .  $row['fullname']. "</a></h4>";

								$affilliationHTML = (!strcmp($row['affiliation'],"active")) ? "" : ucwords($row['affiliation']) . " ";
								$outHTML .= "<p><strong>" . $affilliationHTML . $row['wtitle'] . "</strong></p>";
							
							/* if (!empty($row['duties']) || !empty($row['prog_duties']) ) {
							if(!empty($row['prog_duties']))
							$duties = html_entity_decode($row['prog_duties'],ENT_QUOTES,"utf-8");
							else
							$duties = html_entity_decode($row['duties'],ENT_QUOTES,"utf-8");
									$outHTML .= "<p><b>Duties:</b> ";
									$duties = summarize_text($duties);
									$duties = strip_tags($duties);
									$outHTML .=  $duties . "\r\n";
								}*/
								$outHTML .= "</p></div></div>"; 
								$deancount ++;

							}

							else {
		if($c%2==1)
		$outHTML .= "<div class=\"row\"><div class=\"col-lg-6\"><div  style=\"padding-right:2px; border-bottom:1px dotted rgb(180, 180, 180)\">";
		else
		$outHTML .= "<div class=\"col-lg-6\"><div  style=\"padding-right:2px; border-bottom:1px dotted rgb(180, 180, 180)\">";
								$displaycount = $displaycount - $deancount + 1;
								
								//Duplication of Else statement below
								$outHTML .= "<h3><a href=\"?id=" . $row['id'] . "\">" .  $row['fullname']. "</a></h3>";
								$affilliationHTML = (!strcmp($row['affiliation'],"active")) ? "" : ucwords($row['affiliation']) . " ";
								$outHTML .= "<p><strong>" . $affilliationHTML . $row['wtitle'] . "</strong></p>";
								
					if($c%2==1)
					$outHTML .= "</div></div>";
					else
					$outHTML .= "</div></div></div>";
								
								$c ++;	
								//End Duplication
							}
							
						} // loop
						//$outHTML .= "</div></div>";
						$outHTML .= "</div>";
					} // if
					
				echo $outHTML;
				?>
             
		</main><!-- #main -->
        
     </div>

<?php
// get_sidebar();
get_footer();
?>


<!--- change the title --->
<script>
//$(".faculty-title").nextAll(".row:first").hide();
//$(".faculty-title").html("Faculty");
</script>


