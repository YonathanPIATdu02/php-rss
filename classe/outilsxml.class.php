<?php
/**
 *  Outils XML
 */
class OutilsXml {
    /** Rechercher la valeur d'une balise fille d'un noeud DOM
     * @param $node le noeud DOM à partir duquel la recherche doit être lancée
     * @param $nodeName le nom du noeud cherché
     * @throws Exception quand la balise n'a pu être trouvée
     *
     * @return string la valeur
     */
    public static function valeurElement(DOMElement $node, string $nodeName) : string
    {
        $list = $node->getElementsByTagName($nodeName) ;
        // La recherche donne un seul noeud résultat et ce noeud résultat possède au moins un fils
        if ($list->length == 1 && $list->item(0)->hasChildNodes()) {
            // Si le noeud résultat possède plus d'un fils, il contient vraissemblablement une section <![CDATA[ ... ]]>
            if (count($list ->item(0)->childNodes) > 1) {
                // Parcours de ses fils à la recherche d'un noeud <![CDATA[ ... ]]>
                foreach ($list ->item(0)->childNodes as $child) {
                    if ($child->nodeType == XML_CDATA_SECTION_NODE) {
                        // Trouvé ! Retourner sa valeur
                        return $child->nodeValue ;
                    }
                }
                // Pas trouvé... Nous avons un problème
                throw new Exception("La balise '$nodeName' n'a pu être trouvée dans les descendants de '{$node->tagName}'") ;
            }
            else {
                return $list
                    ->item(0)
                    ->firstChild
                    ->nodeValue ;
                // return $list->item(0)->nodeValue ; // Fonctionne par "abus de langage" mais ne devrait pas !
            }
        }
        else {
            if ($list->length > 1) {
                throw new Exception("La balise '$nodeName' a été trouvée plusieurs fois dans les descendants de '{$node->tagName}'") ;
            }
            else {
                throw new Exception("La balise '$nodeName' n'a pu être trouvée dans les descendants de '{$node->tagName}'") ;
            }
        }
    }
}
