$(document).ready(function() {
    var secFuncOptions = new Array(),
        primFunc = $("#primaryFunction"),
        secFunc = $("#secondaryFunction"),
        selectedOption = $("#primaryFunction option:selected").val();

        console.log('selected option on load: ' + selectedOption);

    // hides initial secondary function
    $("#secondaryFunction tr").each(function(options) {
        var val = $(this).val(), text = $(this).text();
        secFuncOptions[val] = text;
        if(this.dataset['secVal'] === selectedOption) {
            $(this).hide();
        }
    });

    // hides secondary function when the primary function changes
    primFunc.on("change", function() {
        console.log("change select " + this.value);
        var val = this.value, newSecFunc = secFuncOptions;
        console.log("val: " + val);
        $("#secondaryFunction tr").each(function() {
            if(this.dataset['secVal']=== val) {
                $(this).hide();
            } else {
                $(this).show();
            }
        });
    });

    // higlight selected secondary function options
    $("#secondaryFunction tr").click(function(e) {
      var target = $(e.target);

      if(!target.is('input:checkbox')) {
        $(this).find('input:checkbox').each(function() {
          if(this.checked) {
            this.checked = false;
          } else {
            this.checked = true;
          }
        })
      }
        //highlights selected function from secondary table
        $(this).toggleClass("highlight");
        // $("#sFunc-input").attr('checked', 'checked');

        var data = $(this).children('td').map(function() {
          return $(this).text();
        }).get();
        console.log("data: " + data);

    });
});

//button to add capabilities
function addButton() {
  console.log('click button')
    if($('#capabilities').val.length > 0) {
      console.log('input has value')
      var cap = $('#capabilities').val();

      //add span to each new capability
      $('p.btnCap').append('<span>'+cap+'<span>');

      //add delimiter ',' after each added capability
      cap += ',';

      //build ',' delimited string to input into db
      $('.hiddenCap_paragraph').append(cap);
      $('.hiddenCap').val($('.hiddenCap_paragraph').text());
      return true
    } else {
      console.log('input has NO value');
      alert("Please enter a value");
      return false;
    }

}
