affichageListesCocktails = {

    buttonVodka:document.getElementById('button_vodka'),
    listesVodka:document.getElementById('Listes_vodka'),
    buttonGin:document.getElementById('button_gin'),
    listesGin:document.getElementById('Listes_gin'),
    buttonRhum:document.getElementById('button_rhum'),
    listesRhum:document.getElementById('Listes_rhum'),
    buttonTequila:document.getElementById('button_tequila'),
    listesTequila:document.getElementById('Listes_tequila'),
    buttonWhiskies:document.getElementById('button_whiskies'),
    listesWhiskies:document.getElementById('Listes_whiskies'),
    buttonAutresSpiritueux:document.getElementById('button_autresspiritueux'),
    listesAutresSpiritueux:document.getElementById('Listes_autresspiritueux'),



    initButtonVodka:function(){
        affichageListesCocktails.buttonVodka.addEventListener('click', function(){
            affichageListesCocktails.listesVodka.style.display = 'block';
            affichageListesCocktails.listesGin.style.display = 'none';
            affichageListesCocktails.listesRhum.style.display = 'none';
            affichageListesCocktails.listesTequila.style.display = 'none';
            affichageListesCocktails.listesWhiskies.style.display = 'none';
            affichageListesCocktails.listesAutresSpiritueux.style.display = 'none';
        });
    },
    initButtonGin:function(){
        affichageListesCocktails.buttonGin.addEventListener('click', function(){
            affichageListesCocktails.listesGin.style.display = 'block';
            affichageListesCocktails.listesVodka.style.display = 'none';
            affichageListesCocktails.listesRhum.style.display = 'none';
            affichageListesCocktails.listesTequila.style.display = 'none';
            affichageListesCocktails.listesWhiskies.style.display = 'none';
            affichageListesCocktails.listesAutresSpiritueux.style.display = 'none';
        });
    },
    initButtonRhum:function(){
        affichageListesCocktails.buttonRhum.addEventListener('click', function(){
            affichageListesCocktails.listesRhum.style.display = 'block';
            affichageListesCocktails.listesGin.style.display = 'none';
            affichageListesCocktails.listesVodka.style.display = 'none';
            affichageListesCocktails.listesTequila.style.display = 'none';
            affichageListesCocktails.listesWhiskies.style.display = 'none';
            affichageListesCocktails.listesAutresSpiritueux.style.display = 'none';
        });
    },
    initButtonTequila:function(){
        affichageListesCocktails.buttonTequila.addEventListener('click', function(){
            affichageListesCocktails.listesTequila.style.display = 'block';
            affichageListesCocktails.listesGin.style.display = 'none';
            affichageListesCocktails.listesRhum.style.display = 'none';
            affichageListesCocktails.listesVodka.style.display = 'none';
            affichageListesCocktails.listesWhiskies.style.display = 'none';
            affichageListesCocktails.listesAutresSpiritueux.style.display = 'none';
        });
    },
    initButtonWhiskies:function(){
        affichageListesCocktails.buttonWhiskies.addEventListener('click', function(){
            affichageListesCocktails.listesWhiskies.style.display = 'block';
            affichageListesCocktails.listesGin.style.display = 'none';
            affichageListesCocktails.listesRhum.style.display = 'none';
            affichageListesCocktails.listesTequila.style.display = 'none';
            affichageListesCocktails.listesVodka.style.display = 'none';
            affichageListesCocktails.listesAutresSpiritueux.style.display = 'none';
        });
    },
    initButtonAutresSpiritueux:function(){
        affichageListesCocktails.buttonAutresSpiritueux.addEventListener('click', function(){
            affichageListesCocktails.listesAutresSpiritueux.style.display = 'block';
            affichageListesCocktails.listesGin.style.display = 'none';
            affichageListesCocktails.listesRhum.style.display = 'none';
            affichageListesCocktails.listesTequila.style.display = 'none';
            affichageListesCocktails.listesWhiskies.style.display = 'none';
            affichageListesCocktails.listesVodka.style.display = 'none';
        });
    }

};

affichageListesCocktails.initButtonVodka();
affichageListesCocktails.initButtonGin();
affichageListesCocktails.initButtonRhum();
affichageListesCocktails.initButtonTequila();
affichageListesCocktails.initButtonWhiskies();
affichageListesCocktails.initButtonAutresSpiritueux();
