window.onload = () => {
    let miniPlayer = document.querySelector('#miniPlayer');
    let fullPlayer = document.querySelector('#fullPlayer');
    let headerPlayer = document.querySelector('#headerPlayer');

    miniPlayer.onclick = () => {
        fullPlayer.classList.remove('-bottom-12', 'h-0');
        fullPlayer.classList.add('bottom-0', 'h-screen');
    }

    headerPlayer.onclick = () => {
        fullPlayer.classList.add('-bottom-12', 'h-0');
        fullPlayer.classList.remove('bottom-0', 'h-screen');
    }

    song();
}


function song() {

    let song = document.querySelector('#song');
    let songs = document.querySelectorAll('.songs');
    let playPause = document.querySelectorAll('.playPause');
    let songLikes = document.querySelectorAll('.songLike');
    let next = document.querySelectorAll('.nextSong');
    let titles = document.querySelectorAll('.songTitle');
    let artists = document.querySelectorAll('.songArtists');
    let prev = document.querySelectorAll('.prevSong');
    let songPosition = document.querySelectorAll('.songPosition');
    let interval;
    
    playPause.forEach((p) => {
        p.onclick = (e) => {
            e.stopPropagation();
            if (song.paused) {
                song.play();
            } else {
                song.pause();
            }
        }
    })

    songs.forEach((audio) => {
        audio.onclick = () => {
            play(audio);
        }
    })

    songLikes.forEach((songLike) => {
        songLike.onclick = (e) => {
            e.stopPropagation();
            let currentPos = Array.from(songs).findIndex((i) => i.id === song.getAttribute('value'));
            if (songs[currentPos].getAttribute('like')) {
                songLike.src = window.location.origin + `/icons/heart.svg`;
                songs[currentPos].removeAttribute('like');
            } else {
                songLike.src = window.location.origin + `/icons/heart_full.svg`;
                songs[currentPos].setAttribute('like', 1);

            }
        }
    })

    function play(audio) {
        song.src = window.location.origin + `/song/${audio.getAttribute('value')}.mp3`
        song.setAttribute('value', audio.id);
        song.play();
        miniPlayer.classList.remove('hidden')

        let oldsong = document.querySelector('.songs.text-green-500');
        if (oldsong) {
            oldsong.classList.remove('text-green-500');
        }

        if (audio.getAttribute('like')) {
            songLikes.forEach((songLike) => {
                songLike.src = window.location.origin + `/icons/heart_full.svg`;
            })
        } else {
            songLikes.forEach((songLike) => {
                songLike.src = window.location.origin + `/icons/heart.svg`;
            })
        }

        audio.classList.add('text-green-500')

        titles.forEach((title) => {
            title.innerText = audio.innerText;
        })

        artists.forEach((artist) => {
            artist.innerText = audio.parentElement.querySelector('p').innerText;
        })

        songPosition.forEach((songPos) => {
            songPos.style.width = '0';
        })
    }

    next.forEach((nex) => {

        nex.onclick = () => {
            let currentPos = Array.from(songs).findIndex((i) => i.id === song.getAttribute('value'));
            if (currentPos < (songs.length - 1)) {
                play(songs[currentPos + 1]);
                prev.forEach((pre) => {
                    pre.classList.remove('opacity-50')
                })
            } else {
                next.forEach((nex) => {
                    nex.classList.add('opacity-50')
                })
            }
        }
    })

    prev.forEach((pre) => {
        pre.onclick = () => {
            let currentPos = Array.from(songs).findIndex((i) => i.id === song.getAttribute('value'));
            if (currentPos != 0) {
                play(songs[currentPos - 1]);
                next.forEach((nex) => {
                    nex.classList.remove('opacity-50')
                })
            } else {
                prev.forEach((pre) => {
                    pre.classList.add('opacity-50')
                })
            }
        }
    })

    song.onended = () => {
        clearInterval(interval);
        songPosition.forEach((songPos) => {
            songPos.style.width = '0';
        })

        playPause.forEach((p) => {
            p.src = p.src.replace('pause', 'play');
            clearInterval(interval);
        })
    }

    song.onplay = () => {
        playPause.forEach((p) => {
            p.src = p.src.replace('play', 'pause');
            clearInterval(interval);
        })
        interval = setInterval(() => {
            songPosition.forEach((songPos) => {
                songPos.style.width = ((song.currentTime / song.duration) * 100) + '%';
            })
        }, 500);
    }

    song.onpause = () => {
        playPause.forEach((p) => {
            p.src = p.src.replace('pause', 'play');
            clearInterval(interval);
        })
    }
}