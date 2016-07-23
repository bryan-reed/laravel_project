// If there is a login or signup error show the modal
if(app.loginError)
	$('#signinModal').modal();
else if(app.signupError)
	$('#signupModal').modal();
//Submit form once the sort drop down is changed
$('.sort-search').on('change', function() {
	$('#searchForm').submit();
});