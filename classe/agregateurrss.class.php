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
    }

    /**
     * Production de la liste des éléments en HTML
     *
     * @return string le code HTML
     */
    public function toHTML() : string
    {
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

