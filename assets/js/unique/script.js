const postTitle = document.querySelector('#post-title');
const postSlug = document.querySelector('#post-slug');

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

postTitle.addEventListener('blur', genPostSlug);