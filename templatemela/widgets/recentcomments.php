<?php
/**
 * TemplateMela
 * @copyright  Copyright (c) 2010 TemplateMela. (http://www.templatemela.com)
 * @license    http://www.templatemela.com/license/
 */
?><?php  // Reference:  http://codex.wordpress.org/Widgets_API
class RecentCommentsWidget extends WP_Widget
{
    function RecentCommentsWidget(){
		$widget_settings = array('description' => 'Recent Comments Widget', 'classname' => 'widgets-recentcomments');
		parent::WP_Widget(false,$name='TM - Recent Comments Widget',$widget_settings);
    }
    function widget($args, $instance){
		extract($args);
		$title = apply_filters('widget_title', empty($instance['title']) ? 'Recent Comments' : $instance['title']);
		$postCount = empty($instance['postCount']) ? '' : $instance['postCount'];
			echo $before_widget; 
			echo $before_title ;
			if($title)
				echo $title;
			echo $after_title; 			
			?>			
			<div class="widgets-recentcomments">				
				<?php
				global $wpdb, $pre_HTML, $post_HTML;
				$sql = "SELECT DISTINCT ID, post_title, post_password, comment_ID, comment_post_ID, comment_author, comment_date_gmt, comment_approved, comment_type, comment_author_url, SUBSTRING(comment_content,1,12) AS com_excerpt FROM $wpdb->comments LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID = $wpdb->posts.ID)	WHERE comment_approved = '1' AND comment_type = '' AND post_password = '' ORDER BY comment_date_gmt DESC LIMIT $postCount";
				$comments = $wpdb->get_results($sql);
				$output = $pre_HTML;
				$output .= "<div>";
				foreach ($comments as $comment) {
					$output .= "<span>" .strip_tags($comment->comment_author)." on " . "<a href=\"" . get_permalink($comment->ID) . "#comment-" . $comment->comment_ID . "\" title=\"on " . $comment->post_title . "\">" . strip_tags($comment->com_excerpt)."...</a></span>";
				}
				$output .= "</div>";
				$output .= $post_HTML;
				echo $output;?>
			</div><!--.topbg-->
			<?php
			echo $after_widget;					
	}
    function update($new_instance, $old_instance){
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['postCount'] = strip_tags($new_instance['postCount']);

		return $instance;
	}

    function form($instance){
		$instance = wp_parse_args( (array) $instance, array('title'=>'Recent Comments', 'postCount' => '5'));
		$title = esc_attr($instance['title']);
		$postCount = esc_attr($instance['postCount']);

		?>
		
		<p><label for="<?php echo $this->get_field_id('title');?>">Title:</label><input class="widefat" id="<?php echo $this->get_field_id('title');?>" name="<?php echo $this->get_field_name('title');?>" type="text" value="<?php echo $title;?>" /></p>
		<p><label for="<?php echo $this->get_field_id('postCount');?>">Number of Comments To Display</label><input class="widefat" id="<?php echo $this->get_field_id('postCount');?>" name="<?php echo $this->get_field_name('postCount');?>" type="text" value="<?php echo $postCount;?>" /></p>
		<?php
	}

}
add_action('widgets_init', create_function('', 'return register_widget("RecentCommentsWidget");'));
// end AboutMeWidget
?>