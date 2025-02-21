import tinymce from 'tinymce';


/**
 * Init TinyMCE
 */
tinymce.init({
  selector: ".text-editor",
  plugins: 'lists image code',
  toolbar: 'undo redo | styles | bold italic  | alignleft aligncenter alignright alignjustify | outdent indent | numlist bullist | image | code',
  
});

window.addEventListener("DOMContentLoaded", (event) => {
  // Toggle the side navigation
  const sidebarToggle = document.body.querySelector("#sidebarToggle");
  if (sidebarToggle) {
    // Uncomment Below to persist sidebar toggle between refreshes
    if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        document.body.classList.toggle('sb-sidenav-toggled');
    }
    sidebarToggle.addEventListener("click", (event) => {
      event.preventDefault();
      document.body.classList.toggle("sb-sidenav-toggled");
      localStorage.setItem(
        "sb|sidebar-toggle",
        document.body.classList.contains("sb-sidenav-toggled")
      );
    });
  }
});
