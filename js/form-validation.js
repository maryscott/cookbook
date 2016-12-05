// Wait for the DOM to be ready
$(function() {
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  $("form[name='addRecipe']").validate({
    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
	  recipeType: "required",
      recipeName: "required",
      briefDesc: {
		required: true,
		minlength: 10
	  }
    },
    // Specify validation error messages
    messages: {
	  recipeType: "Please select a recipe Type",
      recipeName: "Please enter a Recipe Name",
      briefDesc: {
        required: "Please provide a description",
        minlength: "Your description must be at least 10 characters long"
      }
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });
});
Conclusion