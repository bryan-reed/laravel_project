if(app.loginError)
	$('#signinModal').modal();
else if(app.signupError)
	$('#signupModal').modal();

$('.sort-search').on('change', function() {
	$('#searchForm').submit();
});