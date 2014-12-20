/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

///////////////////////////////////////////////////////////
//Spécifique au registre d'inscription et modification
///////////////////////////////////////////////////////////
function disable_enfants() {
    document.getElementById("nombre_enfants").disabled = true;
}

function enable_enfants() {
    document.getElementById("nombre_enfants").disabled = false;
}

function disable_marie() {
    document.getElementById("marie").style.display = 'none';
    document.getElementById("labelmarie").style.display = 'none';
}

function enable_marie() {
    document.getElementById("marie").style.display = 'block';
    document.getElementById("labelmarie").style.display = 'block';
}

function become_woman() {
    document.getElementById("homme").style.display = 'none';
    document.getElementById("femme").style.display = 'block';
}

function become_man() {
    document.getElementById("femme").style.display = 'none';
    document.getElementById("homme").style.display = 'block';
}

function choose_upload() {
    document.getElementById("field_upload").disabled = false;
    document.getElementById("field_avatar").disabled = true;
}

function choose_avatar() {
    document.getElementById("field_avatar").disabled = false;
    document.getElementById("field_upload").disabled = true;
}

//Test si les deux mots de passe correspondent
function mdp2_check(mdp1, mdp2, mdp_span, mdp_p) {
    var value_1 = document.getElementById(mdp1).value;
    var value_2 = document.getElementById(mdp2).value;
    var span = mdp_span.toString();
    var p = mdp_p.toString();

    if ((value_2.localeCompare(value_1)) != 0) {
        change_advertise(span, p, "Les deux mots de passe ne correspondent pas", "glyphicon glyphicon-remove", "text-danger");
    } else if (value_1.length < 8) {
        change_advertise(span, p, "Le mot de passe doit contenir 8 caractère minimum", "glyphicon glyphicon-remove", "text-danger");
    } else {
        change_advertise(span, p, "", "glyphicon glyphicon-ok", "text-success");
    }
}

function check_email(input_id, span_id, p_id) {
    var email = document.getElementById(input_id).value;
    var span = span_id.toString();
    var p = p_id.toString();

    if (email.length > 0) {
        if (!valid_email(email)) {
            //On récupère le span, puis son code, auquel on ajout le commentaire, puis on change le contenu de p
            change_advertise(span, p, "Adresse email invalide", "glyphicon glyphicon-remove", "text-danger");
        } else {
            //On enlève le texte tout en laissant le span .. au cas où
            change_advertise(span, p, "", "glyphicon glyphicon-ok", "text-success");
        }
    }

}

function check_email2(mail1, mail2, mail_span, mail_p) {
    var value_1 = document.getElementById(mail1).value;
    var value_2 = document.getElementById(mail2).value;
    var span = mail_span.toString();
    var p = mail_p.toString();

    if (value_1.length > 0) {
        if ((value_2.localeCompare(value_1)) != 0) {
            change_advertise(span, p, "Les adresses mail ne correspondent pas", "glyphicon glyphicon-remove", "text-danger");
        } else if (!valid_email(value_2)) {
            change_advertise(span, p, "Adresse email invalide", "glyphicon glyphicon-remove", "text-danger");
        } else {
            change_advertise(span, p, "", "glyphicon glyphicon-ok", "text-success");
        }
    }

}

function valid_email(email) {
    var position_a = email.lastIndexOf("@");
    var position_dot = email.lastIndexOf(".");
    return (position_a != -1) && (position_dot != -1) && (position_a < position_dot) && (position_dot < email.length - 1);
}

function change_advertise(span_id, p_id, message, span_class, p_class) {
    document.getElementById(span_id).className = span_class;
    var nouveauspan = document.getElementById(span_id).outerHTML;
    nouveauspan = nouveauspan.concat("  ").concat(message);
    document.getElementById(p_id).innerHTML = nouveauspan;
    document.getElementById(p_id).className = p_class;
}

//Test la longueur du mot de passe
function mdp_check(input_id, span_id, p_id) {
    var value = document.getElementById(input_id).value;
    var span = span_id.toString();
    var p = p_id.toString();

    if (value.length < 8) {
        //On récupère le span, puis son code, auquel on ajout le commentaire, puis on change le contenu de p
        change_advertise(span, p, "Le mot de passe doit contenir 8 caratères minimum", "glyphicon glyphicon-remove", "text-danger");
    } else {
        //On enlève le texte tout en laissant le span .. au cas où
        change_advertise(span, p, "", "glyphicon glyphicon-ok", "text-success");
    }
}


///////////////////////////////////////////////////////////
//Fonction réutilisable
///////////////////////////////////////////////////////////

//Change un et UN SEUL chevron
function chevron_change(id) {
    id = id.toString();

    //On récupère la classe
    var chevron = document.getElementById(id).className;
    var index = chevron.indexOf("glyphicon-chevron-");

    //On récupère la partie 'essentielle' de la classe
    var res = chevron.slice(index + 18, index + 18 + 5);
    res = res.trim();

    //Si on a 'up' on a aussi une autre chaine avec, il faut donc traiter ça.
    if (res.indexOf("up") > -1) {
        res = "up";
    }
    //Si la liste est déroulée
    if (res == "down") {
        //On renvoi le chevron 'haut' avec les compléments de la classe (s'il y en a)
        chevron_up(id);
    } else if (res == "up") {
        chevron_down(id);
    } else {
        alert('Problème : mauvais chevron :' + res);
    }

    //alert(document.getElementById(id).className);

}

//Change la classe du chevron en 'up'
function chevron_up(id) {
    var chevron = document.getElementById(id).className;
    document.getElementById(id).className = chevron.replace("down", "up");
}

//Change la classe du chevron en 'down'
function chevron_down(id) {
    var chevron = document.getElementById(id).className;
    document.getElementById(id).className = chevron.replace("up", "down");
}

//change un group de chevron
//Prend en paramètre :
//          - l'id du chevron appelant
//          - un tableau contenant les autres id des autres chevron du même groupe
function change_groupe_chevron(my_id, others_id) {
    //Changer sa propre classe
    //Changer la classe de chaque autre 
    chevron_change(my_id);
    for (var i = 0; i < others_id.length; i++) {
        chevron_down(others_id[i]);

    }
}

function change_link(id,first_link) {
    document.getElementById(id).style.display = "none";
    document.getElementById(first_link).style.display = 'block';

}