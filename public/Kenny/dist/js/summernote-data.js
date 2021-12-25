/*Summernote Init*/

$(function() {
	"use strict";
	$('.summernote').summernote({
        tabsize: 2,
        height: 400,
		toolbar: [
			['style', ['style']],
			['font', ['bold', 'italic', 'underline', 'clear']],
			['fontname', ['fontname']],
			['color', ['color']],
			['para', ['ul', 'ol', 'paragraph']],
			['height', ['height']],
			['table', ['table']],
			['insert', ['link', 'picture', 'hr']],
			['view', ['codeview']],
			['help', ['help']]
		  ],
	});
});