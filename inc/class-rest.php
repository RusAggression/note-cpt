<?php

namespace RusAggression\NoteCPT;

final class REST {
	/** @var self|null */
	private static $instance;

	public static function get_instance(): self {
		if ( ! self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	private function __construct() {
		$this->rest_api_init();
	}

	public function rest_api_init(): void {
		register_rest_field( 'note', 'content', [
			'get_callback' => [ $this, 'content_callback' ],
		] );
	}

	public function content_callback( array $post ): string {
		/** @psalm-var string $post['content']['raw'] */
		return (string) apply_filters( 'the_content', $post['content']['raw'] );
	}
}
