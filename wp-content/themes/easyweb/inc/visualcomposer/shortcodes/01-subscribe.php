<?php
vc_map( array(
        'name' =>'Webnus Subscribe',
        'base' => 'subscribe',
        "icon" => "subscribe",
		"description" => "Subscribe box",
        'category' => esc_html__( 'Webnus Shortcodes', 'easyweb' ),
        'params' => array(
						array(
							"type" => "dropdown",
							"heading" => esc_html__( "Type", 'easyweb' ),
							"param_name" => "type",
							"value" => array(
								"Boxed"=>"boxed",
								"Bar"=>"bar1",
								"Flat"=>"flat",
							),
							"description" => esc_html__( "Select style type", 'easyweb')
						),
						array(
								'type' => 'textfield',
								'heading' => esc_html__( 'Title', 'easyweb' ),
								'param_name' => 'box_title',
								'value'=>'',
								'description' => esc_html__( 'Subscribe title', 'easyweb'),
						),							
					
					    array(
							"type"=>'textarea',
							"param_name"=> "box_text",
							"heading"=>esc_html__('Subscribe Text', 'easyweb'),
							"value"=>"",
							"description" => esc_html__( "Subscribe content", 'easyweb')	
						),
						
						array(
							"type" => "dropdown",
							'heading' => esc_html__( 'Email Service', 'easyweb' ),
							'param_name' => 'service',
							"value" => array(
								"FeedBurner"=>"FeedBurner",
								"MailChimp"=>"MailChimp",
							),
							'description' => esc_html__( 'FeedBurner or MailChimp', 'easyweb')
						), 
						
						array(
							'type' => 'textfield',
							'heading' => esc_html__( 'FeedBurner ID', 'easyweb' ),
							'param_name' => 'feedburner_id',
							'value'=>'',
							'description' => esc_html__( 'Feedburner ID', 'easyweb'),
							"dependency" => array('element'=>'service','value'=>array('FeedBurner')),
						),	
					
						array(
							'type' => 'textfield',
							'heading' => esc_html__( 'MailChimp URL', 'easyweb' ),
							'param_name' => 'mailchimp_url',
							'value'=>'',
							'description' => esc_html__( 'Mailchimp form action URL', 'easyweb'),
							"dependency" => array('element'=>'service','value'=>array('MailChimp')),
						),	

						
						
					),    
		) );
?>