document.addEventListener("DOMContentLoaded", function(event) {

	// Logo Settings
	var active_tab = document.querySelector('.nav-tab-active');
	if ( active_tab.innerText == 'WordPress' ){
		var logo_settings_active = document.getElementById('wp_logo_settings_active');
		var logo_settings_children_string = logo_settings_active.getAttribute('data-children');
		var logo_settings_children = logo_settings_children_string.split(" ");

		if (logo_settings_active.checked) {
			logo_settings_children.forEach(function(item){
				document.getElementById(item).parentNode.parentNode.style.display = 'table-row';
			});
		} else {
			logo_settings_children.forEach(function(item){
				document.getElementById(item).parentNode.parentNode.style.display = 'none';
			});
		}

		logo_settings_active.addEventListener('change', function() {
			if (this.checked) {
				logo_settings_children.forEach(function(item){
					document.getElementById(item).parentNode.parentNode.style.display = 'table-row';
				});
			} else {
				logo_settings_children.forEach(function(item){
					document.getElementById(item).parentNode.parentNode.style.display = 'none';
				});
			}
		});
	}
	// Logo Settings End

});