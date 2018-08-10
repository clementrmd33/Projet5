reglageAdministration = {
    bouttonCocktails:document.getElementById('titre_tableau1'),
    bouttonSpiritueux:document.getElementById('titre_tableau2'),
    bouttonBars:document.getElementById('titre_tableau3'),
    bouttonMembres:document.getElementById('titre_tableau4'),
    tableauCocktails:document.getElementById('tableau1'),
    tableauSpiritueux:document.getElementById('tableau2'),
    tableauBars:document.getElementById('tableau3'),
    tableauMembres:document.getElementById('tableau4'),

    initCocktails:function()
    {
        reglageAdministration.bouttonCocktails.addEventListener('click', function(){
            reglageAdministration.tableauCocktails.style.display = 'block';
            reglageAdministration.tableauSpiritueux.style.display = 'none';
            reglageAdministration.tableauBars.style.display = 'none';
            reglageAdministration.tableauMembres.style.display = 'none';
        });
    },
    initSpiritueux:function()
    {
        reglageAdministration.bouttonSpiritueux.addEventListener('click', function(){
            reglageAdministration.tableauSpiritueux.style.display = 'block';
            reglageAdministration.tableauCocktails.style.display = 'none';
            reglageAdministration.tableauBars.style.display = 'none';
            reglageAdministration.tableauMembres.style.display = 'none';
        });
    },
    initBars:function()
    {
        reglageAdministration.bouttonBars.addEventListener('click', function(){
            reglageAdministration.tableauBars.style.display = 'block';
            reglageAdministration.tableauSpiritueux.style.display = 'none';
            reglageAdministration.tableauCocktails.style.display = 'none';
            reglageAdministration.tableauMembres.style.display = 'none';
        });
    },
    initMembres:function()
    {
        reglageAdministration.bouttonMembres.addEventListener('click', function(){
            reglageAdministration.tableauMembres.style.display = 'block';
            reglageAdministration.tableauSpiritueux.style.display = 'none';
            reglageAdministration.tableauCocktails.style.display = 'none';
            reglageAdministration.tableauBars.style.display = 'none';
        });
    },
};
reglageAdministration.initCocktails();
reglageAdministration.initSpiritueux();
reglageAdministration.initBars();
reglageAdministration.initMembres();