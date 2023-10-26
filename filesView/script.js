function pdfView(t,f) {
  console.log(t);
  //console.log(f);
  document.getElementById('tableId').value = t;
  document.getElementById('filename').value = f;
  document.getElementById('pdfViewForm').submit();
}

function deleteFile(pathFilename) {
  document.getElementById('deleteFilename').value = pathFilename;
  document.getElementById('deleteForm').submit();
}

function getFilename(obj) {
  let fileName = obj.value.split("\\").pop();
  let fileType = fileName.split(".").pop().toLowerCase();
  if (fileType == 'pdf') {
    obj.nextElementSibling.innerHTML = fileName;
    obj.classList.add("selected");
  } else {
    alert('僅能上傳 .pdf 的檔案，請重新選擇');
    //$(this).siblings(".custom-file-label").removeClass("selected");
    obj.innerHTML = '';
  }
}