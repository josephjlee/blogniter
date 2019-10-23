// Initialize CK Editor Plugin
ClassicEditor
.create( document.querySelector( '#editor' ) )
.then( editor => {
  console.log( editor );
} )
.catch( error => {
  console.error( error );
} );

// Title to Slug Feature
const postTitle = document.querySelector('#post-title');
const postSlug = document.querySelector('#post-slug');

postTitle.addEventListener('blur', genPostSlug);

function genPostSlug() {
  postSlug.value =  postTitle.value
                    .toString()
                    .trim()
                    .toLowerCase()
                    .replace(/\s+/g, "-")
                    .replace(/[^\w\-]+/g, "")
                    .replace(/\-\-+/g, "-")
                    .replace(/^-+/, "")
                    .replace(/-+$/, "");
}