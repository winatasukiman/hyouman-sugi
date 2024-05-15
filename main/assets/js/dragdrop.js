'use strict';

;( function ( document, window, index )
{
	// feature detection for drag&drop upload
	var isAdvancedUpload = function()
		{
			var div = document.createElement( 'div' );
			return ( ( 'draggable' in div ) || ( 'ondragstart' in div && 'ondrop' in div ) ) && 'FormData' in window && 'FileReader' in window;
		}();


	// applying the effect for every form
	var forms = document.querySelectorAll( '.dragdrop' );
	Array.prototype.forEach.call( forms, function( form )
	{
		var input		 = form.querySelector( 'input[type="file"]' ),
			label		 = form.querySelector( 'label' ),
			errorMsg	 = form.querySelector( '.box__error span' ),
			restart		 = form.querySelectorAll( '.box__restart' ),
			droppedFiles = false,
			showFiles	 = function( files )
			{
				label.textContent = files.length > 1 ? ( input.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', files.length ) : files[ 0 ].name;
			},
			triggerFormSubmit = function()
			{
				var event = document.createEvent( 'HTMLEvents' );
				event.initEvent( 'submit', true, false );
				form.dispatchEvent( event );
			},
			updateTaskFileList = function() {
				let cur_id = $("#class_mission_participants_id").val().split("_");
				class_mission_participants_id = cur_id[cur_id.length - 1];
				$.ajax({
					type: 'post',
					url: base_url+'classes/get_class_mission_files',
					data: {
						class_mission_participants_id: class_mission_participants_id,
					},
					success: function(data) {
						data = JSON.parse(data);
						let html_data = "";
						id = class_mission_participants_id;
						for (let index = 0; index < data.length; ++index) {
							let task_file = data[index];
							html_data += '<li class="list-group-item" id="file_task_'+task_file['class_mission_participants_detail_id']+'"><a href="'+base_url+task_file['task_content']+'" download>'+task_file['file_name']+'</a></li>';
							id = task_file['class_mission_participants_id'];
						}
						$('#task_file_list_'+id).html(html_data);
					}
				});
			},
			hideModal = function()
			{
				var parentModal = $(form).parents(".modal");
				parentModal.modal("hide");
			};

		// letting the server side to know we are going to make an Ajax request
		var ajaxFlag = document.createElement( 'input' );
		ajaxFlag.setAttribute( 'type', 'hidden' );
		ajaxFlag.setAttribute( 'name', 'ajax' );
		ajaxFlag.setAttribute( 'value', 1 );
		form.appendChild( ajaxFlag );

		// automatically submit the form on file select
		input.addEventListener( 'change', function( e )
		{
			//showFiles( e.target.files );

			triggerFormSubmit();
		});

		// drag&drop files if the feature is available
		if( isAdvancedUpload )
		{
			form.classList.add( 'has-advanced-upload' ); // letting the CSS part to know drag&drop is supported by the browser

			[ 'drag', 'dragstart', 'dragend', 'dragover', 'dragenter', 'dragleave', 'drop' ].forEach( function( event )
			{
				form.addEventListener( event, function( e )
				{
					// preventing the unwanted behaviours
					e.preventDefault();
					e.stopPropagation();
				});
			});
			[ 'dragover', 'dragenter' ].forEach( function( event )
			{
				form.addEventListener( event, function()
				{
					form.classList.add( 'is-dragover' );
				});
			});
			[ 'dragleave', 'dragend', 'drop' ].forEach( function( event )
			{
				form.addEventListener( event, function()
				{
					form.classList.remove( 'is-dragover' );
				});
			});
			form.addEventListener( 'drop', function( e )
			{
				droppedFiles = e.dataTransfer.files; // the files that were dropped
				//showFiles( droppedFiles );
	
				triggerFormSubmit();

				});
		}


		// if the form was submitted
		form.addEventListener( 'submit', function( e )
		{
			// preventing the duplicate submissions if the current one is in progress
			if( form.classList.contains( 'is-uploading' ) ) return false;

			form.classList.add( 'is-uploading' );
			form.classList.remove( 'is-error' );
			document.getElementById("loading-overlay").style.display = 'block';

			if( isAdvancedUpload ) // ajax file upload for modern browsers
			{
				e.preventDefault();

				// gathering the form data
				var ajaxData = new FormData( form );
				if( droppedFiles )
				{
					Array.prototype.forEach.call( droppedFiles, function( file )
					{
						ajaxData.append( input.getAttribute( 'name' ), file );
					});
				}

				// ajax request
				var ajax = new XMLHttpRequest();
				ajax.open( form.getAttribute( 'method' ), form.getAttribute( 'action' ), true );

				ajax.onload = function()
				{
					form.classList.remove( 'is-uploading' );
					if( ajax.status >= 200 && ajax.status < 400 )
					{
						var data = JSON.parse( ajax.responseText );
						if(data.success == false) {
							form.classList.add( 'is-error' );
						}
						updateTaskFileList();
						hideModal();
						if( !data.success ) errorMsg.textContent = data.error;
					}
					else alert( 'Error. Please, contact the webmaster!' );
				};

				ajax.onerror = function()
				{
					form.classList.remove( 'is-uploading' );
					alert( 'Error. Please, try again!' );
				};

				ajax.send( ajaxData );
			}
			else // fallback Ajax solution upload for older browsers
			{
				var iframeName	= 'uploadiframe' + new Date().getTime(),
					iframe		= document.createElement( 'iframe' );

					$iframe		= $( '<iframe name="' + iframeName + '" style="display: none;"></iframe>' );

				iframe.setAttribute( 'name', iframeName );
				iframe.style.display = 'none';

				document.body.appendChild( iframe );
				form.setAttribute( 'target', iframeName );

				iframe.addEventListener( 'load', function()
				{
					var data = JSON.parse( iframe.contentDocument.body.innerHTML );
					form.classList.remove( 'is-uploading' )
					if(data.success == false) {
						form.classList.add( 'is-error' );
					}
					updateTaskFileList();
					hideModal();
					form.removeAttribute( 'target' );
					if( !data.success ) errorMsg.textContent = data.error;
					iframe.parentNode.removeChild( iframe );
				});
			}
			document.getElementById("loading-overlay").style.display = 'none';
		});


		// restart the form if has a state of error/success
		Array.prototype.forEach.call( restart, function( entry )
		{
			entry.addEventListener( 'click', function( e )
			{
				e.preventDefault();
				form.classList.remove( 'is-error', 'is-success' );
				input.click();
			});
		});

		// Firefox focus bug fix for file input
		input.addEventListener( 'focus', function(){ input.classList.add( 'has-focus' ); });
		input.addEventListener( 'blur', function(){ input.classList.remove( 'has-focus' ); });

	});
}( document, window, 0 ));