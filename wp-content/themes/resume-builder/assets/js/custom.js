const locale = window.location.pathname;
if (locale === '/') {
    var swiper = new Swiper('.presentation', {
        speed: 5000,
        loop: true,
        // autoplay: {
        //     delay: 3800,
        // },    
    });
    var swiper = new Swiper('.swiper-carreer', {
        speed: 4000,
        slidesPerView: 1,
        spaceBetween: 35,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        breakpoints: {
            1200: {
                slidesPerView: 3,
                spaceBetween: 35,
            },
            700: {
                slidesPerView: 2,
                spaceBetween: 25,
            },
            600: {
                slidesPerView: 1,
                spaceBetween: 35,
            },
          },
        // autoplay: {
        //     delay: 3500,
        // },    
    });
}else if (locale === '/gerador-de-curriculo/') {    
    document.getElementById('print-button').addEventListener('click', function() {
        var form = document.getElementById('resume-form');
    
        if (!form.checkValidity()) {
            alert('Por favor, preencha todos os campos obrigatórios.');
            return;
        }
    
        var printSection = document.getElementById('print-section');
        
        var name = document.getElementById('name').value;
        var age = document.getElementById('age').value;
        var sex = document.getElementById('sex').value;
        var maritalStatus = document.getElementById('maritimal_status').value;
        var nationality = document.getElementById('nationality').value;
        var address = document.getElementById('adress').value;
        var city = document.getElementById('city').value;
        var state = document.getElementById('state').value;
        var phone1 = document.getElementById('phone1').value;
        var phone2 = document.getElementById('phone2').value;
        var email = document.getElementById('mail').value;
        var goal = document.getElementById('goal').value;
    
        var photoInput = document.getElementById('photo');
    
        if (photoInput && photoInput.files && photoInput.files[0]) {
            var file = photoInput.files[0];
            var validImageTypes = ['image/jpeg', 'image/png'];
    
            if (validImageTypes.includes(file.type)) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var photoURL = e.target.result;
    
                    function getSectionContent(selector) {
                        var sections = document.querySelectorAll(selector);
                        return Array.from(sections).map(section => {
                            var fields = section.querySelectorAll('input, select, textarea');
                            return Array.from(fields).map(field => {
                                var label = field.previousElementSibling;
                                var labelText = label && label.tagName === 'LABEL' ? label.textContent : '';
                                return `<p><strong>${labelText}</strong> ${field.value}</p>`;
                            }).join('');
                        }).join('<hr>');
                    }
    
                    var academicContent = getSectionContent('section > article[data-add]');
                    var experienceContent = getSectionContent('section > article[data-add-exp]');
                    var qualifyContent = getSectionContent('section > article[data-add-qualify]');
                    var infoContent = getSectionContent('section > article[data-add-info]');
    
                    printSection.innerHTML = `
                        <div class="resume-personal-data">
                            ${photoURL ? `<figure><img src="${photoURL}" alt="Foto do candidato" style="max-width: 150px;"></figure>` : ''}
                            <div class="resume-photo"><p class="nome-title">${name}</p>
                            <p>${age}, ${sex}, ${maritalStatus}, ${nationality}</p>
                            <p>${address} - ${city} - ${state}</p>
                            <p>${phone1}</p>
                            ${phone2 !== '' ? `<p>${phone2}</p>` : ''}
                            <p>${email}</p></div>
                        </div>
                        ${goal !== '' ? `<div class="resume-goals"><h2 class="title-print">Objetivo</h2><p>${goal}</p></div>` : ''}
                        <div class="resume-academic-education">
                            <h2 class="title-print">Formação acadêmica</h2>
                            ${academicContent}
                        </div>
                        <div class="resume-professional-experience">
                            <h2 class="title-print">Experiência profissional</h2>
                            ${experienceContent}
                        </div>
                        ${qualifyContent !== '<p><strong></strong> </p>' ? `<div class="resume-qualify"><h2 class="title-print">Qualificações e atividades complementares</h2><p>${qualifyContent}</p></div>` : ''}
                        ${infoContent !== '<p><strong></strong> </p>' ? `<div class="resume-aditional-info"><h2 class="title-print">Informações adicionais</h2><p>${infoContent}</p></div>` : ''}
                    `;
    
                    window.print();
                };
                reader.readAsDataURL(file);
            } else {
                alert('Por favor, selecione um arquivo de imagem válido (PNG ou JPEG).');
            }
        } else {
            function getSectionContent(selector) {
                var sections = document.querySelectorAll(selector);
                return Array.from(sections).map(section => {
                    var fields = section.querySelectorAll('input, select, textarea');
                    return Array.from(fields).map(field => {
                        var label = field.previousElementSibling;
                        var labelText = label && label.tagName === 'LABEL' ? label.textContent : '';
                        return `<p><strong>${labelText}</strong> ${field.value}</p>`;
                    }).join('');
                }).join('<hr>');
            }
    
            var academicContent = getSectionContent('section > article[data-add]');
            var experienceContent = getSectionContent('section > article[data-add-exp]');
            var qualifyContent = getSectionContent('section > article[data-add-qualify]');
            var infoContent = getSectionContent('section > article[data-add-info]');
    
            printSection.innerHTML = `
                <div class="resume-personal-data">
                    <p class="nome-title">${name}</p>
                    <p>${age}, ${sex}, ${maritalStatus}, ${nationality}</p>
                    <p><strong>Endereço:</strong> ${address} - ${city} - ${state}</p>
                    <p><strong>Telefone:</strong> ${phone1}</p>
                    ${phone2 !== '' ? `<p><strong>Telefone 2:</strong> ${phone2}</p>` : ''}
                    <p><strong>Email:</strong> ${email}</p>
                </div>
                ${goal !== '' ? `<div class="resume-goals"><h2 class="title-print">Objetivo</h2><p>${goal}</p></div>` : ''}
                <div class="resume-academic-education">
                    <h2 class="title-print">Formação acadêmica</h2>
                    ${academicContent}
                </div>
                <div class="resume-professional-experience">
                    <h2 class="title-print">Experiência profissional</h2>
                    ${experienceContent}
                </div>
                ${qualifyContent !== '<p><strong></strong> </p>' ? `<div class="resume-qualify"><h2 class="title-print">Qualificações e atividades complementares</h2><p>${qualifyContent}</p></div>` : ''}
                ${infoContent !== '<p><strong></strong> </p>' ? `<div class="resume-aditional-info"><h2 class="title-print">Informações adicionais</h2><p>${infoContent}</p></div>` : ''}
            `;
    
            window.print();
        }
    });

    document.addEventListener("DOMContentLoaded", function() {
        function addSection(selector, dataAttribute) {
            var article = document.querySelector(`article[${dataAttribute}]`);
            var clone = article.cloneNode(true);
    
            var yearEndLabel = clone.querySelector('.year_end');
            if (yearEndLabel) {
                yearEndLabel.parentNode.removeChild(yearEndLabel);
            }
    
            var removeButton = document.createElement('button');
            removeButton.textContent = 'Remover';
            removeButton.type = 'button';
            removeButton.addEventListener('click', function() {
                clone.remove();
            });
            clone.appendChild(removeButton);
    
            var newArticle = document.createElement('article');
            newArticle.setAttribute(dataAttribute, '');
            article.parentNode.insertBefore(newArticle, article.nextSibling);
            newArticle.appendChild(clone);
        }
    
        document.getElementById('add-course').addEventListener('click', function(event) {
            event.preventDefault();
            addSection('article[data-add]', 'data-add');
        });
    
        document.getElementById('add-experience').addEventListener('click', function(event) {
            event.preventDefault();
            addSection('article[data-add-exp]', 'data-add-exp');
        });
    
        document.getElementById('add-qualify').addEventListener('click', function(event) {
            event.preventDefault();
            addSection('article[data-add-qualify]', 'data-add-qualify');
        });
    
        document.getElementById('add-info').addEventListener('click', function(event) {
            event.preventDefault();
            addSection('article[data-add-info]', 'data-add-info');
        });
    
        const links = document.querySelectorAll('.prevent-default');
        links.forEach(function(link) {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                const targetId = this.getAttribute('href').substring(1);
                const targetElement = document.getElementById(targetId);
                if (targetElement) {
                    targetElement.scrollIntoView({ behavior: 'smooth' });
                }
            });
        });
    });
    

}else if (locale.startsWith('/partner/')) {
    var swiper = new Swiper('.swiper-gallery', {
        speed: 4000,
        slidesPerView: 1,
        spaceBetween: 24,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        breakpoints: {
            1201: {
                slidesPerView: 4,
                spaceBetween: 24,
            },
            1200: {
                slidesPerView: 3,
                spaceBetween: 24,
            },
            700: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            600: {
                slidesPerView: 1,
                spaceBetween: 24,
            },
          },
        autoplay: {
            delay: 3000,
        },    
    });
}else if (locale.startsWith('/brand/')) {
    var swiper = new Swiper('.swiper-gallery', {
        speed: 4000,
        spaceBetween: 24,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        // autoplay: {
        //     delay: 3000,
        // },    
    });
}else if (locale.startsWith('/vagas-de-emprego/')) {
    function openFilter(){
        var openModal = document.querySelector('[data-open-filter]');
        var filter = document.querySelector('[data-filter]');

        const toggleClass = className => {
            filter.classList.toggle('toggleDesktop');
            filter.classList.toggle('togglemobile');
        };
        openModal.addEventListener('click', toggleClass);
    }
    openFilter();
}else if (locale.startsWith('/jornada-profissional/')) {
    var swiper = new Swiper('.swiper-course', {
        speed: 4000,
        slidesPerView: 5,
        spaceBetween: 30,
        pagination: {
            el: ".swiper-pagination-course",
            clickable: true,
        },
        breakpoints: {
            990: {
                slidesPerView: 5,
                spaceBetween: 30,
            },
            601: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            100: {
                slidesPerView: 1,
                spaceBetween: 20,
            },
        },
        // autoplay: {
        //     delay: 3500,
        // },    
    });
}
var swiper = new Swiper('.swiper-news', {
    speed: 4000,
    slidesPerView: 2,
    spaceBetween: 30,
    pagination: {
        el: ".swiper-pagination-news",
        clickable: true,
    },
    breakpoints: {
        990: {
            slidesPerView: 2,
            spaceBetween: 40,
        },
        601: {
            slidesPerView: 2,
            spaceBetween: 20,
        },
        100: {
            slidesPerView: 1,
            spaceBetween: 20,
        },
      },
    // autoplay: {
    //     delay: 3500,
    // },    
});
function applyFadeInOut() {
    if (!document.body.classList.contains('fadeInOut')) {
        document.body.classList.add('fadeInOut');
        setTimeout(function() {
            document.body.classList.remove('fadeInOut');
        }, 1000);
    }
}
window.addEventListener('popstate', function(event) {
    applyFadeInOut();
});
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('toggleMenuOpen').style.display = 'none';
    applyFadeInOut();
    var linkVoltarAoTopo = document.querySelector(".link-voltar-ao-topo");
    linkVoltarAoTopo.addEventListener("click", function(event) {
        event.preventDefault();
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    });

    window.addEventListener('scroll', function () {
        if (window.scrollY > 70) {
            document.getElementById('header-menu').classList.add('fixedShadow');
            document.getElementById('header-menu').classList.add('appear');
            document.getElementById('toggleMenuOpen').style.display = 'block';
        }else{
            document.getElementById('header-menu').classList.remove('fixedShadow');
            document.getElementById('header-menu').classList.remove('appear');
            document.getElementById('toggleMenuOpen').style.display = 'none';
    }})
});
function OpenMenu(){
    const menuElement = document.querySelector('[data-menu]');
    if (menuElement) {
        menuElement.classList.toggle('active-menu');
    }
}
function toggleSearchForm(action) {
    var openSearch = document.querySelector('[data-open-search]');
    var closeSearch = document.querySelector('[data-close-search]');
    var search = document.querySelector('[data-search]');

    if (action === 'open') {
        openSearch.style.display = 'none';
        search.style.display = 'block';
        closeSearch.style.display = 'block';
    } else if (action === 'close') {
        openSearch.style.display = 'block';
        search.style.display = 'none';
        closeSearch.style.display = 'none';
    }
}
function copyClipboard() {
    var pageUrl = window.location.href;
    if (navigator.clipboard && navigator.clipboard.writeText) {
        navigator.clipboard.writeText(pageUrl).then(function() {
            alert('Link da página copiado para a área de transferência!');
        }).catch(function(error) {
            alert('Falha ao copiar o link: ' + error);
        });
    } else {
        var textArea = document.createElement("textarea");
        textArea.value = pageUrl;
        document.body.appendChild(textArea);
        textArea.select();
        try {
            var successful = document.execCommand('copy');
            var msg = successful ? 'Link da página copiado para a área de transferência!' : 'Falha ao copiar o link';
            alert(msg);
        } catch (err) {
            alert('Falha ao copiar o link: ' + err);
        }
        document.body.removeChild(textArea);
    }
}
