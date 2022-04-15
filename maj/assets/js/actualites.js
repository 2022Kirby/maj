document.documentElement.classList.replace('no-js', 'js');

const container = document.querySelector('#actualites');
const button = document.querySelector('.load-more');
let page = parseInt(container.getAttribute('data-page'));

const fetchPosts = async () => {
    let url = `${window.location.href}.json/page:${page}`;
    try {
        const response = await fetch(url);
        const { html, more } = await response.json();
        button.hidden = !more;
        container.innerHTML += html;
        page++;
    } catch (error) {
        console.log('Fetch error: ', error);
    }
}

button.addEventListener('click', fetchPosts);