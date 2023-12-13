<?php

/**
 * Установка HTTP заголовка Last-Modified
 * При активации плагина, у всех незапароленных постов в HTTP-заголовках появится Last-Modified
 * https://sheensay.ru/?p=247
 */

add_action( 'template_redirect', 'Sheensay_HTTP_Headers_Last_Modified' );

function Sheensay_HTTP_Headers_Last_Modified() {

	if ( ( defined( 'DOING_AJAX' ) && DOING_AJAX ) || ( defined( 'XMLRPC_REQUEST' ) && XMLRPC_REQUEST ) || ( defined( 'REST_REQUEST' ) && REST_REQUEST ) || ( is_admin() ) ) {
		return;
	}

	$last_modified = '';


	// Для страниц и записей
	if ( is_singular() ) {
		global $post;

		// Если пост запаролен - пропускаем его
		if ( post_password_required( $post ) )
			return;

		if ( !isset( $post -> post_modified_gmt ) ) {
			return;
		}

		$post_time = strtotime( $post -> post_modified_gmt );
		$modified_time = $post_time;

		// Если есть комментарий, обновляем дату
		if ( ( int ) $post -> comment_count > 0 ) {
			$comments = get_comments( array(
				'post_id' => $post -> ID,
				'number' => '1',
				'status' => 'approve',
				'orderby' => 'comment_date_gmt',
			) );
			if ( !empty( $comments ) && isset( $comments[0] ) ) {
				$comment_time = strtotime( $comments[0] -> comment_date_gmt );
				if ( $comment_time > $post_time ) {
					$modified_time = $comment_time;
				}
			}
		}

		$last_modified = str_replace( '+0000', 'GMT', gmdate( 'r', $modified_time ) );
	}


	// Cтраницы архивов: рубрики, метки, даты и тому подобное
	if ( is_archive() || is_home() ) {
		global $posts;

		if ( empty( $posts ) ) {
			return;
		}

		$post = $posts[0];

		if ( !isset( $post -> post_modified_gmt ) ) {
			return;
		}

		$post_time = strtotime( $post -> post_modified_gmt );
		$modified_time = $post_time;

		$last_modified = str_replace( '+0000', 'GMT', gmdate( 'r', $modified_time ) );
	}


	// Если заголовки уже отправлены - ничего не делаем
	if ( headers_sent() ) {
		return;
	}

	if ( !empty( $last_modified ) ) {
		header( 'Last-Modified: ' . $last_modified );

		if ( !is_user_logged_in() ) {
			if ( isset( $_SERVER['HTTP_IF_MODIFIED_SINCE'] ) && strtotime( $_SERVER['HTTP_IF_MODIFIED_SINCE'] ) >= $modified_time ) {
				$protocol = (isset( $_SERVER['SERVER_PROTOCOL'] ) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.1');
				header( $protocol . ' 304 Not Modified' );
			}
		}
	}
}


function varnish_safe_http_headers() {
	session_cache_limiter('');
	header_remove("Cache-Control");
	header("Cache-Control: public, max-age=60");
	if( !session_id() )
	{
		session_start();
	}
}
add_action( 'template_redirect', 'varnish_safe_http_headers' );




/**
 * Sets a cookie sitename_new_visitor if it doesn't exist already.
 */
function example_set_new_user_cookie() {
	if ( ! is_admin() && ! isset( $_COOKIE['sitename_new_visitor'] ) ) {
		setcookie( 'sitename_new_visitor', 1, time() + 3600 * 24 * 100, COOKIEPATH, COOKIE_DOMAIN, false );
	}
}
add_action( 'init', 'example_set_new_user_cookie');


// сжатие контента

if( extension_loaded('zlib') && ini_get('output_handler') != 'ob_gzhandler' ){
    add_action('wp', function(){ @ ob_end_clean(); @ ini_set('zlib.output_compression', 'on'); } );
}

