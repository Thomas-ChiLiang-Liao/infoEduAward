function setMembers() {
  let members = document.getElementById("members").value;
  let mem4 = document.getElementById("mem4");
  let mem5 = document.getElementById("mem5");
  let mem6 = document.getElementById("mem6");
  let sch4 = document.getElementById("sch4");
  let sch5 = document.getElementById("sch5");
  let sch6 = document.getElementById("sch6");

  mem4.disabled = false;
  sch4.disabled = false;
  mem5.disabled = false;
  sch5.disabled = false;
  mem6.disabled = false;
  sch6.disabled = false;

  switch (members) {
    case '3': mem4.value = "";
              sch4.value = "";
              mem4.disabled = true;
              sch4.disabled = true;
    case '4': mem5.value = "";
              sch5.value = "";
              mem5.disabled = true;
              sch5.disabled = true;
    case '5': mem6.value = "";
              sch6.value = "";
              mem6.disabled = true;
              sch6.disabled = true;
              
  }
}

function init() {
  //alert(sex+'<br>'+pCat+'<br>'+cat);
  switch (sex) {
    case '1': document.getElementById('sex1').checked = true; break;
    case '2': document.getElementById('sex2').checked = true;
  }

  switch (pCat) {
    case '校長':            document.getElementById('pCat1').checked = true; break;
    case '主任':            document.getElementById('pCat2').checked = true; break;
    case '兼任行政職務教師':  document.getElementById('pCat3').checked = true; break;
    case '專任教師':         document.getElementById('pCat4').checked = true; break;
    case '導師':            document.getElementById('pCat5').checked = true;
  }

  switch (cat) {
    case '資訊科技教學組':  document.getElementById('cat1').checked = true; break;
    case '一般科目教學組':  document.getElementById('cat2').checked = true; break;
    case '行政類':         document.getElementById('cat3').checked = true;
  }
}