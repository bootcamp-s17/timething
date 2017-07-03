//<![CDATA[
// array of possible countries in the same order as they appear in the country selection list


let categoryLists = [];

$(document).ready(function(){
    $('input[type=datetime-local]').val(new Date().toJSON().slice(0,19));
});

$('#selectAll').click(function(e) {   
    if(this.checked) {
        // Iterate each checkbox
        $(':checkbox').each(function() {
            this.checked = true;                        
        });
    } else {
       $(':checkbox').each(function() {
        this.checked = false;
       });
    }
});

$('.uncheck').click(function(e){
  $('#selectAll').prop('checked', false);
    if ($('.uncheck:checkbox:checked').length === $('.uncheck').length) {
      $('#selectAll').prop('checked', true);
      console.log("hey");
    }
})




/* clientChange() is called from the onchange event of a select element.
 * param selectObj - the select object which fired the on change event.
 */
function clientChange(selectObj) {

  $.ajax({
    url: 'data.json',
    dataType: 'json',
    success: (data) => {
      categoryLists.push(data);
    },
    complete: (data) => {

      // get the index of the selected option
      var idx = selectObj.selectedIndex;

      // get the value of the selected option
      var which = selectObj.options[idx].value;

      // use the selected option value to retrieve the list of items from the clientLists array
      cList = categoryLists[0][which];

      // get the client select element via its known id
      var cSelect = document.getElementById("categorySelect");

      // remove the current options from the client select
      var len=cSelect.options.length;
      while (cSelect.options.length > 0) {
        cSelect.remove(0);
      }

      var newOption;
      // create new options
      for (var i=0; i<cList.length; i++) {
        newOption = document.createElement("option");
        newOption.value = cList[i].id;  // assumes option string and value are the same
        newOption.text=cList[i].name;
        // add the new option
        try {
          cSelect.add(newOption);  // this will fail in DOM browsers but is needed for IE
        }
        catch (e) {
          cSelect.appendChild(newOption);
        }
      }

    }

  });


}
//]]>
