<?php
/**
 * This is the main/default page template for the "custom" skin.
 *
 * This skin only uses one single template which includes most of its features.
 * It will also rely on default includes for specific dispays (like the comment form).
 *
 * For a quick explanation of b2evo 2.0 skins, please start here:
 * {@link http://manual.b2evolution.net/Skins_2.0}
 *
 * The main page template is used to display the blog when no specific page template is available
 * to handle the request (based on $disp).
 *
 * @package evoskins
 * @subpackage custom
 *
 * @version $Id: index.main.php,v 1.9 2007/11/03 23:54:39 fplanque Exp $
 */
if( !defined('EVO_MAIN_INIT') ) die( 'Please, do not access this page directly.' );

// This is the main template; it may be used to display very different things.
// Do inits depending on current $disp:
skin_init( $disp );


// -------------------------- HTML HEADER INCLUDED HERE --------------------------
skin_include( '_html_header.inc.php' );
// Note: You can customize the default HTML header by copying the
// _html_header.inc.php file into the current skin folder.
// -------------------------------- END OF HEADER --------------------------------
?>
</head>

<body>		
 
  <div id="wrap">
    <!-- HEADER -->
		 <!-- Header banner background -->
    <div id="header-banner">		
 <!-- This is where css puts the background -->
</div>

<!-- Header bottom navigation -->					


 <div class="PageTop">
 				<?php if ( true /* change to false to hide the blog list */ ) { ?>
				<?php
				  // START OF BLOG LIST
				  skin_widget( array(
						'widget' => 'colls_list_public',
						'block_start'         => '<div class="header-low">',
						'block_end'           => '</div>',
						'block_display_title' => true,
						'list_start'          => '<ul>',
						'list_end'            => '</ul>',
						'item_start'          => '<li>',
						'item_end'            => '</li>',
						'item_selected_start' => '<li class="selected">',
						'item_selected_end' => '</li>',
					  ) );
				?>
				<?php } ?>
	<?php
		// ------------------------- "Page Top" CONTAINER EMBEDDED HERE --------------------------
		// Display container and contents:
		skin_container( NT_('Page Top'), array(
				// The following params will be used as defaults for widgets included in this container:
				'block_start'         => '<div class="header-low">',
				'block_end'           => '</div>',
				'block_display_title' => true,
				'list_start'          => '<ul>',
				'list_end'            => '</ul>',
				'item_start'          => '<li>',
				'item_end'            => '</li>',
			) );
		// ----------------------------- END OF "Page Top" CONTAINER -----------------------------
	?>
	</div>
