/*Toast Init*/

function toast_notification(heading, text, icon) {
	let loaderBg;
	if (icon == 'error') {
		loaderBg = '#F37346';
	} else if (icon == 'warning') {
		loaderBg = '#FCBC58';
	} else if (icon == 'success') {
		loaderBg = '#3cb878';
	} else if (icon == 'info') {
		loaderBg = '#EA65A2';
	}
	$.toast({
		heading: heading,
		text: text,
		position: 'top-right',
		loaderBg: loaderBg,
		icon: icon,
		hideAfter: 3000,
		stack: 1
	});
}