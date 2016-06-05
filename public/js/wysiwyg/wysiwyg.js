tinymce.init({
  selector: 'textarea',
  elemts : "wysiwyg",
  plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table contextmenu paste code',
    "autoresize"
  ],
  toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  content_css: [
    '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
    '//www.tinymce.com/css/codepen.min.css'
  ]
});
$('.tinymce').tinymce({
  theme : 'advanced',
  plugins : 'autoresize',
  width: '100%',
  height: 400,
  autoresize_min_height: 400,
  autoresize_max_height: 800,
});

 var heightVentana = $('.ventana_aplicacion').height();


tinyMCE.DOM.setStyle(tinyMCE.DOM.get("wysiwyg" + '_ifr'), 'height', heightVentana + 'px');