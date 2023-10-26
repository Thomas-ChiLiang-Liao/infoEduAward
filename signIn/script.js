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
    case '3': mem4.disabled = true;
              sch4.disabled = true;
    case '4': mem5.disabled = true;
              sch5.disabled = true;
    case '5': mem6.disabled = true;
              sch6.disabled = true;
  }
}

function isEmailExist() {
  if ( email.includes( document.getElementById("email").value ) ) {
    alert ( "此e-mail已註冊！");
    document.getElementById("email").focus();
    return true;
  } else return false;
}

function pwCheck() {
  let pw = document.getElementById("pw");
  let confirm = document.getElementById("pwConfirm");
  if (pw.value != confirm.value) {
    pw.style.backgroundColor = "pink";
    confirm.style.backgroundColor = "pink";
    return false;
  } else {
    pw.style.backgroundColor = "PaleGreen";
    confirm.style.backgroundColor = "PaleGreen";
    return true;
  }
}

function beforeSubmit() {
  // id 是否重覆
  if ( isEmailExist() ) return false;
  
  // 檢查性別欄
  if ( document.getElementById("sex1").checked != true && document.getElementById("sex2").checked != true ) {
    alert("性別欄未點選！");
    return false;
  }

  // 檢查身分別
  if ( document.getElementById("pCat1").checked != true &&
       document.getElementById("pCat2").checked != true &&
       document.getElementById("pCat3").checked != true &&
       document.getElementById("pCat4").checked != true &&
       document.getElementById("pCat5").checked != true    ) {
    alert("身分別未點選！");
    return false;
  }

  // 評選類別
  if ( document.getElementById("cat1").checked != true &&
       document.getElementById("cat2").checked != true &&
       document.getElementById("cat3").checked != true    ) {
    alert("評選類別未點選！");
    return false;
  }

  if (pwCheck()) return true;
  else {
    alert("密碼不一致，請確認！");
    return false;
  }
}