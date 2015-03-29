"use strict";

!function ($) {
	$(function(){
		/***************************************
		*** DOM Elements variables ***
		***************************************/
		var elems = {
			customInput: $("input[type='radio'], input[type='checkbox']"),
			fileUpload: $(".file-upload")			
		},
		buttonUpload = elems.fileUpload.find(".btn-upload");
		// customize radio buttons and checkboxes 
		elems.customInput.each(function(){
			var $this = $(this),
			$thisParent = $this.parent();
			if($thisParent.is("label")) {
				$("<span class='pseudo-input'></span>").insertAfter($this);
			}			
		})
		// button upload
		buttonUpload.on("click", function(){
			var self = $(this),
			inputFile = self.parent().find("input[type='file']");
			inputFile.trigger("click");
			inputFile.change(function(){
				var filePath = $(this).val();
				$(this).parent().find("h4").text(filePath);
				self
				.removeClass("btn-success")
				.addClass("btn-info")
				.text("Change")
			});
		})

	})
}(window.jQuery)

