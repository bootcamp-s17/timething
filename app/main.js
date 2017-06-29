//<![CDATA[
// array of possible countries in the same order as they appear in the country selection list
var categoryLists = new Array(4)
categoryLists["empty"] = ["Select a Country"];
categoryLists["32"] = 
[
  {
    "id": 33,
    "name": "Design services",
    "rate": 45
  },
  {
    "id": 36,
    "name": "Web design",
    "rate": 60
  }
];
categoryLists["39"] = 
[
  {
    "id": 41,
    "name": "Test out trampoline",
    "rate": 10
  },
  {
    "id": 39,
    "name": "Write code",
    "rate": 35
  }
];
categoryLists["40"] = 
[
  {
    "id": 42,
    "name": "Eat lots of frozen yogurt",
    "rate": 20
  }
];
categoryLists["30"] = 
[
  {
    "id": 31,
    "name": "Consulting services",
    "rate": 65
  }
];

//categoryLists["30"]= ["Britain", "France", "Spain", "Germany"];



/* CountryChange() is called from the onchange event of a select element.
 * param selectObj - the select object which fired the on change event.
 */
function clientChange(selectObj) {

  // get the index of the selected option
  var idx = selectObj.selectedIndex;

  // get the value of the selected option
  var which = selectObj.options[idx].value;

  // use the selected option value to retrieve the list of items from the countryLists array
  cList = categoryLists[which];


//console.log(cList);


  // get the country select element via its known id
  var cSelect = document.getElementById("categorySelect");

  // remove the current options from the country select
  var len=cSelect.options.length;
  while (cSelect.options.length > 0) {
    cSelect.remove(0);
  }

  var newOption;
  // create new options
  for (var i=0; i<cList.length; i++) {
    newOption = document.createElement("option");


console.log(cList[i]);


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
//]]>
