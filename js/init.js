/*
	Photon by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
*/

(function($) {

	skel.init({
		reset: 'full',
		breakpoints: {
			global: { href: 'css/style.css', containers: '60em', grid: { gutters: ['2em', 0] } },
			xlarge: { media: '(max-width: 1680px)', href: 'css/style-xlarge.css' },
			large: { media: '(max-width: 1140px)', href: 'css/style-large.css', containers: '90%', grid: { gutters: ['1.5em', 0] } },
			medium: { media: '(max-width: 980px)', href: 'css/style-medium.css', containers: '100%!' },
			small: { media: '(max-width: 736px)', href: 'css/style-small.css', viewport: { scalable: false } },
			xsmall: { media: '(max-width: 480px)', href: 'css/style-xsmall.css' },
			xxsmall: { media: '(max-width: 320px)', href: 'css/style-xxsmall.css' }
		}
	});

	$(function() {

		var	$window = $(window),
			$body = $('body');

		// Disable animations/transitions until the page has loaded.
			$body.addClass('is-loading');

			$window.on('load', function() {
				window.setTimeout(function() {
					$body.removeClass('is-loading');
				}, 250);
			});

		// Forms.
			var $form = $('form');

			if ($form.length > 0) {

				// Hack: Placeholder fix (IE<10).
					if (skel.vars.IEVersion < 10) {
						$.fn.n33_formerize=function(){var _fakes=new Array(),_form = $(this);_form.find('input[type=text],textarea').each(function() { var e = $(this); if (e.val() == '' || e.val() == e.attr('placeholder')) { e.addClass('formerize-placeholder'); e.val(e.attr('placeholder')); } }).blur(function() { var e = $(this); if (e.attr('name').match(/_fakeformerizefield$/)) return; if (e.val() == '') { e.addClass('formerize-placeholder'); e.val(e.attr('placeholder')); } }).focus(function() { var e = $(this); if (e.attr('name').match(/_fakeformerizefield$/)) return; if (e.val() == e.attr('placeholder')) { e.removeClass('formerize-placeholder'); e.val(''); } }); _form.find('input[type=password]').each(function() { var e = $(this); var x = $($('<div>').append(e.clone()).remove().html().replace(/type="password"/i, 'type="text"').replace(/type=password/i, 'type=text')); if (e.attr('id') != '') x.attr('id', e.attr('id') + '_fakeformerizefield'); if (e.attr('name') != '') x.attr('name', e.attr('name') + '_fakeformerizefield'); x.addClass('formerize-placeholder').val(x.attr('placeholder')).insertAfter(e); if (e.val() == '') e.hide(); else x.hide(); e.blur(function(event) { event.preventDefault(); var e = $(this); var x = e.parent().find('input[name=' + e.attr('name') + '_fakeformerizefield]'); if (e.val() == '') { e.hide(); x.show(); } }); x.focus(function(event) { event.preventDefault(); var x = $(this); var e = x.parent().find('input[name=' + x.attr('name').replace('_fakeformerizefield', '') + ']'); x.hide(); e.show().focus(); }); x.keypress(function(event) { event.preventDefault(); x.val(''); }); });  _form.submit(function() { $(this).find('input[type=text],input[type=password],textarea').each(function(event) { var e = $(this); if (e.attr('name').match(/_fakeformerizefield$/)) e.attr('name', ''); if (e.val() == e.attr('placeholder')) { e.removeClass('formerize-placeholder'); e.val(''); } }); }).bind("reset", function(event) { event.preventDefault(); $(this).find('select').val($('option:first').val()); $(this).find('input,textarea').each(function() { var e = $(this); var x; e.removeClass('formerize-placeholder'); switch (this.type) { case 'submit': case 'reset': break; case 'password': e.val(e.attr('defaultValue')); x = e.parent().find('input[name=' + e.attr('name') + '_fakeformerizefield]'); if (e.val() == '') { e.hide(); x.show(); } else { e.show(); x.hide(); } break; case 'checkbox': case 'radio': e.attr('checked', e.attr('defaultValue')); break; case 'text': case 'textarea': e.val(e.attr('defaultValue')); if (e.val() == '') { e.addClass('formerize-placeholder'); e.val(e.attr('placeholder')); } break; default: e.val(e.attr('defaultValue')); break; } }); window.setTimeout(function() { for (x in _fakes) _fakes[x].trigger('formerize_sync'); }, 10); }); return _form; };
						$form.n33_formerize();
					}

			}

		// Scrolly.
			$('.scrolly').scrolly();

	});
	// $(function(){
	// 	var uploadfile=$("#upload").prev();
	// 	containers.log(uploadfile);
	// 	$("#upload").click(function(){
	// 		uploadfile.click();
	// 	});
	// 	$("#upload").blur(function(){
	// 		if(uploadfile.val()){
	// 			$("#filename").html(uploadfile.val());
	// 		}
	// 	})
	// })

	$(function(){
		var upload = $('#upload');
		var uploadBtn = $('#upload-btn');
		uploadBtn.click(function(e){
			e.stopPropagation();
			e.preventDefault();
			upload.click();
		});

	});

	$(function(){
		var upload = document.getElementById('upload');
		upload.addEventListener('change',showFile,false);
		function showFile(e){
			var files = e.target.files;
			var output = [];
			var filename = document.getElementById('filename');
			for(var i =0,f; f = files[i];i++){
				output.push('<h6><strong>', escape(f.name), '</strong> (', f.type , ') - ',Math.floor(f.size/1024), 'kb</h6>');
			}
			filename.innerHTML = output.join('');
			console.log(e.target.files);
		}
	});


	// $(function(){
	// 	var submitBtn = $('#submit-btn');
	// 	submitBtn.click(function(e){
	// 		// if(true){
	// 		// 	e.stopPropagation();
	// 		// 	e.preventDefault();
	// 		// 	alert('你好');
	// 		// 	return;
	// 		// }
	// 		e.preventDefault();
	// 		console.log(e.target);

	// 	});
	// });

})(jQuery);


