   //Slug automático
   document.getElementById("name").addEventListener('keyup', slugChange);
   let url_base = window.location.origin;

   function slugChange() {
       name = document.getElementById("name").value;
       document.getElementById("slug").value = slug(name);

   }

   function slug(str) {
       var $slug = '';
       var trimmed = str.trim(str);
       $slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
       replace(/-+/g, '-').
       replace(/^-|-$/g, '');
       return $slug.toLowerCase();
   }
   //CKEDITOR
   ClassicEditor
       .create(document.querySelector('#extract'), {
           toolbar: ['heading', '|', 'bold', 'italic', 'link', 'blockQuote'],
           heading: {
               options: [{
                   model: 'paragraph',
                   title: 'Paragraph',
                   class: 'ck-heading_paragraph'
               }, {
                   model: 'heading1',
                   view: 'h1',
                   title: 'Heading 1',
                   class: 'ck-heading_heading1'
               }, {
                   model: 'heading2',
                   view: 'h2',
                   title: 'Heading 2',
                   class: 'ck-heading_heading2'
               }]
           }
       })
       .catch(error => {
           console.log(error);
       });

   ClassicEditor
       .create(document.querySelector('#body'))
       .catch(error => {
           console.error(error);
       });
   //Cambiar imagen
   document.getElementById("file").addEventListener('change', cambiarImagen);

   function cambiarImagen(event) {
       var file = event.target.files[0];

       var reader = new FileReader();
       reader.onload = (event) => {
           document.getElementById("picture").setAttribute('src', event.target.result);
       };

       reader.readAsDataURL(file);
   }
   $(document).ready(function() {
       function removeSelects() {
           $('#select2 option').remove();
       }
       $('.tipo_recurso_id').change(function() {
           let tipo = $('#postRadio').prop('checked') ? 1 : 2;
           let url = `${url_base}/obtener-categorias`;
           axios.post(url, {
                   tipo: tipo
               })
               .then((res) => {
                   let { data } = res;
                   removeSelects()
                   $('#select2').val("");
                   $('#select2').append($('<option value="" selected disabled>-- Seleccione Categoria -- </option>'));
                   data.forEach(cat => {
                       $('#select2').append($('<option>', {
                           value: cat.id,
                           text: cat.name
                       }));
                   });
               }).catch((error) => {
                   console.log(error);
               })
       });
       $('.tipo_recurso_id').trigger('change');
   });