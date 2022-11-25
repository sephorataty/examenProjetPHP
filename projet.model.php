<?php

//ENSEMBLE DES DONNNEES 

function all_ouvrage():array{
    $ouvrages=[
        ["id"=>1,"code"=>"code1","titre"=>"MIKIBOOK","date_edition"=>"30/04/2004","auteur_id"=>1,"id_rayon"=>2],
        ["id"=>2,"code"=>"code2","titre"=>"Histoire d'Awu","date_edition"=>"03/12/1998","auteur_id"=>2,"id_rayon"=>1],
        ["id"=>3,"code"=>"code3","titre"=>"SIANA","date_edition"=>"5/08/1884","auteur_id"=>3,"id_rayon"=>1]
    ];
    return $ouvrages;
}

function all_rayon():array{
    $rayons=[
        ["id"=>1,"categorie"=>"littérature"],
        ["id"=>2,"categorie"=>"sciences"],
        ["id"=>3,"categorie"=>"histoire"]
    ];
    return $rayons;
}

function all_auteur():array{
    $auteurs=[
        ["id"=>1,"nom"=>"fernand","prenom"=>"mikael","profession"=>"chercheur","id_ouvrage"=>[1],"oeuvre"=>["MIKIBOOK"]],
        ["id"=>2,"nom"=>"MINTSA","prenom"=>"Justine","profession"=>"ecrivaine","id_ouvrage"=>[2,3],"oeuvre"=>["Siana","histoite d'awu"]],
        ["id"=>3,"nom"=>"Okoumba-Nkoghé","prenom"=>"Maurice","profession"=>"ecrivain","id_ouvrage"=>[3,2,1],"oeuvre"=>["siana","histoire d'awu","MIKIBOOK"]]
    ];
    return $auteurs;
}

function all_exemplaire():array{
    $exemplaires=[
        ["id"=>1,"id_ouvrage"=>2,"code"=>"codex1","date_enregistre"=>"20/07/2022"],
        ["id"=>2,"id_ouvrage"=>3,"code"=>"codex2","date_enregistre"=>"14/02/2015"]
    ];
    return $exemplaires;
}

function all_adherent():array{
    $adherents=[
        ["id"=>1,"nom"=>"TATY","prenom"=>"uthai"],
        ["id"=>2,"nom"=>"MAKANGA","prenom"=>"Sephora"],
        ["id"=>3,"nom"=>"Sephora","prenom"=>"uthai"]
    ];
    return $adherents;
}

function all_pret():array{
    $prets=[
        ["id"=>1,"id_exemplaire"=>2,"id_ad"=>3,"date_obtenu"=>"15/01/2019","dater_prev"=>"30/01/2019","dater_reel"=>"20/01/2019","statut"=>"en cours"],
        ["id"=>2,"id_exemplaire"=>1,"id_ad"=>1,"date_obtenu"=>"12/02/2019","dater_prev"=>"27/02/2019","dater_reel"=>"2/03/2019","statut"=>"retard"]
        
    ];
    return $prets;
}


//DECLARACTION DES DIFFERENTES FONCTIONS UTILITAIRES 

function find_auteur_by_id(int $id):array|null{
    $auteurs=all_auteur();
    foreach ($auteurs as $auteur) {
        if($auteur["id"]==$id){
            return $auteur;
        }
    }
    return null;
}

function find_adherent_by_id(int $id):array|null{
    $adherents=all_adherent();
    foreach ($adherents as $adherent) {
        if($adherent["id"]==$id){
            return $adherent;
        }
    }
    return null;
}

function find_ouvrage_by_id(int|array $id):array|null{
    $ouvrages=all_ouvrage();
    foreach ($ouvrages as $ouvrage) {
        if($ouvrage["id"]==$id){
            return $ouvrage;
        }
    }
    return null;
}

function find_exemplaire_by_id(int $id):array|null{
    $exemplaires=all_exemplaire();
    foreach ($exemplaires as $exempl) {
        if($exempl["id"]==$id){
            return $exempl;
        }
    }
    return null;
}

function find_rayon_by_id(int|array $id):array|null{
    $rayons=all_rayon();
    foreach ($rayons as $rayon) {
        if($rayon["id"]==$id){
            return $rayon;
        }
    }
    return null;
}

function find_auteur_by_ouvrage():array{
    $ouvrages=all_ouvrage();
    $auteurOvrage=[];
    foreach ($ouvrages as $ouvrage){
        $rayons=find_rayon_by_id($ouvrage['id_rayon']);
        $auteurs=find_auteur_by_id($ouvrage['auteur_id']);
        $auteurOvrage[]=[
            "code"=>$ouvrage['code'],
            "titre"=>$ouvrage['titre'],
            "date_edition"=>$ouvrage['date_edition'],
            "auteur"=>$auteurs['prenom']." ".$auteurs['nom'],
            "rayon"=>$rayons['categorie']
        ];
    }
    return $auteurOvrage; 
}

function find_auteurs():array{
    $auteurs= all_auteur();
    $ouvauteur=[];
    foreach ($auteurs as $auteur){
        $ouvrages= find_ouvrage_by_id($auteur['id_ouvrage']);
        $ovre=(implode(",",$ouvrages['oeuvres']));
        $ouvauteur[]=[
            "nom_complet"=>$auteur['prenom']." ".$auteur['nom'],
            "profession"=>$auteur['profession'],
            "oeuvres"=>$ovre
        ];
    }
    return $ouvauteur;
}

function find_exemplaires():array{
    $exemplaires= all_exemplaire();
    $theExemplaire=[];
    foreach ($exemplaires as $exemplaire){
        $expl= find_ouvrage_by_id($exemplaire['id_ouvrage']);
        $theExemplaire[]=[
            "ouvrage"=>$expl['titre'],
            "code"=>$exemplaire['code'],
            "dateE"=>$exemplaire['date_enregistre']
        ];
    }
    return $theExemplaire;
}

function find_prets():array{
    $prets= all_pret();
    $thePret=[];
    foreach ($prets as $pret){
        $expl= find_exemplaire_by_id($pret['id_exemplaire']);
        $title=find_ouvrage_by_id($expl['id_ouvrage']);
        $adhe= find_adherent_by_id($pret['id_ad']);
        $thePret[]=[
            "ouvrage"=>$title['titre'],
            "adherent"=>$adhe['prenom']." ".$adhe['nom'],
            "date_obtenu"=>$pret['date_obtenu'],
            "dater_prev"=>$pret['dater_prev'],
            "dater_reel"=>$pret['dater_reel'],
            "statut"=>$pret['statut']
        ];
    }
    return $thePret;
}