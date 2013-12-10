<?php
/**
 * The template for displaying program page.
 * Template Name: HuGy Direktl&auml;nk
 *
 * @package 	WordPress
 * @subpackage 	HuGy (Starkers)
 * @since 		HuGy 1.0
 */
 $url = get_field("redirect_url");
 if ( strpos( $url, "http") === false) {
	$url = "http://" . $url;
}
 ?>
 <html><head>
 <meta http-equiv="refresh" content="0; url=<?php echo $url; ?>">
 </head>
 Du skickas vidare till <a href="<?php echo $url; ?>" alt="<?php echo $url; ?>"><?php echo $url; ?></a>
 <body>
 </body>
 </html>
 
 
 