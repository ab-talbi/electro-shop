
let selectionner = document.querySelector('.selectionner');
selectionner.addEventListener('change',function() {
    let checkboxes = document.querySelectorAll('.thecheck');
    for(var i=0;i<checkboxes.length;i++) {
      checkboxes[i].checked = this.checked;
    }
});


