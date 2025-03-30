function getCookie(nome) {
    const cookies = document.cookie.split('; ');
    for (let i = 0; i < cookies.length; i++) {
        const parts = cookies[i].split('=');
        const cookie = parts[0].trim();
        if (cookie === nome) {
            return parts[1];
        }
    }
    return null;
}

const body = document.querySelector('body');
const position_cookie = getCookie('position');
const wallpaper_cookie = getCookie('wallpaper');
body.style.backgroundPositionY = position_cookie;
body.style.backgroundImage = `url('${wallpaper_cookie}')`;

const position_input = document.querySelector('#position');
const wallpaper_input = document.querySelector('#wallpaper');
wallpaper_input.value = wallpaper_cookie;
position_input.value = position_cookie;

const modal = document.querySelector('.modal');
const cancel = document.querySelector('#cancel');
const ok = document.querySelector('#ok');

cancel.onclick = () => {
    modal.style.display = 'none';
};

window.onclick = (event) => {
    if (event.target === modal) {
        modal.style.display = 'none';
    }
};

document.addEventListener('keydown', (event) => {
    if (event.altKey && event.key === 'w') {
        event.preventDefault();
        modal.style.display = 'block';
    }
});

const date = new Date();
date.setDate(date.getDate()+7);
ok.addEventListener('click', () => {
    const position = position_input.value;
    const wallpaper = wallpaper_input.value;
    document.cookie = `wallpaper=${wallpaper}; expires=${date.toUTCString()}; path=/`;
    document.cookie = `position=${position}; expires=${date.toUTCString()}; path=/`;
    location.reload();
});
