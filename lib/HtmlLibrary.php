<?php

/**
 * Uvijek ispisuje sadržaj <!doctype html> i koristi se kao 
 * prva naredba kod stvaranja dokumenta
 */
function create_doctype() {
    echo "<!doctype html>";
}

/**
 * Ispisuje otvarajući tag <html>
 */
function begin_html() {
    echo "<html>";
}

/**
 * Ispisuje zatvarajući tag </html>
 */
function end_html() {
    echo "</html>";
}

/**
 * Ispisuje otvarajući tag <head>
 */
function begin_head() {
    echo "<head>";
}

/**
 * Ispisuje zatvarajući tag </head>
 */
function end_head() {
    echo "</head>";
}

/**
 * Ispisuje otvarajući tag <html> te mu pridružuje parove (atribut, vrijednost)
 * na temelju predanih parametara.
 * @param type $params asocijativno polje parova atribut=>vrijednost
 */
function begin_body($params) {
    $body = "<body";
    foreach ($params as $key => $value) {
        $body .= " " . $key . "=\"" . $value . "\"";
    }
    $body .= ">";
    echo $body;
}

/**
 * Ispisuje zatvarajući tag </body>.
 */
function end_body() {
    echo "</body>";
}

/**
 * Generira tag <form> i dodjeljuje atribute action i method s vrijednostima
 * koje ovise o predanim parametrima.
 * @param type $action relativna ili apsolutna putanja do skripte za obradu
 * obrazaca
 * @param type $method GET ili POST
 */
function start_form($action, $method, $enctype = NULL) {
    $encoding = $enctype==NULL ? NULL : " enctype=\"" . $enctype . "\"";
    $form = "<form action=\"" . $action . "\" method=\"" . 
            $method . "\"" . $encoding . ">";
    echo $form;
}

/**
 * Ispisuje zatvarajući tag </form>
 */
function end_form() {
    echo "</form>";
}

/**
 * Stvara polje za unos teksta pri čemu su atributi i njihove vrijednosti
 * određene predanim poljem.
 * @param {array} $params asocijativno polje parova oblika atribut=>vrijednost
 * @return niz znakova koji predstavlja generirani input tag
 */
function create_input($params) {
    $input = "<input";
    foreach ($params as $key => $value) {
       $input .= " " . $key . "=\"" . $value . "\"";  
    }
    $input .= ">";
    return $input;
}

/**
 * Generira padajući izbornik određen elementom select.
 * Polje sadrži elemente potrebne za select i polje pod ključem contents.
 * To polje sadrži html kod potreban za ispis.
 * @param {array} $params elementi koji određuju tag select
 * @return niz znakova koji predstavlja generirani select tag
 */
function create_select($params) {
    $select = "<select";
    foreach ($params as $key => $value) {
        if ($key === "contents") continue;
        $select .= " " . $key . "=\"" . $value . "\"";  
    }
    $select .= ">";
    
    if (isset($params["contents"])) {
        $contents = $params["contents"];
        foreach ($contents as $value) {
            $select .= $value;
        }
    }
    
    $select .= "</select>";
    return $select;
}

/**
 * Stvara element button pomoću predanih parametara i vraća generirani tag.
 * Sadržaj gumba određuje parametar contents. Ako je njegova vrijednost jednaka
 * praznom nizu znakova ili uopće nije poslan, sadržaj treba biti prazan.
 * @param {array} $params polje parametara koje određuje dugme
 * @return niz znakova koji predstavlja generirani tag button
 */
function create_button($params) {
    $button = "<button";
    foreach ($params as $key => $value) {
        if ($key === "contents") continue;
        $button .= " " . $key . "=\"" . $value . "\"";  
    }
    $button .= ">";
    
    if (isset($params["contents"])) {
        $button .= $params["contents"];
    }
    
    $button .= "/button>";
    return $button;
}

/**
 * Ispisuje otvarajući tag <table>.
 * @param {array} $params polje parametara spremljenih po principu 
 * atribut=>vrijednost.
 */
function create_table($params) {
    $table = "<table";
    foreach ($params as $key => $value) {
       $table .= " " . $key . "=\"" . $value . "\"";  
    }
    $table .= ">";
    echo $table;
}

/**
 * Ispisuje zatvarajući tag </table>
 */
function end_table() {
    echo "</table>";
}

/**
 * Generira HTML potreban za stvaranje jednog retka tablice.
 * @param {array} $params polje parametara koje određuje jedan redak teblice
 * @return niz znakova koji predstavlja HTML kod retka tablice
 */
function create_table_row($params) {
    $row = "<tr";
    foreach ($params as $key => $value) {
        if ($key === "contents") continue;
        $row .= " " . $key . "=\"" . $value . "\"";  
    }
    $row .= ">";
   
    if (isset($params["contents"])) {
        $contents = $params["contents"];
        foreach ($contents as $value) {
            $row .= $value;
        }
    }
    
    $row .= "</tr>";
    return $row;
}

/**
 * Na temelju predanih parametara koji određuju atribute i vrijednosti, generira
 * HTML kod ćelije.
 * @param {array} $params polje parametara koje određuje ćeliju
 * @return niz znakova koji određuje kod ćelije
 */
function create_table_cell($params) {
    $cell = "<td";
    foreach ($params as $key => $value) {
        if ($key === "contents") continue;
        $cell .= " " . $key . "=\"" . $value . "\"";  
    }
    $cell .= ">";
    
    if (isset($params["contents"])) {
        $cell .= $params["contents"];
    }
    
    $cell .= "</td>";
    return $cell;
}

/**
 * Generiranje HTML koda proizvoljnog elementa.
 * @param {String} $name naziv elementa
 * @param {array} $params polje argumenata koji određuju ćeliju
 * @param {boolean} $closed true ako ima zatvarajući tag, false inače
 * @return string
 */
function create_element($name, $params, $closed = true) {
    /*OPASKA: promijenjen poredak argumenata da funkcija bude generička.
     * U slučaju iz pripreme, korinik mora zadati drugi argument (true ili
     * false) da poziv funckije bude ispravan. U ovom slučaju to nije tako.
     */
    $element = "<" . $name;
    foreach ($params as $key => $value) {
        if ($key === "contents") continue;
        $element .= " " . $key . "=\"" . $value . "\"";  
    }
    $element .= ">";
    
    if (isset($params["contents"])) {
        $element .= $params["contents"];
    }
    
    if ($closed) {
        $element .= "</" . $name . ">";
    }
    
    return $element;
}