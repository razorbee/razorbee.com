(function( $ ) {
	'use strict';
	$( document ).ready(function() {

		$('.wp-color-picker-field').wpColorPicker() ;
		$('.wp-color-picker-time').wpColorPicker() ;
		$('.wp-color-picker-day').wpColorPicker() ;
		//meta upload 0
        $('.wb_iconic_but_class').click(function(e) {
			var id = $(this).attr('id') ; 
            e.preventDefault();
            var image = wp.media({ 
                title: 'Upload',
                multiple: false
            }).open()
            .on('select', function(e){
                var uploaded_image = image.state().get('selection').first();
                console.log(uploaded_image);
                var image_url = uploaded_image.toJSON().url;
                $('#'+id).closest('p').find('input[type=text]').val(image_url);
            });
        });
        //meta upload 1
        $('.wb_iconic_but_class1').click(function(e) {
			var id = $(this).attr('id') ; 
            e.preventDefault();
            var image = wp.media({ 
                title: 'Upload',
                multiple: false
            }).open()
            .on('select', function(e){
                var uploaded_image = image.state().get('selection').first();
                console.log(uploaded_image);
                var image_url = uploaded_image.toJSON().url;
                $('#'+id).closest('p').find('input[type=text]').val(image_url);
            });
        });
        //meta upload 2
        $('.wb_iconic_but_class2').click(function(e) {
			var id = $(this).attr('id') ; 
            e.preventDefault();
            var image = wp.media({ 
                title: 'Upload',
                multiple: false
            }).open()
            .on('select', function(e){
                var uploaded_image = image.state().get('selection').first();
                console.log(uploaded_image);
                var image_url = uploaded_image.toJSON().url;
                $('#'+id).closest('p').find('input[type=text]').val(image_url);
            });
        });
        //meta upload 3
        $('.wb_iconic_but_class3').click(function(e) {
			var id = $(this).attr('id') ; 
            e.preventDefault();
            var image = wp.media({ 
                title: 'Upload',
                multiple: false
            }).open()
            .on('select', function(e){
                var uploaded_image = image.state().get('selection').first();
                console.log(uploaded_image);
                var image_url = uploaded_image.toJSON().url;
                $('#'+id).closest('p').find('input[type=text]').val(image_url);
            });
        });
        //meta upload 4
        $('.wb_iconic_but_class4').click(function(e) {
			var id = $(this).attr('id') ; 
            e.preventDefault();
            var image = wp.media({ 
                title: 'Upload',
                multiple: false
            }).open()
            .on('select', function(e){
                var uploaded_image = image.state().get('selection').first();
                console.log(uploaded_image);
                var image_url = uploaded_image.toJSON().url;
                $('#'+id).closest('p').find('input[type=text]').val(image_url);
            });
        });
        
        //day and time setup
        $("div#wb-tab-menu>div#list-group>a").click(function(e) {
	        e.preventDefault();
	        $(this).siblings('a.active').removeClass("active");
	        $(this).addClass("active");
	        var index = $(this).index();
	        $("div#wb-option-tab>div.wb-tab-contentm").removeClass("active");
	        $("div#wb-option-tab>div.wb-tab-contentm").eq(index).addClass("active");
	    });
	    //meta field 0
	    $("div#wb_meta0>div#wb_list_g>a").click(function(e) {
	        e.preventDefault();
	        $(this).siblings('a.active').removeClass("active");
	        $(this).addClass("active");
	        var index = $(this).index();
	        $("div#wb_meta_tab0>div.wb_tab_content_0").removeClass("active");
	        $("div#wb_meta_tab0>div.wb_tab_content_0").eq(index).addClass("active");
	    });
	    //meta field 0 key press
	    $('.wb_tab_content_0').find('.course_na0').focus(function(){
	    	var cours = $(this) ;
	    	var cdata = $(this).attr('data-count');
	    	$.each($('#wb_list_g a'),function(){
	    		var alink = $(this);
	    		var adata = $(this).attr('data-count');
	    		if ( cdata == adata) {
	    			cours.keypress(function(){
	    				alink.html($(this).val());
	    			});
	    		};
	    	});
	    });
		//meta field 0
		$( '#wb_tt_0_add' ).on('click', function() {
			$('.wp-color-picker-field').wpColorPicker() ;
			var row = $( '#wb_list_g a:last' ).clone(true);
			row.removeClass( 'wb_hidden wb_a_copy active' );
			row.insertAfter( '#wb_list_g a:last' );
			 var rowc = $( '.wb_row_field' ).clone(true);
			 rowc.removeClass( 'wb_row_field wb_hidden active' );
			 rowc.insertAfter( '#wb_meta_tab0 div.wb_tab_content_0:last' );
	        $('.wb_iconic_but_class').click(function(e) {
	        	var id = $(this).attr('id') ; 
                e.preventDefault();
                var image = wp.media({ 
                    title: 'Upload',
                    multiple: false
                }).open()
                .on('select', function(e){
                    var uploaded_image = image.state().get('selection').first();
                    
                    var image_url = uploaded_image.toJSON().url;
                     $('#'+id).closest('p').find('input[type=text]').val(image_url);
                });
            });
            $('.wp-color-picker-field').wpColorPicker() ;
			return false;
		});
	    //meta field 1
	    $("div#wb_meta1>div#wb_list_g1>a").click(function(e) {
	        e.preventDefault();
	        $(this).siblings('a.active').removeClass("active");
	        $(this).addClass("active");
	        var index = $(this).index();
	        $("div#wb_meta_tab1>div.wb_tab_content_1").removeClass("active");
	        $("div#wb_meta_tab1>div.wb_tab_content_1").eq(index).addClass("active");
	    });
	    //meta field 1 key press
	    $('.wb_tab_content_1').find('.course_na1').focus(function(){
	    	var cours = $(this) ;
	    	var cdata = $(this).attr('data-count');
	    	$.each($('#wb_list_g1 a'),function(){
	    		var alink = $(this);
	    		var adata = $(this).attr('data-count');
	    		if ( cdata == adata) {
	    			cours.keypress(function(){
	    				alink.html($(this).val());
	    			});
	    		};
	    	});
	    });
  		//meta field 1
  		$( '#wb_tt_1_add' ).on('click', function() {
			$('.wp-color-picker-field').wpColorPicker() ;
			var row = $( '#wb_list_g1 a:last' ).clone(true);
			row.removeClass( 'wb_hidden wb_a_copy' );
			row.insertAfter( '#wb_list_g1 a:last' );
			var rowc = $( '.wb_row_field' ).clone(true);
			rowc.removeClass( 'wb_row_field wb_hidden' );
			rowc.insertAfter( '#wb_meta_tab1 div.wb_tab_content_1:last' );
			    $('.wb_iconic_but_class1').click(function(e) {
			    	var id = $(this).attr('id') ;
                    e.preventDefault();
                    var image = wp.media({ 
                        title: 'Upload',
                        multiple: false
                    }).open()
                    .on('select', function(e){
                        var uploaded_image = image.state().get('selection').first();
                        
                        var image_url = uploaded_image.toJSON().url;
                        $('#'+id).closest('p').find('input[type=text]').val(image_url);
                    });
                });
			return false;
		});
	    //meta field 2
	    $("div#wb_meta2>div#wb_list_g2>a").click(function(e) {
	        e.preventDefault();
	        $(this).siblings('a.active').removeClass("active");
	        $(this).addClass("active");
	        var index = $(this).index();
	        $("div#wb_meta_tab2>div.wb_tab_content_2").removeClass("active");
	        $("div#wb_meta_tab2>div.wb_tab_content_2").eq(index).addClass("active");
	    });
	    //meta field 2 key press
	    $('.wb_tab_content_2').find('.course_na2').focus(function(){
	    	var cours = $(this) ;
	    	var cdata = $(this).attr('data-count');
	    	$.each($('#wb_list_g2 a'),function(){
	    		var alink = $(this);
	    		var adata = $(this).attr('data-count');
	    		if ( cdata == adata) {
	    			cours.keypress(function(){
	    				alink.html($(this).val());
	    			});
	    		};
	    	});
	    });
  		//meta field 2
		$( '#wb_tt_2_add' ).on('click', function() {
			$('.wp-color-picker-field').wpColorPicker() ;
			var row = $( '#wb_list_g2 a:last' ).clone(true);
			row.removeClass( 'wb_hidden wb_a_copy' );
			row.insertAfter( '#wb_list_g2 a:last' );
			var rowc = $( '.wb_row_field' ).clone(true);
			rowc.removeClass( 'wb_row_field wb_hidden' );
			rowc.insertAfter( '#wb_meta_tab2 div.wb_tab_content_2:last' );
			    $('.wb_iconic_but_class2').click(function(e) {
			    	var id = $(this).attr('id') ;
                    e.preventDefault();
                    var image = wp.media({ 
                        title: 'Upload',
                        multiple: false
                    }).open()
                    .on('select', function(e){
                        var uploaded_image = image.state().get('selection').first();
                        var image_url = uploaded_image.toJSON().url;
                         $('#'+id).closest('p').find('input[type=text]').val(image_url);
                    });
                });
			return false;
		});
	    //meta field 3
	    $("div#wb_meta3>div#wb_list_g3>a").click(function(e) {
	        e.preventDefault();
	        $(this).siblings('a.active').removeClass("active");
	        $(this).addClass("active");
	        var index = $(this).index();
	        $("div#wb_meta_tab3>div.wb_tab_content_3").removeClass("active");
	        $("div#wb_meta_tab3>div.wb_tab_content_3").eq(index).addClass("active");
	    });
	    //meta field 3 key press
	    $('.wb_tab_content_3').find('.course_na3').focus(function(){
	    	var cours = $(this) ;
	    	var cdata = $(this).attr('data-count');
	    	$.each($('#wb_list_g3 a'),function(){
	    		var alink = $(this);
	    		var adata = $(this).attr('data-count');
	    		if ( cdata == adata) {
	    			cours.keypress(function(){
	    				alink.html($(this).val());
	    			});
	    		};
	    	});
	    });
		//meta field 3
		$( '#wb_tt_3_add' ).on('click', function() {
			$('.wp-color-picker-field').wpColorPicker() ;
			var row = $( '#wb_list_g3 a:last' ).clone(true);
			row.removeClass( 'wb_hidden wb_a_copy' );
			row.insertAfter( '#wb_list_g3 a:last' );
			var rowc = $( '.wb_row_field' ).clone(true);
			rowc.removeClass( 'wb_row_field wb_hidden' );
			rowc.insertAfter( '#wb_meta_tab3 div.wb_tab_content_3:last' );
			    $('.wb_iconic_but_class3').click(function(e) {
			    	var id = $(this).attr('id') ;
                    e.preventDefault();
                    var image = wp.media({ 
                        title: 'Upload',
                        multiple: false
                    }).open()
                    .on('select', function(e){
                        var uploaded_image = image.state().get('selection').first();
                        var image_url = uploaded_image.toJSON().url;
                         $('#'+id).closest('p').find('input[type=text]').val(image_url);
                    });
                });
			return false;
		});
		//meta field 4
	    $("div#wb_meta4>div#wb_list_g4>a").click(function(e) {
	        e.preventDefault();
	        $(this).siblings('a.active').removeClass("active");
	        $(this).addClass("active");
	        var index = $(this).index();
	        $("div#wb_meta_tab4>div.wb_tab_content_4").removeClass("active");
	        $("div#wb_meta_tab4>div.wb_tab_content_4").eq(index).addClass("active");
	    });
	    //meta field 4 key press
	    $('.wb_tab_content_4').find('.course_na4').focus(function(){
	    	var cours = $(this) ;
	    	var cdata = $(this).attr('data-count');
	    	$.each($('#wb_list_g4 a'),function(){
	    		var alink = $(this);
	    		var adata = $(this).attr('data-count');
	    		if ( cdata == adata) {
	    			cours.keypress(function(){
	    				alink.html($(this).val());
	    			});
	    		};
	    	});
	    });
		//meta field 4
		$( '#wb_tt_4_add' ).on('click', function() {
			$('.wp-color-picker-field').wpColorPicker() ;
			var row = $( '#wb_list_g4 a:last' ).clone(true);
			row.removeClass( 'wb_hidden wb_a_copy' );
			row.insertAfter( '#wb_list_g4 a:last' );
			var rowc = $( '.wb_row_field' ).clone(true);
			rowc.removeClass( 'wb_row_field wb_hidden' );
			rowc.insertAfter( '#wb_meta_tab4 div.wb_tab_content_4:last' );
			    $('.wb_iconic_but_class4').click(function(e) {
			    	var id = $(this).attr('id') ;
                    e.preventDefault();
                    var image = wp.media({ 
                        title: 'Upload',
                        multiple: false
                    }).open()
                    .on('select', function(e){
                        var uploaded_image = image.state().get('selection').first();
                        var image_url = uploaded_image.toJSON().url;
                         $('#'+id).closest('p').find('input[type=text]').val(image_url);
                    });
                });
			return false;
		});
		//remove 0 
		$( '.remove-row' ).on('click', function() {
			var datac = $(this).parents('.wb-tab-content').find('.course_na0').attr('data-count');
			$.each($('#wb_list_g a'),function(){
				var dataa = $(this).attr('data-count');
				if (dataa == datac ) {
					$(this).fadeOut(1500);
				};
			});
			$(this).parents('.wb-tab-content').fadeOut(1500);
			return false;
		});
		//remove 1 
		$( '.remove-row' ).on('click', function() {
			var datac = $(this).parents('.wb-tab-content').find('.course_na1').attr('data-count');
			$.each($('#wb_list_g1 a'),function(){
				var dataa = $(this).attr('data-count');
				if (dataa == datac ) {
					$(this).fadeOut(1500);
				};
			});
			$(this).parents('.wb-tab-content').fadeOut(1500);
			return false;
		});
		//remove 2 
		$( '.remove-row' ).on('click', function() {
			var datac = $(this).parents('.wb-tab-content').find('.course_na2').attr('data-count');
			$.each($('#wb_list_g2 a'),function(){
				var dataa = $(this).attr('data-count');
				if (dataa == datac ) {
					$(this).fadeOut(1500);
				};
			});
			$(this).parents('.wb-tab-content').fadeOut(1500);
			return false;
		});
		//remove 3 
		$( '.remove-row' ).on('click', function() {
			var datac = $(this).parents('.wb-tab-content').find('.course_na3').attr('data-count');
			$.each($('#wb_list_g3 a'),function(){
				var dataa = $(this).attr('data-count');
				if (dataa == datac ) {
					$(this).fadeOut(1500);
				};
			});
			$(this).parents('.wb-tab-content').fadeOut(1500);
			return false;
		});
		//remove 4 
		$( '.remove-row' ).on('click', function() {
			var datac = $(this).parents('.wb-tab-content').find('.course_na4').attr('data-count');
			$.each($('#wb_list_g4 a'),function(){
				var dataa = $(this).attr('data-count');
				if (dataa == datac ) {
					$(this).fadeOut(1500);
				};
			});
			$(this).parents('.wb-tab-content').fadeOut(1500);
			return false;
		});
		// Time js	
        $(function () {

		    var new_dialog = function (type, row) {
		        var dlg = $("#wbtime-form").clone();
	            var time = dlg.find(("#wb-time"));
	            var icon = dlg.find(("#wb_img_url_ico"));
		        var config = {
		            autoOpen: true,
		            height: 300,
		            width: 350,
		            open: function() {

			            $('.wb_iconic_but_class').click(function(e) {
		                    e.preventDefault();
		                    var image = wp.media({ 
		                        title: 'Upload Image',
		                        multiple: false
		                    }).open()
		                    .on('select', function(e){
		                        var uploaded_image = image.state().get('selection').first();
		                        console.log(uploaded_image);
		                        var image_url = uploaded_image.toJSON().url;
		                        $('.wb_img_url_ico_class').val(image_url);
		                    });
		                });
				        
				    },
		            modal: true,
		            buttons: {
		                "Add Time": function() { 
		                	save_data();
		                	$('.wp-color-picker-time').wpColorPicker();
		                },
		                    "Finish": function () {
		                    dlg.dialog("close");
		                }
		            },
		            close: function () {
		                dlg.remove();
		            }
		        };
		        if (type === 'Edit') {
		            config.title = "Edit Time";
		            get_data();
		            delete(config.buttons['Add Time']);
		            config.buttons['Edit Time'] = function () {
		                row.remove();
		                save_data();

		            };

		        }
		        dlg.dialog(config);

                function get_data() {
                    var _time = $(row.children().get(0)).text();
                    time.val(_time);
                    var _icon = $(row.children().get(4)).text();
                    icon.val(_icon);
                } 

                function save_data() {
                	console.log(icon);
                	if ( typeof icon != 'undefined' || icon != null || icon.val() != "height='45'" ) {
					$("#wb-times tbody").append("<tr>" + "<td>" + "<input type='hidden' name='time_setup[]' value="+ time.val() +" >"+ time.val() +"</td>" +  "<td><a href='' class='edit'>Edit</a></td>" + "<td><span class='delete'><a href=''>Delete</a></span></td>" + "<td> <input type='hidden' name='wb_img_src[]' id='wb_img_src[]' value="+ icon.val() +" /> <img  class='wb_img_src_c' src="+ icon.val() +"  height='45' width='90' /> </td>"+"<td><input type='text' class='wp-color-picker-time' name='wb_time_color[]' value='' /></td></tr>");
					}else{
						$("#wb-times tbody").append("<tr>" + "<td>" + "<input type='hidden' name='time_setup[]' value="+ time.val() +" >"+ time.val() +"</td>" +  "<td><a href='' class='edit'>Edit</a></td>" + "<td><span class='delete'><a href=''>Delete</a></span></td>" + "<td> <label> Icon not set </label> </td></tr>");
					}
				}
		    };

		    $(document).on('click', 'td span.wb_delete', function () {
		        $(this).closest('tr').find('td').fadeOut(1000,

		        function () {
		            // alert($(this).text());
		            $(this).parents('tr:first').remove();
		        });

		        return false;
		    });
		    $(document).on('click', 'td #wb_edit_time', function () {
		        new_dialog('Edit', $(this).parents('tr'));
		        return false;
		    });

		    $("#add-time").button().click(new_dialog);
		});
		// day js	
        $(function () {

		    var new_dialog = function (type, row) {
		        var dlg = $("#wbday-form").clone();
	            var 
	            day = dlg.find(("#wb-day"));
		        var config = {
		            autoOpen: true,
		            height: 300,
		            width: 350,
		            modal: true,
		            closeOnEscape: true,
		            dialogClass: 'wb_tt_dialog',
		            open: function() {
		            	$('.ui-button-text').on('click',function(){
		            		console.log('empty');
		            		$('input#wb-day').focus();
		            		$('input#wb-day').text('');
		            	});
		            },
		            buttons: {
		                "Add day": function() { 
		                	save_data();
		                	$('.wp-color-picker-day').wpColorPicker(); 
		                },
		                    "Finish": function () {
		                   		 dlg.dialog("close");
		                }
		            },
		            close: function () {
		                dlg.remove();
		            }
		        };
		        if (type === 'Edit') {
		            config.title = "Edit day";
		            get_data();
		            delete(config.buttons['Add day']);
		            config.buttons['Edit day'] = function () {
		                row.remove();
		                save_data();

		            };

		        }
		        dlg.dialog(config);

                function get_data() {
                    var _day = $(row.children().get(0)).text();
                    day.val(_day); 
                } 

                function save_data() {
					$("#wb-days tbody").append("<tr>" + "<td>" + "<input type='hidden' name='day_setup[]' value="+ day.val() +" >"+ day.val() +"</td>" +  "<td><a href='' class='edit'>Edit</a></td>" + "<td><span class='delete'><a href=''>Delete</a></span></td>" + "<td><input type='text' class='wp-color-picker-day' name='wb_day_color[]' value='' /> </td>" + "</tr>"); 
				}
		    };

		    $(document).on('click', 'span .wb_delete', function () {
		        $(this).closest('tr').find('td').fadeOut(1000,

		        function () {
		             alert($(this).text());
		            $(this).parents('tr:first').remove();
		        });

		        return false;
		    });
		    $(document).on('click', 'td #edit_day', function () {
		        new_dialog('Edit', $(this).parents('tr'));
		        return false;
		    });
		    $("#add-day").button().click(new_dialog);
		});
	});

})( jQuery );
