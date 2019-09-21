<?php
/**
 *  Elément de flux RSS
 */
class ElementRSS {
    /**
     *  Titre du flux source
     *  @var string
     */
    private $_flux ;
    /**
     *  Titre de l'élément
     *  @var string
     */
    private $_titre ;
    /**
     *  URL associée à l'élément
     *  @var string
     */
    private $_url ;
    /**
     *  Date de publication sous forme de timestamp
     *  @var int
     */
    private $_timestamp ;

    /** Constructeur
     * @param $titre_flux le titre (title) du flux source
     * @param $node le noeud DOM source
     */
    public function __construct(string $titre_flux, DOMelement $node)
    {
        $this->_flux = $titre_flux;
        $this->_titre = $node->getElementsByTagName("title")[0]->nodeValue;
        $this->_url = $node->getElementsByTagName("link")[0]->nodeValue;
        $this->_timestamp = strtotime($node->getElementsByTagName("pubDate")[0]->nodeValue);

    }

    /** Accès au nom du flux
     *
     * @return string le nom du flux
     */
    public function flux() : string
    {
        return $this->_flux;
    }

    /** Accès au titre de l'élément
     *
     * @return string le titre de l'élément
     */
    public function titre() : string
    {
        return $this->_titre;
    }

    /** Accès à l'URL de l'élément
     *
     * @return string l'URL de l'élément
     */
    public function url() : string
    {
        return $this->_url;
    }

    /** Accès à la date de publication de l'élément sous forme de timestamp
     *
     * @return int le timestamp de l'élément
     */
    public function timestamp() : int
    {
        return $this->_timestamp;
    }

    /** Accès à la date de publication de l'élément sous forme de texte
     *
     * @return string la date de l'élément sous forme de date
     */
    public function date() : string
    {
        return date("D, d M Y H:i:s" , $this->_timestamp);
    }

    /** Comparaison alphabétique des noms des flux de deux éléments
     * @param ElementRSS $n1 le premier opérande de la comparaison
     * @param ElementRSS $n2 le second opérande de la comparaison
     *
     * @return int 0, -1 ou 1
     */
    public static function compareFlux(self $n1, self $n2) : int
    {
    }

    /** Comparaison alphabétique des titres de deux éléments
     * @param ElementRSS $n1 le premier opérande de la comparaison
     * @param ElementRSS $n2 le second opérande de la comparaison
     *
     * @return int 0, -1 ou 1
     */
    public static function compareTitre(self $n1, self $n2) : int
    {
    }

    /** Comparaison chronologique inverse des dates de deux éléments
     * @param ElementRSS $n1 le premier opérande de la comparaison
     * @param ElementRSS $n2 le second opérande de la comparaison
     *
     * @return int 0, -1 ou 1
     */
    public static function compareDate(self $n1, self $n2) : int
    {
    }
}

