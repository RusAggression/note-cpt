<?php

namespace RusAggression\NoteCPT;

final class NotePostType {
	public static function register(): void {
		if ( post_type_exists( 'note' ) ) {
			return;
		}

		$labels = [
			'name'               => _x( 'Informational Notes', 'post type general name', 'note-cpt' ),
			'singular_name'      => _x( 'Informational Note', 'post type singular name', 'note-cpt' ),
			'menu_name'          => _x( 'Informational Notes', 'admin menu', 'note-cpt' ),
			'add_new'            => _x( 'Add New', 'database', 'note-cpt' ),
			'add_new_item'       => __( 'Add New Informational Note', 'note-cpt' ),
			'edit_item'          => __( 'Edit Informational Note', 'note-cpt' ),
			'new_item'           => __( 'New Informational Note', 'note-cpt' ),
			'view_item'          => __( 'View Informational Note', 'note-cpt' ),
			'search_items'       => __( 'Search Informational Notes', 'note-cpt' ),
			'not_found'          => __( 'No informational notes found', 'note-cpt' ),
			'not_found_in_trash' => __( 'No informational notes found in trash', 'note-cpt' ),
		];

		$args = [
			'labels'             => $labels,
			'public'             => true,
			'has_archive'        => true,
			'publicly_queryable' => true,
			'query_var'          => true,
			'rewrite'            => [ 'slug' => 'note' ],
			'capability_type'    => 'post',
			'hierarchical'       => false,
			'supports'           => [ 'title' ],
			'menu_position'      => 5,
			'menu_icon'          => 'dashicons-text-page',
			'show_in_rest'       => true,
			'rest_base'          => 'notes',
		];

		register_post_type( 'note', $args );
	}

	public static function unregister(): void {
		unregister_post_type( 'note' );
	}
}
