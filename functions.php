<?php 
/**
 * Enqueue scripts and styles.
 */
function dntheme_scripts() {

    // Call defaul js
	wp_localize_script( 'main', 'dntheme_params', array(
		'dntheme_nonce' => wp_create_nonce( 'dntheme_nonce' ), // Create nonce which we later will use to verify AJAX request
		'ajax_url' => admin_url( 'admin-ajax.php' ),
		)
	);
}
add_action( 'wp_enqueue_scripts', 'dntheme_scripts' );

add_action("wp_ajax_dnsearch_ajax", "dnsearch_ajax");
add_action("wp_ajax_nopriv_dnsearch_ajax", "dnsearch_ajax");
function dnsearch_ajax(){
    $data = $_POST['data'];
    $postTypeAccept = array('post','customer');
    $postType = isset($_POST['postType']) ? $_POST['postType'] : 'post';

    if(in_array($postType, $postTypeAccept)){
        $args = array(
          'post_type' => $postType,
          'posts_per_page' => 10,
          's' => $data,
        );
        $the_query = new WP_Query( $args );
        if ( $the_query->have_posts() ) :
            while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
              <div class="item__wrap">
                <?php the_title() ?>
              </div>
            <?php endwhile;
            wp_reset_postdata();
        else :
            echo '<div class="item__wrap">Không tìm thấy dữ liệu.</div>';
        endif;
    }else{
        echo '<div class="item__wrap">Post Type không hỗ trợ.</div>';
    }
    die();
}
