(function ()
{
	// create pegoShortcodes plugin
	tinymce.create("tinymce.plugins.pegoShortcodes",
	{
		init: function ( ed, url )
		{
			ed.addCommand("pegoPopup", function ( a, params )
			{
				var popup = params.identifier;
				
				// load thickbox
				tb_show("Insert Shortcode", url + "/popup.php?popup=" + popup + "&width=" + 800);
			});
		},
		createControl: function ( btn, e )
		{
			if ( btn == "pego_button" )
			{	
				var a = this;
					
				// adds the tinymce button
				btn = e.createMenuButton("pego_button",
				{
					title: "Insert Shortcode",
					image: "../wp-content/themes/adorable/tinymce/images/icon.png",
					icons: false
				});
				
				// adds the dropdown to the button
				btn.onRenderMenu.add(function (c, b)
				{					
					a.addWithPopup( b, "Headings", "heading" );
					a.addWithPopup( b, "Columns", "columns" );
					a.addWithPopup( b, "Buttons", "button" );
					a.addWithPopup( b, "Video", "video" );
					a.addWithPopup( b, "List", "list" );
					a.addWithPopup( b, "Team", "team" );
					a.addWithPopup( b, "Image", "img" );
					a.addWithPopup( b, "Latest Portfolio", "latestportfolio" );
					a.addWithPopup( b, "Column with icon", "columnwithicon" );
				});
				
				return btn;
			}
			
			return null;
		},
		addWithPopup: function ( ed, title, id ) {
			ed.add({
				title: title,
				onclick: function () {
					tinyMCE.activeEditor.execCommand("pegoPopup", false, {
						title: title,
						identifier: id
					})
				}
			})
		},
		addImmediate: function ( ed, title, sc) {
			ed.add({
				title: title,
				onclick: function () {
					tinyMCE.activeEditor.execCommand( "mceInsertContent", false, sc )
				}
			})
		},
		getInfo: function () {
			return {
			
			}
		}
	});
	
	// add pegoShortcodes plugin
	tinymce.PluginManager.add("pegoShortcodes", tinymce.plugins.pegoShortcodes);
})();