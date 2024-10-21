<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php if ( ! get_option( 'site_icon' ) ) : ?>
		<link href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.ico" rel="shortcut icon" />
	<?php endif; ?>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open();?>
    <!-- header -->
    <?php 
        function formatarVariavel($variavel) {
            $variavel = str_replace(' ', '', $variavel);
            $variavel = str_replace('(', '', $variavel);
            $variavel = str_replace(')', '', $variavel);
            $variavel = str_replace('-', '', $variavel);
        
            return $variavel;
        }
    ?>