<!-- end header-low/PageTop -->

  	<!-- Buffer to content area -->		
		<div id="buffer"></div>			



	
  	<!-- 	MIDDLE COLUMN -->
		<div id="middle-column">
	
	<?php
		// --------------------------------- START OF POSTS -------------------------------------
		// Display message if no post:
		display_if_empty();

		while( $Item = & mainlist_get_item() )
		{	// For each blog post, do everything below up to the closing curly brace "}"
		?>
<div class="middle-column-title-standard">	<h3><?php $Item->title(); ?></h3></div>
		<?php $Item->issue_time( array(
						'time_format' => 'F jS, Y',	
						'before'    => ' ',
						'after'     => ' ',
					) );
						$Item->author( array(
						'before'    => ''.T_('by').' <strong>',
						'after'     => '</strong>',
					) );	
					?>
	
			<?php
				// ---------------------- POST CONTENT INCLUDED HERE ----------------------
				skin_include( '_item_content.inc.php', array(
						'image_size'	=>	'fit-400x320',
					) );
				// Note: You can customize the default item feedback by copying the generic
				// /skins/_item_feedback.inc.php file into the current skin folder.
				// -------------------------- END OF POST CONTENT -------------------------
				//
			?>

			<div class="bSmallPrint"> 
				<?php
					// Link to comments, trackbacks, etc.:
					//class' => 'permalink_right
					$Item->feedback_link( array(
									'type' => 'comments',
									'link_before' => '',
									'link_after' => '',
									'link_text_zero' => '#',
									'link_text_one' => '#',
									'link_text_more' => '#',
									'link_title' => '#',
									'use_popup' => false,
								) );
echo ' ';
					// Link to comments, trackbacks, etc.:
					$Item->feedback_link( array(
									'type' => 'trackbacks',
									'link_before' => ' &bull; ',
									'link_after' => '',
									'link_text_zero' => '#',
									'link_text_one' => '#',
									'link_text_more' => '#',
									'link_title' => '#',
									'use_popup' => false,
								) );
									// Permalink:
									$Item->permanent_link();
echo ' ';
					$Item->edit_link( array( // Link to backoffice for editing
							'before'    => '',
							'after'     => '',
						) );
						?>
						<br/>

						<?php
								$NewText= '<div class="bSmallPrintBox"><a href="http://slashdot.org/bookmark.pl?url='.$Item->get_permanent_url().'">slashdot</a>  | <a href="http://digg.com/submit?phase=2&amp;url='.$Item->get_permanent_url().'">digg</a>  | <a href="http://www.facebook.com/sharer.php?u='.$Item->get_permanent_url().'">facebook</a> | <a href="http://del.icio.us/post?url='.$Item->get_permanent_url().'">del.icio.us</a> | <a href="http://www.sphere.com/search?q=sphereit:'.$Item->get_permanent_url().'">sphere</a></div>';
echo $NewText;
			?>
			
				</div>

			<?php
				// ------------------ FEEDBACK (COMMENTS/TRACKBACKS) INCLUDED HERE ------------------
				skin_include( '_item_feedback.inc.php', array(
						'before_section_title' => '<h4>',
						'after_section_title'  => '</h4>',
					) );
				// Note: You can customize the default item feedback by copying the generic
				// /skins/_item_feedback.inc.php file into the current skin folder.
				// ---------------------- END OF FEEDBACK (COMMENTS/TRACKBACKS) ---------------------
			?>

			
		<?php
		} // ---------------------------------- END OF POSTS ------------------------------------
	?>
	
	
			<?php
			// -------------------- PREV/NEXT PAGE LINKS (POST LIST MODE) --------------------
			mainlist_page_links( array(
					'block_start' => '<p class="center"><strong>',
					'block_end' => '</strong></p>',
					'links_format' => '$prev$ :: $next$',
   				'prev_text' => '&lt;&lt; '.T_('Previous'),
   				'next_text' => T_('Next').' &gt;&gt;',
				) );
			// ------------------------- END OF PREV/NEXT PAGE LINKS -------------------------
		?>
	
		<?php
		// -------------- MAIN CONTENT TEMPLATE INCLUDED HERE (Based on $disp) --------------
		skin_include( '$disp$', array(
				'disp_posts'  => '',		// We already handled this case above
				'disp_single' => '',		// We already handled this case above
				'disp_page'   => '',		// We already handled this case above
			) );
		// Note: you can customize any of the sub templates included here by
		// copying the matching php file into your skin directory.
		// ------------------------- END OF MAIN CONTENT TEMPLATE ---------------------------
	?>
	
	<?php
		// -------------- MAIN CONTENT TEMPLATE INCLUDED HERE (Based on $disp) --------------
//		skin_include( '$disp$', array(
	//		) );
		// Note: you can customize any of the sub templates included here by
		// copying the matching php file into your skin directory.
		// ------------------------- END OF MAIN CONTENT TEMPLATE ---------------------------
	?>
	
					 
    </div>

    <!-- RIGHT COLUMN -->
	  <div id="right-column">
		
	
		
	<?php
		// Display container contents:
		skin_container( NT_('Sidebar'), array(
				// The following (optional) params will be used as defaults for widgets included in this container:
				// This will enclose each widget in a block:
				'block_start' => '<div class="right-column-box-standard">',
				'block_end' => '</div>',
				// This will enclose the title of each widget:
				'block_title_start' => '<h3>',
				'block_title_end' => '</h3>',
				// If a widget displays a list, this will enclose that list:
				'list_start' => '<ul>',
				'list_end' => '</ul>',
				// This will enclose each item in a list:
				'item_start' => '<li>',
				'item_end' => '</li>',
				// This will enclose sub-lists in a list:
				'group_start' => '<ul>',
				'group_end' => '</ul>',
			) );
	?>

		
    </div>		 <!-- end of right column -->
		
		


    <!-- FOOTER -->

      		<? include("_body_footer.inc.php") ?>
  </div>

<?php
	$Hit->log();	// log the hit on this page
	debug_info(); // output debug info if requested
?>

</body>
</html>
