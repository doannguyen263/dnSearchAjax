<?php 
add_action("wp_ajax_dnsearch_ajax", "dnsearch_ajax");
add_action("wp_ajax_nopriv_dnsearch_ajax", "dnsearch_ajax");
function dnsearch_ajax(){
    $data = $_POST['data'];
    $postTypeAccept = array('post');
    $postType = isset($_POST['postType']) ? $_POST['postType'] : 'post';

    if(in_array($postType, $postTypeAccept)){
        $args = array(
          'post_type' => $postType,
          'posts_per_page' => 3,
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
            echo '<div class="alert alert-danger notice text-center" role="alert">Không tìm thấy dữ liệu.</div>';
        endif;
    }else{
        echo '<div class="alert alert-danger notice text-center" role="alert">Post Type không hỗ trợ.</div>';
    }
    die();
}