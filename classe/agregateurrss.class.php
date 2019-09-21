<?php

/**
 * Agrégateur de flux RSS
 */
class AgregateurRSS {
    /**
     * Tableau des éléments de flux RSS = tableau d'instances de ElementRSS
     * @var ElementRSS[]
     */
    protected $_elements = array() ;

    /**
     * Ajouter un flux RSS à l'agrégateur
     * @param $url l'URL du flux à ajouter
     * @param $titre_flux le titre du flux
     *
     * @throws Exception quand le flux ne peut pas être chargé
     * @return void
     */
    public function ajouterFlux(string $url, string $titre_flux=null) : void
    {
        $xml = new DOMdocument();
        if(!$xml->load($url)){
            throw new exeption("le flux ne peut pas être chargé");
        }
        if($titre_flux == null){
            $titres = $xml->getElementsByTagName("title");
            $titre_flux = $titres[0]->nodeValue;
        }
        $items = $xml->getElementsByTagName("item");
        foreach($items as $item){
            $this->_elements[] = new ElementRSS($titre_flux, $item);
        }
    }

    /**
     * Production de la liste des éléments en HTML
     *
     * @return string le code HTML
     */
    public function toHTML() : string
    {
        $html="";
        foreach($this->_elements as $element){
            $date = $element->date();
            $lien = $element->url();
            $flux = $element->flux();
            $titre = $element->titre();
            $html.=<<<HTML
            <div class='rss'>
                <span class='date'>$date</span>
                <span class='flux'>$flux</span>
                :
                <a class='lien' href='$lien'>$titre</a>
            </div>      

HTML;
        }
        return $html;
    }

    /**
     * Tri des éléments par nom de flux source
     *
     * @return void
     */
    public function triFlux() : void
    {
    }

    /**
     * Tri des éléments par titre
     *
     * @return void
     */
    public function triTitre() : void
    {
    }

    /**
     * Tri des éléments par date
     *
     * @return void
     */
    public function triDate() : void
    {
    }

    /**
     * Production d'un flux RSS
     * @param $title le titre du flux
     * @param $description la description du flux
     * @param $max le nNombre maximal d'éléments dans le flux (0 = tous)
     *
     * @return string le code XML du nouveau flux RSS
     */
    public function RSS(string $title, string $description, int $max=0) : string
    {
    }
}

