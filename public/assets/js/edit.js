//for editing incident, hide original category from dropdown list
$(document).ready(function() {
  console.log('edit.js');
  var catOptions = new Array(),
  selectedOption = $("#dropDownCat option:selected").val();
  console.log('selected option on load: ' + selectedOption);

  $("#cat").each(function(options) {
      var val = $(this).val(), text = $(this).text();
      console.log(val);
      console.log(text);
      catOptions[val] = text;
      if(this.dataset['secVal'] === selectedOption) {
          $(this).hide();
      }
  });
})
