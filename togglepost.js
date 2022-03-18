// скрипт для постов блога. в стандартном состоянии пост свёрнут (отображается только заголовок), 
// при клике разворачивается, при повторном клике – сворачивается. Единовременно может быть развёрнут только один пост


const postSection = document.querySelectorAll('.post-section');

postSection.forEach(post => {
    post.addEventListener('click', e => {

        postSection.forEach(post => {
            post.classList.remove('opened');
        })

        e.target.closest('.post-section').classList.add('opened');
    });
});